<?php
/**
 * User: danqi@iscas.ac.cn
 * Date: 2018/12/25
 * Time: 16:00
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchList()
    {
        return view('search/list');
    }
}