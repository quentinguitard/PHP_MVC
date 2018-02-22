<?php

var_dump($_SERVER);

define('BASE_URI', str_replace('\\','/', substr(__DIR__,strlen($_SERVER['DOCUMENT_ROOT']))));
require_once(implode(DIRECTORY_SEPARATOR, ['Core','autoload.php']));

$uri = str_replace(BASE_URI, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uri = trim($uri, '/');

$app = new Core\Core();

$routes = $app->run('Router', 'get', $uri);

var_dump($routes);

$runRoutes = new $routes['controller'];
$runRoutes->{$routes['action']}();




