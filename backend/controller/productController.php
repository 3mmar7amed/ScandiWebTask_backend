<?php
namespace app\backend\controller ;

use app\api\Router;
use app\backend\model\Product;
use app\backend\model\products;

class productController
{
    public Product $product ;

    public function getProducts()
    {
        $response = $this->product->getProduct() ;
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
       $IDsArray =(array) json_decode(file_get_contents('php://input'), true);
       $response = $this->product->deleteProduct($IDsArray) ;
       header($response['status_code_header']);
       echo $response['body'] ;
   }

}