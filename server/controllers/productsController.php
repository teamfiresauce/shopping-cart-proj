<?php
// ERROR HANDELING
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
// ERROR HANDELING

// GET ALL PRODUCTS
function getAllProducts ()
{
    $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
    $query = "SELECT * FROM products";
    $result = mysqli_query($dbconnection, $query) or die ('query failed');
    
    return $result;
}

// GET ALL PRODUCTS
function getProductById ($product)
{
    $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
    $query = "SELECT * FROM products WHERE id = $product[id]";
    $result = mysqli_query($dbconnection, $query) or die ('query failed');
    
    return $result;
}

// CREATE PRODUCT
function createProduct ($product)
{
    $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
    $query = "INSERT INTO products (name, price, description, quantity)" .
    "VALUES ('$product[name]','$product[price]','$product[description]','$product[quantity]')";
    $result = mysqli_query($dbconnection, $query) or die ('query failed');
    
    return $result;
}

// UPDATE PRODUCT
function updateProduct ($product)
{
    $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
    $query = "UPDATE products SET name='$product[name]', price='$product[price]', description='$product[description]', quantity='$product[quantity]' WHERE id=$product[id]";
    $result = mysqli_query($dbconnection, $query) or die ('query failed');
    
    return $result;
}

// DELETE PRODUCT
function deleteProduct ($product)
{
    $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
    $query = "DELETE FROM products WHERE id=$product[id]";
    $result = mysqli_query($dbconnection, $query) or die ('query failed');
    
    return $result;
}


?>