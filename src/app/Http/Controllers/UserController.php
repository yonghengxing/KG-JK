<?php
/**
 * User: shoubin@iscas.ac.cn
 * Date: 2018/10/14
 * Time: 17:17
 */
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Contracts\View\View;
use App\Services\UserService;
use App\Services\GroupService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
use Log;
use PDO;

class UserController extends BaseController
{
    
    function __construct(UserService $userService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
    }
    
    public function isAdmin()
    {
        if (Auth::check()) {
            return Auth::user()->admin || config('app.admin_mode', false);
        } else {
            return false;
        }
    }
    
    
    /**
     * 获取用户列表
     *
     * @return unknown
     */
    public function user_list(Request $request)
    {
        $users = $this->userService->getAllByPage(15, $request);        
        return view('user/list', compact('users'));
    }
    
    /**
     * 创建用户
     *
     * @return unknown
     */
    public function user_new()
    {

        return view('user/new');
    }
    
    /**
     * 创建用户
     *
     * @return unknown
     */
    public function user_new_do(Request $request)
    {
        $username = $request->get("username");
//         $truename = $request->get("truename");
        $pwd = $request->get("pwd");
        // 缺少密码检查、上传密码
        
        $user = new User();
        $user->name = $username;
//         $user->true_name = $truename;
        $user->created_at = Carbon::now();
        $user->password = bcrypt($pwd);
        
        $ret = $this->userService->append($user);
        
        $url = "user/list";
        if ($ret) {
            return view('success', compact("url"));
        } else {
            return view('error', compact("url"));
        }
    }
    
    /**
     * 创建用户
     *
     * @return unknown
     */
    public function user_delete($user_id)
    {

        //删除priveledge库
        try {
            $pdo_privilege = new PDO(
                'mysql:host=127.0.0.1;dbname=iscas_itechs_privilege;port=3306;charset=utf8',
                'root',
                ''
                );
        } catch (PDOException $ex) {
            // echo 'database connection failed';
            exit();
        }
        $sql = "SHOW tables FROM iscas_itechs_privilege";
        $statement = $pdo_privilege->prepare($sql);
        $statement->execute();
        $table_name = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($table_name as $tables){
            $name = $tables["Tables_in_iscas_itechs_privilege"];
            $sql = 'DELETE FROM '.$name.' WHERE user_id="'.$user_id.'"';
            $statement = $pdo_privilege->prepare($sql);
            $statement->execute();
            $result= $statement->fetchAll(PDO::FETCH_ASSOC);
//             dd($sql, $result,$name);
        }
        
//         dd($sql,$table_name);
        
        //删除user表
        $ret = $this->userService->delete($user_id);
        $url = "user/list";
        if ($ret) {
            return view('success', compact("url"));
        } else {
            $msg = "数据库删除用户出错！";
            return view('error', compact("url","msg"));
        }
    }
    
    /**
     * 获取用户详细信息
     *
     * @param unknown $user_id
     * @return unknown
     */
    public function user_info($user_id)
    {
        $user = $this->userService->getById($user_id);

        return view('user/info', compact('user'));
    }
    
    /**
     * 更新用户信息 2018_10_30
     *
     * @param unknown $user_id
     * @return unknown
     */
    public function user_update($user_id, Request $request)
    {
        $name = $request->get("username");
        $pwd = $request->get("pwd");
        $mUser = $this->userService->getById($user_id);
        $mUser->id = $user_id;
        $mUser->name = $name;
        $mUser->password = bcrypt($pwd);
        $ret = $this->userService->update($mUser);
        $url = "user/list";
        if ($ret) {
            return view('success', compact("url"));
        } else {
            $msg = "数据库更新用户出错！";
            return view('error', compact("url","msg"));
        }
    }
    
}