<?php
require_once('./../resources/variables.php');
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");


// GET ALL PRODUCTS
function getAllProducts ($dbconnection) 
{
  $query = "SELECT * FROM products";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}

// GET ALL PRODUCTS
function getProductById ($dbconnection, $id) 
{
  $query = "SELECT * FROM products WHERE id = $id";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}

// CREATE PRODUCT
function createProduct ($dbconnection, $product) 
{
  $query = "INSERT INTO products (name, price, description, quantity)" .
  "VALUES ('$product[name]','$product[price]','$product[description]','$product[quantity]')";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}

// UPDATE PRODUCT
function updateProduct ($dbconnection, $product) 
{
  $query = "UPDATE products SET SET name='$product[name]', price='$product[price]', description='$product[description]', quantity='$product[quantity]' WHERE id=$product[id]";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}

// DELETE PRODUCT
function deleteProduct ($dbconnection, $product) 
{
  $query = "DELETE FROM products WHERE id=$product[id]";
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}


$productsResult = getAllProducts($dbconnection);

// DISPLAY RESULTS
if($productsResult)
{
  while($row = mysqli_fetch_array($productsResult)) 
    {
      echo '<div style="margin:10px;border:0.5px solid gray;padding:10px;">';
      echo 'Id #: ' . $row['id'] . '<br>';
      echo 'Name: ' . $row['name'] . '<br>';
      echo 'Price: $' . $row['price'] . '<br>';
      echo 'Description: ' . $row['description'] . '<br>';
      echo 'Quantity: ' . $row['quantity'] . '<br>';
      echo '</div>';
    }
}

//WE'RE DONE SO HANG UP
mysqli_close($dbconnection);

?>