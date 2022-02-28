<?php declare(strict_types=1);

use app\backend\model\BookProduct;
use PHPUnit\Framework\TestCase;
class test extends TestCase
{

    public function testSetBookProduct(): void
    {
        $BookProduct = new BookProduct() ;
        $product['Type'] = "Book" ;
        $product['Name'] = "Test001" ;
        $product['SKU'] = "Test001";
        $product['Price'] = 100 ;
        $product['dimension'] = "100KG" ;
        $jsonProduct = json_encode($product);
        $BookProduct->setProducts($product) ;
        $LastProductCreated = $BookProduct->db->getTheLastRecord() ;
        $jsonProductCreated = json_encode($LastProductCreated) ;
        $this->assertEquals($jsonProduct ,$jsonProductCreated

        );

    }


    private function getTheLastRecord($product) {



    }




}