<?php
//Главный файл, на который происходит редирект с помощью файла .htaccess.
require 'application/lib/Dev.php';
// Class
require 'application/class/Autorization.php';


// Core
use application\core\Router;
//Подключаем файлы для отображения.
spl_autoload_register(function($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {
        require $path;
    }
});
//запускаем сессию
session_start();

//запускаем роутер
$router = new Router;
$router->run();

?>