<?php

require_once '../vendor/autoload.php';

use app\api\Router;
use app\backend\controller\productController;
include_once "Router.php" ;
$router = new Router() ;


$router->get('/', [productController::class, 'getProducts'] );
$router->get('/products', [productController::class, 'getProducts']);
$router->post('/addproduct', [productController::class, 'setProducts']);
$router->delete('/Delete', [productController::class, 'deleteProducts']);



$router->resolve();