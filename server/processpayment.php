<?php
include_once('./database/DBHelper.php');
include_once('./controllers/shippingController.php');
include_once('./controllers/paymentController.php');
include_once('./controllers/ordersController.php');
include_once('./controllers/orderedProductsController.php');

// error_reporting(-1);
// ini_set('display_errors', 'On');
// set_error_handler("var_dump");

$valid_card_number = 1234567890;
$message = '';

$db = new DBHelper();

$orders = new OrdersController($db);
$payment = new PaymentController($db);
$shipping = new shippingController($db);
$ordered_products = new OrderedProductsController($db);

if ($_POST['card_number'] == $valid_card_number) {
	$creditcard = [
		'card_holder' => $_POST['card_holder'],
		'card_number' => $_POST['card_number'],
		'expiration' => $_POST['expiration'],
		'cvv' => $_POST['cvv']
	];
	
	$shippingdata = [
		'name'=> $_POST['name'],	
		'address' => $_POST['address'],
		'city' => $_POST['city'],
		'state' => $_POST['state'],
		'zip' => $_POST['zip'],
	];
	
	$date = date_create()->format('Y-m-d H:i:s');
	
	$payment_id = $payment->createPayment($creditcard);
	$shipping_id = $shipping->createShipping($shippingdata);

	$ordersdata = [
		'time_stamp' => (string)$date,
		'payment_id' => $payment_id,
		'shipping_id' => $shipping_id
	];

	$order_id = $orders->createOrder($ordersdata);

	session_start();

	$products = $_SESSION['cart'];

	foreach($products as $product_id => $product) {
		$new_ordered_product = [
			'order_id' => $order_id,
			'product_id' => $product_id
		];

		$ordered_products->createOrderedProduct($new_ordered_product);
	}

	unset($_SESSION['cart']);
	session_destroy();
	$message = 'Thank you for your purchase!';
}
else {
	$message = 'That credit card is invalid. Please try a different credit card.';
}

?>

<!doctype html>
<html>
<head>
<link href="../styling.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<title>Cart</title>
</head>

<body>
	<h1><?php echo $message ?></h1>
	<a href="store.php">Take me back to the store</a>
	<a href="cart.php">Take me back to my cart</a>
</body>
</html>