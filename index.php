<?php
session_start();
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/helpers.php';

$route = $_GET['route'] ?? 'home';
$routes = [
    'home' => ['PageController','home'],
    'gallery' => ['GalleryController','index'],
    'upload' => ['GalleryController','upload'],
    'contact' => ['ContactController','index'],
    'contact_save' => ['ContactController','save'],
    'messages' => ['ContactController','messages'],
    'login' => ['AuthController','login'],
    'do_login' => ['AuthController','doLogin'],
    'register' => ['AuthController','register'],
    'do_register' => ['AuthController','doRegister'],
    'logout' => ['AuthController','logout'],
    'crud' => ['CafeController','index'],
    'cafe_create' => ['CafeController','create'],
    'cafe_store' => ['CafeController','store'],
    'cafe_edit' => ['CafeController','edit'],
    'cafe_update' => ['CafeController','update'],
    'cafe_delete' => ['CafeController','delete'],
];
if (!isset($routes[$route])) { http_response_code(404); $route = 'home'; }
[$controller, $method] = $routes[$route];
require_once __DIR__ . "/app/controllers/$controller.php";
(new $controller())->$method();
