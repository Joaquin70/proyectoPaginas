<?php
require_once('Router.php');
require_once('api/ApiController.php');
require_once('api/ProductApiController.php');

// CONSTANTES DEL RUTEO
define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

$router = new Router();

//RUTAS
$router->addRoute("/products",  "GET",     "ProductsApiController",  "getProducts");
$router->addRoute("/products/:ID",  "GET",     "ProductsApiController",  "getProducts");
$router->addRoute("/products/:ID",  "DELETE",  "ProductsApiController",  "deleteProduct");
$router->addRoute("/products",      "POST",    "ProductsApiController",  "addProduct");
//$router->addRoute("/pass",      "GET",    "PassApiController",  "getPassword");
//$router->addRoute("/pass/:ID",      "GET",    "PassApiController",  "getPassId");

//RUN
$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
