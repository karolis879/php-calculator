<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className)
{
    $url = $_SERVER['HTTP_POST'] . $_SERVER['REQUEST_URI'];

    if (strpos($url, 'includes') !== false) {

        $path = '../classes/';
    } else {
        $path = 'classes/';
    }
    $extension = '.class.php';
    $fullPath = $path . $className . $extension;

    if (!file_exists($fullPath)) {
        return false;
    }

    require_once $fullPath;
}
