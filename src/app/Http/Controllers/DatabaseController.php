<?php
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

/**
 * 得到自己想要的部分
 * 过滤器
 * @author HI
 *
 */
class MyReadFilter implements PHPExcel_Reader_IReadFilter
{
    public function readCell($column, $row, $worksheetName = '') {
        // Read title row and rows 20 - 30
        if ($row == 1 || ($row >= 2 && $row <= 11)) {
            //if (in_array($column,range('A','E'))) {
                return true;
            //}  
        }
        
        return false;
    }
}

/**
 * 得到表头
 * @author HI
 *
 */
class HeadReadFilter implements PHPExcel_Reader_IReadFilter
{
    public function readCell($column, $row, $worksheetName = '') {
        // Read title row and rows 20 - 30
        if ($row == 1) {
                return true;
        }
        
        return false;
    }
}


/**  Define a Read Filter class implementing PHPExcel_Reader_IReadFilter  */
// class chunkReadFilter implements PHPExcel_Reader_IReadFilter
// {
//     private $_startRow = 0;     // 开始行
//     private $_endRow = 0;       // 结束行
    
    
//     // 定义了一个读去指定范围行的方法
//     public function setRows($startRow, $chunkSize) {
//         $this->_startRow = $startRow;
//         $this->_endRow       = $startRow + $chunkSize;
//     }
//     public function readCell($column, $row, $worksheetName = '') {
//         if (($row == 1) || ($row >= $this->_startRow && $row < $this->_endRow)) {
//             return true;
//         }
//         return false;
//     }
// }


class chunkReadFilter implements PHPExcel_Reader_IReadFilter
{
    private $_startRow = 0;     // 开始行
    private $_endRow = 0;       // 结束行
    public function __construct($startRow, $chunkSize) {    // 我们需要传递：开始行号&行跨度(来计算结束行号)
        $this->_startRow = $startRow;
        $this->_endRow       = $startRow + $chunkSize;
    }
    public function readCell($column, $row, $worksheetName = '') {
        if (($row == 1) || ($row >= $this->_startRow && $row < $this->_endRow)) {
            return true;
        }
        return false;
    }
} 



function load_large($filePath='',$sheet=0){
    $PHPReader=new PHPExcel_Reader_Excel2007;
    if(!$PHPReader->canRead($filePath)){
        $PHPReader = new PHPExcel_Reader_Excel5();
        if(!$PHPReader->canRead($filePath)){
            echo 'no Excel';
            return ;
        }
    }
    $PHPExcel = $PHPReader->load_large($filePath);        //建立excel对象
    $currentSheet = $PHPExcel->getSheet($sheet);        //**读取excel文件中的指定工作表*/
    $allColumn = $currentSheet->getHighestColumn();        //**取得最大的列号*/
    //lianggc 2016-10-08 修改 支持 Z以后的列数
    $allColumn= PHPExcel_Cell::columnIndexFromString($allColumn);//**取得最大的列号*/
    $allRow = $currentSheet->getHighestRow();        //**取得一共有多少行*/
    $data = array();
    for($rowIndex=1;$rowIndex<=$allRow;$rowIndex++){        //循环读取每个单元格的内容。注意行从1开始，列从A开始
        for($column=0;$column<$allColumn;$column++){
            //通过数字获取对应 列号
            $colIndex = PHPExcel_Cell::stringFromColumnIndex($column);
            $addr = $colIndex.$rowIndex;//对应下标
            $cell = $currentSheet->getCell($addr)->getValue();//获取对应值
            if($cell instanceof PHPExcel_RichText){ //富文本转换字符串
                $cell = $cell->__toString();
            }
            $data[$rowIndex][$colIndex] = $cell;
        }
    }
    return $data;
}


class DatabaseController extends Controller{
 
    
    /*
     * 数据库信息展示
     */
    public function database(Request $request){
        $databaseMsg = Kg_db::all();
        //dd($databaseMsg[0]);
        return view('database/list',compact('databaseMsg'));
    }
    /*
     * 数据库与数据源连接信息展示
     */
    public function datasource(Request $request){
        $datasourceMsg = Kg_datasrc::all();
        //dd($datasourceMsg);
        return view('datasource/list',compact('datasourceMsg'));
    }
    /*
     * 数据库信息添加界面
     */
    public function addDB(Request $request)
    {
        return view('database/new');
    }
    
