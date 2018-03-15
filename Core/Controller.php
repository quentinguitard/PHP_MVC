<?php
namespace Core;
use \Core\TemplateEngine;
class Controller {

    private static $_render;
    public $request;
    public $params;

    public function __construct(){
        $this->request = new Request();
        $this->params = get_object_vars($this->request);
    }

    protected function render($view, $scope = []){
        extract($scope);
        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'Storage', str_replace('Controller', '', basename(get_class($this))), $view]) . '.php';
        
        //var_dump($f);
        if(file_exists($f)){
            $parse = new TemplateEngine($f);
            $view = $parse->parse();
            ob_start();
            include($f);
            $view = ob_get_clean();
            ob_start();
            include(implode(DIRECTORY_SEPARATOR,[dirname(__DIR__), 'src', 'Storage','index']).'.php');
            self::$_render = ob_get_clean();
        }
    }

    public function __destruct(){
        echo self::$_render;
    }

}