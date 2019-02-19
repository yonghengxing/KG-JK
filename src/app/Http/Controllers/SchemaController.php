<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2018/12/27
 * Time: 15:05
 */

namespace App\Http\Controllers;
use App\Models\ParameterJson;
use App\Models\Schema;
use App\Services\ParameterJsonService;
use Illuminate\Routing\Controller as BaseController;


use App\Services\SchemaService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;



class SchemaController extends BaseController
{
    function __construct(SchemaService $schemaService,ParameterJsonService $parameterJsonService)
    {
        // $this->middleware('auth');
        $this->schemaService = $schemaService;
        $this->parameterJsonService = $parameterJsonService;

    }


    /**
     * 显示所有的本体列表
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
     * 新建本体页面
     */
    public function schema_new()
    {
        return view('schema/new');
    }


    public function schema_new_auto(){

        // 获取配置文件的数据库名称
//         $databasename = config("database.connections.mysql")['database'];
        $databasename = "iscas_itechs_dbout";
        // 获取数据库下所有的表名称
        $tablesql = "select table_name,table_comment  from information_schema.tables where table_type='base table' and table_schema=?  ";
        $tablenames = \DB::select($tablesql,[$databasename]);
        $data = array();
        $attribute = array();
       $ret =  $this->schemaService->deleteAutoDatabase();
       foreach ($tablenames as $tablename){
            // 遍历每个表，获取表的字段名，类型和是否主键;  暂且将所有类型转换为string;
            $sql = "select column_name,data_type ,IF(column_key='PRI','t','f') as pri
                from information_schema.columns 
                where table_name=?";
            $fields = \DB::select($sql,[$tablename->table_name]);

            // 按所指定格式组织数据结构
            $property = array();
            foreach ($fields as $value) {

                if($value->pri == 't')
                    $property[$value->column_name] = "string;primary_id";
                else
                    $property[$value->column_name] = "string";
            }

            // 将一个个schema单独存入数据库中
            $mSchema = new Schema();
            $mSchema->sname = $tablename->table_comment;
            $mSchema->slabel = $tablename->table_name;
            $mSchema->isauto = '1';
            $mSchema->property = json_encode($property);
            $ret = $this->schemaService->append($mSchema);



            $attribute['attribute'] = $property;
            $data[$tablename->table_name] = $attribute;

        }

//        $result['vertex'] = $data;
//        $resultjson =json_encode($result);
//
//
//
//        $mParameterJson = new ParameterJson();
//        $mParameterJson->parameterjson = $resultjson;
//        $mParameterJson->flag = 'vertex';
//        $ret = $this->parameterJsonService->append($mParameterJson);

        return redirect()->action('SchemaController@schema_list');

    }

    /**
     * 新建本体数据处理
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
     * 打开修改本体信息的页面
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
     * 修改本体的数据处理
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
     * 通过ID删除本体
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