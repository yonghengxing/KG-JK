<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2019/1/4
 * Time: 14:29
 */

namespace App\Http\Controllers;
use App\Models\RelationType;
use App\Services\RelationTypeService;
use Illuminate\Routing\Controller as BaseController;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;




class RelationTypeController extends BaseController
{
    function __construct(RelationTypeService $relationTypeService)
    {
        // $this->middleware('auth');
        $this->relationTypeService = $relationTypeService;

    }


    /**
     * 显示所有的关系列表
     */
    public function relationType_list(Request $request)
    {

        $mRelationTypes = $this->relationTypeService->getAll();
        $perPage = 15;
        $currentPage = $request->input('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $total = $mRelationTypes->count();
        $result = $mRelationTypes->forPage($currentPage, $perPage);
        $relationTypes= new LengthAwarePaginator($result,$total,$perPage,$currentPage,[
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page']);
        return view('relationType/list', compact('relationTypes'));
    }

    /**
     * 新建本体页面
     */
    public function relationType_new()
    {
        return view('relationType/new');
    }

    /**
     * 新建本体数据处理
     * 此处应该有处理属性集的操作
     */
    public function relationType_new_do(Request $request)
    {

       $rname = $request->input('rname');
        $rlabel = $request->input('rlabel');
        $mRelationType = new RelationType();
        $mRelationType->rlabel = $rlabel;
        $mRelationType->rname = $rname;

        $properties =$request->input('iskey');
        $labels = $request->input('labels');
        $kv = array_combine($labels,$properties);

        foreach ($kv as $key=>$value){
            if($value == '1')
                $kv[$key] = "string;primary_id";
            else
                $kv[$key]= "string";
        }
        $mRelationType->property = json_encode($kv);        
	
	$ret = $this->relationTypeService->append($mRelationType);
        return redirect()->action('RelationTypeController@relationType_list');
    }

    /**
     * 打开修改关系信息的页面
     * 此处应该有解析属性集json的操作，以后再弄
     *
     */
    public function relationType_info($tid){
        $relationType = $this->relationTypeService->getById($tid);
        return view('relationType/info', compact("relationType"));
    }

    /**
     * 修改关系的数据处理
     * 此处应该有处理属性集的操作
     */
    public function relationType_info_do($tid,Request $request)
    {
        $label = $request->input('relationType');
        $icon = $request->input('mytext');
        $mRelationType= $this->relationTypeService->getById($tid);
        $mRelationType->relationlabel = $label;
        $mRelationType->icon = $icon;

        $updateRet = $this->relationTypeService->update($mRelationType);

        return redirect()->action('RelationTypeController@relationType_list');
    }
    /**
     * 通过删除本体
     */
    public function relationType_delete($tid)
    {
        $ret = $this->relationTypeService->delete($tid);
        return redirect()->action('RelationTypeController@relationType_list');
    }

    /*
     *
     */
    public function relationType_search(Request $request)
    {
        $text = $request->route("text");
        $relationTypes=$this->relationTypeService->getRelationTypeBySearch($text);
        return view('relationType/list', compact('relationTypes','text'));
    }

}