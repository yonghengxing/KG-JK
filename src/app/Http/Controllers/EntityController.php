<?php
/**
 * Created by PhpStorm.
 * User: huangfu
 * Date: 2018/12/28
 * Time: 15:05
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use DB;
use App\Models\Entity;
use App\Services\EntityService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Psy\Exception\RuntimeException;
use App\Services\StatusService;
use PDO;
use App\User;
use App\Services\SchemaService;
use App\Services\UserService;

class EntityController extends BaseController
{
    function __construct(UserService $userService,EntityService $entityService,StatusService $statusService,SchemaService $schemaService)
    {
        //$this->middleware('auth');
        $this->entityService = $entityService;
        $this->statusService = $statusService;
        $this->schemaService = $schemaService;
    }


    public function add()
    {
        $url = config("properties")['run_command_load'];
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'timeout'=>1000,//s
            )
        );
        $data =  file_get_contents($url, false, stream_context_create($opts));
        $statusFilePath =config("properties")['statusFilePath'];
        $str = file_get_contents($statusFilePath);
        //dd($data);
        $this->statusService->modelStatusDone();
        $status = $this->statusService->modelStatusShow();
        //return view('fuse/ontologymap',compact('status'));
        return redirect()->action('viewController@ontologymap');
    }
	
	public function test(Request $request){
		$ip = $request->ip();
		$results = DB::select('select * from itechs_kg_ip where ip = :ip', ['ip' => $ip]);
		$uid = $results[0]->uid;
        //$data = '{"GraphName":"connectivity","VertexTypes":[{"Config":{"STATS":"OUTDEGREE_BY_EDGETYPE"},"Attributes":[{"AttributeType":{"Name":"STRING"},"AttributeName":"State_kg"},{"AttributeType":{"Name":"STRING"},"AttributeName":"Superior_kg"},{"AttributeType":{"Name":"STRING"},"AttributeName":"OrganizationName_kg"},{"AttributeType":{"Name":"STRING"},"AttributeName":"Category_kg"}],"PrimaryId":{"AttributeType":{"Name":"STRING"},"AttributeName":"me_id"},"Name":"Organization"},{"Config":{"STATS":"OUTDEGREE_BY_EDGETYPE"},"Attributes":[],"PrimaryId":{"AttributeType":{"Name":"STRING"},"AttributeName":"State_kg"},"Name":"Organization_State_kg"},{"Config":{"STATS":"OUTDEGREE_BY_EDGETYPE"},"Attributes":[],"PrimaryId":{"AttributeType":{"Name":"STRING"},"AttributeName":"Category_kg"},"Name":"Organization_Category_kg"},{"Config":{"STATS":"OUTDEGREE_BY_EDGETYPE"},"Attributes":[],"PrimaryId":{"AttributeType":{"Name":"STRING"},"AttributeName":"OrganizationName_kg"},"Name":"Organization_OrganizationName_kg"}],"EdgeTypes":[{"IsDirected":false,"ToVertexTypeName":"Organization","Config":{},"Attributes":[],"FromVertexTypeName":"Organization","Name":"Superior"},{"IsDirected":false,"ToVertexTypeName":"Organization_OrganizationName_kg","Config":{},"Attributes":[],"FromVertexTypeName":"Organization","Name":"Organization_OrganizationName_kg_e"},{"IsDirected":false,"ToVertexTypeName":"Organization_State_kg","Config":{},"Attributes":[],"FromVertexTypeName":"Organization","Name":"Organization_State_kg_e"},{"IsDirected":false,"ToVertexTypeName":"Organization_Category_kg","Config":{},"Attributes":[],"FromVertexTypeName":"Organization","Name":"Organization_Category_kg_e"}]}';
        //$data = ['Organization_State_kg','Organization'];
		//return $data;
		//$uid = Auth::user()->id;
		//dd($uid);
		//$uid = 4;
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=iscas_itechs_privilege;port=3306;charset=utf8', 'root', '');
        $databaseName = 'iscas_itechs_privilege';
        $tableSql = "select table_name,table_comment  from information_schema.tables where table_schema=?  ";
        $tableNames = \DB::select($tableSql,[$databaseName]);
        $res =  array();
        $schemas = $this->schemaService->getSchemaTable();
		foreach($schemas as $schema){
			$res[] =$schema->slabel;
		}
        foreach ($tableNames as $tableName){
			$tn = $tableName->table_name;
            $sql = "SELECT items_name FROM ".$tn." where user_id = ".$uid;
            $statement = $pdo->prepare($sql);
            $statement->execute();
            $name_translate_table = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($name_translate_table as $item){
                $res[]  = $tn."_".$item['items_name'];
            }
        }
		
        return $res;
    }
//
//    /**
//     * 显示所有的实体列表
//     */
//    public function entity_list(Request $request)
//    {
//
//        $mEntities = $this->entityService->getAll();
//        $perPage = 15;
//        $currentPage = $request->input('page', 1);
//        $offset = ($currentPage - 1) * $perPage;
//        $total = $mEntities->count();
//        $result = $mEntities->forPage($currentPage, $perPage);
//        $entities= new LengthAwarePaginator($result,$total,$perPage,$currentPage,[
//            'path' => Paginator::resolveCurrentPath(),
//            'pageName' => 'page']);
//        return view('entity/list', compact('entities'));
//    }
//
//    /**
//     * 新建实体页面
//     */
//    public function entity_new()
//    {
//        $url = "http://192.168.15.62:5000/run_command_load";
//
//        $opts = array(
//          'http'=>array(
//            'method'=>"GET",
//            'timeout'=>10000000,//
//           )
//        );
//
//        $data =  file_get_contents($url, false, stream_context_create($opts));
//        return redirect('fuse/ontologymap');
//    }
//
//




