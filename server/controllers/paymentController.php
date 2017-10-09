<?php
// ERROR HANDELING
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
// ERROR HANDELING

// GET ALL PAYMENT
function getAllPayment () 
{
  $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
  $query = "SELECT * FROM payment";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');
  
  return $result;
}

// GET ALL PAYMENT
function getPaymentById ($payment) 
{
  $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
  $query = "SELECT * FROM payment WHERE id = $payment[id]";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}

// CREATE PAYMENT
function createPayment ($payment) 
{
  $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
  $query = "INSERT INTO payment (name, price, description, quantity)" .
  "VALUES ('$payment[cardHolder]','$payment[cardNumber]','$payment[expiration]','$payment[cvv]')";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}


// DELETE PAYMENT
function deletePayment ($dbconnection, $payment) 
{
  $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
  $query = "DELETE FROM payment WHERE id=$payment[id]";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}


?>