    public function addDB_do(Request $request)
    {
//         dd($request);
        $button = $request->get("button");
        $name = $request->get("DBID");
        $type = $request->get("type");
        $IP = $request->get("IP");
        $port = $request->get("Port");
        $dbname = $request->get("DBname");
        $username = $request->get("UserName");
        $password = $request->get("Password");
        $descFile = $request->file('descdoc');
        //dd($button,$name,$type,$IP,$port,$dbname,$username,$password,$descFile);
        //数据库连接测试
        if($button == "test"){
            if($type == 1){
                try {
                    $pdo = new PDO(
                        'mysql:host='.$IP.';dbname='.$dbname.';port='.$port.';charset=utf8',
                        $username,
                        $password
                        );
                } catch (PDOException $ex) {
                    echo 'database connection failed';
                    exit();
            }
            echo '连接成功';
            }elseif ($type == 0){
                $test1 = $descFile->isValid();
                if ($test1 == true){
                    echo '连接成功';
                }else {
                    echo '连接失败';
                }
            }
        }
        
        //输入数据库信息
        if ($button =="save"){
            if ($type == 1){
  
                $typeName = "MySQL";
//             dd($descFile);
            //dd($name, $IP,$port,$dbname,$username,$password,$type);
            //$database123 = Kg_db::all();
            $database = new Kg_db();
            //dd($database,$database123);
            $database->dbname = $dbname;
            $database->name = $name;
            $database->type = $typeName;
            $database->IP = $IP;
            $database->port = $port;
            $database->username = $username;
            $database->password = $password;
            //dd($database);
            $databaseMsg = $database->save();
            //dd($database);
            }
            //提交Excel文件
            elseif ($type == 0){
            //dd($request);
            //$a = $request->get('descdoc');
            //$descFile = $request->file('descdoc');
            //dd($a,$descFile);
            $typeName = "xsl";
            $test = $descFile->isValid();
            $time = time();
            $fileName = $descFile->getClientOriginalName();
            $tempPath = '/exports/'.$time.'/';
            $descFile->move(storage_path().$tempPath,$fileName);
            //dd(storage_path().$tempPath);
           // dd( "__FILE__:  ========>  ".__FILE__);   
            $filePath = 'storage/exports/'.$time.'/'.iconv('GBK', 'UTF-8', $fileName);
//             echo $filePath;
            //dd($filePath);
//             $filePath111 = 'storage/exports/'.$time.'/'.iconv('GBK', 'UTF-8', $fileName);
            Excel::load($filePath, function($reader) {
                //dd($reader);
                $data = $reader->all();
            });

            $path = storage_path('exports\\'.$time.'\\'.$fileName);
            //dd($path);
            
            
            
            
            
            /**
             * 切片存储
             */
//             $objReader = PHPExcel_IOFactory::createReader('Excel5');
//             $chunkSize = 500;    // 定义每块读去的行数
            
            
//             // 就可在一个循环中，多次读去块，而不用一次性将整个Excel表读入到内存中
//             for ($startRow = 2; $startRow <= 10000; $startRow += $chunkSize) {
//                 $chunkFilter = new chunkReadFilter($startRow, $chunkSize);
//                 $objReader->setReadFilter($chunkFilter); // 设置实例化的过滤器对象
//                 try {
//                     $objPHPExcel = $objReader->load($path);
//                 } catch(PHPExcel_Reader_Exception $e) {
//                     die('Error loading file "'.pathinfo($path,PATHINFO_BASENAME).'": '.$e->getMessage());
//                 }  
//                 // 开始读取每行数据，并插入到数据库
//             }  
            
//             $objWorksheet = $objPHPExcel->getActiveSheet();
//             echo '<table>' . "\n";
//             foreach ($objWorksheet->getRowIterator() as $row) {
//                 echo '<tr>' . "\n";
                
//                 $cellIterator = $row->getCellIterator();
//                 $cellIterator->setIterateOnlyExistingCells(false); // This loops all cells,
//                 // even if it is not set.
//                 // By default, only cells
//                 // that are set will be
//                 // iterated.
//                 foreach ($cellIterator as $cell) {
//                     echo '<td>' . $cell->getValue() . '</td>' . "\n";
//                 }
                
//                 echo '</tr>' . "\n";
//             }
//             echo '</table>' . "\n";
//             dd(111);
            
            
            
            
            
            
            
            
            
            
            
            
            /**
             * 据说是第二种切片存储（没试1000的，10000的跑不通）
             */
            
//             $objReader = PHPExcel_IOFactory::createReader('Excel5');
//             $chunkSize = 100;    // 定义每块读去的行数
            
            
//             // 在循环外部，实例化过滤器类，而不用循环内每次实例化(应该更优化)
//             $chunkFilter = new chunkReadFilter();
//             $objReader->setReadFilter($chunkFilter);
//             for ($startRow = 2; $startRow <= 240; $startRow += $chunkSize) {
                
                
//                 // 循环内部，使用实例化的对象的方法，来调整读取的行范围即可
//                 $chunkFilter->setRows($startRow,$chunkSize);
//                 $objPHPExcel = $objReader->load($path);
//             }
            
            
//             $objWorksheet = $objPHPExcel->getActiveSheet();
//             echo '<table>' . "\n";
//             foreach ($objWorksheet->getRowIterator() as $row) {
//                 echo '<tr>' . "\n";
                
//                 $cellIterator = $row->getCellIterator();
//                 $cellIterator->setIterateOnlyExistingCells(false); // This loops all cells,
//                 // even if it is not set.
//                 // By default, only cells
//                 // that are set will be
//                 // iterated.
//                 foreach ($cellIterator as $cell) {
//                     echo '<td>' . $cell->getValue() . '</td>' . "\n";
//                 }
                
//                 echo '</tr>' . "\n";
//             }
//             echo '</table>' . "\n";
            
//             dd(111);
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
//             $objReader = new PHPExcel_Reader_Excel5();
//             $objReader->setReadFilter( new MyReadFilter() );
//             $objPHPExcel = $objReader->load($path);
//             //$sss = $objPHPExcel;
//             dd($objPHPExcel);
            
            /**
             * 得到表头
             */
//            $filterSubset = new HeadReadFilter();
//             $objReader = PHPExcel_IOFactory::createReader('Excel5');
//             $objReader->setReadFilter($filterSubset);        // 设置实例化的过滤器对象
//             $objPHPExcel = $objReader->load($path);  
            
//             $objWorksheet = $objPHPExcel->getActiveSheet();
            
//             $title;
//             foreach ($objWorksheet->getRowIterator() as $row) {
//                 $cellIterator = $row->getCellIterator();
//                 $cellIterator->setIterateOnlyExistingCells(false); // This loops all cells,
//                 foreach ($cellIterator as $cell) {
//                     $title =  $cell->getValue() ;
//                 }
//             } 
            
            //dd($objPHPExcel);
            
//             $objWorksheet = $objPHPExcel->getActiveSheet();
//             echo '<table>' . "\n";
//             foreach ($objWorksheet->getRowIterator() as $row) {
//                 echo '<tr>' . "\n";
                
//                 $cellIterator = $row->getCellIterator();
//                 $cellIterator->setIterateOnlyExistingCells(false); // This loops all cells,
//                 // even if it is not set.
//                 // By default, only cells
//                 // that are set will be
//                 // iterated.
//                 foreach ($cellIterator as $cell) {
//                     echo '<td>' . $cell->getValue() . '</td>' . "\n";
//                 }
                
//                 echo '</tr>' . "\n";
//             }
//             echo '</table>' . "\n";
            
//             dd(111);
            
            
//             $PHPReader=new PHPExcel_Reader_Excel2007;
//             if(!$PHPReader->canRead($path)){
//                 $PHPReader = new PHPExcel_Reader_Excel5();
//                 if(!$PHPReader->canRead($path)){
//                     echo 'no Excel';
//                     return ;
//                 }
//             }
//             $PHPExcel = $PHPReader->load($path);        //建立excel对象
//             $currentSheet = $PHPExcel->getSheet(0);        //**读取excel文件中的指定工作表*/
//             $allColumn = $currentSheet->getHighestColumn();        //**取得最大的列号*/
//             //lianggc 2016-10-08 修改 支持 Z以后的列数
//             $allColumn= PHPExcel_Cell::columnIndexFromString($allColumn);//**取得最大的列号*/
//             $allRow = $currentSheet->getHighestRow();        //**取得一共有多少行*/
//             $data = array();
//             for($rowIndex=1;$rowIndex<=$allRow;$rowIndex++){        //循环读取每个单元格的内容。注意行从1开始，列从A开始
//                 for($column=0;$column<$allColumn;$column++){
//                     //通过数字获取对应 列号
//                     $colIndex = PHPExcel_Cell::stringFromColumnIndex($column);
//                     $addr = $colIndex.$rowIndex;//对应下标
//                     $cell = $currentSheet->getCell($addr)->getValue();//获取对应值
//                     if($cell instanceof PHPExcel_RichText){ //富文本转换字符串
//                         $cell = $cell->__toString();
//                     }
//                     $data[$rowIndex][$colIndex] = $cell;
//                 }
//             }
//             dd($data);
            
            
//             $data = Excel::load($filePath, function ($reader) {}, 'GBK');
//             dd($data->getSheetCount());
            
//             if (!file_exists($path)) {
//                dd("fuck!");
//             }else{
//                 dd("nb!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!");
//             }
            
            
//             /**  Create a new Reader of the type defined in $inputFileType  **/
//             $objReader = \PHPExcel_IOFactory::createReader('Excel5');
            
            
//             /**  Define how many rows we want to read for each "chunk"  **/
//             $chunkSize = 1024;
//             /**  Create a new Instance of our Read Filter  **/
//             $chunkFilter = new chunkReadFilter();
            
//             /**  Tell the Reader that we want to use the Read Filter  **/
//             $objReader->setReadFilter($chunkFilter);
            
//             /**  Loop to read our worksheet in "chunk size" blocks  **/
//             for ($startRow = 2; $startRow <= 65536; $startRow += $chunkSize) {
//                 /**  Tell the Read Filter which rows we want this iteration  **/
//                 $chunkFilter->setRows($startRow,$chunkSize);
//                 /**  Load only the rows that match our filter  **/
//                 $objPHPExcel = $objReader->load($path);
//                 //    Do some processing here
//             }
            
//             dd($objPHPExcel);
            
//             $start = time();
//             set_time_limit(0);
            
//             $fp = fopen($filePath, 'w');
//             foreach (new \ArrayObject(DataChinaYearData::get()->toarray()) as $k => $v) {
//                 fputcsv($fp, $v);
//             }
//             fclose($fp);
//             $end = time();
//             $time = $end - $start;
//             echo $time . '秒';
            
//             dd(fputcsv);
            
            
            
            
            
            
            
            $database = new Kg_db();
            //dd($database);
            $database->name = $name;
            $database->type = $typeName;
            $database->dbname = $fileName;
            $database->IP = $tempPath;
            
            $databaseMsg = $database->save();
            }
        }
        return redirect()->action('DatabaseController@database');
    }
    
