<?php

namespace app\backend\model;

class DVDProduct extends Product
{
    private string $weight ;
    public function __construct()
    {
        parent::__construct() ;
    }

    public function setProducts(array $product): array
    {
        $this->weight = $product['dimension'] ;

        return $this->setProduct($product , $this->weight) ;

    }

}