<?php

require_once 'vendor/autoload.php';

use app\api\Router;
use app\backend\controller\productController;
include_once "api/Router.php";
$router = new Router() ;

var_dump($_SERVER) ; 
$router->get('/', [new productController(), 'getProducts'] );
$router->get('/products', [new productController(), 'getProducts']);
$router->get('/tryit', [new productController(), 'try']);
$router->post('/addproduct', [new productController(), 'setProducts']);
$router->delete('/Delete', [new productController(), 'deleteProducts']);


$router->resolve();