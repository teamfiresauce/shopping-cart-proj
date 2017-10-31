<?php

class ProductsController {

    public $table = 'products';
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // GET ALL PRODUCTS
    function getAllProducts ()
    {
        $result = $this->db->getAll($this->table);
        
        return $result;
    }

    // GET ALL PRODUCTS
    function getProductById ($product)
    {
        $result = $this->db->getById($this->table, $product);
        
        return $result;
    }

    // CREATE PRODUCT
    function createProduct ($product)
    {
        $result = $this->db->create($this->table, $product);
        
        return $result;
    }

    // UPDATE PRODUCT
    function updateProduct ($product)
    {
        $id = $product['id'];
        unset($product['id']);
        unset($product['name']);
        unset($product['price']);
        unset($product['description']);
        $result = $this->db->update($this->table, $id, $product);
        
        return $result;
    }

    // DELETE PRODUCT
    function deleteProduct ($product)
    {
        $result = $this->db->delete($this->table, $product['id']);
        
        return $result;
    }
}