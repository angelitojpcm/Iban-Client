<?php

$route = !empty($_GET['route']) ? $_GET['route'] : 'Home/index';
$array = explode('/', $route);
$controller = $array[0];
$method = isset($array[1]) && !empty($array[1]) ? $array[1] : 'index';
$param = "";

if (isset($array[2]) && !empty($array[2])) {
    for ($i = 2; $i < count($array); $i++) {
        $param .= $array[$i] . ",";
    }
    $param = trim($param, ",");
}

require_once "core/Autoload.php";
require_once "config/variables.php";

$dirController = "controllers/" . $controller . ".php";
if (file_exists($dirController)) {
    require_once($dirController);
    $controller = new $controller();
    if (method_exists($controller, $method)) {
        $controller->$method($param);
    } else {
        echo "Method not found";
    }
} else {
    echo "Controller not found";
}