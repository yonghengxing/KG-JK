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
        $schemas = $this->model->where("slabel",'like','%'.$text.'%')->orWhere("property",'like','%'.$text.'%')
            ->orWhere("updated_at",'like','%'.$text.'%')->orWhere("created_at",'like','%'.$text.'%')
            ->orWhere("sname",'like','%'.$text.'%')->orWhere("createname",'like','%'.$text.'%')->get();
        return $schemas;

    }

    function deleteAutoDatabase(){
        $ret = $this->model->where('isauto','1')->delete();
        return $ret;
    }
	
	function deleteSchemaByName($databaseName){

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

    //获取数据源的所有表名，没有view
    public function get_table_list(){
        $databaseName = config("properties")['database'];
        $tableSql = "select table_name from information_schema.tables where table_type<>'view' and table_schema=?  ";
        $tableNames = \DB::select($tableSql,[$databaseName]);
        return $tableNames;
    }

    public function  generate_schema_by_table($databaseName){

        $tableSql = "select table_name,table_comment  from information_schema.tables where table_type<>'view' and table_schema=?  ";
        $tableNames = \DB::select($tableSql,[$databaseName]);

        $schemaName = $this->get_schema_list();

        foreach ($tableNames as $tableName){
            if(!in_array($tableName->table_name,$schemaName)){

                $sql = "select column_name,data_type ,IF(column_key='PRI','t','f') as pri from information_schema.columns where table_name=?";
                $fields = \DB::select($sql,[$tableName->table_name]);

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
    // 先得到所有的table集，然后对所有的view集合，遍历，是否包含table,如果包含，切割。
    public function generate_schema_by_view($databaseName,$pdo_me){

        $viewSql = "select table_name,table_comment  from information_schema.tables where table_type='view' and table_schema=?  ";
        $viewNames = \DB::select($viewSql,[$databaseName]);
        $schemaName = $this->get_schema_list();
        foreach ($viewNames as $tableName){

            if(!in_array($tableName->table_name,$schemaName)){

                $property = array();

                //$endLabel = explode("_",$tableName->table_name)[1];
                $viewName = $tableName->table_name;
                //var_dump($viewName);
                $tableList = $this->get_table_list();
                $prefixView = "";
                $postfixView = "";
                foreach ($tableList as $item){
                    $itemStr = $item->table_name;
                    $index = strpos($viewName,$itemStr);
                    var_dump($index);
                    if($index !== false){
                        $prefixView = $itemStr;
                        $postfixView = substr($viewName,strlen($itemStr)+1);
                        //var_dump($itemStr."这个是表明");
                        //var_dump($postfixView."这个是列名");
                        //var_dump(strlen($itemStr)+1);
                        break;
                    }

                }


                //在这分割VIEW,

                //view的后缀，即原表的列名，录入schema;
                $property[$postfixView] = "string;primary_id";

                $mSchema = new Schema();
                $mSchema->sname = $tableName->table_comment;
                $mSchema->slabel = $tableName->table_name;
                $mSchema->isauto = '1';
                $mSchema->isView= '1';
                $mSchema->property = json_encode($property);
                $mSchema->createname = Auth::user()->name;
                $mSchema->updatename = Auth::user()->name;
                $this->append($mSchema);

                $this->generate_schema_csv($viewName,$prefixView,$postfixView,$pdo_me);

                $this->generate_relation_by_view($viewName,$prefixView,$postfixView);

                $this->generate_relation_csv($viewName,$prefixView,$postfixView,$pdo_me);
            }
        }

    }

    public function generate_schema_csv($viewName,$prefixView,$postfixView,$pdo_me){

        $viewFiled = $postfixView;
        $path = config("properties")['filePathLinux'].$viewName.".csv";
//      $pdo_me = new PDO(config("properties.PDO")['url'],config("properties.PDO")['username'],config("properties.PDO")['psw']);

        $csv_export = "select '".$viewFiled."' union select * from ".$viewName." into outfile '".$path."' fields terminated by '&'";

        $statement = $pdo_me->prepare($csv_export);

        $statement->execute();
    }

    public function generate_relation_by_view($viewName,$prefixView,$postfixView){

        $startLabel = $prefixView;
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

    public function  generate_relation_csv($viewName,$prefixView,$postfixView,$pdo_me){

        $tableSource = $prefixView;
        $viewFiled = $postfixView;

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
