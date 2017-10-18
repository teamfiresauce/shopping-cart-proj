<?php

class PaymentController {

  public $table = 'payment';
  public $db;

  public function __construct($db)
  {
    $this->db = $db;
  }

  // GET ALL PAYMENT
  public function getAllPayments() 
  {
    $result = $this->db->getAll($this->table);
    
    return $result;
  }

  // GET ALL PAYMENT
  public function getPaymentById($payment) 
  {
    $result = $this->db->getById($this->table, $payment['id']);

    return $result;
  }

  // CREATE PAYMENT
  public function createPayment($payment) 
  {
    $result = $this->db->create($this->table, $payment);

    return $result;
  }

  // DELETE PAYMENT
  public function deletePayment($payment) 
  {
    $result = $this->db->delete($this->table, $payment['id']);

    return $result;
  }
}



?>