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
    
    public function rtype()
    {
        return view('rtype/rtype');
    }
    
    public function database()
    {
        return view('data/database');
    }
    
    public function datasource()
    {
        return view('data/datasource');
    }
    
    public function ontologymap()
    {
        return view('fuse/ontologymap');
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
    
    public function safemanage()
    {
        return view('safemanage');
    }
}