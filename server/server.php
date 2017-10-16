<?php
// Dependencies
require_once('./resources/variables.php');
include_once('./controllers/productsController.php');
include_once('./controllers/orderedProductsController.php');
include_once('./controllers/shippingController.php');
include_once('./controllers/paymentController.php');
include_once('./controllers/ordersController.php');

if (isset($_GET)) { 
  $method = $_GET['method'];
}
if(isset($_REQUEST['data']))
{
  $data = $_REQUEST['data'];

  echo "<code>";
  print_r($data);
  echo "</code>";
}

// ERROR HANDELING
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
// ERROR HANDELING

$dbconnection = mysqli_connect(HOST,USER,PASSWORD,DB_NAME) or die ('connection to DB failed');

switch ($method) {
    //Products
    case 'getAllProducts':
        $result = getAllProducts();
        break;
    case 'getProductById':
        $result = getProductById($data);
        break;
    case 'updateProduct':
        $result = updateProduct($data);
        break;
    case 'createProduct':
        $result = createProduct($data);
        break;
    case 'deleteProduct':
        $result = deleteProduct($data);
        break;
    //OrderedProducts
    case 'getAllOrderedProducts':
        $result = getAllOrderedProducts();
        break;
    case 'getOrderedProductById':
        $result = getAllOrderedProductById($data);
        break;
    case 'updateOrderedProduct':
        $result = updateOrderedProduct($data);
        break;
    case 'createOrderedProduct':
        $result = createOrderedProduct($data);
        break;
    case 'deleteOrderedProduct':
        $result = deleteOrderedProduct($data);
        break;
    //Orders
    case 'getAllOrders':
        $result = getAllOrders();
        break;
    case 'getOrderById':
        $result = getOrderById($data);
        break;
    case 'updateOrder':
        $result = updateOrder($data);
        break;
    case 'createOrder':
        $result = createOrder($data);
        break;
    case 'deleteOrder':
        $result = deleteOrder($data);
        break;
    //Payments
    case 'getAllPayments':
        $result = getAllPayments();
        break;
    case 'getPaymentById':
        $result = getPaymentById($data);
        break;
    case 'updatePayment':
        $result = updatePayment($data);
        break;
    case 'createPayment':
        $result = createPayment($data);
        break;
    case 'deletePayment':
        $result = deletePayment($data);
        break;
    //Shipping
    case 'getAllShipping':
        $result = getAllShipping();
        break;
    case 'getShippingById':
        $result = getShippingById($data);
        break;
    case 'updateShipping':
        $result = updateShipping($data);
        break;
    case 'createShipping':
        $result = createShipping($data);
        break;
    case 'deleteShipping':
        $result = deleteShipping($data);
        break;
}

//WE'RE DONE SO HANG UP
mysqli_close($dbconnection);
?>