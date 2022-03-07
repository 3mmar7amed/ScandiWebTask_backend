<?php

namespace app\backend\model;
use app\backend\Database;

class products extends Product
{
    public function __construct()
    {
        parent::__construct() ;
    }


    public function getProduct(): array
    {
        $result = $this->db->getProducts();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }



    public function setProducts(array $product): array
    {
        $hashmap['Book'] = new BookProduct() ;
        $hashmap['DVD'] = new DVDProduct() ;
        $hashmap['Furniture'] = new FurnitureProduct() ;
        if(!$this->validateProduct($product)) {
                return $this->unprocessableEntityResponse() ;
        }
        $productType = $hashmap[$product['Type']] ;
        return $productType->setProducts($product) ;

    }

    public function deleteProduct($IdsArray): array
    {
        if(! $this->validateIDsArray($IdsArray)) {
            $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
            $response['body'] = null;
            return $response;
        }
        $ids = $IdsArray['IDsArray'] ;
        foreach ( $ids as $id) {
            $this->db->DeleteProduct($id);
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = null;
        return $response;
    }

    public function validateProduct($input): bool
    {
        if (! isset($input['Name'])) {
            return false;
        }
        if (! isset($input['SKU'])) {
            return false;
        }
        if (! isset($input['Type'])) {
            return false;
        }
        if (! isset($input['Price'])) {
            return false;
        }
        if (! isset($input['dimension'])) {
            return false;
        }
        return true;
    }

    public function unprocessableEntityResponse(): array
    {
        $response['status_code_header'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
        return $response;
    }

    public function validateIDsArray($array): bool
    {
        if(! isset($array['IDsArray']))
            return false ;
        return true ;
    }
}