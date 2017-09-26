<?php

require_once('./../resources/variables.php');

//BUILD THE DATABASE CONNECTION WITH host, user, pass, DATABASE
$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');

// Look up the username & password in the db
$query = "SELECT * FROM products";

// Results
$result = mysqli_query($dbconnection, $query) or die ('query failed');

if($result)
{
    while($row = mysqli_fetch_array($result)){
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