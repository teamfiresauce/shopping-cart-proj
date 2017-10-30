<?php
include_once('./database/DBHelper.php');
include_once('./controllers/shippingController.php');
include_once('./controllers/paymentController.php');
include_once('./controllers/ordersController.php');

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");

$db = new DBHelper();

$orders = new OrdersController($db);
$payment = new PaymentController($db);
$shipping = new shippingController($db);

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

// $paymentShipingMatch = if (payment_id == shipping_id)
// 	{ echo payment_id} 
// else { echo "payment and shipping don't match"};

$ordersdata = [
	'time_stamp' => (string)$date,
	// 'payment_id' => $paymentShipingMatch,
	// 'shipping_id' => $paymentShipingMatch
];

$result = $payment->createPayment($creditcard);
$result2 = $shipping->createShipping($shippingdata);
$result3 = $orders->createOrder($ordersdata);

$whatever = $payment->getAllPayments();
$whatever2 = $shipping->getAllShipping();
$whatever3 = $orders->getAllOrders();

var_dump($whatever);
var_dump($whatever2);

?>