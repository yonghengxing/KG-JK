<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2018/12/28
 * Time: 15:05
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

use App\Models\Entity;
use App\Services\EntityService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Psy\Exception\RuntimeException;


class EntityController extends BaseController
{
    function __construct(EntityService $entityService)
    {
        // $this->middleware('auth');
        $this->entityService = $entityService;

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
    public function entity_new()
    {
        $url = "http://192.168.15.62:5000/run_command_load";
    
        $opts = array(
          'http'=>array(
            'method'=>"GET",
            'timeout'=>10000000,//
           )
        );
    
        $data =  file_get_contents($url, false, stream_context_create($opts));
        return redirect('fuse/ontologymap');
    }



	public function add()
    {
        $url = "http://192.168.1.62:5000/run_command_load";
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'timeout'=>1000,//s
            )
        );
        $data =  file_get_contents($url, false, stream_context_create($opts));
        
        return view('fuse/ontologymap');
    }



    /**
     * 新建实体数据处理
     * 此处应该有处理属性集的操作
     */
    public function entity_new_do(Request $request)
    {
        // $compName = $request->get("comp_name");
        // $compDesc = $request->get("comp_desc");
        //$compType = $request->get("comp_type");
        //$groupId = $request->get("group_id");
        $mEntity= new Entity();
        $mEntity->showname = "人物";
        $mEntity->property = "";

        $ret = $this->entityService->append($mEntity);
        $msg = "数据库添加成功！";
        if ($ret) {
            return view('message', compact("msg"));
        } else {
            $msg = "数据库添加出错！";
            return view('message', compact("msg"));
        }
    }

    /**
     * 打开修改实体信息的页面
     * 此处应该有解析属性集json的操作，以后再弄
     *
     */
    public function entity_info($eid){
        $entity = $this->entityService->getById($eid);
        return view('entity/info', compact("entity"));
    }

    /**
     * 修改实体的数据处理
     * 此处应该有处理属性集的操作
     */
    public function entity_info_do($eid,Request $request)
    {
        //  $mSchema = $request->get("comp_name");
        //  $mSchema = $request->get("comp_desc");
        //  $mSchema = $request->get("comp_type");
        $mEntity = $this->entityService->getById($eid);
        $mEntity->showname = "李三";
        $mEntity->property = "";
        $updateRet = $this->entityService->update($mEntity);
        return redirect()->action('EntityController@entity_list');
    }

    /**
     * 通过ID删除实体
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