<?php
namespace Core;

class Core {
    public function run($controller, $action, $params = null){
        $obj = new $controller;
        return $obj->{$action}($params);
    }
}