    //添加数据源信息
    public function add_dbSrc(Request $request){
        //dd($request);
        $databaseMsg = Kg_db::all();
        $name = Kg_db::select('name')->get();
        //dd($databaseMsg,$name);
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
            $data = Excel::load($filePath, function ($reader) {}, 'GBK');
            $tableName = $data->getSheetNames();
            $table_name;
            for($i=0;$i<count($tableName);$i++){
                $table_name[$i]['table_name'] = $tableName[$i];
                
            }
            echo json_encode($table_name);
        }else{//数据库文件
            $db_msg = Kg_db::select('IP','port','dbname','username','password')->where('name',$get_DBname)->get();
            //dd($db_msg[0]->IP);
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
            //echo 'success<br>';
            
            $sql = "SELECT table_name FROM information_schema.tables WHERE table_schema = '".$db_msg[0]->dbname."' AND table_type = 'base table'";
            //echo $db_msg[0]->dbname."<br>";
            //echo $sql;
            //$sql1 = 'SELECT * FROM itechs_kg_db';
            $statement = $pdo->prepare($sql);
            $statement->execute();
            
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            //dd($results);
            
            echo json_encode($results);
        }

    }
    
    //得到数据库表项(字段名称)
    public function getDBtableMsg(Request $request){
        //dd($request);
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
            $table_num;
            for($i=0;$i<count($tableName);$i++){
                if ($tableName[$i] == $table_name){
                    $table_num = $i;
                    break;
                }
            }
//             $data_standard = $data->get();
//             $sheet_selected = $data_standard[$table_num]->toArray();
//             $rowssss = $data->getSheet($table_num)->getCellByColumnAndRow(2, 1)->getValue();

            $index = 0;
            $table_head;
            while($data->getSheet($table_num)->getCellByColumnAndRow($index, 1)->getValue()){
                $table_head[$index] = $data->getSheet($table_num)->getCellByColumnAndRow($index, 1)->getValue();
                $index++;
            }
            //dd($table_head);

            echo json_encode($table_head);
            
            
//             dd($objWorksheet->getRowIterator());
//             //$objWorksheet = $data->getActiveSheet()->getDrawingCollection();
//             dd($sheet_selected);
            
//             dd(count($sheet_selected[0]));
//             for($j = 0; $j  <count($sheet_selected[0]); $j++){
//                 $sheet_selected[$j];
//             }
          
            
        }else{//数据库型
        
        $db_msg = Kg_db::select('IP','port','dbname','username','password')->where('name',$get_DBname)->get();
        //dd($db_msg[0]->IP);
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
        //echo 'success<br>';
        
        $sql = "select column_name, column_comment from information_schema.columns where table_schema ='".$db_msg[0]->dbname."' and table_name = '".$table_name."'";
        //echo $db_msg[0]->dbname."<br>";
        //echo $sql;
        //$sql1 = 'select column_name, column_comment from information_schema.columns where table_schema ='iscas_itechs_kg' and table_name = 'itechs_kg_db'';
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
        //dd($request);
        $DBSrcName = $request->DSname;
        $plevel = $request->plevel;
        $database = $request->database;
        $DBtable = $request->DBtable;
        $tablesource = $request->tablesource;
        $items = $request->items;
        $db_rules = $request->db_rules;

        if($tablesource == 1){
        //数据库名（实际）
        //$realDBname = Kg_db::select('dbname')->where('name',$database)->get();
        
        $db_msg = Kg_db::select('IP','port','dbname','username','password')->where('name',$database)->get();
        //dd($db_msg);
        
        
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
            //dd($data);
            $data_content = $data->get()->toArray();
            //dd($data_content);
            
            //得到sheet页号
            $tableName = $data->getSheetNames();
            $table_num;
            for($i=0;$i<count($tableName);$i++){
                if ($tableName[$i] == $DBtable){
                    $table_num = $i;
                    break;
                }
            }

            //dd($table_num);
            //选中的sheet表的内容
            $data_content_selected = $data_content[$table_num];
//             dd($data_content_selected,$data_content);
           
            $index = 0;
            $table_head;
            while($data->getSheet($table_num)->getCellByColumnAndRow($index, 1)->getValue()){
                $table_head[$index] = $data->getSheet($table_num)->getCellByColumnAndRow($index, 1)->getValue();
                $index++;
            }
            //dd($table_head);
            

            
            //要导入的数据库的内容
            $data_content_real ;
            if(isset($data_content_selected[1])){
                for($i = 0;$i<count($data_content_selected);$i++){
                    for($j = 0;$j<count($table_head);$j++){
                        if(isset($items[$j])){
                            $aaa = str_replace('（', '', $items[$j]);
                            $bbb = str_replace('）', '',$aaa);
                            $data_content_real[$i]["".$bbb] = $data_content_selected[$i]["".$bbb];
                            //$data_content_real[$i]["".$bbb] = $data_content[$i]["".$bbb];
                        }else{
                            continue;
                        }
                    }
                }
            }else{
                for($i = 0;$i<count($data_content);$i++){
                    for($j = 0;$j<count($table_head);$j++){
                        if(isset($items[$j])){
                            $aaa = str_replace('（', '', $items[$j]);
                            $bbb = str_replace('）', '',$aaa);
//                         $data_content_real[$i][$items[$j]] = $data_content_selected[$i][$items[$j]];
                            $data_content_real[$i]["".$bbb] = $data_content[$i]["".$bbb];
                        }else{
                            continue;
                        }
                    }
                }
            }
//             dd($data_content_real);
            
            //建立表结构
            $sql_create = "CREATE TABLE ".$DBtable."(`me_id` int(255) NOT NULL COMMENT '主键ID',";
            
            $index = 0;
            for($i = 0;$i<count($table_head);$i++){
                if(isset($items[$i])){
                    $sql_create = $sql_create."A".$index." varchar(255) COMMENT '".$items[$i]."',";
                        $index++;
                }else{
                    continue;
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
            //dd($results_create);
            
            
            //插入数据
            $index = 0;
            $sql_insert = "INSERT INTO ".$DBtable." (";
            for($i = 0;$i<count($table_head);$i++){
                if(isset($items[$i])){
                        $sql_insert = $sql_insert."A".$index.',';
                        $index++;
                }else {
                    continue;
                }
            }
            $sql_insert = substr($sql_insert, 0, -1);
            $sql_insert = $sql_insert.") VALUES ";
            for($i = 0;$i<count($data_content_real);$i++){

                    $sql_insert = $sql_insert."(";
                    for($j = 0;$j<count($table_head);$j++){
                        if(isset($items[$j])){
                            $aaa = str_replace('（', '', $items[$j]);
                            $bbb = str_replace('）', '',$aaa);
                            $sql_insert = $sql_insert."'".$data_content_real[$i][$bbb]."',";
                        }else{
                            continue;
                        }
                    }
                    $sql_insert = substr($sql_insert, 0, -1);
                    $sql_insert = $sql_insert."),";

            }
            $sql_insert = substr($sql_insert, 0, -1);
            //dd($sql_insert);
            
            
            $statement = $pdo_me->prepare($sql_insert);
            $statement->execute();
            $results_create = $statement->fetchAll(PDO::FETCH_ASSOC);
            
            //在datasrc表中插入与db关联记录
            $kg_datasrc =new Kg_datasrc();
            $kg_datasrc->dataSource = $DBSrcName;
            $kg_datasrc->dbname	 = $database;
            $kg_datasrc->plevel	 = $plevel;
            $kg_datasrc->type	 = $tablesource;
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
        //dd($results);
        
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
        //dd($sql);
        
        //$sql = 'SELECT * FROM '.$realDBname.'';
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
        //dd($results_create);
        
        
        //插入数据
        $sql_insert = "INSERT INTO ".$DBtable." (";
        for($i = 0;$i<count($table_head);$i++){
            if(isset($items[$i])){
                $sql_insert = $sql_insert.$items[$i].',';
            }else {
                continue;
            }
        }
        //dd($sql_insert);
        $sql_insert = substr($sql_insert, 0, -1);
        $sql_insert = $sql_insert.") VALUES ";
        //dd($sql_insert);
        for($i = 0;$i<count($results);$i++){
            $sql_insert = $sql_insert."(";
            for($j = 0;$j<count($table_head);$j++){
                if(isset($items[$j])){
                    $sql_insert = $sql_insert."'".$results[$i][$items[$j]]."',";
                }else {
                    continue;
                }
                
            }
            $sql_insert = substr($sql_insert, 0, -1);
            $sql_insert = $sql_insert."),";
            
        }
        $sql_insert = substr($sql_insert, 0, -1);
        //dd($sql_insert);
        $statement = $pdo_me->prepare($sql_insert);
        $statement->execute();
        $results_create = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        //在datasrc表中插入与db关联记录
        $kg_datasrc =new Kg_datasrc();
        $kg_datasrc->dataSource = $DBSrcName;
        $kg_datasrc->dbname	 = $database;
        $kg_datasrc->plevel	 = $plevel;
        $kg_datasrc->type	 = $tablesource;
        $kg_datasrc_save = $kg_datasrc->save();
    
        }
        }elseif ($tablesource == 2){
            /**
             * 多表
             */
            
            //得到所选外部数据库的配置
            $db_msg = Kg_db::select('IP','port','dbname','username','password')->where('name',$database)->get();
            
            
            if ($a!=false or $b!=false){//Excel文件 
                dd("excel文件");
                
            }else {//外部数据库文件
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
                
                
                $statement = $pdo_me->prepare($db_rules);
                $statement->execute();
                $results_create = $statement->fetchAll(PDO::FETCH_ASSOC);
                
                
                
            }
            
            
        }
        return redirect()->action('DatabaseController@datasource');
    }

    
    
}