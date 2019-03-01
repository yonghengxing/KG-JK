<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2018/12/28
 * Time: 17:10
 */

namespace App\Http\Controllers;
use App\Models\ParameterJson;
use App\Services\EntityService;
use App\Services\ParameterJsonService;
use App\Services\RelationTypeService;
use App\Services\SchemaService;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Relation;
use App\Services\RelationService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;


class RelationController extends BaseController
{
    function __construct(RelationService $relationService,SchemaService $schemaService,
                         RelationTypeService $relationTypeService, EntityService $entityService,ParameterJsonService $parameterJsonService)

    {
        // $this->middleware('auth');
        $this->relationService = $relationService;
        $this->schemaService = $schemaService;
        $this->entityService= $entityService;
        $this->relationtTypeService= $relationTypeService;
        $this->parameterJsonService= $parameterJsonService;

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
        return view('relation/list', compact('relations'));
    }

    /**
     * 新建实体页面
     */
    public function relation_new()
    {
        $relationTypes = $this->relationtTypeService->getAll();
        $schemas = $this->schemaService->getAll();

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

        $tovertex = $request->post("tovertex");
        $endlabel  = $this->schemaService->getById($tovertex)->slabel;

        $mRelation = new Relation();
        $mRelation->relationtype = $relationType;
        $mRelation->fromvertex = $fromvertex;
        $mRelation->tovertex = $tovertex;
        $mRelation->typelabel = $typelabel;
        $mRelation->startlabel = $startlabel;
        $mRelation->endlabel = $endlabel;

        $ret = $this->relationService->append($mRelation);

        return redirect()->action('RelationController@relation_list');
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


        $resultjson =json_encode($result);


        $myjson = fopen("/home/fengbs/KGdata/my.json", "w");
        fwrite($myjson, $resultjson);
        fclose($myjson);
      

        $url = "http://192.168.15.62:5000/run_command";
    
        $opts = array(   
          'http'=>array(   
            'method'=>"GET",   
            'timeout'=>1000,//s  
           )   
        );    
    
       
        $data =  file_get_contents($url, false, stream_context_create($opts));
        


        return redirect()->action('RelationController@relation_list');

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


        $updateRet = $this->relationService->update($mRelation);
        return redirect()->action('RelationController@relation_list');

    }
    /**
     * 通过删除实体
     */
    public function relation_delete($rid)
    {
        $ret = $this->relationService->delete($rid);
        return redirect()->action('RelationController@relation_list');
    }

    /*
     *
     */
    public function relation_search(Request $request)
    {
        $text = $request->route("text");
        $relations=$this->relationService->getRelationBySearch($text);
        return view('relation/list', compact('relations','text'));
    }


}