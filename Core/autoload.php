<?php

spl_autoload_register(function ($class) {
    //var_dump($class);
    if(file_exists('src'.DIRECTORY_SEPARATOR. $class . '.php')){
        require_once 'src'.DIRECTORY_SEPARATOR. $class . '.php';  
    }

    else {
        require_once $class . '.php';
    }
});

?>