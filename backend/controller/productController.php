<?php
namespace app\backend\controller ;

use app\api\Router;
use app\backend\model\Product;
use app\backend\model\products;

class productController
{

    public function getProducts()
    {
        $product = new products() ;
        $response = $product->getProduct() ;
        header($response['status_code_header']);
        echo $response['body'];

    }

    public function setProducts() {
        $product = new products() ;
        $requestData = (array) json_decode(file_get_contents('php://input'), true);
        $response = $product->setProducts($requestData) ;
        header($response['status_code_header']);
        echo $response['body'] ;

   }

   public function deleteProducts() {
       $product = new products() ;
       $IDsArray =(array) json_decode(file_get_contents('php://input'), true);
       $response = $product->deleteProduct($IDsArray) ;
       header($response['status_code_header']);
       echo $response['body'] ;
   }

}