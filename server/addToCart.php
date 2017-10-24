<?php

session_start();

$item = [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'description' => $_POST['description'],
    'quantity' => 1
];

if (array_key_exists('cart', $_SESSION)) {
    $_SESSION['cart'][$item['id']] = $item;
}
else {
    $_SESSION['cart'] = [];
    $_SESSION['cart'][$item['id']] = $item;
}

?>

<!doctype html>
<html>
<head>
<link href="../styling.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<meta http-equiv="refresh" content="2;url=store.php">
<title>Cart</title>
</head>

<body>
	<h1>Product added to cart</h1>
</body>
</html>