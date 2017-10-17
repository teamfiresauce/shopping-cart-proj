<?php

class OrdersController {

    public $table = 'orders';
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // GET ALL ORDERS
    public function getAllOrders ()
    {
        $result = $this->db->getAll($this->table);
        
        return $result;
    }

    // GET ALL ORDERS
    public function getOrdersById ($order)
    {
        $result = $this->db->getById($this->table, $order['id']);
        
        return $result;
    }

    // CREATE ORDER
    public function createOrder ($order)
    {
        $result = $this->db->create($this->table, $order);
        
        return $result;
    }

    // UPDATE ORDER
    public function updateOrder ($order)
    {
        $id = $order['id'];
		unset($order['id']);
        $result = $this->db->update($this->table, $id, $order);
        
        return $result;
    }

    // DELETE ORDER
    public function deleteOrder ($order)
    {
        $result = $this->db->delete($this->table, $order['id']);
        
        return $result;
    }
}