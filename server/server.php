<?php
// Dependencies
include_once('./database/DBHelper.php');
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

$db = new DBHelper();

$orderedProducts = new OrderedProductsController($db);
$orders = new OrdersController($db);
$payment = new PaymentController($db);
$products = new ProductsController($db);
$shipping = new shippingController($db);

switch ($method) {
    //Products
    case 'getAllProducts':
        $result = $products->getAllProducts();
        break;
    case 'getProductById':
        $result = $products->getProductById($data);
        break;
    case 'updateProduct':
        $result = $products->updateProduct($data);
        break;
    case 'createProduct':
        $result = $products->createProduct($data);
        break;
    case 'deleteProduct':
        $result = $products->deleteProduct($data);
        break;
    //OrderedProducts
    case 'getAllOrderedProducts':
        $result = $orderedProducts->getAllOrderedProducts();
        break;
    case 'getOrderedProductById':
        $result = $orderedProducts->getAllOrderedProductById($data);
        break;
    case 'updateOrderedProduct':
        $result = $orderedProducts->updateOrderedProduct($data);
        break;
    case 'createOrderedProduct':
        $result = $orderedProducts->createOrderedProduct($data);
        break;
    case 'deleteOrderedProduct':
        $result = $orderedProducts->deleteOrderedProduct($data);
        break;
    //Orders
    case 'getAllOrders':
        $result = $orders->getAllOrders();
        break;
    case 'getOrderById':
        $result = $orders->getOrderById($data);
        break;
    case 'updateOrder':
        $result = $orders->updateOrder($data);
        break;
    case 'createOrder':
        $result = $orders->createOrder($data);
        break;
    case 'deleteOrder':
        $result = $orders->deleteOrder($data);
        break;
    //Payments
    case 'getAllPayments':
        $result = $payment->getAllPayments();
        break;
    case 'getPaymentById':
        $result = $payment->getPaymentById($data);
        break;
    case 'updatePayment':
        $result = $payment->updatePayment($data);
        break;
    case 'createPayment':
        $result = $payment->createPayment($data);
        break;
    case 'deletePayment':
        $result = $payment->deletePayment($data);
        break;
    //Shipping
    case 'getAllShipping':
        $result = $shipping->getAllShipping();
        break;
    case 'getShippingById':
        $result = $shipping->getShippingById($data);
        break;
    case 'updateShipping':
        $result = $shipping->updateShipping($data);
        break;
    case 'createShipping':
        $result = $shipping->createShipping($data);
        break;
    case 'deleteShipping':
        $result = $shipping->gdeleteShipping($data);
        break;
}

return $result;

?>