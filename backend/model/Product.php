<?php

namespace app\backend\model;

use app\backend\Database;

abstract class Product
{
    public ?string $SKU = null ;
    public ?string $name = null ;
    public ?string $type = null ;
    public ?float $price = null ;
    public ?string $dimension_OR_size_OR_weight = null ;
    public Database $db  ;

    public function __construct()
    {
        $this->db = new Database() ;
    }

    abstract public function setProducts(array $product) ;

    public function setProduct(array $product): array
    {
        $this->type = $product['Type'] ;
        $this->name = $product['Name'] ;
        $this->SKU = $product['SKU'];
        $this->price = $product['Price'] ;
        $this->dimension_OR_size_OR_weight = $product['dimension'] ;
        $this->db->createProduct($this) ;
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = null;
        return $response;
    }



}