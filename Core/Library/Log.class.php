<?php

class Log{
    private static $log_level_index = 0;
    private static $log_type = 0;
    private static $log_path = '';
    private static $log_range = array();

    public static function init($range,$level,$type,$path = ''){
        self::$log_range = $range;
        self::$log_level_index = self::level_index($level);
        self::$log_type = $type;
        self::$log_path = $path;
    }

    private static function level_index($level){
        return self::$log_range[$level];
    }

    public static function write_log($level,$msg){

        if(self::level_index($level) >= self::$log_level_index){

            $now = date("[c]");
            $msg = "{$now} {$level} : {$msg}\n";
            self::do_log($msg);
        }

    }

    public static function echo_log($msg){
        echo $msg."</br>";
    }

    private static function do_log($msg){
        if (self::$log_type == 'LOG_TYPE_FILE'){
            self::do_file_log($msg);
        }

    }

    private static function do_file_log($msg){
        file_put_contents(self::$log_path,$msg,FILE_APPEND);
    }
}
