<?php

namespace app\backend\model;

use app\backend\Database;

class BookProduct extends Product
{

    public ?string $size = null ;


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
        $this->size = $product['dimension'] ;
        $book = new BookProduct() ;
        $this->db->createBookProduct($this);

        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = null;
        return $response;

    }
}