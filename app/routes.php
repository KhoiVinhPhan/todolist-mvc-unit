<?php
$controllers = array(
    'Todo' => ['index', 'edit', 'delete', 'add', 'store', 'update']
);

if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
    $controller = 'Todo';
    $action = 'error';
}

include_once('controllers/' . $controller . 'Controller.php');

$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();