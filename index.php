<?php
var_dump($_POST);
var_dump($_SERVER);

define('BASE_URI', str_replace('\\','/', substr(__DIR__,strlen($_SERVER['DOCUMENT_ROOT']))));
require_once(implode(DIRECTORY_SEPARATOR, ['Core','autoload.php']));

$uri = str_replace(BASE_URI, '', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$uri = trim($uri, '/');

$app = new Core\Core();

var_dump($app->run('Router', 'get', $uri));