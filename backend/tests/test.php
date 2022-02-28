<?php declare(strict_types=1);

use app\backend\model\BookProduct;
use app\backend\model\DVDProduct;
use app\backend\model\FurnitureProduct;
use app\backend\model\Product;
use PHPUnit\Framework\TestCase;
class test extends TestCase
{
    public string $name ;
    public float $price ;
    public string $SKU ;
    public string $Type ;
    public string $dimension ;
    public function testSetBookProduct(): void
    {
        $this->name = "Test001" ;
        $this->SKU = "Test001" ;
        $this->price = 100.00 ;
        $this->Type = "Book" ;
        $this->dimension = "100KG" ;
        $BookProduct = new BookProduct() ;
        $this->extracted($BookProduct);

    }
    public function testSetDVDProduct(): void
    {
        $this->name = "Test002" ;
        $this->SKU = "Test002" ;
        $this->price = 200.00 ;
        $this->Type = "DVD" ;
        $this->dimension = "200MB" ;
        $DVDProduct = new DVDProduct() ;
        $this->extracted($DVDProduct);

    }
    public function testSetFurnitureProduct(): void
    {
        $this->name = "Test003" ;
        $this->SKU = "Test003" ;
        $this->price = 300.00 ;
        $this->Type = "Furniture" ;
        $this->dimension = "2x2x2" ;
        $FurnitureProduct = new FurnitureProduct() ;
        $this->extracted($FurnitureProduct);

    }

    /**
     * @param Product $PRODUCT
     *
     * @return void
     */
    public function extracted(Product $PRODUCT): void
    {
        $product['Type'] = $this->Type;
        $product['Name'] = $this->name;
        $product['SKU'] = $this->SKU;
        $product['Price'] = $this->price;
        $product['dimension'] = $this->dimension;
        $PRODUCT->setProducts($product);
        $LastProductCreated = $PRODUCT->db->getTheLastRecord()[0];
        var_dump($LastProductCreated);
        $this->assertEquals($product['Name'], $LastProductCreated['name']
        );
        $this->assertEquals($product['Type'], $LastProductCreated['type']
        );
        $this->assertEquals($product['SKU'], $LastProductCreated['SKU']
        );
        $this->assertEquals($product['Price'], $LastProductCreated['price']
        );
        $this->assertEquals($product['dimension'], $LastProductCreated['dimension']
        );
    }

}