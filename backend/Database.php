<?php
namespace app\backend;
use app\backend\model\products ;
use PDO;


class Database
{
    public \PDO $pdo ;

    private $host = "us-cdbr-east-05.cleardb.net" ; 
    private $username = "b57d2b8c89c004" ;
    public string $pass = '3146e78b' ;
    private $dbname = "heroku_35850e58f8c52bf" ; 

    public function __construct()
    {

        $this->pdo = new PDO("mysql:host=$this->host; dbname=$this->dbname;", $this->username, $this->pass);

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this ;
    }

    public function getProducts()
    {
        $statement = $this->pdo->prepare('SELECT * FROM storeproducts ');
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct(Products $product)
    {

        $statement = $this->pdo->prepare("INSERT INTO storeproducts (price, name, SKU, type , dimension)
                VALUES (:price, :name, :SKU,:type , :dimension)");
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':name', $product->name);
        $statement->bindValue(':SKU', $product->SKU);
        $statement->bindValue(':type', $product->type);
        $statement->bindValue(':dimension', $product->dimension);

        $statement->execute();

    }

    public function DeleteProduct($id) {

            $statement = $this->pdo->prepare('DELETE FROM storeproducts WHERE id = :id');
            $statement->bindValue(':id', $id);
            if($id === '')
                return false  ;
            $statement->execute();


    }


}