<?php
/**
 * User: danqi@iscas.ac.cn
 * Date: 2018/12/25
 * Time: 16:00
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Services\UserService;
use App\Services\StatusService;

class viewController extends Controller
{

    function __construct(UserService $userService,StatusService $statusService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
        $this->statusService = $statusService;
    }

    public function otype()
    {
        return view('oType/oType');
    }
    
    public function addObject()
    {
        return view('oType/addObject');
    }
    
    public function homePage()
    {
        return view('homePage');
    }
    
    public function rtype()
    {
        return view('rtype/rtype');
    }
    
    public function addRtype()
    {
        return view('rtype/addRtype');
    }
    
    public function database()
    {
        return view('database/list');
    }
    
    public function newDB()
    {
        return view('database/new');
    }
    
    public function newDS()
    {
        return view('datasource/new');
    }
    
    public function datasource()
    {
        return view('datasource/list');
    }
    
    public function ontologymap()
    {   
        $file_list=[];
        $filePath = "/home/fengbs/tigergraph/loadingData/";
        $handler = opendir($filePath);

        while(($filename = readdir($handler))!=false){
            if($filename != '.' && $filename!='..'){
                $file_list[] = $filename;

            }
        }
	$data = array();
        foreach ($file_list as $file) {
            $schema = explode(".",$file)[0];
            $data[$schema] = $file;

        }
        $status = $this->statusService->modelStatusShow();
        return view('fuse/ontologymap',compact('data','status'));


        //return view('fuse/ontologymap');
    }
    
    public function fusmap()
    {
        return view('fuse/fusmap');
    }
    
    public function ontologyfus()
    {
        return view('fuse/ontologyfus');
    }
    
    public function taskallocation()
    {
        return view('task/taskallocation');
    }
    
    public function taskhis()
    {
        return view('task/taskhis');
    }
        
    public function addtask()
    {
        return view('task/addtask');
    }
    
    public function safemanage()
    {
        return view('safemanage');
    }
    
    public function template()
    {
        return view('template');
    }
    
    public function schemagraph()
    {
        return view('graph/schemagraph');
    }
    
    public function datagraph()
    {
        return view('graph/datagraph');
    }
    
    public function taskgraph()
    {
        return view('graph/taskgraph');
    }
    
    public function searchgraph()
    {
        return view('graph/searchgraph');
    }
    
    public function checkgraph()
    {
        return view('graph/checkgraph');
    }
    
    public function export()
    {
        return view('graph/export');
    }
}
