<?php

class Config{
    private static $c;
    public static function init(){
        self::$c = array();
    }

    public static function set($k,$v){
        self::$c[$k] = $v;
    }

    public static function get($k){
        return self::$c[$k];
    }

}
