<?php

//spl_autoload_register(function($className) {
//
//    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
//    include_once $_SERVER['DOCUMENT_ROOT'] . '/' . $className . '.php';
//
//});
spl_autoload_register(function($className) {
    $file = __DIR__ . '\\' . $className . '.php';
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
    if (file_exists($file)) {
        include $file;
    }
//    $filename = __DIR__  . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
//    include($filename);
});
//
//class Autoloader
//{
//    public static function register()
//    {
//        spl_autoload_register(function ($class) {
//            $file = str_replace('\\', DIRECTORY_SEPARATOR, $class).'.php';
//            if (file_exists($file)) {
//                include $file;
//                return true;
//            }
//            return false;
//        });
//    }
//}
//Autoloader::register();
