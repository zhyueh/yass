<?php

return array(
    'default_timezone' => 'PRC',

    'db' => array(
        'default' => array(
            'db_type' => 'mysql',
            'db_host' => '127.0.0.1',
            'db_user' => 'root',
            'db_pwd' => 'root',
            'db_name' => 'yass',
            'db_charset' => 'utf8',
            'db_pconnec' => 1
        )
    ),


    'log_range' => array(
        'LOG_INFO' => 0,
        'LOG_NOTICE' => 1,
        'LOG_WARNINGS' => 2,
        'LOG_ERROR' => 3,
        'LOG_CRITICAL' => 4
    ),
    'log_level' => 'LOG_INFO',
    //0 => /dev/null
    //1 => file : log_path
    'log_type' => 'LOG_TYPE_FILE',
    'log_path' => '/tmp/yass.log',

    'baseurl' => 'http://'.$_SERVER['HTTP_HOST'].'/index.php',
);
