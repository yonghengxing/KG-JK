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
	//ɾ������Դʱ�Զ�ɾ����Ӧ��schema��
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
        // ��ȡָ�����ݿ��µ����б������table_type��ָʵ���������View,���ڿ��Կ������ߺ�һ��
        $tableSql = "select table_name,table_comment  from information_schema.tables where table_type<>'view' and table_schema=?  ";
        $tableNames = \DB::select($tableSql,[$databaseName]);
        // �����Ѿ����ⲿ���ݿ����ɵ�schema,���µ�ʱ�򣬲����������ɡ�
        $schemaName = $this->get_schema_list();

        foreach ($tableNames as $tableName){

            if(!in_array($tableName->table_name,$schemaName)){

                // ����ÿ������ȡ����ֶ��������ͺ��Ƿ�����;  ���ҽ���������ת��Ϊstring;
                $sql = "select column_name,data_type ,IF(column_key='PRI','t','f') as pri from information_schema.columns where table_name=?";
                $fields = \DB::select($sql,[$tableName->table_name]);

                // ����ָ����ʽ��֯���ݽṹ
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

                // ��һ����schema�����������ݿ���
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
            // ����ÿ������ȡ����ֶ��������ͺ��Ƿ�����;  ���ҽ���������ת��Ϊstring;
            if(!in_array($tableName->table_name,$schemaName)){
                // ����ָ����ʽ��֯���ݽṹ
                $property = array();
                //��ͼ���ɵ�schema��ֻ��һ���������ԣ�����Ϊʵ����һ�У���ͼ����_���ǡ�
                $endLabel = explode("_",$tableName->table_name)[1];
                $property[$endLabel] = "string;primary_id";

                // ��һ����schema�����������ݿ���
                $mSchema = new Schema();
                $mSchema->sname = $tableName->table_comment;
                $mSchema->slabel = $tableName->table_name;
                $mSchema->isauto = '1';
                $mSchema->isView= '1';
                $mSchema->property = json_encode($property);
                $mSchema->createname = Auth::user()->name;
                $mSchema->updatename = Auth::user()->name;
                $this->append($mSchema);

                //ÿ����ͼ����Ҫ����csv�����ļ�
                $this->generate_schema_csv($tableName->table_name,$pdo_me);
                //ÿ����ͼ����Ҫ������ʵ���Ĺ�ϵ
                $this->generate_relation_by_view($tableName->table_name);
                //ÿ����ͼ����Ҫ���ɵ�ʵ����ϵ��csv�ļ�����
                $this->generate_relation_csv($tableName->table_name,$pdo_me);
            }
        }
    }

    public function generate_schema_csv($viewName,$pdo_me){
        //�����гɵ�schema,����Ϊ��ͼ�ĺ�׺�����������Դ��ʵ����һ�����ԣ����ƺ�schema����һ��
        $viewFiled = explode("_",$viewName)[1];
        $path = config("properties")['filePathLinux'].$viewName.".csv";

//        $pdo_me = new PDO(config("properties.PDO")['url'],config("properties.PDO")['username'],config("properties.PDO")['psw']);

        $csv_export = "select '".$viewFiled."' union select * from ".$viewName." into outfile '".$path."' fields terminated by '&'";

        $statement = $pdo_me->prepare($csv_export);

        $statement->execute();
    }

    public function generate_relation_by_view($viewName){
        //�����������Ե�ʵ���ܱ�Ĺ�ϵ������ͼǰ׺����ͼ���ƵĹ�ϵ
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
        // �������Ե�ʵ���Ĺ�ϵ���������Դ��ʵ���ʵ���ÿ�����ݣ��г�������������������������csv�ļ�
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
