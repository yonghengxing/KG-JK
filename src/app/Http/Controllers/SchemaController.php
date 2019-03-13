<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2018/12/27
 * Time: 15:05
 */

namespace App\Http\Controllers;
use App\Models\ParameterJson;
use App\Models\Relation;
use App\Models\Schema;
use App\Services\ParameterJsonService;
use App\Services\RelationService;
use Illuminate\Routing\Controller as BaseController;


use App\Services\SchemaService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use PDO;



class SchemaController extends BaseController
{
    function __construct(SchemaService $schemaService,ParameterJsonService $parameterJsonService,RelationService $relationService)
    {
        // $this->middleware('auth');
        $this->schemaService = $schemaService;
        $this->parameterJsonService = $parameterJsonService;
        $this->relationService = $relationService;

    }


    /**
     * 显示所有的实体列表
     */
    public function schema_list(Request $request)
    {

        $mSchemas = $this->schemaService->getAll();
        $perPage = 15;
        $currentPage = $request->input('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $total = $mSchemas->count();
        $result = $mSchemas->forPage($currentPage, $perPage);
        $schemas= new LengthAwarePaginator($result,$total,$perPage,$currentPage,[
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page']);
        return view('schema/list', compact('schemas'));
    }

    /**
     * 新建实体页面
     */
    public function schema_new()
    {
        return view('schema/new');
    }

    // 返回已经由外部数据库生成的schema,更新的时候，不再重新生成。
    public function  get_schema_list(){
        $mSchemas = $this->schemaService->getAll();
        $res = array();
        foreach ($mSchemas as $mSchema) {
            $res[] = $mSchema->slabel;
        }
        return $res;
    }

    // 获取数据库下的所有实表，生成schema
    public function  generate_schema_by_table($databasename,$data,&$keyField){
        // 获取指定数据库下的所有表，这里的table_type是指实体表，而不是View,后期可以考虑两者合一。
        $tableSql = "select table_name,table_comment  from information_schema.tables where table_type='base table' and table_schema=?  ";
        $tableNames = \DB::select($tableSql,[$databasename]);

        $schemaName = $this->get_schema_list();
        foreach ($tableNames as $tableName){

            if(!in_array($tableName->table_name,$schemaName)){

                // 遍历每个表，获取表的字段名，类型和是否主键;  暂且将所有类型转换为string;
                $sql = "select column_name,data_type ,IF(column_key='PRI','t','f') as pri from information_schema.columns where table_name=?";
                $fields = \DB::select($sql,[$tableName->table_name]);

                // 按所指定格式组织数据结构
                $property = array();
                foreach ($fields as $value) {
                    if($value->pri == 't'){
                        $property[$value->column_name] = "string;primary_id";
                        $keyField[$tableName->table_name] = $value->column_name;
                    }
                    else
                        $property[$value->column_name] = "string";
                }

                // 将一个个schema单独存入数据库中
                $mSchema = new Schema();
                $mSchema->sname = $tableName->table_comment;
                $mSchema->slabel = $tableName->table_name;
                $mSchema->isauto = '1';
                $mSchema->property = json_encode($property);
                $ret = $this->schemaService->append($mSchema);

                $attribute['attribute'] = $property;
                $data[$tableName->table_name] = $attribute;
            }
        }
    }
    // 获取数据下的所有视图，视图名称为 表名_列名，视图存入schema,并生成视图顶点csv文件，并自动关联实体表，并自动生成关系csv
    public function generate_schema_by_view($databasename,$data,&$keyField){

        $viewsql = "select table_name,table_comment  from information_schema.tables where table_type='view' and table_schema=?  ";
        $viewnames = \DB::select($viewsql,[$databasename]);
        $schemaName = $this->get_schema_list();
        foreach ($viewnames as $tablename){
            // 遍历每个表，获取表的字段名，类型和是否主键;  暂且将所有类型转换为string;
            if(!in_array($tablename->table_name,$schemaName)){
                // 按所指定格式组织数据结构
                $property = array();

                $endlabel = explode("_",$tablename->table_name)[1];
                $property[$endlabel] = "string;primary_id";

                // 将一个个schema单独存入数据库中
                $mSchema = new Schema();
                $mSchema->sname = $tablename->table_comment;
                $mSchema->slabel = $tablename->table_name;
                $mSchema->isauto = '1';
                $mSchema->property = json_encode($property);
                $ret = $this->schemaService->append($mSchema);

                $attribute['attribute'] = $property;
                $data[$tablename->table_name] = $attribute;
                $this->generate_schema_csv($tablename->table_name);
                $this->generate_relation_by_view($tablename->table_name);
                $this->generate_relation_csv($tablename->table_name,$keyField);
            }
        }
    }
    //自动生成视图到表的关系，关系名为:table_列名_e;
    public function generate_relation_by_view($viewname){

        $startlabel = explode("_",$viewname)[0];
        //$endlabel = explode("_",$viewname)[1];
        $mRelation = new Relation();
        $mRelation->typelabel = $viewname."_e";
        $mRelation->startlabel = $startlabel;
        $mRelation->endlabel = $viewname;
        $mRelation->isauto = '1';

        $ret = $this->relationService->append($mRelation);

    }
    // 自动生成关系csv文件，csv文件名 表名_列名_e.csv;
    public function  generate_relation_csv($viewname,&$keyField){
        try {
            $pdo_me = new PDO(
                'mysql:host=127.0.0.1;dbname=iscas_itechs_dbout;port=3306;charset=utf8',
                'root',
                ''
            );
        } catch (PDOException $ex) {
            echo 'database connection failed';
            exit();
        }

        $tableSource = explode("_",$viewname)[0];
        $viewFiled = explode("_",$viewname)[1];
        $path = "/home/fengbs/tigergraph/loadingData/".$viewname.'_e.csv';
        if(file_exists ($path)){
            unlink($path);
        }
       // $tableKey = $keyField[$tableSource];
	$tableKey = "me_id";
        $csv_export = "select '".$tableSource."','".$viewname."' union select ".$tableKey.",".$viewFiled." from ".$tableSource." into outfile '".$path."' fields terminated by '&'";
        $statement = $pdo_me->prepare($csv_export);

        $statement->execute();


    }
    // 属性视图生成的顶点，同时生成供填充数据的csv,顶点csv文件名：表名_列名.csv;
    public function generate_schema_csv($viewname){
        $viewFiled = explode("_",$viewname)[1];
        $path = "/home/fengbs/tigergraph/loadingData/".$viewname.".csv";
	
       
        try {
            $pdo_me = new PDO(
                'mysql:host=127.0.0.1;dbname=iscas_itechs_dbout;port=3306;charset=utf8',
                'root',
                ''
            );
        } catch (PDOException $ex) {
            echo 'database connection failed';
            exit();
        }
        $csv_export = "select '".$viewFiled."' union select * from ".$viewname." into outfile '".$path."' fields terminated by '&'";
       
        $statement = $pdo_me->prepare($csv_export);
       
        $statement->execute();
    }

    public function schema_new_auto(){
        // 删除之前自动生成的
//        $this->relationService->deleteAutoRelation();
//        $this->schemaService->deleteAutoDatabase();

        $data = array();
        $keyField = array();
        // 获取配置文件的数据库名称
        //$databasename = config("database.connections.mysql")['database'];
        $databasename = "iscas_itechs_dbout";
	    array_map('unlink', glob('/home/fengbs/tigergraph/loadingData/*.csv'));
        $this->generate_schema_by_table($databasename,$data,$keyField);
        $this->generate_schema_by_view($databasename,$data,$keyField);
       // return redirect()->action('SchemaController@schema_list');

        $url = "http://192.168.15.62:5000/run_command_dbout";
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'timeout'=>1000,//s
            )
        );
        $data =  file_get_contents($url, false, stream_context_create($opts));
	return  redirect('../../../kg/schema/list');
	
    }

    /**
     * 新建实体数据处理
     * 此处应该有处理属性集的操作
     */
    public function schema_new_do(Request $request)
    {

        $sname = $request->input('sname');
        $slabel= $request->input('slabel');

        $properties =$request->input('iskey');
        $labels = $request->input('labels');
        $kv = array_combine($labels,$properties);

        foreach ($kv as $key=>$value){
            if($value == '1')
                $kv[$key] = "string;primary_id";
            else
                $kv[$key]= "string";
        }

        $mSchema = new Schema();
        $mSchema->sname = $sname;
        $mSchema->slabel = $slabel;

        $mSchema->property = json_encode($kv);

        $ret = $this->schemaService->append($mSchema);
        return redirect()->action('SchemaController@schema_list');
    }

    /**
     * 打开修改实体信息的页面
     * 此处应该有解析属性集json的操作，以后再弄
     *
     */
    public function schema_info($sid){
        $schema = $this->schemaService->getById($sid);

        $kv = json_decode($schema->property,true);
        $properties = array_keys($kv);

        $num = count($properties);

        return view('schema/info', compact("schema","properties","num"));
    }

    /**
     * 修改实体的数据处理
     * 此处应该有处理属性集的操作
     */
    public function schema_info_do($sid,Request $request)
    {
        $sname = $request->input('sname');
        $slabel= $request->input('slabel');


       $properties = array_filter($request->input('properties'));



        $mSchema = $this->schemaService->getById($sid);

        $mSchema->sname = $sname;
        $mSchema->slabel = $slabel;
        $key = array_search('string;primary_id',json_decode($mSchema->property,true));
        $resultpro =array();
        foreach ($properties as $value) {
            if($value == $key)
                $resultpro[$value] = "string;primary_id";
            else
                $resultpro[$value]= "string";
        }

        $mSchema->property = json_encode($resultpro);
        $updateRet = $this->schemaService->update($mSchema);

        return redirect()->action('SchemaController@schema_list');
    }
    /**
     * 通过ID删除实体
     * 没有进行动作成功或失败的提示，直接进行跳转
     */
    public function schema_delete($sid)
    {
        $ret = $this->schemaService->delete($sid);
        return redirect()->action('SchemaController@schema_list');
    }
    /**
     * 搜索
     *
     */
    public function schema_search(Request $request)
    {
        $text = $request->route("text");
        $schemas=$this->schemaService->getSchemaBySearch($text);

        return view('schema/list', compact('schemas','text'));
    }



}