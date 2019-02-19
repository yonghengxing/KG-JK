<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2018/12/28
 * Time: 15:05
 */

namespace App\Http\Controllers;

use App\Services\SchemaService;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Entity;
use App\Services\EntityService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Schema;
use Psy\Exception\RuntimeException;


class EntityController extends BaseController
{
    function __construct(EntityService $entityService, SchemaService $schemaService)
    {
        // $this->middleware('auth');
        $this->entityService = $entityService;
        $this->schemaService = $schemaService;

    }


    /**
     * 显示所有的实体列表
     */
    public function entity_list(Request $request)


    {

        $mEntities = $this->entityService->getAll();
        $perPage = 15;
        $currentPage = $request->input('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $total = $mEntities->count();
        $result = $mEntities->forPage($currentPage, $perPage);
        $entities= new LengthAwarePaginator($result,$total,$perPage,$currentPage,[
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page']);
        return view('entity/list', compact('entities'));
    }

    /**
     * 新建实体页面
     */
    public function entity_new(Request $request)
{
    $schemas = $this->schemaService->getAll();

    return view('entity/new',compact('schemas'));
}

    public function entity_new_select(Request $request)
    {
        $schemas = $this->schemaService->getAll();
        $sid = $request->route("sid");

        $schemaselected = $this->schemaService->getById($sid);
        $properties = explode(",",$schemaselected->property);
        $num = count($properties);
        return view('entity/newselect',compact('schemas','schemaselected','properties','num'));

    }

    /**
     * 新建实体数据处理
     * 此处应该有处理属性集的操作
     */
    public function entity_new_do(Request $request)
    {
        $properties =$request->input('properties');
        $labels = $request->input('labels');
        $entitylabel = $request->input('entitylabel');
        $sid = $request->post('stype');
        $stype = $this->schemaService->getById($sid)->stype;

        $mEntity= new Entity();
        $mEntity->entitylabel = $entitylabel;
        $mEntity->property = json_encode(array_combine($labels,$properties));
        $mEntity->sid = $sid;
        $mEntity->stype = $stype;


        $ret = $this->entityService->append($mEntity);

        return redirect()->action('EntityController@entity_list');
    }

    /**
     * 打开修改实体信息的页面
     * 此处应该有解析属性集json的操作，以后再弄
     *
     */
    public function entity_info($eid){

        $entity = $this->entityService->getById($eid);
        $properties = json_decode($entity->property,true);

        $num = count($properties);
        return view('entity/info', compact("entity","num","properties"));
    }

    /**
     * 修改本体的数据处理
     * 此处应该有处理属性集的操作
     */
    public function entity_info_do($eid,Request $request)
    {
        $mEntity = $this->entityService->getById($eid);
        $mEntity->showname = "李三";
        $mEntity->property = "";
        $updateRet = $this->entityService->update($mEntity);
        if (!$updateRet){
            $msg = "编辑本体错误！";
            return view('message', compact("msg"));
        } else {
            $msg = "编辑本体成功！";
            return view('message', compact("msg"));
        }
    }

    /**
     * 通过ID删除本体
     */
    public function entity_delete($eid)
    {
        $ret = $this->entityService->delete($eid);
        return redirect()->action('EntityController@entity_list');
    }



    public function entity_search(Request $request)
    {
        $text = $request->route("text");
        $entities=$this->entityService->getEntityBySearch($text);
        return view('entity/list', compact('entities','text'));
    }

}