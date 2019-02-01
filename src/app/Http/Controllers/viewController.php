<?php
/**
 * User: danqi@iscas.ac.cn
 * Date: 2018/12/25
 * Time: 16:00
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class viewController extends Controller
{
    public function otype()
    {
        return view('oType/oType');
    }
    
    public function addObject()
    {
        return view('oType/addObject');
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
        return view('fuse/ontologymap');
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