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

        return $this->setProduct($product) ;
    }
}