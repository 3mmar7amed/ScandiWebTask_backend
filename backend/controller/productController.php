<?php
namespace app\backend\controller ;


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Access-Control-Allow-Methods, Authorization, X-Requested-With");

use app\api\Router;
use app\backend\model\products;

class productController
{
    
    public function getProducts()
    {
        $product = new products() ;
        $products = $product->getProduct() ;
        $response['body'] = json_encode($products) ;
        echo $response['body'];

    }

    public function setProducts() {
        $product = new products() ;
        $requestData = (array) json_decode(file_get_contents('php://input'), true);
        $response['body'] = json_encode ($product->setProducts($requestData) );
        echo $response['body'] ;

   }

   public function deleteProducts() {
       $IDsArray =(array) json_decode(file_get_contents('php://input'), true);
       $product = new products() ;
       $response['body'] = json_encode ($product->deleteProduct($IDsArray) ) ;
       echo $response['body'] ;

   }

}