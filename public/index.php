<?php
header("Content-Type: text/html;charset=utf-8");
include __DIR__ . '/../config/cfg_main.php';
include ENGINE_DIR . 'ngn_autoload.php';

session_start();

if (!$path = preg_replace(['#^/#', '#[?].*#'],"", $_SERVER['REQUEST_URI'])) {
    $path = 'invoices';
}

$parts = explode('/', $path);
$controller = $parts[0];
$action = $parts[1] ?? 'index';

$pageName = PAGES_DIR . $controller . DS . $action . '.php';

if (file_exists($pageName)) {
    include $pageName;
} else {
    echo 'Такой страницы не существует. 404 error.';
}