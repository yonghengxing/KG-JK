<?php 
namespace App\Http\Controllers\Member; 
use App\Http\Controllers\BaseController; 
use App\Model\Member\MemberFollow; 
use Illuminate\Http\Request;
use Illuminate\Database\QueryException; 
use Excel; 


class MemberController extends BaseController{ 
/**
*
* Excel导出
*/ 
    public function export(){ 
        ini_set('memory_limit','500M'); 
        set_time_limit(0);//设置超时限制为0分钟 
        $cellData = MemberFollow::select('xt_name','sex','face')->limit(5)->get()->toArray(); 
        $cellData[0] = array('昵称','性别','头像'); 
        for($i=0;$i<count($cellData);$i++){ 
            $cellData[$i] = array_values($cellData[$i]); 
            $cellData[$i][0] = str_replace('=',' '.'=',$cellData[$i][0]); } 
            //dd($cellData); 
            Excel::create('用户信息',function($excel) use ($cellData){ 
                $excel->sheet('score', function($sheet) use ($cellData){ 
                    $sheet->rows($cellData); 
                }); 
            })->export('xls'); 
            die; 
    } 
}
