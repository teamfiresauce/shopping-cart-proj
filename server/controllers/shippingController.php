<?php
//Dependancies
require_once('../../../../My Webpage/aberaigne.com/public_html/dgmria/server/resources/variables.php');


// ERROR HANDELING
error_reporting( -1 );
ini_set( 'display_errors', 'On' );
set_error_handler( "var_dump" );
// ERROR HANDELING


// GET ALL SHIPPING
function getAllShipping()

{
	$dbconnection = mysqli_connect( HOST, USER, PASSWORD, DB_NAME )or die( 'connection to DB failed' );
	$query = "SELECT * FROM shipping";
	$result = mysqli_query( $dbconnection, $query )or die( 'query failed' );

	return $result;
}

// GET ALL SHIPPING
function getShippingById( $shipping ) {
	$dbconnection = mysqli_connect( HOST, USER, PASSWORD, DB_NAME )or die( 'connection to DB failed' );

	$query = "SELECT * FROM shipping WHERE id = $shipping[id]";
	$result = mysqli_query( $dbconnection, $query )or die( 'query failed' );

	return $result;
}

// CREATE SHIPPING
function createShipping($shipping ) {
	$dbconnection = mysqli_connect( HOST, USER, PASSWORD, DB_NAME )or die( 'connection to DB failed' );
	$query = "INSERT INTO products (name, price, description, quantity)" .
	"VALUES ('$shipping[name]','$shipping[price]','$shipping[description]','$shipping[quantity]')";
	$result = mysqli_query( $dbconnection, $query )or die( 'query failed' );

	return $result;
}


// UPDATE SHIPPING
function updateShipping($shipping) {

	$dbconnection = mysqli_connect( HOST, USER, PASSWORD, DB_NAME )or die( 'connection to DB failed' );

	$query = "UPDATE shipping SET name='$shipping[name]', price='$shipping[price]', description='$shipping[description]', quantity='$shipping[quantity]' WHERE id=$product[id]";
	$result = mysqli_query( $dbconnection, $query )or die( 'query failed' );

	return $result;
}


// DELETE SHIPPING
function deleteShipping($shipping) {

	$dbconnection = mysqli_connect( HOST, USER, PASSWORD, DB_NAME )or die( 'connection to DB failed' );

	$query = "DELETE FROM shipping WHERE id=$shipping[id]";
	$result = mysqli_query( $dbconnection, $query )or die( 'query failed' );

	return $result;
}

$shippingResult = getAllShipping();

// DISPLAY RESULTS
if($shippingResult)
{
  while($row = mysqli_fetch_array($shippingResult)) 
    {
      echo '<div style="margin:10px;border:0.5px solid gray;padding:10px;">';
      echo 'Id #: ' . $row['id'] . '<br>';
      echo 'Name: ' . $row['name'] . '<br>';
      echo 'Address: $' . $row['address'] . '<br>';
	  echo 'City: ' . $row['city'] . '<br>';
      echo 'Zip Code: ' . $row['zip'] . '<br>';
      echo 'State: ' . $row['state'] . '<br>';
      echo '</div>';
    }
}








?>