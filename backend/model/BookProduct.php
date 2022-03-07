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
        return $this->setProduct($product) ;
    }
}