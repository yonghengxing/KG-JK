<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2018/12/28
 * Time: 17:10
 */

namespace App\Http\Controllers;
use App\Services\EntityService;
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
                         RelationTypeService $relationTypeService, EntityService $entityService)

    {
        // $this->middleware('auth');
        $this->relationService = $relationService;
        $this->schemaService = $schemaService;
        $this->entityService= $entityService;
        $this->relationtTypeService= $relationTypeService;

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
     * 新建本体页面
     */
    public function relation_new()
    {
        $relationTypes = $this->relationtTypeService->getAll();
        $entities = $this->entityService->getAll();

        return view('relation/new',compact('relationTypes','entities'));
    }

    /**
     * 新建本体数据处理
     * 此处应该有处理属性集的操作
     */
    public function relation_new_do(Request $request)
    {

        $relationType = $request->post("relationType");
        $typelabel =  $this->relationtTypeService->getById($relationType)->relationlabel;

        $startentity = $request->post("startentity");
        $startlabel  = $this->entityService->getById($startentity)->entitylabel;

        $endentity = $request->post("endentity");
        $endlabel  = $this->entityService->getById($endentity)->entitylabel;

        $mRelation = new Relation();
        $mRelation->relationtype = $relationType;
        $mRelation->startentity = $startentity;
        $mRelation->endentity = $endentity;
        $mRelation->typelabel = $typelabel;
        $mRelation->startlabel = $startlabel;
        $mRelation->endlabel = $endlabel;

        $ret = $this->relationService->append($mRelation);

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
        $entities = $this->entityService->getAll();

        return view('relation/info', compact("relation","relationTypes","entities"));
    }

    /**
     * 修改关系的数据处理
     * 此处应该有处理属性集的操作
     */
    public function relation_info_do($rid,Request $request)
    {
        $relationType = $request->post("relationType");
        $typelabel =  $this->relationtTypeService->getById($relationType)->relationlabel;
        $startentity = $request->post("startentity");
        $startlabel  = $this->entityService->getById($startentity)->entitylabel;
        $endentity = $request->post("endentity");
        $endlabel  = $this->entityService->getById($endentity)->entitylabel;

        $mRelation= $this->relationService->getById($rid);
        $mRelation->relationtype = $relationType;
        $mRelation->startentity = $startentity;
        $mRelation->endentity = $endentity;
        $mRelation->typelabel = $typelabel;
        $mRelation->startlabel = $startlabel;
        $mRelation->endlabel = $endlabel;


        $updateRet = $this->relationService->update($mRelation);
        return redirect()->action('RelationController@relation_list');

    }
    /**
     * 通过删除本体
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