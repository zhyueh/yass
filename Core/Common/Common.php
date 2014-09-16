<?php

function l($level,$msg){
    Log::write_log($level,$msg);
}

function e($msg){
    Log::echo_log($msg);
}

function vd($var){
    e(var_export($var));
}


function import_class($path){
    $real_path = $path . CLASS_FILE_EXT;
    if(file_exists($real_path)){
        require($real_path);
    }
    else{
        l(ERROR,"can not import class at ".$PATH);
    }
}