//
//    /**
//     * 新建实体数据处理
//     * 此处应该有处理属性集的操作
//     */
//    public function entity_new_do(Request $request)
//    {
//        // $compName = $request->get("comp_name");
//        // $compDesc = $request->get("comp_desc");
//        //$compType = $request->get("comp_type");
//        //$groupId = $request->get("group_id");
//        $mEntity= new Entity();
//        $mEntity->showname = "人物";
//        $mEntity->property = "";
//
//        $ret = $this->entityService->append($mEntity);
//        $msg = "数据库添加成功！";
//        if ($ret) {
//            return view('message', compact("msg"));
//        } else {
//            $msg = "数据库添加出错！";
//            return view('message', compact("msg"));
//        }
//    }
//
//    /**
//     * 打开修改实体信息的页面
//     * 此处应该有解析属性集json的操作，以后再弄
//     *
//     */
//    public function entity_info($eid){
//        $entity = $this->entityService->getById($eid);
//        return view('entity/info', compact("entity"));
//    }
//
//    /**
//     * 修改实体的数据处理
//     * 此处应该有处理属性集的操作
//     */
//    public function entity_info_do($eid,Request $request)
//    {
//        //  $mSchema = $request->get("comp_name");
//        //  $mSchema = $request->get("comp_desc");
//        //  $mSchema = $request->get("comp_type");
//        $mEntity = $this->entityService->getById($eid);
//        $mEntity->showname = "李三";
//        $mEntity->property = "";
//        $updateRet = $this->entityService->update($mEntity);
//        return redirect()->action('EntityController@entity_list');
//    }
//
//    /**
//     * 通过ID删除实体
//     */
//    public function entity_delete($eid)
//    {
//        $ret = $this->entityService->delete($eid);
//        return redirect()->action('EntityController@entity_list');
//    }
//
//
//
//    public function entity_search(Request $request)
//    {
//        $text = $request->route("text");
//        $entities=$this->entityService->getEntityBySearch($text);
//        return view('entity/list', compact('entities','text'));
//    }

}
