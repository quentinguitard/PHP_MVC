<?php
namespace Core;

class Core {
    public function run(){
        $uri = str_replace(BASE_URI, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $uri = trim($uri, '/');

        $routes = Router::get($uri);
        $controllerName = "Controller". DIRECTORY_SEPARATOR . $routes['controller'];

        $runRoutes = new  $controllerName;
        $runRoutes->{$routes['action']}();
    }
}