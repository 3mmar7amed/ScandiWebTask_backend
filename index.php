<?php

require_once 'vendor/autoload.php';

use app\api\Router;
use app\backend\controller\productController;
include_once "api/Router.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST , GET , DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers , Content-Type , Access-Control-Allow-Methods , X-Requested-with');

$router = new Router() ;


$router->get('/', [new productController(), 'getProducts'] );
$router->get('/products', [new productController(), 'getProducts']);
$router->delete('/addProduct', [new productController(), 'setProducts']);
$router->delete('/Delete', [new productController(), 'deleteProducts']);

$router->resolve();