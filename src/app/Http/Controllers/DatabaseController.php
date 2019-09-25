<?php
namespace App\Http\Controllers;

use App\Services\DBSrcService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

use Excel;
use App\Services\PinYin;
use Illuminate\Support\Facades\Log;
use mysql_xdevapi\Exception;
use phpDocumentor\Reflection\Types\Array_;
use Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;

use PDO;

use App\Models\Kg_db;
use App\Models\Kg_datasrc;
use App\Models\User;

use App\Services\DBService;
use App\Services\UserService;
use App\Services\RelationService;
use App\Services\SchemaService;
use App\Services\StatusService;
use PHPExcel_Reader_IReadFilter;
use PHPExcel_Reader_Excel2007;
use PHPExcel_Reader_Excel5;
use PHPExcel_Cell;
use PHPExcel_IOFactory;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

//将中文转换成拼音
function pinyin($zhongwen){
    $py = new PinYin();
    $all_py = $py->get_all_py("$zhongwen");
    $res = implode('',$all_py);
    return  $res;
}

/**
 * @param $name_before
 * @return $name_after
 * 替换别名
 */
function name_replace($name_before,$pdo_rename){
    //别名数据库连接
//    try {
//        $pdo_rename = new PDO(
//            'mysql:host=127.0.0.1;dbname=iscas_itechs_rename;port=3306;charset=utf8',
//            'root',
//            ''
//        );
//    } catch (PDOException $ex) {
        //echo 'iscas_itechs_rename connection failed';
//        exit();
 //   }
    //echo 'iscas_itechs_rename连接成功';

    //得到外部数据库数据表项（字段）
    $sql = "SELECT * FROM `name_translate`";
    $statement = $pdo_rename->prepare($sql);
    $statement->execute();

    $name_translate_table = $statement->fetchAll(PDO::FETCH_ASSOC);

    for($i=0;$i<count($name_translate_table);$i++){
        $name_before = str_ireplace($name_translate_table[$i]["name_before"],$name_translate_table[$i]["name_after"],$name_before,$count);
//        if($count != 0){
//            break;
//        }
    }
//    dd($name_before);
    return $name_before;
}


function cut_table($dbname,$cutradio,$items,$table_head){
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
    //echo 'dbout连接成功';

    //得到表中内容
    $sql = "SELECT * FROM ".$dbname;
    $statement = $pdo_dbout->prepare($sql);
    $statement->execute();
    //dd($sql);
    $dbout_table_before = $statement->fetchAll(PDO::FETCH_ASSOC);

//    dd($dbout_table_before,$cutradio,$items);
//    $item_num = 0;
if ($cutradio != null && $cutradio !="") {

    for($i =1;$i<count($cutradio)+1;$i++){
	   if (isset($cutradio[$i])){

            if ($cutradio[$i] == 1) {
                $item_num[$i] = $i;
                $item_name[$i] = $items[$i];
//            break;
            }
        }
    }
//    dd($dbout_table_before,$cutradio,$items,$item_num,$item_name);

    for ($m = 1;$m<count($cutradio)+1;$m++) {
	if (isset($cutradio[$m])) {
        if ($cutradio[$m] == 1) {
            //得到表中内容
            $sql = "SELECT * FROM ".$dbname;
            $statement = $pdo_dbout->prepare($sql);
            $statement->execute();
            //dd($sql);
            $dbout_table_before = $statement->fetchAll(PDO::FETCH_ASSOC);

            /*
             * 按“,”分割
             */
            for ($j = 0; $j < count($dbout_table_before); $j++) {
                $justice = strpos($dbout_table_before[$j][$items[$item_num[$m]]], ",");
                if ($justice != null || $justice!= false) {
                    //dd($dbout_table_before[$j]);LegalStatus
                    $name_new = explode(",", $dbout_table_before[$j][$items[$item_num[$m]]], $justice);
                    //dd($dbout_table_before,$cutradio,$items,$item_num,$justice,$item_name,$name_new,$table_head);
                    for ($a = 0; $a < count($name_new); $a++) {
                        $sql = "INSERT INTO " . $dbname . "  VALUES (NULL,";
                        for ($b = 0; $b < count($table_head); $b++) {
                            if (isset($items[$b])) {
                                //dd($b,$items[$b],$item_name);
                                if ($items[$b] == $item_name[$m]) {
                                    $sql = $sql . "'" . $name_new[$a] . "',";


                              } else {
                                    $sql = $sql . "'" . $dbout_table_before[$j][$items[$b]] . "',";
                                }
                            }
                        }
                        $sql = substr($sql, 0, -1) . ")";
                        $statement = $pdo_dbout->prepare($sql);
                        $statement->execute();
                    }

                    //dd($dbout_table_before[$j][$items[$item_num]],$name_new,$justice,$dbout_table_before[$j]);
                    $sql_delete = "DELETE FROM " . $dbname . " WHERE `me_id` = " . $dbout_table_before[$j]["me_id"];
                    $statement = $pdo_dbout->prepare($sql_delete);
                    $statement->execute();
                }
            }

            /*
             * 按“;”分割
             */
            for ($j = 0; $j < count($dbout_table_before); $j++) {
                $justice = strpos($dbout_table_before[$j][$items[$item_num[$m]]], ";");
                if ($justice != null) {
                    //dd($dbout_table_before[$j]);
                    $name_new = explode(";", $dbout_table_before[$j][$items[$item_num[$m]]], $justice);
                    //dd($dbout_table_before,$cutradio,$items,$item_num,$justice,$item_name,$name_new,$table_head);
                    for ($a = 0; $a < count($name_new); $a++) {
                        $sql = "INSERT INTO " . $dbname . "  VALUES (NULL,";
                        for ($b = 0; $b < count($table_head); $b++) {
                            if (isset($items[$b])) {
                                //dd($b,$items[$b],$item_name);
                                if ($items[$b] == $item_name[$m]) {
                                    $sql = $sql . "'" . $name_new[$a] . "',";
                                } else {
                                    $sql = $sql . "'" . $dbout_table_before[$j][$items[$b]] . "',";
                                }
                            }
                        }
                        $sql = substr($sql, 0, -1) . ")";
                        $statement = $pdo_dbout->prepare($sql);
                        $statement->execute();
                    }

                    //dd($dbout_table_before[$j][$items[$item_num]],$name_new,$justice,$dbout_table_before[$j]);
                    $sql_delete = "DELETE FROM " . $dbname . " WHERE `me_id` = " . $dbout_table_before[$j]["me_id"];
                    $statement = $pdo_dbout->prepare($sql_delete);
                    $statement->execute();
                }
            }
        }
    }
}
}
}

