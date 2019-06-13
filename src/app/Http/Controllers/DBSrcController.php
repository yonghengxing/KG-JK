<?php
/**
 * Created by PhpStorm.
 * User: HI
 * Date: 2019/3/5
 * Time: 22:31
 */
namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Excel;

use Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;

use PDO;

use App\Models\Kg_db;
use App\Models\Kg_datasrc;

use App\Service\DBService;


use PHPExcel_Reader_IReadFilter;
use PHPExcel_Reader_Excel2007;
use PHPExcel_Reader_Excel5;
use PHPExcel_Cell;
use PHPExcel_IOFactory;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Services\UserService;

class DBSrcController extends Controller{

    function __construct(UserService $userService)
    {
        $this->middleware('auth');
    }

    /*
 * 数据库与数据源连接信息展示
 */
    public function datasource(Request $request){
        $datasourceMsg = Kg_datasrc::all();
        //dd($datasourceMsg);
        return view('data/datasource',compact('datasourceMsg'));
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


            $path_original = storage_path(''.$filePath.'\\'.iconv('GBK', 'UTF-8', $db_msg[0]->dbname));
            $path = str_replace('/','\\',$path_original);

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
                $pdo = new PDO(
                    'mysql:host='.$db_msg[0]->IP.';dbname='.$db_msg[0]->dbname.';port='.$db_msg[0]->port.';charset=utf8',
                    $db_msg[0]->username,
                    $db_msg[0]->password
                );
            } catch (PDOException $ex) {
                echo 'database connection failed';
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
            //dd($table_head);

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
                echo 'database connection failed';
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
        $DBSrcName = $request->DSname;
        $plevel = $request->plevel;
        $database = $request->database;
        $DBtable = $request->DBtable;
        $tablesource = 1;
        $items = $request->items;
        $db_rules = $request->db_rules;


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
                echo 'database connection failed';
                exit();
            }
            echo '连接成功';

            //得到excel文件内容
            $filePath = 'storage/'.$db_msg[0]->IP.'/'.iconv('GBK', 'UTF-8', $db_msg[0]->dbname);

            $data = Excel::load($filePath, function ($reader) {}, 'GBK');
            $data_content = $data->get()->toArray();

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
            //$table_head;
            while($data->getSheet($table_num)->getCellByColumnAndRow($index, 1)->getValue()){
                $table_head[$index] = $data->getSheet($table_num)->getCellByColumnAndRow($index, 1)->getValue();
                $index++;
            }



            //要导入的数据库的内容
            //$data_content_real ;
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

            dd($items);
            //建立表结构
            $sql_create = "CREATE TABLE ".$DBtable."(`me_id` int(255) NOT NULL COMMENT '主键ID',";

            $index = 0;
            for($i = 0;$i<count($table_head);$i++){
                if(isset($items[$i])){
                    $sql_create = $sql_create.$items[$i]."_kg"." MEDIUMTEXT  COMMENT '".$items[$i]."',";
                    $index++;
                }
            }
            $sql_create = substr($sql_create, 0, -1);
            $sql_create = $sql_create.") ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
            $sql_create = $sql_create." ALTER TABLE ".$DBtable." ADD PRIMARY KEY (`me_id`);";
            $sql_create = $sql_create." ALTER TABLE ".$DBtable." MODIFY `me_id` int(255) NOT NULL AUTO_INCREMENT;";

            $statement = $pdo_me->prepare($sql_create);
            $statement->execute();
            $results_create = $statement->fetchAll(PDO::FETCH_ASSOC);

