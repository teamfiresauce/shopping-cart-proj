<?php
require_once('./../resources/variables.php');

// GET ALL PRODUCTS
function getAllOrderedProducts ()
{
    $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
    $query = "SELECT * FROM ordered_products";
    $result = mysqli_query($dbconnection, $query) or die ('query failed');
    
    return $result;
}

// GET ALL PRODUCTS
function getOrderedProductById ($orderedProduct)
{
    $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
    $query = "SELECT * FROM ordered_products WHERE id = $orderedProduct[id]";
    $result = mysqli_query($dbconnection, $query) or die ('query failed');
    
    return $result;
}

// CREATE PRODUCT
function createOrderedProduct ($orderedProduct)
{
    $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
    $query = "INSERT INTO ordered_products (order_id, product_id)" .
    "VALUES ('$orderedProduct[orderId]','$orderedProduct[productId]')";
    $result = mysqli_query($dbconnection, $query) or die ('query failed');
    
    return $result;
}

// UPDATE PRODUCT
function updateOrderedProduct ($orderedProduct)
{
    $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
    $query = "UPDATE ordered_products SET order_id='$orderedProduct[orderId]', product_id='$orderedProduct[productId]' WHERE id=$orderedProduct[id]";
    $result = mysqli_query($dbconnection, $query) or die ('query failed');
    
    return $result;
}

// DELETE PRODUCT
function deleteOrderedProduct ($orderedProduct)
{
    $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
    $query = "DELETE FROM ordered_products WHERE id=$orderedProduct[id]";
    $result = mysqli_query($dbconnection, $query) or die ('query failed');
    
    return $result;
}

$orderedProduct = array ("id" => 2, "orderId" => 1, "productId" => 3);

$response = updateOrderedProduct($orderedProduct);

// DISPLAY RESULTS
if($response)
{
  while($row = mysqli_fetch_array($response)) 
    {
      echo '<div style="margin:10px;border:0.5px solid gray;padding:10px;">';
      echo 'Id #: ' . $row['id'] . '<br>';
      echo 'order #: ' . $row['order_id'] . '<br>';
      echo 'Product #:' . $row['product_id'] . '<br>';
      echo '</div>';
    }
}
?>