<?php
/**
 * User: shoubin@iscas.ac.cn
 * Date: 2018/10/14
 * Time: 17:17
 */

namespace App\Http\Controllers;

use App\Models\Commit;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Services\UserService;
use DB;
use App\Services\ComponentService;

use App\Models\ItechsProductIndex;
use App\Models\Component;
use App\Models\ProductDevices;

class IndexController extends BaseController
{    
    function __construct(UserService $userService)
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
	
    {

		//$request->setTrustedProxies($request->getClientIps()); //这个可以放入到中间件中  这样就不用更改代码了

		$ip = $request->ip();
		$uid = Auth::user()->id;
		$results = DB::select('select * from itechs_kg_ip where ip = :ip', ['ip' => $ip]);
		if(count($results)>0){
			$affected = DB::update('update itechs_kg_ip set uid = ? where ip = ?', [$uid,$ip]);
		}
		else{
			DB::insert('insert into itechs_kg_ip (ip, uid) values (?, ?)', [$ip, $uid]);
		}

        return view('home');
    }
    
}


class stdObject {
    public function __construct(array $arguments = array()) {
        if (!empty($arguments)) {
            foreach ($arguments as $property => $argument) {
                $this->{$property} = $argument;
            }
        }
    }
    
    public function __call($method, $arguments) {
        $arguments = array_merge(array("stdObject" => $this), $arguments); // Note: method argument 0 will always referred to the main class ($this).
        if (isset($this->{$method}) && is_callable($this->{$method})) {
            return call_user_func_array($this->{$method}, $arguments);
        } else {
            throw new Exception("Fatal error: Call to undefined method stdObject::{$method}()");
        }
    }
}