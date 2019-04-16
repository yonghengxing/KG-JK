<?php

return [
    //csv文件导入的数据库名称
    'database' => 'iscas_itechs_dbout',
    //实例化schema数据需要csv文件存放地址
    'filePathLinux' => '/home/fengbs/tigergraph/loadingData/',
    //windwons下测试
	//'filePathLinux' => 'E:/logs/',
    'run_command_dbout' => "http://192.168.15.62:5000/run_command_dbout",

    'run_command' => "http://192.168.15.62:5000/run_command",

    'run_command_load' => "http://192.168.15.62:5000/run_command_load",
    // PDO配置
    'PDO' =>[
        'url'=>'mysql:host=127.0.0.1;dbname=iscas_itechs_dbout;port=3306;charset=utf8',
        'username'=>'root',
        'psw'=>''
    ],
    //默认形成的逐渐名称
    'defaultKeyId' => 'me_id',// 外部数据excel文件导入时自动生成的主键名称

    //定义的schema,关系形成json文件地址
    'jsonPath' => "/home/fengbs/KGdata/my.json",
    'statusFilePath' => "/home/fengbs/KGdata/status.txt",
	 //windwons下测试
    //'jsonPath' => "E:/logs/my.json",
    
    //状态全局变量
    'dbsource_status'=>"0001",
    
];