            //插入数据
            for($ins = 0;$ins<count($data_content_real);$ins = $ins+20){
                $index = 0;
                $jjj = 0;
                $sql_insert = "INSERT INTO ".$DBtable." (";
                for($i = 0;$i<count($table_head);$i++){
                    if(isset($items[$i])){
                        $sql_insert = $sql_insert.$items[$i].',';
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

                for($i = $ins;$i<($ins+20);$i++){
                    if(isset($data_content_real[$i])){
                        for($j = 0;$j<count($table_head);$j++){
                            if(isset($items[$j])){
                                $aaa = str_replace('（', '', $items[$j]);
                                $bbb = str_replace('）', '',$aaa);
                                $ccc = strtolower($bbb);

                                $jjj++;
                                $iii[$i][$ccc] = $data_content_real[$i][$ccc];
                                $statement->bindValue( $jjj, $iii[$i][$ccc] ,PDO::PARAM_STR);
                            }
                        }
                    }

                }


                $statement->execute();
                $results_create = $statement->fetchAll(PDO::FETCH_ASSOC);
            }


            //创建视图

            $sql = "select column_name from information_schema.columns where table_schema ='iscas_itechs_dbout' and table_name = '".$DBtable."'";
            $statement = $pdo_me->prepare($sql);
            $statement->execute();

            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            for($i=1;$i<count($results);$i++){
                $view_create = "CREATE VIEW ".$DBtable."_".$results[$i]['column_name']." AS SELECT DISTINCT ".$results[$i]['column_name']." FROM ".$DBtable." where ".$results[$i]['column_name']." is not null";
                dd($view_create);
				$statement = $pdo_me->prepare($view_create);
                $statement->execute();

                $results_create_view = $statement->fetchAll(PDO::FETCH_ASSOC);
            }


            //在datasrc表中插入与db关联记录
            $kg_datasrc =new Kg_datasrc();
            $kg_datasrc->dataSource = $DBSrcName;
            $kg_datasrc->dbname	 = $database;
            $kg_datasrc->plevel	 = $plevel;
            $kg_datasrc->type	 = $tablesource;
            $kg_datasrc->createdname = "admin";
            $kg_datasrc->updatename = "admin";
            $kg_datasrc->dbname_real = $DBtable;
            $kg_datasrc_save = $kg_datasrc->save();



            $url = "http://192.168.15.62:5000/run_command_dbout";
            //$url = "http://192.168.1.62:5000/run_command_load";
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'timeout'=>1000,//s
                )
            );
            $data =  file_get_contents($url, false, stream_context_create($opts));

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
                echo 'database connection failed';
                exit();
            }
            echo 'success<br>';

            //本地数据库连接
            try {
                $pdo_me = new PDO(
                    'mysql:host=127.0.0.1;dbname=iscas_itechs_dbout;port=3306;charset=utf8',
                    'root',
                    ''
                );
            } catch (PDOException $ex) {
                echo 'database connection failed';
                exit();
            }
            echo '连接成功';

            //得到外部数据库数据表项（字段）
            $sql = "select column_name, column_comment from information_schema.columns where table_schema ='".$db_msg[0]->dbname."' and table_name = '".$DBtable."'";
            $statement = $pdo_out->prepare($sql);
            $statement->execute();

            $table_head = $statement->fetchAll(PDO::FETCH_ASSOC);

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
                    $sql_create = $sql_create." ".$items[$i]." varchar(255) ,";
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
                        $sql_insert = $sql_insert.$items[$i].',';
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


            //创建视图
            $sql = "select column_name from information_schema.columns where table_schema ='iscas_itechs_dbout' and table_name = '".$DBtable."'";
            $statement = $pdo_me->prepare($sql);
            $statement->execute();

            $results = $statement->fetchAll(PDO::FETCH_ASSOC);

            for($i=1;$i<count($results);$i++){
                $view_create = "CREATE VIEW ".$DBtable."_".$results[$i]['column_name']." AS SELECT DISTINCT ".$results[$i]['column_name']." FROM ".$DBtable." where ".$results[$i]['column_name']." is not null";
                dd($view_create."1111");
				$statement = $pdo_me->prepare($view_create);
                $statement->execute();

                $results_create_view = $statement->fetchAll(PDO::FETCH_ASSOC);
            }


            //dd(111);
            //在datasrc表中插入与db关联记录
            $kg_datasrc =new Kg_datasrc();
            $kg_datasrc->dataSource = $DBSrcName;
            $kg_datasrc->dbname	 = $database;
            $kg_datasrc->plevel	 = $plevel;
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

        return redirect()->action('DBSrcController@datasource');
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
            echo 'database connection failed';
            exit();
        }
        echo '连接成功';

        //删除数据库
        //TODO
        $dbname_real = Kg_datasrc::select('dbname_real')->where('rid',$rid)->get();

        $sql = "select column_name from information_schema.columns where table_schema ='iscas_itechs_dbout' and table_name = '".$dbname_real[0]->dbname_real."'";

        $statement = $pdo_me->prepare($sql);
        $statement->execute();

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        //dd($results);




        $sql = "DROP TABLE '".$dbname_real[0]->dbname_real."';";
        for($i=1;$i<count($results);$i++){
            $sql = $sql."DROP VIEW ".$dbname_real[0]->dbname_real."_".$results[$i]['column_name'].";";
        }
        //dd($sql);
        $statement = $pdo_me->prepare($sql);
        $statement->execute();

        $statement->fetchAll(PDO::FETCH_ASSOC);

        //删除记录
        $result = $this->dbSrcService->delete($rid);

        return redirect()->action('DBSrcController@datasource');
    }
}