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
use PDO;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Chumper\Zipper\Zipper;

class viewController extends Controller
{

    function __construct(UserService $userService,StatusService $statusService)
    {
        $this->middleware('auth');
        $this->userService = $userService;
        $this->statusService = $statusService;
    }
   
    
    public function ontologymap()
    {   
        $file_list=[];
		
        $filePath = config("properties")['filePathLinux'];
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
    public function fuseShow($key,Request $request)
     {
         //dbout连接
         try {
             $pdo_dbout = new PDO(
                 'mysql:host=127.0.0.1;dbname=iscas_itechs_dbout;port=3306;charset=utf8',
                 'root',
                 ''
                 );
         } catch (PDOException $ex) {
             //echo 'iscas_itechs_dbout connection failed';
             exit();
         }         

         //得到前四列信息
         $sql = "SHOW columns FROM ".$key;     //得到表头
         $statement = $pdo_dbout->prepare($sql);
         $statement->execute();
         $dbout_table_columns = $statement->fetchAll(PDO::FETCH_ASSOC);
//dd($sql);
         $count= count($dbout_table_columns);
         if($count>3)
         {
             for ($i=0; $i<=3; $i++)
             {
                 $columns[$i] = $dbout_table_columns[$i];                 
             }
             $sql = "SELECT " .$columns[0]["Field"]. "," .$columns[1]["Field"]. "," .$columns[2]["Field"]. "," .$columns[3]["Field"]." FROM ".$key;
             $statement = $pdo_dbout->prepare($sql);
             $statement->execute();
             $dbout_table = $statement->fetchAll(PDO::FETCH_ASSOC);
         }
         else
         {
             $columns = $dbout_table_columns;
             $sql = "SELECT * FROM ".$key;
             $statement = $pdo_dbout->prepare($sql);
             $statement->execute();
             $dbout_table = $statement->fetchAll(PDO::FETCH_ASSOC);
             
         }

         //分页
         $perPage = 15;
         if ($request->has('page')) {
             $current_page = $request->input('page');
             $current_page = $current_page <= 0 ? 1 :$current_page;
         } else {
             $current_page = 1;
         }
         $item = array_slice($dbout_table, ($current_page-1)*$perPage, $perPage); //注释1
         $total = count($dbout_table);
         $tablePaginator =new LengthAwarePaginator($item, $total, $perPage, $current_page , [
             'path' => Paginator::resolveCurrentPath(), //注释2
             'pageName' => 'page',
         ]);

	$tablename = $key;
         
          return view('fuse/show',compact('columns','tablePaginator','tablename'));
     }
     
     public function fuseDetail($key,$id)
     {
         //dbout连接
         try {
             $pdo_dbout = new PDO(
                 'mysql:host=127.0.0.1;dbname=iscas_itechs_dbout;port=3306;charset=utf8',
                 'root',
                 ''
                 );
         } catch (PDOException $ex) {
             //echo 'iscas_itechs_dbout connection failed';
             exit();
         } 
         
         $sql = "SHOW columns FROM ".$key;     //得到表头
         $statement = $pdo_dbout->prepare($sql);
         $statement->execute();
         $dbout_table_columns = $statement->fetchAll(PDO::FETCH_ASSOC);

         $sql = "SELECT * FROM ".$key." WHERE " .$dbout_table_columns[0]["Field"]. "=" .$id;     //得到表头
         $statement = $pdo_dbout->prepare($sql);
         $statement->execute();
         $dbout_table = $statement->fetchAll(PDO::FETCH_ASSOC);
        //  dd($dbout_table);

         return view('fuse/detail',compact('dbout_table_columns','dbout_table')); 
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
        
        $zip=new Zipper();
        $filePathLinux = config("properties")['filePathLinux'];
        $zipPath = $filePathLinux . 'data.zip';
        $zip->make($zipPath)->add($filePathLinux);
        $zip->close();
        
        header("Cache-Control: public"); 
        header("Content-Description: File Transfer"); 
        header('Content-disposition: attachment; filename='.basename($zipPath)); //文件名    
        header("Content-Type: application/zip"); //zip格式的    
        header("Content-Transfer-Encoding: binary"); //告诉浏览器，这是二进制文件   
        header('Content-Length: '.filesize($zipPath)); //告诉浏览器，文件大小
        @readfile($zipPath);
        @unlink($zipPath);
    }

}