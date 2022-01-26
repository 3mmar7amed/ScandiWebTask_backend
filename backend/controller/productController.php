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
        $search = $_GET['search'] ?? '' ;
        $products = $product->getProduct($search) ;
        $response ['status_code_header'] = 'HTTP/1.1 200 OK' ;
        $response['body'] = json_encode($products) ;
        echo $response['body'];

    }

    public function setProducts() {
        $product = new products() ;
        $requestData = json_decode(file_get_contents('php://input'), true);
        $product->setProducts($requestData);
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = null;
        echo $response['body'];
   }

   public function deleteProducts() {
       $requestData = json_decode(file_get_contents('php://input'), true);
       $product = new products() ;
       $arr = $requestData['IDsArray'];
       foreach ($arr as $id) {
           $product->deleteProduct($id) ;
       }
       $response['status_code_header'] = 'HTTP/1.1 200 OK';
       $response['body'] = null;
       echo $response['body'] ;
   }
}