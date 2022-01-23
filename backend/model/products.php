<?php

namespace app\backend\model;
use app\backend\Database;

class products
{
    public ?string $id = null ;
    public ?string $SKU = null ;
    public ?string $name = null ;
    public ?string $type = null ;
    public ?float $price = null ;
    public ?string $dimension = null ;


    private $db  ;

    public function __construct()
    {
        $this->db = new Database() ;
    }

    public function getProduct($search) {

        return $this->db->getProducts($search);
    }

    public function setProducts($product){
        $this->name = $product['Name'] ;
        $this->SKU = $product['SKU'];
        $this->type = $product['Type'] ;
        $this->price = $product['Price'] ;
        $this->dimension = $product['dimension'] ;
        $this->db->createProduct($this);
    }
    public function deleteProduct($id) {

        return $this->db->DeleteProduct($id);
    }
}