<?php
// Dependencies

require_once('./resources/variables.php');
include_once('./controllers/productsController.php');

$product = array ("id" => 1, "name" => "Awesome Sauce", "price" => 9.99, "description" => "Awesome.", "quantity" => 99);

echo "<code>";
print_r($product);
echo "</code>";

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