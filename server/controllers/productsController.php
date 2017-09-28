<?php
require_once('./../resources/variables.php');

function getAllProducts ($dbconnection) 
{
  $dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');
  // Look up the username & password in the db
  $query = "SELECT * FROM products";
  // Results
  $result = mysqli_query($dbconnection, $query) or die ('query failed');

  return $result;
}

$productsResult = getAllProducts($dbconnection);

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