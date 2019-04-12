<?php

namespace App\Http\Controllers;
use App\Models\ParameterJson;
use App\Models\Relation;
use App\Models\Schema;
use App\Services\ParameterJsonService;
use App\Services\RelationService;
use Illuminate\Routing\Controller as BaseController;


use App\Services\SchemaService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use PDO;

use App\User;
use App\Services\UserService;
use App\Services\StatusService;

class SchemaController extends BaseController
{
    function __construct(UserService $userService,SchemaService $schemaService,ParameterJsonService $parameterJsonService,RelationService $relationService,StatusService $statusService)
    {
        $this->middleware('auth');
        $this->schemaService = $schemaService;
        $this->parameterJsonService = $parameterJsonService;
        $this->relationService = $relationService;
        $this->statusService = $statusService;
    }
    /**
     * 显示所有的实体列表
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
        $status = $this->statusService->datasrcStatusShow();
//         dd($status)
        return view('schema/list', compact('schemas','status'));
    }

    /**
     * 新建实体页面
     */
    public function schema_new()
    {
        return view('schema/new');
    }

    public function schema_new_auto(){
        $pdo_me = new PDO(config("properties.PDO")['url'],config("properties.PDO")['username'],config("properties.PDO")['psw']);
        $databaseName = config("properties")['database'];
        $filePathLinux = config("properties")['filePathLinux']."*.csv";

        array_map('unlink', glob($filePathLinux));

        $this->schemaService->generate_schema_by_table($databaseName);
        $this->schemaService->generate_schema_by_view($databaseName,$pdo_me);
        //数据导入数据库的csv文件
        $this->schemaService->run_command('run_command_dbout');
        $pdo_me = null;
        $this->statusService->datasrcStatusDone();
        $this->statusService->schemaStatusActive();
        return redirect()->action('SchemaController@schema_list');
    }


    public function schema_new_do(Request $request)
    {

        $sname = $request->input('sname');
        $slabel= $request->input('slabel');
        $properties =$request->input('iskey');
        $labels = $request->input('labels');
        //$kv = array_combine($labels,$properties);
        $kv[config("properties")['defaultKeyId']] = "string;primary_id";
        foreach ($labels as $label){
            $kv[$label]= "string";
        }

        $mSchema = new Schema();
        $mSchema->sname = $sname;
        $mSchema->slabel = $slabel;
	    $mSchema->createname = Auth::user()->name;
		$mSchema->updatename = Auth::user()->name;
        $mSchema->property = json_encode($kv);

        $ret = $this->schemaService->append($mSchema);
        $this->statusService->schemaStatusActive();
        return redirect()->action('SchemaController@schema_list');
    }

    /**
     * 打开修改实体信息的页面
     * 此处应该有解析属性集json的操作，以后再弄
     *
     */
    public function schema_info($sid){
        $schema = $this->schemaService->getById($sid);

        $kv = json_decode($schema->property,true);
        $properties = array_keys($kv);

        $num = count($properties);

        return view('schema/info', compact("schema","properties","num"));
    }

    /**
     * 修改实体的数据处理
     * 此处应该有处理属性集的操作
     */
    public function schema_info_do($sid,Request $request)
    {
        $sname = $request->input('sname');
        $slabel= $request->input('slabel');


        $properties = array_filter($request->input('properties'));
        $mSchema = $this->schemaService->getById($sid);

        $mSchema->sname = $sname;
        $mSchema->slabel = $slabel;
        $key = array_search('string;primary_id',json_decode($mSchema->property,true));
        $resultpro =array();
        foreach ($properties as $value) {
            if($value == $key)
                $resultpro[$value] = "string;primary_id";
            else
                $resultpro[$value]= "string";
        }

        $mSchema->property = json_encode($resultpro);
        $updateRet = $this->schemaService->update($mSchema);

        return redirect()->action('SchemaController@schema_list');
    }
    /**
     * 通过ID删除实体
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
    //模糊搜索
    public function search()
    {
        $schemas = $this->schemaService->getSchemaTable();
        return view('search/list',compact('schemas'));
    }

    public function get_query_text(Request $request)
    {
        $sid = $request->sid;
        $schema = $this->schemaService->getById($sid);
        $slabel = $schema->slabel;
        $kv = json_decode($schema->property,true);
        $properties = array_keys($kv);
        $res = "CREATE QUERY ".$slabel."(String name)  FOR GRAPH connectivity {";
        $res = $res." start = {".$slabel.".*}; res = select u from start:u ";
        $whereSql = "";
        foreach ($properties as $property){
            if($property != 'me_id')
                $whereSql = $whereSql."or u.".$property." like name ";
        }
        $whereSql = substr($whereSql,2)."; PRINT res;}";

        $res = $res." where ".$whereSql;
        $kv[0] = $res;
        return $kv;
    }


}