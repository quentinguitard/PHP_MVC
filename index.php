<?php
var_dump($_POST);
var_dump($_SERVER);

define('BASE_URI', str_replace('\\','/', substr(__DIR__,strlen($_SERVER['DOCUMENT_ROOT']))));
require_once(implode(DIRECTORY_SEPARATOR, ['Core','autoload.php']));

$app = new Core\Core();
$app->run();
?>