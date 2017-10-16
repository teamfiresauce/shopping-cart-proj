<?php
// ERROR HANDLING
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
// ERROR HANDLING
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');

// GET ALL ORDERS
function getAllOrders ($dbconnection)
{
  $query = "SELECT * FROM orders";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}

// GET ALL ORDERS
function getOrdersById ($dbconnection, $order)
{
  $query = "SELECT * FROM orders WHERE id = $order[id]";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}

// CREATE ORDER
function createOrder ($dbconnection, $order)
{
  $query = "INSERT INTO orders (time_stamp, payment_id, shipping_id)" .
  "VALUES ('order[time_stamp]','$order[payment_id]','$order[shipping_id]')";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}

// UPDATE ORDER
function updateOrder ($dbconnection, $order)
{
  $query = "UPDATE orders SET time_stamp='$order[time_stamp]', payment_id='$order[payment_id]', shipping_id='$order[shipping_id]' WHERE id=$order[id]";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}

// DELETE ORDER
function deleteOrder ($dbconnection, $order)
{
  $query = "DELETE FROM orders WHERE id=$order[id]";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}


?>