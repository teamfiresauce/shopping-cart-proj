<?php
include_once('./database/DBHelper.php');
include_once('./controllers/productsController.php');

if (isset($_POST['quantity'])) {
    $db = new DBHelper();
    $product_id = $_POST['product_id'];
    $products_controller = new ProductsController($db);
    $product = $products_controller->getProductById($product_id);
    $product['quantity'] += $_POST['quantity'];
    $result = $products_controller->updateProduct($product);
}

?>

<!doctype html>
<html>
<head>
<link href="../styling.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<meta http-equiv="refresh" content="1;url=admin.php">
<title>Cart</title>
</head>

<body>
	<h1>Quantity updated</h1>
</body>
</html>