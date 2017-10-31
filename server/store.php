<?php

include_once('./database/DBHelper.php');
include_once('./controllers/productsController.php');

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

$photoPath = 'https://cdn2.bigcommerce.com/n-ou1isn/nvf47fd/products/177/images/873/Dirty_Dicks_hot_sauce__18458.1499377247.386.513.png?c=2';


$db = new DBHelper();

$products_controller = new ProductsController($db);

$products = $products_controller->getAllProducts();

?>

<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href=".././styles/styles.css">
<meta charset="utf-8">
<title>Store Front</title>
</head>

<body>
	<header>
        <div>
            <img class="hot-icon" src=".././images/hot.png" alt="">
            <big>Team Fire Sauce Store</big>
        </div>
        <a href="store.php">Store</a>
		<a href="cart.php">Cart</a>
		<a href="admin.php">Admin</a>
    </header>
	<div id="wholething">
	<?php foreach($products as $product) { ?>
	<div id="wrapper">
		<div id="container">
		<h3><?php echo $product['name'] ?></h3>
		</a>
		<br>
		<br>
		<div id=photo2>
		<img src="<?php echo $photoPath ?>" height="275" width="185"/>
		</div>

		<p>
		<br>
		<div id=container2>
		<p><strong>Available Quantity<strong> <?php echo $product['quantity'] ?></p>
		<p><strong>Description: </strong><?php echo $product['description'] ?></p>
		<p><strong>Price: </strong><?php echo $product['price'] ?></p>
		<form action="addToCart.php" method="post">
			<br>
			<input name="id" value="<?php echo $product['id'] ?>" type="hidden">
			<input name="name" value="<?php echo $product['name'] ?>" type="hidden">
			<input name="price" value="<?php echo $product['price'] ?>" type="hidden">
			<input name="description" value="<?php echo $product['description'] ?>" type="hidden">
			<input class="button" type="submit" value="Add to Cart">
			</form>
		</div>
	</div>
	<?php } ?>
	</div>
	</div>
	
</body>
</html>