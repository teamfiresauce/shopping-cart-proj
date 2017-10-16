<?php
// Dependencies
require_once('./resources/variables.php');
include_once('./controllers/productsController.php');
include_once('./controllers/orderedProductsController.php');
include_once('./controllers/shippingController.php');
include_once('./controllers/paymentController.php');
include_once('./controllers/ordersController.php');

// ERROR HANDELING
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
// ERROR HANDELING

$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');

$product = array ("id" => 2, "name" => "Awesome Sauce", "price" => 9.99, "description" => "Awesome.", "quantity" => 99);
$shipping = array ("id" => 2, "name" => "Tanner", "city" => "Spanish Fork", "state" => "UT", "zip" => 84660, "address" => "1146 S 1180 E");
$payment = array ("id" => 1, "card_holder" => "Tanner Joey", "card_number" => "2222 2222 2222 2222", "expiration" => "07/19", "cvv" => 123);
$order = array ("id" => 1, "card_holder" => "Tanner Joey", "card_number" => "2222 2222 2222 2222", "expiration" => "07/19", "cvv" => 123);

echo "<code>";
print_r($product);
echo "</code>";

$orderResults = getAllOrders();

// DISPLAY RESULTS
if($orderResults)
{
  while($row = mysqli_fetch_array($orderResults)) 
    {
      echo '<div style="margin:10px;border:0.5px solid gray;padding:10px;">';
      echo 'Id #: ' . $row['id'] . '<br>';
      echo 'time stamp: ' . $row['time_stamp'] . '<br>';
      echo 'payment id: $' . $row['payment_id'] . '<br>';
      echo 'shipping id: ' . $row['shipping_id'] . '<br>';
      echo '</div>';
    }
}

//WE'RE DONE SO HANG UP
mysqli_close($dbconnection);
?>