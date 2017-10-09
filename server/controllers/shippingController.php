<?php

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
function createShipping($shipping) {
	$dbconnection = mysqli_connect( HOST, USER, PASSWORD, DB_NAME )or die( 'connection to DB failed' );
	$query = "INSERT INTO shipping (name, city, state, zip, address)" .
	"VALUES ('$shipping[name]','$shipping[city]','$shipping[state]','$shipping[zip]', '$shipping[address]')";
	$result = mysqli_query( $dbconnection, $query )or die( 'query failed' );

	return $result;
}

// UPDATE SHIPPING
function updateShipping($shipping) {

	$dbconnection = mysqli_connect( HOST, USER, PASSWORD, DB_NAME )or die( 'connection to DB failed' );
	$query = "UPDATE shipping SET name='$shipping[name]', city='$shipping[city]', state='$shipping[state]', zip='$shipping[zip]', address='$shipping[address]' WHERE id=$shipping[id]";
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

?>