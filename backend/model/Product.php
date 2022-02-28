<?php

namespace app\backend\model;

use app\backend\Database;

abstract class Product
{
    public ?string $SKU = null ;
    public ?string $name = null ;
    public ?string $type = null ;
    public ?float $price = null ;

    public Database $db  ;

    public function __construct()
    {
        $this->db = new Database() ;
    }

    abstract public function setProducts(array $product) ;

}