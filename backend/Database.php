<?php
namespace app\backend;
use app\backend\model\products ;
use PDO;


class Database
{
    public \PDO $pdo ;
    public function __construct()
    {

        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=products', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this ;
    }

    public function getProducts($keyword = '')
    {
        if ($keyword) {
            $statement = $this->pdo->prepare('SELECT * FROM storeproducts WHERE name like :keyword ');
            $statement->bindValue(":keyword", "%$keyword%");
        } else {
            $statement = $this->pdo->prepare('SELECT * FROM storeproducts ');
        }
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
            return $statement->execute();


    }


}