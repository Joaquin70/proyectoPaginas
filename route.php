<?php
require_once "controller/PageController.php";
require_once "controller/ProductController.php";
require_once "controller/CategoryController.php";


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if(!empty($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'home';

$params = explode('/', $action);
$page = new PageController();
$productController = new ProductController();
$categoryController = new CategoryController();

switch ($params[0]) {
    case 'home':
        $page->showHome();
    }
