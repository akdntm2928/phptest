<?php
spl_autoload_register(function($path){
    // 첫번째인자로 호출하는 해당클래스에 이름을 주도록 약속되있음  
    $path=$path.'.php';
    $path= str_replace("\\",'/',$path);
    print("path: {$path}");
    require_once $path;
});
?>