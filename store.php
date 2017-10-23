<?php
// Start the session
session_start();
	/*define( 'HOST', 'localhost' );
	define('DB_NAME','test');

	function d( $debug ) {
		echo '<pre>';
		print_r( $debug );
		echo '</pre>';
	}
		//CONNECT TO THE DATABASE
	$dbconnection = mysqli_connect( HOST, DB_NAME )or die( 'connection failed' );

	//Get the emphasis from the database
	$query = "SELECT * FROM products ORDER BY name ASC";
	//NOW TRY AND TALK TO THE DATABASE
	$result = mysqli_query( $dbconnection, $query )or die( 'query failed' );

	//PUT THE RESULTS IN A VARIABLE
	$found = mysqli_fetch_array( $result );
	
	
	$item = [
		'id' => $_GET[ 'id' ],
		'name' => $_GET[ 'name' ],
		'price' => $_GET[ 'price' ]
	];

	$_SESSION[ 'cart' ] = [];

	$_SESSION[ 'cart' ][] = $item;
	
	
	
	
*/
	


?>

<?php
$servername = 'localhost';
$user = 'root';
$password = '';
$database = 'test';

$photoPath = 'https://cdn2.bigcommerce.com/n-ou1isn/nvf47fd/products/177/images/873/Dirty_Dicks_hot_sauce__18458.1499377247.386.513.png?c=2';


// Create connection
$conn = new mysqli( $servername, $user, $password, $database );
// Check connection
if ( $conn->connect_error ) {
	die( "Connection failed: " . $conn->connect_error );
}

$sql = "SELECT id, name, price, description, quantity FROM products";
$result = $conn->query( $sql );

function dbConnect() {
	$servername = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'test';
	$mysqli = new mysqli( $servername, $user, $password, $database );
	return $mysqli;

}




/*function getRows(){
	
	$sql = 'SELECT * FROM products';
	$db = dbConnect();
	$result = $db->query($sql);
	
		if ($result->num_rows > 0){
		
		while($row = $result->fetch_assoc()){
			echo $row['name'].'<br>';
		}
	}else{
		echo "0 results";
	}
}
	
	
 */


?>




<!doctype html>


<html>
<head>
<link href="styling.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php

	
	/*if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo // "id: " . $row["id"]. 
			" <h3> Name: " . $row["name" ]. 
			" <h3>Price: " . $row["price"] . 
			" <p>Description:" . $row["description"].  
			" <p>Available: " . $row["quantity"] . '</p>';
    }
} else {
    echo "0 results";
}
	
	
	*/
	dbConnect();

$conn->close();

function d( $debug ) {
	echo '<pre>';
	print_r( $debug );
	echo '</pre>';
}


while ( $row = mysqli_fetch_array( $result ) ) {



	echo '<div id="wholething">';
	echo '<div id="container">';
	echo '<h3>' . $row[ 'name' ] ;
	echo '</h3>';
	echo '</a>';
	echo '<br>';
	echo '<br>';
	echo '<div id=photo2>';
	echo '<img src="' . $photoPath . '" height="275" width="185"/>';
	echo '</div>';

	echo '<p>';
	echo '<br>';
	echo '<div id=container2>';
	echo '<p><strong>Available ' . $row[ 'quantity' ] . '<p><strong>';
	echo '<p><strong>Description:</strong> ' . $row[ 'description' ] . '</p>';
	echo '<p><strong>Price: </strong>' . $row['price'] . '</p>';
	echo '<form action="server/productsController.php" method="post">
		   <br>
		  <input class="button" type="submit" value="Add to Cart">
		  </form>';
	echo '</div>';
	echo '</div>';
	echo '</div>';




}
	
	
	?>
	
	
</body>
</html>