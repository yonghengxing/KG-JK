<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2018/12/27
 * Time: 15:05
 */

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Schema;
use App\Services\SchemaService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;



class SchemaController extends BaseController
{
    function __construct(SchemaService $schemaService)
    {
        // $this->middleware('auth');
        $this->schemaService = $schemaService;

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

    /**
     * 新建本体数据处理
     * 此处应该有处理属性集的操作
     */
    public function schema_new_do(Request $request)
    {
       // $compName = $request->get("comp_name");
       // $compDesc = $request->get("comp_desc");
        //$compType = $request->get("comp_type");
        //$groupId = $request->get("group_id");
        $mSchema = new Schema();
        $mSchema->stype = "人物";
        $mSchema->property = "";

        $ret = $this->schemaService->append($mSchema);
        if ($ret) {
            return view('schema/list', compact("ret"));
        } else {
            return view('schema/list', compact("ret"));
        }
    }

    /**
     * 打开修改本体信息的页面
     * 此处应该有解析属性集json的操作，以后再弄
     *
     */
    public function schema_info($sid){
        $schema = $this->schemaService->getById($sid);
        return view('schema/info', compact("schema"));
    }

    /**
     * 修改本体的数据处理
     * 此处应该有处理属性集的操作
     */
    public function schema_info_do($sid,Request $request)
    {
      //  $mSchema = $request->get("comp_name");
      //  $mSchema = $request->get("comp_desc");
      //  $mSchema = $request->get("comp_type");
        $mSchema = $this->schemaService->getById($sid);
        $mSchema->stype = "人物";
        $mSchema->property = "";
        $updateRet = $this->schemaService->update($mSchema);
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