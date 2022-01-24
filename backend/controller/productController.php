<?php
namespace app\backend\controller ;

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods:POST , GET , DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers , Content-Type , Access-Control-Allow-Methods , X-Requested-with');


use app\api\Router;
use app\backend\model\products;

class productController
{
    
    public function getProducts()
    {
        // this for opening the connections with database
        
        $product = new products() ;
        $search = $_GET['search'] ?? '' ;
        $products = $product->getProduct($search) ;
        $response ['status_code_header'] = 'HTTP/1.1 200 OK' ;
        $response['body'] = json_encode($products) ;
        echo $response['body'];

    }

    public function try() {
        var_dump($_SERVER) ; 
    }

    public function setProducts() {
        $requestData = json_decode(file_get_contents('php://input'), true);
        $product = new products() ;
        $product->setProducts($requestData);
        var_dump(json_encode($requestData));
   }

   public function deleteProducts() {
       $requestData = json_decode(file_get_contents('php://input'), true);
       $product = new products() ;
       var_dump($requestData);
       $arr = $requestData['IDsArray'];
       foreach ($arr as $id) {
           $product->deleteProduct($id) ;
       }

   }
}