<?php

namespace App\Http\Controllers;
use App\Models\ParameterJson;
use App\Services\EntityService;
use App\Services\ParameterJsonService;
use App\Services\RelationTypeService;
use App\Services\SchemaService;
use App\Services\StatusService;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Services\UserService;

use App\Models\Relation;
use App\Services\RelationService;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use PDO;


class RelationController extends BaseController
{
    function __construct(UserService $userService,RelationService $relationService,SchemaService $schemaService,
        RelationTypeService $relationTypeService, EntityService $entityService,ParameterJsonService $parameterJsonService,StatusService $statusService)

    {
        $this->middleware('auth');
        $this->relationService = $relationService;
        $this->schemaService = $schemaService;
        $this->entityService= $entityService;
        $this->relationtTypeService= $relationTypeService;
        $this->parameterJsonService= $parameterJsonService;
        $this->statusService = $statusService;

    }


    /**
     * 显示所有的关系列表
     */
    public function relation_list(Request $request)
    {

        $mRelations = $this->relationService->getAll();
        $perPage = 15;
        $currentPage = $request->input('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $total = $mRelations->count();
        $result = $mRelations->forPage($currentPage, $perPage);
        $relations= new LengthAwarePaginator($result,$total,$perPage,$currentPage,[
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page']);
        $status = $this->statusService->schemaStatusShow();
        return view('relation/list', compact('relations','status'));
    }


    //关联字段ajax返回的数组;
    public function get_relation_field(Request $request){
        $sid = $request->rid;
        //获取所选本体的所有字段，字段从property中解析出来
        $schema = $this->schemaService->getById($sid);
        $property = json_decode($schema->property,true);
        $fields = array_keys($property);
        return $fields;
    }

    /**
     * 新建实体页面
     */
    public function relation_new()
    {
        $relationTypes = $this->relationtTypeService->getAll();
        $schemas = $this->schemaService->getSchemaTable();

        return view('relation/new',compact('relationTypes','schemas'));
    }

    /**
     * 新建实体数据处理
     * 此处应该有处理属性集的操作
     */
  public function relation_new_do(Request $request)
    {
        $relationType = $request->post("relationType");
        $typelabel =  $this->relationtTypeService->getById($relationType)->rlabel;

        $fromvertex = $request->post("fromvertex");
        $startlabel  = $this->schemaService->getById($fromvertex)->slabel;
        $startAuto = $this->schemaService->getById($fromvertex)->isauto;

        $relationFromField = $request->relationField;

        $tovertex = $request->post("tovertex");
        $endlabel  = $this->schemaService->getById($tovertex)->slabel;
        $endAuto = $this->schemaService->getById($tovertex)->isauto;

        $relationToField = $request->relationToField;

        $mRelation = new Relation();
        $mRelation->relationtype = $relationType;
        $mRelation->fromvertex = $fromvertex;
        $mRelation->tovertex = $tovertex;
        $mRelation->typelabel = $typelabel;
        $mRelation->startlabel = $startlabel;
        $mRelation->endlabel = $endlabel;
        $mRelation->createname = Auth::user()->name;
        $mRelation->updatename = Auth::user()->name;

        $ret = $this->relationService->append($mRelation);
        if($startAuto == "1" && $endAuto == "1" )
            $this->generate_relation_csv($startlabel,$relationFromField,$typelabel,$endlabel,$relationToField);

        return redirect()->action('RelationController@relation_list');
    }


    public function generate_relation_csv($startLabel,$relationField,$typeLabel,$endLabel,$relationToField){
        //数据库连接

        $pdo_me = new PDO(config("properties.PDO")['url'],config("properties.PDO")['username'],config("properties.PDO")['psw']);
        //自动生成相对应的csv文件，加个判断？如果不是自动生成的俩个schema,不自动生成？
        $path = config("properties")['filePathLinux'].$typeLabel.'.csv';
        if(file_exists ($path)){
            unlink($path);
        }

        //SELECT 'xiangmu','hetong' UNION select xiangmu.me_id,hetong.me_id FROM xiangmu LEFT JOIN hetong on xiangmu.bianhao_kg = hetong.suoshuxiangmu_kg INTO OUTFILE "E:/logs/test123.csv"  fields terminated by '&'
        $tableKey = config("properties")['defaultKeyId'];
        //$csv_export = "select '".$startLabel."','".$endLabel."' union select ".$tableKey.",".$relationField." from ".$startLabel." into outfile '".$path."' fields terminated by '&'";
        $csv_export = "select '".$startLabel."','".$endLabel."' union select ".$startLabel."." .$tableKey.",".$endLabel.".".$tableKey." from ".$startLabel." INNER JOIN ".$endLabel." ON ".$startLabel.".".$relationField." = ".$endLabel.".".$relationToField." into outfile '".$path."' fields terminated by '&'";
        //dd($csv_export);
        $statement = $pdo_me->prepare($csv_export);
        $result =  $statement->execute();
        //dd($result);
    }

    public function relation_new_auto(){

        //获取edge的json
        $edge =array();
        $mRelations = $this->relationService->getAll();
        foreach ($mRelations as $relation){
            $property = array();
            $property['from'] = $relation->startlabel;
            $property['to'] = $relation->endlabel;
            $edge[$relation->typelabel] = $property;
        }
        //获取vertex的json
        $vertex = array();
        $mSchemas = $this->schemaService->getAll();
        foreach ($mSchemas as $schema){
            $atti['attribute'] = json_decode($schema->property,true);
            $vertex[$schema->slabel] = $atti;
        }
        $result['edge'] = $edge;
        $result['vertex'] = $vertex;
        $resultJson =json_encode($result);
        //保存到服务器my.json文件中
        $filePath =  config("properties")['jsonPath'];
        $myJson = fopen($filePath, "w");
        fwrite($myJson, $resultJson);
        fclose($myJson);
        //生成json文件之后，调用python脚本自动生成图数据库
        $this->run_command("run_command");
        //$str,就是建立图数据库模型运行情况返回值，只有为“0”的时候，表示成功建立模型，其他的情况出错。
        //出错的原因，八成是因为，1：属性列字段占用图数据库关键字2：表名称与列属性字段名称一致。
        //另外的两成是因为，python脚本没启动
       $statusFilePath =config("properties")['statusFilePath'];
       $str = file_get_contents($statusFilePath);
       if($str == 0)
       {
           $msg = '生成模型成功';
           $url = 'relation/list';
           $this->statusService->schemaStatusDone();
           $this->statusService->modelStatusActive();
           return view('success', compact("url","msg"));
       }
        else {
            $msg = '生成模型失败';
            $url = 'relation/list';
            return view('error', compact("url","msg"));
        }
//         return redirect()->action('RelationController@relation_list');
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
    /**
     * 打开修改关系信息的页面
     * 此处应该有解析属性集json的操作，以后再弄
     *
     */
    public function relation_info($rid){
        $relation = $this->relationService->getById($rid);
        $relationTypes = $this->relationtTypeService->getAll();
        $schemas = $this->schemaService->getAll();
        return view('relation/info', compact("relation","relationTypes","schemas"));
    }

    /**
     * 修改关系的数据处理
     * 此处应该有处理属性集的操作
     */
    public function relation_info_do($rid,Request $request)
    {
        $relationType = $request->post("relationType");
        $fromvertex = $request->post("fromvertex");
        $tovertex = $request->post("tovertex");
        $typelabel =  $this->relationtTypeService->getById($relationType)->relationlabel;
        $startlabel  = $this->schemaService->getById($fromvertex)->slabel;
        $endlabel  = $this->schemaService->getById($tovertex)->slabel;

        $mRelation= $this->relationService->getById($rid);
        $mRelation->relationtype = $relationType;
        $mRelation->fromvertex = $fromvertex;
        $mRelation->tovertex = $tovertex;
        $mRelation->typelabel = $typelabel;
        $mRelation->startlabel = $startlabel;
        $mRelation->endlabel = $endlabel;
        $mRelation->updatename = Auth::user()->name;

        $updateRet = $this->relationService->update($mRelation);
        return redirect()->action('RelationController@relation_list');

    }
    /**
     * 通过删除实体
     */
    public function relation_delete($rid)
    {
		//先删除生成的文件
        $relation  = $this->relationService->getById($rid);
        $name = $relation->typelabel;
        $path = config("properties")['filePathLinux'].$name.'.csv';
        if(file_exists ($path)){
            unlink($path);
        }
        $ret = $this->relationService->delete($rid);

        return redirect()->action('RelationController@relation_list');
    }

    public function relation_search(Request $request)
    {
        $text = $request->route("text");
        $relations=$this->relationService->getRelationBySearch($text);
        return view('relation/list', compact('relations','text'));
    }


}