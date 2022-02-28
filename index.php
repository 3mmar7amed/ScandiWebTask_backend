<?php

require_once 'vendor/autoload.php';

use app\api\Router;
use app\backend\controller\productController;
include_once "api/Router.php";

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
header('Content-Type: application/json');
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "OPTIONS") {
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization");
    header("HTTP/1.1 200 OK");
    die();
}
$router = new Router() ;


$router->get('/', [new productController(), 'getProducts'] );
$router->get('/products', [new productController(), 'getProducts']);
$router->post('/create', [new productController(), 'setProducts']);
$router->delete('/Delete', [new productController(), 'deleteProducts']);

$router->resolve();