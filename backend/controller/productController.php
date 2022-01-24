<?php
namespace app\backend\controller ;
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST,GET,DELETE');
header('Access-Control-Allow-Headers:Lang ,  Access-Control-Allow-Headers , Content-Type , Access-Control-Allow-Methods , X-Requested-with');


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

        $requestData = json_decode(file_get_contents('php://input'), true);
        $product = new products() ;
        $product->setProducts($requestData);
        $response ['status'] = '200 OK' ;
        echo $response['status'];
   }

   public function deleteProducts() {
       $requestData = json_decode(file_get_contents('php://input'), true);
       $product = new products() ;
       $arr = $requestData['IDsArray'];
       foreach ($arr as $id) {
           $product->deleteProduct($id) ;
       }


   }
}