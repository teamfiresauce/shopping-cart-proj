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

$date = new DateTime();
echo $date->format('U = Y-m-d H:i:s') . "\n";

$ordersdata = [
	'time_stamp' => '$date',
	// 'payment_id' => ,
	// 'shipping_id' =>
];

$result = $payment->createPayment($creditcard);
$result2 = $shipping->createShipping($shippingdata);
// $result3 = $orders->createOrders($ordersdata);

$whatever = $payment->getAllPayments();
$whatever2 = $shipping->getAllShipping();


var_dump($whatever);
var_dump($whatever2);

?>