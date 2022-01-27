<?php

namespace app\backend\model;
use app\backend\Database;

class products
{
    public ?string $id = null ;
    public ?string $SKU = null ;
    public ?string $name = null ;
    public ?string $type = null ;
    public ?float $price = null ;
    public ?string $dimension = null ;


    private $db  ;

    public function __construct()
    {
        $this->db = new Database() ;
    }

    public function getProduct(): array
    {
        return $this->db->getProducts();
    }

    public function setProducts($product): array
    {
        if(!$this->validateProduct((array)$product)) {
                return $this->unprocessableEntityResponse() ;
        }

        $this->name = $product['Name'] ;
        $this->SKU = $product['SKU'];
        $this->type = $product['Type'] ;
        $this->price = $product['Price'] ;
        $this->dimension = $product['dimension'] ;
        $this->db->createProduct($this);

        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = null;
        return $response;
        

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

    private function validateProduct($input): bool
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

    private function unprocessableEntityResponse(): array
    {
        $response['status_code_header'] = 'HTTP/1.1 422 Unprocessable Entity';
        $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
        return $response;
    }

    private function validateIDsArray($array): bool
    {
        if(! isset($array['IDsArray']))
            return false ;
        return true ;
    }


}