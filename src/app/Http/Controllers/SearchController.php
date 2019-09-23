<?php

namespace App\Http\Controllers;

use PDO;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use PhpAnalysis;
use App\Services\SchemaService;

class SearchController extends BaseController
{
    
    function __construct(SchemaService $schemaService)
    {
        $this->middleware('auth');
        $this->schemaService = $schemaService;
    }
    
    public function getNeedBetween($kw1,$mark1,$mark2){
        $kw=$kw1;        

        $st =stripos($kw1,$mark1);

        $ed =stripos($kw1,$mark2);
        
//         dd($st,$ed);
        if(($st==false||$ed==false)||$st>=$ed)
            return 0;
        else
        {
            $kw=mb_substr($kw,($st-1)/4,($ed-$st-1)/4);
//             dd($kw);
            return $kw;
        }

    }
    
    public function cutDict($kw1){        
        
        $do_fork = $do_unit = true;
        $do_multi = $do_prop = $pri_dict = false;
        $okresult = null;
        if($kw1 != '')
        {
            //岐义处理
            $do_fork = empty($_POST['do_fork']) ? false : true;
            //新词识别
            $do_unit = empty($_POST['do_unit']) ? false : true;
            //多元切分
            $do_multi = empty($_POST['do_multi']) ? false : true;
            //词性标注
            $do_prop = empty($_POST['do_prop']) ? false : true;
            //是否预载全部词条
            $pri_dict = empty($_POST['pri_dict']) ? false : true;
            
            $tall = microtime(true);
            
            //初始化类
            PhpAnalysis::$loadInit = false;
            $pa = new PhpAnalysis('utf-8', 'utf-8', $pri_dict);

            //载入词典
            $pa->LoadDict();

            //执行分词
            $pa->SetSource($kw1);
            $pa->differMax = $do_multi;
            $pa->unitWord = $do_unit;
            
            $pa->StartAnalysis( $do_fork );
            
            $okresult = $pa->GetFinallyResult(' ', $do_prop);
            
            $pa_foundWordStr = $pa->foundWordStr;
            
            $slen = strlen($kw1);
            $slen = sprintf('%0.2f', $slen/1024);
            
            $pa = '';
            
        }
        return $okresult;
    }
    
    public function search(Request $request)
    {
        $question = $request->input('question');
        $value = $request->get('questionType'); //区分问题选项
//         dd($question, $value);
        if($question!=null && $value!=null)
        {
//                     dd($question, $value);
            $result=$this->smartSearch($question, $value);
        }

        return view('search/show',compact('result','question','value'));  

    }
    
    public function smartSearch($questionstr, $valuestr)
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
        $question = $questionstr;
        $value = $valuestr;
        $result = "无法获取查询结果";
        
        if($value == 0)
        {
            //查找某机构里国籍是指定国家的发明人
            $state = $this->cutDict($question);

            $arrRow = explode(" ", $state);
            if($arrRow[1] != null)
            {
                $i = 0;
                $flag = 0;
                while ($arrRow[$i]!="中国籍")
                {
                    $i++;
                    $flag = $i;
                    continue;
                }
                //获取国籍
                $state = $arrRow[$flag+2];
                //获取机构
                $j = 2;
                $organ = null;
                while($flag>2)
                {
                    $organ .= $arrRow[$j];
                    $j++;
                    $flag--;
                }
                
                //得到表中内容
                $sql = 'SELECT famingren_kg FROM sheet1 WHERE shenqingren_kg="'.$organ.'" AND shenqingrenguobiedaima_kg="'.$state.'"';
                $statement = $pdo_dbout->prepare($sql);
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//                 return $result;
            }
        }
        elseif($value == 1)
        {
            //查找为多家不同机构申请过专利的发明人
            $state = $this->cutDict($question);            
            $arrRow = explode(" ", $state);
//             dd($arrRow[3]);
            $sql = 'SELECT famingren_kg,Count(distinct shenqingren_kg) FROM sheet1 WHERE shenqingrenleixing_kg<>"个人" GROUP BY famingren_kg' ;
//             dd($sql);
            $statement = $pdo_dbout->prepare($sql);
            $statement->execute();
            $resultstr = $statement->fetchAll(PDO::FETCH_ASSOC);
//             dd($resultstr);
            $arr = array();
            foreach ($resultstr as $results)
            {
                if($results["Count(distinct shenqingren_kg)"] >= $arrRow[3])
                {   
                    $arr[] = $results;

                }
            }
            $result = $arr;
        }
        elseif($value == 2)
        {
            //专利申请数量排名前几位的机构有哪些
            $state = $this->cutDict($question);
            $arrRow = explode(" ", $state);
            $sql = "SELECT shenqingren_kg,Count(*) FROM sheet1 WHERE shenqingrenleixing_kg<>'个人' GROUP BY shenqingren_kg order by Count(*) desc LIMIT 0,".$arrRow[5];
            $statement = $pdo_dbout->prepare($sql);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return $result;             
    }

}