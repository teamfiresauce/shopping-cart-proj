<?php

// GET ALL PAYMENT
function getAllPayments() 
{
  $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
  $query = "SELECT * FROM payment";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');
  
  return $result;
}

// GET ALL PAYMENT
function getPaymentById($payment) 
{
  $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
  $query = "SELECT * FROM payment WHERE id = $payment[id]";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}

// CREATE PAYMENT
function createPayment($payment) 
{
  $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
  $query = "INSERT INTO payment (card_holder, card_number, expiration, cvv)" .
  "VALUES ('$payment[card_holder]','$payment[card_number]','$payment[expiration]','$payment[cvv]')";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}

// DELETE PAYMENT
function deletePayment($payment) 
{
  $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
  $query = "DELETE FROM payment WHERE id=$payment[id]";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}

?>