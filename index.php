<?php

require_once 'vendor/autoload.php';

use app\api\Router;
use app\backend\controller\productController;
include_once "api/Router.php";
$router = new Router() ;


$router->get('/', [new productController(), 'getProducts'] );
$router->get('/products', [new productController(), 'getProducts']);
$router->post('/addproduct', [productController::class, 'setProducts']);
$router->delete('/Delete', [productController::class, 'deleteProducts']);



$router->resolve();