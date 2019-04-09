<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2018/12/27
 * Time: 15:19
 */

namespace App\Services;
use Illuminate\Support\Facades\Auth;
use App\Models\Relation;
use App\Models\Schema;
use App\Services\RelationService;

class SchemaService extends BaseService
{
    function __construct(Schema $schema,RelationService $relationService){
        $this->model = $schema;
        $this->relationService = $relationService;
    }

    function getSchemaBySearch($text){
        $schemas = $this->model->where("stype",'like','%'.$text.'%')->orWhere("property",'like','%'.$text.'%')->get();
        return $schemas;

    }

    function deleteAutoDatabase(){
        $ret = $this->model->where('isauto','1')->delete();
        return $ret;
    }
	
	function deleteSchemaByName($databaseName){
	//删除数据源时自动删除相应的schema。
	$this->model->where('slabel',$databaseName)->orwhere('slabel','like',$databaseName."_%")->delete();
    }

    public function  get_schema_list(){
        $mSchemas = $this->getAll();
        $res = array();
        foreach ($mSchemas as $mSchema) {
            $res[] = $mSchema->slabel;
        }
        return $res;
    }
    public function  generate_schema_by_table($databaseName){
        // 获取指定数据库下的所有表，这里的table_type是指实体表，而不是View,后期可以考虑两者合一。
        $tableSql = "select table_name,table_comment  from information_schema.tables where table_type<>'view' and table_schema=?  ";
        $tableNames = \DB::select($tableSql,[$databaseName]);
        // 返回已经由外部数据库生成的schema,更新的时候，不再重新生成。
        $schemaName = $this->get_schema_list();

        foreach ($tableNames as $tableName){

            if(!in_array($tableName->table_name,$schemaName)){

                // 遍历每个表，获取表的字段名，类型和是否主键;  暂且将所有类型转换为string;
                $sql = "select column_name,data_type ,IF(column_key='PRI','t','f') as pri from information_schema.columns where table_name=?";
                $fields = \DB::select($sql,[$tableName->table_name]);

                // 按所指定格式组织数据结构
                $property = array();
                foreach ($fields as $value) {
                    if(!in_array($value->column_name,array('id','user_id','items_name'))){
                        if($value->pri == 't'){
                            $property[$value->column_name] = "string;primary_id";
                            $keyField[$tableName->table_name] = $value->column_name;
                        }
                        else
                            $property[$value->column_name] = "string";
                    }
                }

                // 将一个个schema单独存入数据库中
                $mSchema = new Schema();
                $mSchema->sname = $tableName->table_comment;
                $mSchema->slabel = $tableName->table_name;
                $mSchema->isauto = '1';
                $mSchema->property = json_encode($property);
                $mSchema->createname = Auth::user()->name;
                $mSchema->updatename = Auth::user()->name;
                $ret = $this->append($mSchema);

            }



        }
    }

    public function generate_schema_by_view($databaseName,$pdo_me){

        $viewSql = "select table_name,table_comment  from information_schema.tables where table_type='view' and table_schema=?  ";
        $viewNames = \DB::select($viewSql,[$databaseName]);
        $schemaName = $this->get_schema_list();
        foreach ($viewNames as $tableName){
            // 遍历每个表，获取表的字段名，类型和是否主键;  暂且将所有类型转换为string;
            if(!in_array($tableName->table_name,$schemaName)){
                // 按所指定格式组织数据结构
                $property = array();
                //视图生成的schema，只有一个主键属性，名称为实体表的一列，视图名称_后即是。
                $endLabel = explode("_",$tableName->table_name)[1];
                $property[$endLabel] = "string;primary_id";

                // 将一个个schema单独存入数据库中
                $mSchema = new Schema();
                $mSchema->sname = $tableName->table_comment;
                $mSchema->slabel = $tableName->table_name;
                $mSchema->isauto = '1';
                $mSchema->isView= '1';
                $mSchema->property = json_encode($property);
                $mSchema->createname = Auth::user()->name;
                $mSchema->updatename = Auth::user()->name;
                $this->append($mSchema);

                //每个视图，都要生成csv数据文件
                $this->generate_schema_csv($tableName->table_name,$pdo_me);
                //每个视图，都要建立与实体表的关系
                $this->generate_relation_by_view($tableName->table_name);
                //每个视图，都要生成到实体表关系的csv文件数据
                $this->generate_relation_csv($tableName->table_name,$pdo_me);
            }
        }
    }

    public function generate_schema_csv($viewName,$pdo_me){
        //属性切成的schema,名称为视图的后缀，填充数据来源于实体表的一列属性，名称和schema名称一致
        $viewFiled = explode("_",$viewName)[1];
        $path = config("properties")['filePathLinux'].$viewName.".csv";

//        $pdo_me = new PDO(config("properties.PDO")['url'],config("properties.PDO")['username'],config("properties.PDO")['psw']);

        $csv_export = "select '".$viewFiled."' union select * from ".$viewName." into outfile '".$path."' fields terminated by '&'";

        $statement = $pdo_me->prepare($csv_export);

        $statement->execute();
    }

    public function generate_relation_by_view($viewName){
        //建立单切属性到实体总表的关系，即视图前缀到视图名称的关系
        $startLabel = explode("_",$viewName)[0];
        $endLabel = $viewName;
        $mRelation = new Relation();
        $mRelation->typelabel = $viewName."_e";
        $mRelation->startlabel = $startLabel;
        $mRelation->endlabel = $endLabel;
        $mRelation->isauto = '1';
        $mRelation->createname = Auth::user()->name;
        $mRelation->updatename = Auth::user()->name;

        $this->relationService->append($mRelation);

    }

    public function  generate_relation_csv($viewName,$pdo_me){
        // 单切属性到实体表的关系填充数据来源自实体表，实体表每行数据，切出主键和属性列两列数据生成csv文件
//        $pdo_me = new PDO(config("properties.PDO")['url'],config("properties.PDO")['username'],config("properties.PDO")['psw']);

        $tableSource = explode("_",$viewName)[0];
        $viewFiled = explode("_",$viewName)[1];

        $path = config("properties")['filePathLinux'].$viewName.'_e.csv';
        if(file_exists ($path)){
            unlink($path);
        }

        $tableKey =config("properties")['defaultKeyId'];

        $csv_export = "select '".$tableSource."','".$viewName."' union select ".$tableKey.",".$viewFiled." from ".$tableSource." into outfile '".$path."' fields terminated by '&'";

        $statement = $pdo_me->prepare($csv_export);
        $statement->execute();
    }

    public function run_command($select){

        $url =  config("properties")[$select];
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'timeout'=>1000,//s
            )
        );
        file_get_contents($url, false, stream_context_create($opts));
    }

    function getSchemaTable(){
        $schemas = $this->model->where('isView','0')->get();
        return $schemas;
    }
}
