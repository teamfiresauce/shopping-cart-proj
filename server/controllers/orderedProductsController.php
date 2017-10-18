<?php

class OrderedProductsController {

    public $table = 'ordered_products';
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // GET ALL PRODUCTS
    public function getAllOrderedProducts ()
    {
        $result = $this->db->getAll($this->table);
        
        return $result;
    }

    // GET ALL PRODUCTS
    public function getOrderedProductById ($orderedProduct)
    {
        $result = $this->db->getById($this->table, $orderedProduct['id']);
        
        return $result;
    }

    // CREATE PRODUCT
    public function createOrderedProduct ($orderedProduct)
    {
        $result = $this->db->create($this->table, $orderedProduct);
        
        return $result;
    }

    // UPDATE PRODUCT
    public function updateOrderedProduct ($orderedProduct)
    {
        $id = $orderedProduct['id'];
		unset($orderedProduct['id']);
        $result = $this->db->update($this->table, $id, $orderedProduct);
        
        return $result;
    }

    // DELETE PRODUCT
    public function deleteOrderedProduct ($orderedProduct)
    {
        $result = $this->db->delete($this->table, $orderedProduct['id']);
        
        return $result;
    }
}