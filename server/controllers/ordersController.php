<?php

// GET ALL ORDERS
function getAllOrders ()
{
    $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
    $query = "SELECT * FROM orders";
    $result = mysqli_query($dbconnection,   $query) or die ('query failed');
    
    return $result;
}

// GET ALL ORDERS
function getOrdersById ($order)
{
    $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
    $query = "SELECT * FROM orders WHERE id = $order[id]";
    $result = mysqli_query($dbconnection, $query) or die ('query failed');
    
    return $result;
}

// CREATE ORDER
function createOrder ($order)
{
    $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
    $query = "INSERT INTO orders (time_stamp, payment_id, shipping_id)" .
    "VALUES ('order[time_stamp]','$order[payment_id]','$order[shipping_id]')";
    $result = mysqli_query($dbconnection, $query) or die ('query failed');
    
    return $result;
}

// UPDATE ORDER
function updateOrder ($order)
{
    $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
    $query = "UPDATE orders SET time_stamp='$order[time_stamp]', payment_id='$order[payment_id]', shipping_id='$order[shipping_id]' WHERE id=$order[id]";
    $result = mysqli_query($dbconnection, $query) or die ('query failed');
    
    return $result;
}

// DELETE ORDER
function deleteOrder ($order)
{
    $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
    $query = "DELETE FROM orders WHERE id=$order[id]";
    $result = mysqli_query($dbconnection, $query) or die ('query failed');
    
    return $result;
}


?>