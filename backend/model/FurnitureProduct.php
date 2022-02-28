<?php

namespace app\backend\model;

class FurnitureProduct extends Product
{
    public ?string $dimension = null ;
    public function __construct()
    {
        parent::__construct() ;
    }

    public function setProducts(array $product): array
    {

        $this->type = $product['Type'] ;
        $this->name = $product['Name'] ;
        $this->SKU = $product['SKU'];
        $this->price = $product['Price'] ;
        $this->dimension =  $product['dimension'] ;
        $this->db->createFurnitureProduct($this);

        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = null;
        return $response;
    }
}