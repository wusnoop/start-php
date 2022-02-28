<?
$dt = date('d-m-Y H-i-s');
$page = $_SERVER['REQUEST_URI'];
$ref = $_SERVER['HTTP_REFERER'];
$path = ($dt|$page|$ref);
file_put_contents("path.log", PHP_EOL.$path, FILE_APPEND);