<?php

class Main{
    public static function init(){
        self::init_environment();
        self::init_config();

        self::init_core();
        self::take_action();
        e("welcome to yass");
    }

    public static function init_environment(){
        define('CORE_PATH',__dir__);
        define('ROOT_PATH',dirname(CORE_PATH));
        define('APP_PATH',ROOT_PATH."/Application");
        define('LIB_PATH',CORE_PATH . "/Library");


        define('CLASS_FILE_EXT',".class.php");


        require(CORE_PATH . "/Conf/Config" . CLASS_FILE_EXT);
        require(CORE_PATH . "/Library/Log" . CLASS_FILE_EXT);
        require(CORE_PATH . "/Common/Common.php");

    }

    public static function init_config(){
        $array = include CORE_PATH . "/Conf/Config.php";

        Config::init();
        foreach($array as $k=>$v){
            Config::set($k,$v);
        }
    }


    public static function init_core(){

        Log::init(
            Config::get('log_range'),
            Config::get('log_level'),
            Config::get('log_type'),
            Config::get('log_path'));

        import_class(LIB_PATH . "/Controller");
        import_class(LIB_PATH . "/Model");
        import_class(LIB_PATH . "/View");

    }

    public static function take_action(){
        $uri = $_SERVER['REQUEST_URI'];
        vd( $uri );

        $com = explode("?",$uri);
        if (sizeof($com) > 0){
            if(($paths = explode("/",$com[0])) && sizeof($paths) > 2){
                vd($paths);
                $controller = $paths[sizeof($paths) -2];
                $action = $paths[sizeof($paths) -1 ];
                e( __function__);
                l('LOG_INFO', "take action $controller : $action");

                $real_controller = ucwords($controller);
                import_class(APP_PATH."/Controller/".$real_controller);

                if(class_exists($real_controller)){
                    $c = new $real_controller();
                    $c->$action();
                    l('LOG_INFO',"complete action $controller:$action");
                }
                else{
                    l('LOG_WARNING',"no class exists :$real_controller");
                }
            }
            else{
                l('LOG_NOTICE', "invalid uri:$uri");
            }
        }
    }
}