/**
 * @param $DBtable
 * @param $table_head
 * @param $only
 */
function create_view($DBtable,$table_head,$only,$items)
{
    try {
        $pdo_me = new PDO(
            'mysql:host=127.0.0.1;dbname=iscas_itechs_dbout;port=3306;charset=utf8',
            'root',
            ''
        );
    } catch (PDOException $ex) {
       // echo 'database connection failed';
        exit();
    }
   // echo '连接成功';

    $sql = "select column_name from information_schema.columns where table_schema ='iscas_itechs_dbout' and table_name = '" . $DBtable . "'";
    $statement = $pdo_me->prepare($sql);
    $statement->execute();

    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $Chinese_head =array();
    foreach ($table_head as $item) {
        $Chinese_head[] = pinyin($item);
    }
    $table_head = $Chinese_head;
    for ($i = 0; $i < count($table_head); $i++) {
	if (isset($items[$i])){
        if (isset($only[$i])) {
            if ($only[$i] == 1) {
                $view_create = "CREATE VIEW " . $DBtable . "_" . $table_head[$i]."_kg" . " AS SELECT DISTINCT " . $table_head[$i]."_kg" . " FROM " . $DBtable." where ". $table_head[$i]."_kg"." is not null";
//                 dd($results,$view_create,$i);
                $statement = $pdo_me->prepare($view_create);
                $statement->execute();
                $results_create_view = $statement->fetchAll(PDO::FETCH_ASSOC);
            } else {
                $view_create = "CREATE VIEW " . $DBtable . "_" . $table_head[$i]."_kg" . " AS SELECT " . $table_head[$i]."_kg" . " FROM " . $DBtable." where ". $table_head[$i]."_kg"." is not null";
                //dd($results,$view_create,$request->onlyradio,$i);
                $statement = $pdo_me->prepare($view_create);
                $statement->execute();
                $results_create_view = $statement->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }
}
}

/**
 * @param $request
 * @param $table_head
 */
function add_privilege($request, $table_head){
        $userID = User::select("id")->get();
//        dd($request,$table_head,$userID,count($userID),$userID[count($userID)-1]["id"]);
//    for($i = 0;$i<1000;$i++){
//        $a = "plevel".$i;
//        if (isset($request[$a])){

//            for ($j = 0;$j<count($table_head);$j++){
//                if (isset($request->items[$j])){
//                    $b = "plevel[".$j."]";
//                    $plevel[$j]["id"] = $request[$b]-1;
//                    $plevel[$j]["name"] = $request->items[$j];
//                }
//            }
//        }else{
//            break;
//        }
//    }
    //dd($plevel);

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
   // echo 'iscas_itechs_privilege连接成功';

    //创建表
    //$sql = "CREATE TABLE ".$request["DBtable"]."(`id` int(255) NOT NULL COMMENT '主键ID',`items_name` varchar(255)  COMMENT '选择表项',`user_id` int(255)  COMMENT '用户ID') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; ALTER TABLE ".$request["DBtable"]." ADD PRIMARY KEY (`id`); ALTER TABLE ".$request["DBtable"]." MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;";
    $sql = "CREATE TABLE ".pinyin($request["DBtable"])."(`id` int(255) NOT NULL COMMENT '主键ID',`items_name` varchar(255)  COMMENT '选择表项',`user_id` int(255)  COMMENT '用户ID') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; ALTER TABLE ".pinyin($request["DBtable"])." ADD PRIMARY KEY (`id`); ALTER TABLE ".pinyin($request["DBtable"])." MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;";
    $statement = $pdo_privilege->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    //插入权限数据
//    $sql_insert = "INSERT INTO " . $request["DBtable"] . " (`id`, `items_name`, `user_id`) VALUES";
//    for ($k = 0;$k<count($table_head) ;$k++) {
//        if (isset($plevel[$k])) {
//            $sql_insert = $sql_insert." (NULL, '" . $plevel[$k]["name"] . "', '" . $plevel[$k]["id"] . "'),";
//        }
//    }
//    $sql_insert = substr($sql_insert,0,-1);
//    $sql_insert = $sql_insert.";";
//    //dd($sql_insert);
//    //TODO
////    if (count($table_head)==0){
////        //TODO
////        //打日志，不能不选
////    }
//    $statement = $pdo_privilege->prepare($sql_insert);
//    $statement->execute();
//    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    for ($i = 0;$i<count($table_head);$i++){
        if(isset($request->items[$i])){
//            dd($request->plevel[$i],$i);
            for ($j=0;$j<$userID[count($userID)-1]["id"]+1;$j++){ //$userID[count($userID)-1]["id"]+1  是userid的最大值加一    遍历该列的所有用户
                if (isset($request->plevel[$i][$j])){
                    $sql_insert = "INSERT INTO " . pinyin($request["DBtable"]) . " (`id`, `items_name`, `user_id`) VALUES (NULL,'".pinyin($request->items[$i])."_kg','".$j."')";
                    $statement = $pdo_privilege->prepare($sql_insert);
                    $statement->execute();
                    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
                }
            }
        }
    }
//    dd(111);
}

class DatabaseController extends Controller{


    function __construct(UserService $userService,DBService $dbService,DBSrcService $dbSrcService, SchemaService $schemaService, RelationService $relationService, StatusService $statusService)
    {
        $this->middleware('auth');
        $this->dbService = $dbService;
        $this->dbSrcService = $dbSrcService;
 	    $this->schemaService = $schemaService;
        $this->relationService = $relationService;
        $this->statusService = $statusService;
        $this->userService = $userService;

    }

    /*
     *   数据库信息展示
     */
    public function addnew(Request $request){
//        $databaseMsg = Kg_db::all();
        $databaseMsg = $this->dbService->getAll();
        $name = Kg_db::select('name')->get();
        $userMsg = User::all();
        $userMsgjson = json_encode($userMsg);
        return view('datasource/addnew',compact('databaseMsg','name','userMsg','userMsgjson'));
    }

    /*
     * 数据库信息展示
     */
    public function database(Request $request){
        //$databaseMsg = Kg_db::all();
        $databaseMsg = $this->dbService->getAll();
        return view('database/list',compact('databaseMsg'));
    }
    /*
     * 数据库与数据源连接信息展示
     */
    public function datasource(Request $request){
        $datasourceMsg = Kg_datasrc::all();
        return view('datasource/list',compact('datasourceMsg'));
    }
    /*
     * 数据库信息添加界面
     */
    public function addDB(Request $request)
    {
        return view('database/new');
    }

      public function showDB(Request $request)
    {
        //dd($request,$request->get("IP"),$request->get("amp;port"),$request->get("amp;dbname"),$request->get("amp;username"),$request->get("amp;password"));
        $IP = $request->IP;
        $port = $request->get("amp;port");
        $dbname = $request->get("amp;dbname");
        $username = $request->get("amp;username");
        $password = $request->get("amp;password");
        $type = $request->get("amp;type");
        $name = $request->get("amp;name");
        return view('database/show' , compact("IP","port","dbname","username","password","type","name"));
    }

    public function addDB_do(Request $request)
    {
//        dd($request);
        $button = $request->button;
        $name = $request->DBID;
        $type = $request->type;
        $IP = $request->IP;
        $port = $request->Port;
        $dbname = $request->DBname;
        $username = $request->UserName;
        $password = $request->Password;
        $descFile = $request->file('descdoc');
        //数据库连接测试
        if($button == "test"){
            if ($IP==null || $port ==null || $dbname ==null || $username == null){
                $msg = '填写项未完整填写';
                $url = 'database/new';
                return view('error', compact("url","msg"));
            }
            if($type == 1){
                try {
                    $pdo = new PDO(
                        'mysql:host='.$IP.';dbname='.$dbname.';port='.$port.';charset=utf8',
                        $username,
                        $password
                        );
			$url = 'database/show?'.'IP='.$IP.'&port='.$port.'&dbname='.$dbname.'&username='.$username.'&password='.$password.'&type='.$type.'&name='.$name;
                } catch (PDOException $ex) {
		    $msg = 'database connection failed';
	 	    $url = 'database/new';
	 	    //TODO
		    return view('error', compact("url","msg"));
                   // echo 'database connection failed';
                    exit();
            }
		return view('success' , compact("url","IP","port","dbname","username","password","type","name"));

            //echo '连接成功';
            }elseif ($type == 0){
                $test1 = $descFile->isValid();
                if ($test1 == true){
                    //echo '连接成功';
                }else {
                    //echo '连接失败';
                }
            }
        }
        
        //输入数据库信息
        if ($button =="save"){
            //dd($request);

            $name = $request->name;
            $type = $request->type;
            $IP = $request->IP;
            $port = $request->port;
            $dbname = $request->dbname;
            $username = $request->username;
            $password = $request->password;

            if ($type == 1){
  
                $typeName = "MySQL";
            $database = new Kg_db();
            $database->dbname = $dbname;
            $database->name = $name;
            $database->type = $typeName;
            $database->IP = $IP;
            $database->port = $port;
            $database->username = $username;
            $database->password = $password;
	        $database->createdname = "admin";
            $database->updatename = "admin";
            $databaseMsg = $database->save();
            }
            //提交Excel文件
            elseif ($type == 0){


	        $name = $request->get("DBID");
            $typeName = "xls";

            if ($descFile == null){
                $msg = '文件为空';
                $url = 'database/new';
                return view('error', compact("url","msg"));
            }
            $test = $descFile->isValid();
            if ($test == null){
                $msg = '提交文件不可用';
                $url = 'database/new';
                return view('error', compact("url","msg"));
            }
                //文件有效性
            $time = time();
            $fileName = $descFile->getClientOriginalName();
			$fileName = pinyin($fileName);
            $tempPath = '/exports/'.$time.'/';
            $descFile->move(storage_path().$tempPath,$fileName);

//            $filePath = 'storage/exports/'.$time.'/'.iconv('GBK', 'UTF-8', $fileName);

//            Excel::load($filePath, function($reader) {
//                $data = $reader->all();
//            });

//            $path = storage_path('exports\\'.$time.'\\'.$fileName);
            

            //services
            $database = new Kg_db();
            $database->name = $name;
            $database->type = $typeName;
            $database->dbname = $fileName;
            $database->IP = $tempPath;
            $database->createdname = "admin";
            $database->updatename = "admin"; 
            $databaseMsg = $database->save();
            }
        }
        return redirect()->action('DatabaseController@database');
    }
    
    //添加数据源信息
    public function add_dbSrc(Request $request){
        $databaseMsg = Kg_db::all();
        $name = Kg_db::select('name')->get();
        return view('datasource/new',compact('databaseMsg','name'));
    }
    
  
    
    //根据所选的数据库得到数据库下的所有表信息（表名）
    public function getDB(Request $request){
        
        //选择的数据库名称（定义的，不是实际的）
        $get_DBname = $request->database;
        //数据库名（实际）
        $realDBname = Kg_db::select('dbname')->where('name',$get_DBname)->get();
        //判断是否为Excel文件
        $a = strpos($realDBname,'.xls');
        $b = strpos($realDBname,'.xlsx');
        if ($a!=false or $b!=false){//Excel文件 
            $db_msg = Kg_db::select('IP','dbname')->where('name',$get_DBname)->get();
            
            $filePath = 'storage/'.$db_msg[0]->IP.'/'.iconv('GBK', 'UTF-8', $db_msg[0]->dbname);

            
            //$path_original = storage_path(''.$filePath.'\\'.iconv('GBK', 'UTF-8', $db_msg[0]->dbname));
            //$path = str_replace('/','\\',$path_original);
            
            /**
             * 得到表头
             */
            $data = Excel::load($filePath, function ($reader) {}, 'GBK');

            $tableName = $data->getSheetNames();
            //$table_name;
            for($i=0;$i<count($tableName);$i++){
                $table_name[$i]['table_name'] = $tableName[$i];
                
            }
           echo json_encode($table_name);

        
        }else{//数据库文件
            $db_msg = Kg_db::select('IP','port','dbname','username','password')->where('name',$get_DBname)->get();
            //连接数据库
            try {
		//dd($db_msg[0]->password);
                $pdo = new PDO(
                    'mysql:host='.$db_msg[0]->IP.';dbname='.$db_msg[0]->dbname.';port='.$db_msg[0]->port.';charset=utf8',
                    $db_msg[0]->username,
                    $db_msg[0]->password
                    );
            } catch (PDOException $ex) {
               // echo 'database connection failed';
                exit();
            }
            
            $sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = '".$db_msg[0]->dbname."' AND table_type = 'base table'";
            $statement = $pdo->prepare($sql);
            $statement->execute();
            
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            
           echo json_encode($results);
        }

    }
    
    //得到数据库表项(字段名称)
    public function getDBtableMsg(Request $request){
        $table_name = $request->DBtable;
        $get_DBname = $request->database_public;
        
        //数据库名（实际）
        $realDBname = Kg_db::select('dbname')->where('name',$get_DBname)->get();
        
        //判断是否为Excel文件
        $a = strpos($realDBname,'.xls');
        $b = strpos($realDBname,'.xlsx');
        if ($a!=false or $b!=false){//Excel文件 
            $db_msg = Kg_db::select('IP','dbname')->where('name',$get_DBname)->get();
            
            $filePath = 'storage/'.$db_msg[0]->IP.'/'.iconv('GBK', 'UTF-8', $db_msg[0]->dbname);

            $data = Excel::load($filePath, function ($reader) {}, 'GBK');
            $tableName = $data->getSheetNames();
            //$table_num;
            for($i=0;$i<count($tableName);$i++){
                if ($tableName[$i] == $table_name){
                    $table_num = $i;
                    break;
                }
            }

            $index = 0;
            //$table_head;
            while($data->getSheet($table_num)->getCellByColumnAndRow($index, 1)->getValue()){
                $table_head[$index] = $data->getSheet($table_num)->getCellByColumnAndRow($index, 1)->getValue();
                $index++;
            }
//            dd($table_head);

           echo json_encode($table_head);

          
            
        }else{//数据库型
        
        $db_msg = Kg_db::select('IP','port','dbname','username','password')->where('name',$get_DBname)->get();
        //连接数据库
        try {
            $pdo = new PDO(
                'mysql:host='.$db_msg[0]->IP.';dbname='.$db_msg[0]->dbname.';port='.$db_msg[0]->port.';charset=utf8',
                $db_msg[0]->username,
                $db_msg[0]->password
                );
        } catch (PDOException $ex) {
          //  echo 'database connection failed';
            exit();
        }
        
        $sql = "select column_name, column_comment from information_schema.columns where table_schema ='".$db_msg[0]->dbname."' and table_name = '".$table_name."'";
        
        $statement = $pdo->prepare($sql);
        $statement->execute();
        
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
       echo json_encode($results);
        }
    }
    
    /**
     * 添加数据源与数据库的连接
     * @param Request $request
     * @return unknown
     */
    public function addDBSrc_do(Request $request){
//        dd($request);
        $DBSrcName = $request->DSname;
//        $plevel = $request->plevel;
        $database = $request->database;
        $DBtable = $request->DBtable;
        $tablesource = 1;
        $items = $request->items;
//        $db_rules = $request->db_rules;

        if ($items == null){
            $msg = '选择项为空';
            $url = 'datasource/addnew';
            return view('error', compact("url","msg"));
        }
        if ($request->onlyradio == null || $request->plevel==null || $request->cutradio == null){
            $msg = '选项选择不规范';
            $url = 'datasource/addnew';
            return view('error', compact("url","msg"));
        }
        foreach ( $items as $item) {
            $item = pinyin($item);
        }
        $a = array_keys($items);
        $b = array_keys($request->onlyradio);
        $c = array_keys($request->plevel);
        $d = array_keys($request->cutradio);
        if (array_diff($a,$b) != [] || array_diff($a,$c)!= [] || array_diff($a,$d)!= []){
            $msg = '选项选择不规范';
            $url = 'datasource/addnew';
            return view('error', compact("url","msg"));
        }

        //数据库名（实际）
        
        $db_msg = Kg_db::select('IP','port','dbname','username','password')->where('name',$database)->get();
        
        
        $a = strpos($db_msg[0]->dbname,'.xls');
        $b = strpos($db_msg[0]->dbname,'.xlsx');
	
        if ($a!=false or $b!=false){//Excel文件 
            
            //本地数据库连接
            try {
                $pdo_me = new PDO(
                    'mysql:host=127.0.0.1;dbname=iscas_itechs_dbout;port=3306;charset=utf8',
                    'root',
                    ''
                    );
            } catch (PDOException $ex) {
                //echo 'database connection failed';
                exit();
            }
            //echo '连接成功';
     
            //得到excel文件内容
            $filePath = 'storage/'.$db_msg[0]->IP.'/'.iconv('GBK', 'UTF-8', $db_msg[0]->dbname);

            $data = Excel::load($filePath, function ($reader) {}, 'GBK');
            $data_content = $data->get()->toArray();
//            dd($data_content);
            
            //得到sheet页号
            $tableName = $data->getSheetNames();
                //$table_num;
                for($i=0;$i<count($tableName);$i++){
                    if ($tableName[$i] == $DBtable){
                        $table_num = $i;
                        break;
                    }
            }

            //选中的sheet表的内容
            $data_content_selected = $data_content[$table_num];

            $index = 0;
            //dd($table_head);
            while($data->getSheet($table_num)->getCellByColumnAndRow($index, 1)->getValue()){
                $table_head[$index] = $data->getSheet($table_num)->getCellByColumnAndRow($index, 1)->getValue();
                $index++;
            }



            //dd($request);
            //要导入的数据库的内容
            //$data_content_real = new Array_();
//dd($data_content_selected);
            if(isset($data_content_selected[1])){//多个sheet页
                for($i = 0;$i<count($data_content_selected);$i++){
                    for($j = 0;$j<count($table_head);$j++){
                        if(isset($items[$j])){
                            $aaa = str_replace('（', '', $items[$j]);
                            $bbb = str_replace('）', '',$aaa);
                            $ccc = strtolower($bbb);
                            $data_content_real[$i]["".$ccc] = $data_content_selected[$i]["".$ccc];
                        }
                    }
                }
            }else{//单个sheet页
                for($i = 0;$i<count($data_content);$i++){
                    for($j = 0;$j<count($table_head);$j++){
                        if(isset($items[$j])){
                            $aaa = str_replace('（', '', $items[$j]);
                            $bbb = str_replace('）', '',$aaa);
                            $ccc = strtolower($bbb);
                            $data_content_real[$i]["".$ccc] = $data_content[$i]["".$ccc];
                        }
                    }
                }
            }

            $DBtable = pinyin($DBtable);
            $resItems = array();
            foreach ($items as $item) {
                $resItems[] = pinyin($item);
            }
            //添加权限
            add_privilege($request,$table_head);

            //建立表结构
            $sql_create = "CREATE TABLE ".$DBtable."(`me_id` int(255) NOT NULL COMMENT '主键ID',";
            
            $index = 0;
            for($i = 0;$i<count($table_head);$i++){
                if(isset($resItems[$i])){
                    $sql_create = $sql_create.$resItems[$i]."_kg"." MEDIUMTEXT  COMMENT '".$resItems[$i]."',";
                        $index++;
                }
            }
            $sql_create = substr($sql_create, 0, -1);
            $sql_create = $sql_create.") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
            $sql_create = $sql_create." ALTER TABLE ".$DBtable." ADD PRIMARY KEY (`me_id`);";
            $sql_create = $sql_create." ALTER TABLE ".$DBtable." MODIFY `me_id` int(255) NOT NULL AUTO_INCREMENT;";
            //dd($sql_create);
            $statement = $pdo_me->prepare($sql_create);
            $statement->execute();            
            $results_create = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            //插入数据
            for($ins = 0;$ins<count($data_content_real);$ins = $ins+20){
                $index = 0;
                $jjj = 0;
                $sql_insert = "INSERT INTO ".$DBtable." (";
                for($i = 0;$i<count($table_head);$i++){
                    if(isset($resItems[$i])){
                        $sql_insert = $sql_insert.$resItems[$i].'_kg,';
                        $index++;
                    }
                }
                $sql_insert = substr($sql_insert, 0, -1);
                $sql_insert = $sql_insert.") VALUES ";
                for($i = $ins;$i<($ins+20);$i++){
                    if(isset($data_content_real[$i])){
                        $sql_insert = $sql_insert."(";
                        for($j = 0;$j<count($table_head);$j++){
                            if(isset($items[$j])){
                                $aaa = str_replace('（', '', $items[$j]);
                                $bbb = str_replace('）', '',$aaa);
                                $ccc = strtolower($bbb);
                                
                                $sql_insert = $sql_insert." ? ,";
                                
                            }
                        }
                        $sql_insert = substr($sql_insert, 0, -1);
                        $sql_insert = $sql_insert."),";
                    }

                }
                $sql_insert = substr($sql_insert, 0, -1);
                

            
                $statement = $pdo_me->prepare($sql_insert);

    //别名数据库连接
    try {
        $pdo_rename = new PDO(
            'mysql:host=127.0.0.1;dbname=iscas_itechs_rename;port=3306;charset=utf8',
            'root',
            ''
        );
    } catch (PDOException $ex) {
        //echo 'iscas_itechs_rename connection failed';
        exit();
    }
                
                for($i = $ins;$i<($ins+20);$i++){
                    if(isset($data_content_real[$i])){
                        for($j = 0;$j<count($table_head);$j++){
                            if(isset($items[$j])){
                                $aaa = str_replace('（', '', $items[$j]);
                                $bbb = str_replace('）', '',$aaa);
                                $ccc = strtolower($bbb);
                                
                                $jjj++;
                                $name_real = name_replace($data_content_real[$i][$ccc],$pdo_rename);
                                $iii[$i][$ccc] = $name_real;
                                $statement->bindValue( $jjj, $iii[$i][$ccc] ,PDO::PARAM_STR);
                            }
                        }
                    }
                    
                }
                
                
                $statement->execute();
                $results_create = $statement->fetchAll(PDO::FETCH_ASSOC);
            }


//             dd($request->items);
            $a = array_keys($request->items);
            $b = array_pop($a);
            for ($i = 0; $i <= $b; $i++) {
                if (isset($request["items"][$i])){
                    $items[$i] = $request["items"][$i]."_kg";
                }
            }
            //切表
            //cut_table($DBtable,$request->cutradio,$items,$table_head);

            
           //创建视图
            create_view($DBtable,$table_head,$request->onlyradio,$request->items);

            //在datasrc表中插入与db关联记录
            $kg_datasrc =new Kg_datasrc();
            $kg_datasrc->dataSource = $DBSrcName;
            $kg_datasrc->dbname	 = $database;
            $kg_datasrc->plevel	 = 1;
            $kg_datasrc->type	 = $tablesource;
            $kg_datasrc->createdname = "admin";
            $kg_datasrc->updatename = "admin";
            $kg_datasrc->dbname_real = $DBtable;
            $kg_datasrc_save = $kg_datasrc->save();
            

            
        }else{
            /**
             * 外部数据库文件
             */
        //外部数据库连接
        try {
            $pdo_out = new PDO(
                'mysql:host='.$db_msg[0]->IP.';dbname='.$db_msg[0]->dbname.';port='.$db_msg[0]->port.';charset=utf8',
                $db_msg[0]->username,
                $db_msg[0]->password
                );
        } catch (PDOException $ex) {
           // echo 'database connection failed';
            exit();
        }
       // echo 'success<br>';
        
        //本地数据库连接
        try {
            $pdo_me = new PDO(
                'mysql:host=127.0.0.1;dbname=iscas_itechs_dbout;port=3306;charset=utf8',
                'root',
                ''
                );
        } catch (PDOException $ex) {
            //echo 'database connection failed';
            exit();
        }
        //echo '连接成功';

        //得到外部数据库数据表项（字段）
        $sql = "select column_name, column_comment from information_schema.columns where table_schema ='".$db_msg[0]->dbname."' and table_name = '".$DBtable."'";
        $statement = $pdo_out->prepare($sql);
        $statement->execute();
        
        $table_head = $statement->fetchAll(PDO::FETCH_ASSOC);

            //添加权限
            add_privilege($request,$table_head);

        /**
         * 得到所选择外部数据库的数据
         */
        $sql = 'SELECT ';
        for($i = 0;$i<count($table_head);$i++){
            if(isset($items[$i])){
                $sql = $sql.$items[$i].",";
            }
        }
        $sql = substr($sql, 0, -1);
        $sql = $sql." FROM ".$DBtable;
        
        $statement = $pdo_out->prepare($sql);
        $statement->execute();
        
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        //dd($results);
        
        /**
         * 将得到的外部数据传入新数据库
         */
        
        
        //建立表结构
        $sql_create = "CREATE TABLE ".$DBtable."(`me_id` int(255) NOT NULL COMMENT '主键ID',";
        
        for($i = 0;$i<count($table_head);$i++){
            if(isset($items[$i])){
                $sql_create = $sql_create." ".$items[$i]."_kg varchar(255) ,";
            }
        }
        $sql_create = substr($sql_create, 0, -1);
        $sql_create = $sql_create.") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $sql_create = $sql_create." ALTER TABLE ".$DBtable." ADD PRIMARY KEY (`me_id`);";
        $sql_create = $sql_create." ALTER TABLE ".$DBtable." MODIFY `me_id` int(255) NOT NULL AUTO_INCREMENT;";
        //dd($sql_create);

        $statement = $pdo_me->prepare($sql_create);
        $statement->execute();
        
        $results_create = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        //插入数据

        
        for($ins = 0;$ins<count($results);$ins = $ins+20){
            $index = 0;
            $jjj = 0;
            $sql_insert = "INSERT INTO ".$DBtable." (";
            for($i = 0;$i<count($table_head);$i++){
                if(isset($items[$i])){
                    $sql_insert = $sql_insert.$items[$i].'_kg,';
                    $index++;
                }
            }
            $sql_insert = substr($sql_insert, 0, -1);
            $sql_insert = $sql_insert.") VALUES ";
            for($i = $ins;$i<($ins+20);$i++){
                if(isset($results[$i])){
                    $sql_insert = $sql_insert."(";
                    for($j = 0;$j<count($table_head);$j++){
                        if(isset($items[$j])){
                            $sql_insert = $sql_insert." ? ,";
                        }
                    }
                    $sql_insert = substr($sql_insert, 0, -1);
                    $sql_insert = $sql_insert."),";
                }
            }
            $sql_insert = substr($sql_insert, 0, -1);
            
            $statement = $pdo_me->prepare($sql_insert);
            
            for($i = $ins;$i<($ins+20);$i++){
                if(isset($results[$i])){
                    for($j = 0;$j<count($table_head);$j++){
                        if(isset($items[$j])){
                            $jjj++;
                            $iii[$i][$items[$j]] = $results[$i][$items[$j]];
                            $statement->bindValue( $jjj, $iii[$i][$items[$j]] ,PDO::PARAM_STR);
                        }
                    }
                }
            }
            $statement->execute();
            $results_create = $statement->fetchAll(PDO::FETCH_ASSOC);
        }


        $a = array_keys($request->items);
        $b = array_pop($a);
        for ($i = 0;$i<=$b;$i++){
            if (isset($request["items"][$i])){
                $items[$i] = $request["items"][$i]."_kg";
            }
        }
            //切表
            cut_table($DBtable,$request->cutradio,$items,$table_head);


        for ($i=0;$i<count($table_head);$i++){
            $table_head_new[$i] = $table_head[$i]["column_name"];
        }
            //创建视图
            create_view($DBtable,$table_head_new,$request->onlyradio,$request->items);



        //dd(111);
        //在datasrc表中插入与db关联记录
        $kg_datasrc =new Kg_datasrc();
        $kg_datasrc->dataSource = $DBSrcName;
        $kg_datasrc->dbname	 = $database;
        $kg_datasrc->plevel	 = 1;
        $kg_datasrc->type	 = $tablesource;
        $kg_datasrc->dbname_real = $DBtable;
        $kg_datasrc->createdname = "admin";
        $kg_datasrc->updatename = "admin";
        $kg_datasrc_save = $kg_datasrc->save();
    

	  $url = "http://192.168.15.62:5000/run_command_dbout";
        $opts = array(
            'http'=>array(
                'method'=>"GET",
                'timeout'=>1000,//s
            )
        );
        $data =  file_get_contents($url, false, stream_context_create($opts));


        }
        $this->statusService->datasrcStatusActive();
        return redirect()->action('DatabaseController@datasource');
    }

    /**
     * 删除数据源
     * @param $rid
     * @return \Illuminate\Http\RedirectResponse
     */
    function DBsrc_del($rid){
        //连接数据库
        try {
            $pdo_me = new PDO(
                'mysql:host=127.0.0.1;dbname=iscas_itechs_dbout;port=3306;charset=utf8',
                'root',
                ''
            );
        } catch (PDOException $ex) {
            //echo 'database connection failed';
            exit();
        }
        //echo '连接成功';

        //连接数据库
        try {
            $pdo_privilege = new PDO(
                'mysql:host=127.0.0.1;dbname=iscas_itechs_privilege;port=3306;charset=utf8',
                'root',
                ''
            );
        } catch (PDOException $ex) {
            //echo 'database connection failed';
            exit();
        }
        //echo '连接成功';

        //删除数据库
        $dbname_real = Kg_datasrc::select('dbname_real')->where('rid',$rid)->get();

        $sql = "select column_name from information_schema.columns where table_schema ='iscas_itechs_dbout' and table_name = '".$dbname_real[0]->dbname_real."'";

        $statement = $pdo_me->prepare($sql);
        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
//        dd($results);


        $sql = "DROP TABLE ".$dbname_real[0]->dbname_real.";";
        for($i=1;$i<count($results);$i++){
            $sql = $sql."DROP VIEW ".$dbname_real[0]->dbname_real."_".$results[$i]['column_name'].";";
        }
//        dd($sql);
        $statement = $pdo_me->prepare($sql);
        $statement->execute();

        $statement->fetchAll(PDO::FETCH_ASSOC);

        //删除权限
        $sql = "DROP TABLE ".$dbname_real[0]->dbname_real.";";
//        dd($sql);
        $statement = $pdo_privilege->prepare($sql);
        $statement->execute();
        $statement->fetchAll(PDO::FETCH_ASSOC);

        $this->relationService->deleteRelationByName($dbname_real[0]->dbname_real);
        $this->schemaService->deleteSchemaByName($dbname_real[0]->dbname_real);
        array_map('unlink', glob('/home/fengbs/tigergraph/loadingData/'.$dbname_real[0]->dbname_real."*.csv"));

        //删除记录
        $result = $this->dbSrcService->delete($rid);

        return redirect()->action('DatabaseController@datasource');
    }


	function datasource_search(Request $request){
        	$text = $request->route("text");
        	$datasourceMsg = $this->dbSrcService->getDBSrcBySearch($text);
        	return view('datasource/list', compact('datasourceMsg','text'));
   	 }

    function database_search(Request $request){
        $text = $request->route("text");
        $databaseMsg = $this->dbService->getDBBySearch($text);
        return view('database/list', compact('databaseMsg','text'));
    }

    function DBsrc_show(Request $request, $rid){

        $dbname_real = Kg_datasrc::select("dbname_real")->where("rid",$rid)->get();

        //连接数据库
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


        $sql = "SELECT `items_name`,`user_id` FROM ".$dbname_real[0]->dbname_real;
        $statement = $pdo_privilege->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT distinct `items_name` FROM ".$dbname_real[0]->dbname_real;
        $statement = $pdo_privilege->prepare($sql);
        $statement->execute();
        $results2 = $statement->fetchAll(PDO::FETCH_ASSOC);


        for ($i = 0;$i<count($results);$i++){
            $results_name[$i]["items_name"] = $results[$i]["items_name"];
            $results_userId[$i] = $results[$i]["user_id"];
            $results_name[$i]["name"][0] = User::select("name")->where("id",$results[$i]["user_id"])->get()[0]["name"];
        }

        for ($i = 0;$i<count($results2);$i++){
            for ($j=0;$j<count($results_name);$j++){
                if ($results2[$i]["items_name"]==$results_name[$j]["items_name"]){
//                    Log::alert($results_name[$i]["items_name"]."*****************".$results_name[$j]["items_name"]."<br>");
                    if (isset($results2[$i]["name"])){
                        $a = array_keys($results2[$i]["name"]);
                        $b = array_pop($a);
                        $results2[$i]["name"][$b+1] = $results_name[$j]["name"][0];
                        Log::info($results2[$i]["name"][$b+1]."***".$results_name[$i]["items_name"]."+++".($b+1));
                    }else{
                        $results2[$i]["name"][0] = $results_name[$j]["name"][0];
                        Log::info($results2[$i]["name"][0]."***".$results_name[$i]["items_name"]);
                    }
                }
            }
        }

        //分页
        $perPage = 15;
        $collection = new Collection($results2);
        $currentPage = $request->input('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $total = $collection->count();
        $result = $collection->forPage($currentPage, $perPage);
        $dbsrc = new LengthAwarePaginator($result,$total,$perPage,$currentPage,[
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page']);

        return view('datasource/show',compact('results2','dbsrc','dbname_real'));

    }

    function DB_del($dbId){
        $type = Kg_db::select("type")->where("dbId",$dbId)->get()[0]["type"];
        if ($type == "xls" || $type == "xsl"){
            $file = Kg_db::select("dbname","IP")->where("dbId",$dbId)->get()[0];
            $path_road = $file["IP"].$file["dbname"];
            $path_file = storage_path($path_road);
            $path = storage_path($file["IP"]);
//	    $path_file = iconv('utf-8','gdk',$path_file);
//dd($path_file);
            if(file_exists($path_file))
{
            if (!unlink($path_file))
            {
                Log::info("Error deleting $path_file");
            }
            if (!rmdir($path))
            {
                Log::info("Error deleting $path");
            }
}
else{
$msg = '文件不存在，请联系管理员修改数据库';
$url = 'database';
return view('error', compact("url","msg"));
}
            $result = $this->dbService->delete($dbId);
        }elseif ($type == "MySQL"){
            $result = $this->dbService->delete($dbId);
        }else{
            $msg = '删除失败';
            $url = 'database/new';
            return view('error', compact("url","msg"));
        }

        return redirect()->action('DatabaseController@database');
    }
    
    function DBSrcUser($dbname,$dbsname){
        
        //连接数据库
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
        
        $sql = 'SELECT user_id FROM '.$dbname.' WHERE items_name="'.$dbsname.'"';
        $statement = $pdo_privilege->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        for ($i = 0;$i<count($results);$i++){
            $results_name[$i]["user_id"] = $results[$i]["user_id"];
            $results_name[$i]["name"][0] = User::select("name")->where("id",$results[$i]["user_id"])->get()[0]["name"];
        }
        
        for ($i = 0;$i<count($results_name);$i++){
            $name[$i]["user_id"] = $results_name[$i]["user_id"];
            $name[$i]["name"] = $results_name[$i]["name"][0];
        }
            
        $user_name = new Collection($name);
//         dd($dbname, $sql, $results, $results_name,$user_name);
        return view('datasource/userlist',compact("dbname","user_name","dbsname"));
    }
    
    public function DBSrcUserDelete($dbname,$dbsname,$userid){
        
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

        $sql = 'DELETE FROM '.$dbname.' WHERE user_id="'.$userid.'" AND items_name="'.$dbsname.'"';
        $statement = $pdo_privilege->prepare($sql);
        $statement->execute();              
        $url = "/datasource/userlist/".$dbname."/".$dbsname;
        return view('success', compact("url"));
    }
 
    public function DBSrcUserAdd($dbname,$dbsname){       
        $users = $this->userService->getAll();
        return view('datasource/useradd', compact("users","dbname","dbsname"));
    }
    
    
    public function DBSrcUserAdd_do($dbname,$dbsname,Request $request){
        $appendNum = $request->get("user_num");
        $userAppend = array();
        for ($idx=1; $idx <= $appendNum; $idx++){
            $userKey = "user_" . $idx;
            if (!$request->has($userKey)){
                $url = "/datasource/userlist/".$dbname."/".$dbsname;
                $msg = "上传信息缺失错误！";
                return view('error', compact("url","msg"));
                break;
            }
            $userAppend[] = $request->get($userKey);
        }
        $userAppend = array_unique($userAppend);        //去重
        $user_Append = new Collection($userAppend);
//         dd($dbsname);        
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
        $count = false;
        foreach($user_Append as $userid){ 

            $sql = 'SELECT * FROM '.$dbname.' WHERE user_id="'.$userid.'" AND items_name="'.$dbsname.'"';
            $statement = $pdo_privilege->prepare($sql);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            if(!$results){
                $count = true;
                $sql = "INSERT INTO ".$dbname." (items_name, user_id) VALUES ('".$dbsname."', '".$userid."')";
                $statement = $pdo_privilege->prepare($sql);
                $statement->execute();
                $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            }

        }
        
        if($count==false){
            $msg = '用户权限添加失败';
            $url = "/datasource/userlist/".$dbname."/".$dbsname;
            return view('error', compact("url","msg"));
        }
        elseif($count==true)
        {
            $url = "/datasource/userlist/".$dbname."/".$dbsname;
            return view('success', compact("url"));
        }

    }

    
    
}
