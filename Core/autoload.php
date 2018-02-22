<?php
spl_autoload_register(function ($class) {
    var_dump($class);
    if(file_exists('src/Controller/' . $class . '.php')){
        require_once "src/Controller/" . $class . '.php';  
    }
    elseif(file_exists('src/Model/' . $class . '.php')){
        require_once "src/Model/" . $class . '.php';  
    }
    else {
        require_once $class . '.php';
    }
});

?>