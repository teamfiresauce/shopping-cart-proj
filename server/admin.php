<?php
include_once('./database/DBHelper.php');
include_once('./controllers/productsController.php');
include_once('./controllers/ordersController.php');
include_once('./controllers/shippingController.php');

$logged_in = false;
$admin_username = 'admin';
$admin_password = 'password1234';

session_start();

if (isset($_SESSION['admin_username']) || (isset($_POST['admin_username']) && $_POST['admin_username'] == $admin_username) && (isset($_POST['admin_password']) && $_POST['admin_password'] == $admin_password)) {
    $_SESSION['admin_username'] = $_POST['admin_username'];
    $logged_in = true;
    $db = new DBHelper();

    $products_controller = new ProductsController($db);

    $products = $products_controller->getAllProducts();

    $orders_controller = new OrdersController($db);
    $shipping_controller = new shippingController($db);

    $all_orders = $orders_controller->getAllOrders();

    $orders = [];

    foreach ($all_orders as $order) {
        $shipping = $shipping_controller->getShippingById($order['shipping_id']);
        $order['shipping_info'] = $shipping;
        $orders[] = $order;
    }
}

?>

<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href=".././styles/styles.css">
<meta charset="utf-8">
<title>Admin Page</title>
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
    <?php if ($logged_in) { ?>
	<div id="wholething">

		<div id="container">

		    <div class="item_management">
		    <h2>Item Management</h2>
		    <?php foreach($products as $product) { ?>
		        <span><strong>Name:</strong> <?php echo $product['name'] ?></span>
		        <br>
		        <span><strong>Description:</strong> <?php echo $product['description'] ?></span>
		        <form method="post">
		        <span><strong>Quantity:</strong> </span>
                <input class="button" type="submit" value="-">
                <span><?php echo $product['quantity'] ?></span>
                <input class="button" type="submit" value="+">
                </form>
                <br>
             <?php } ?>
		    </div>

		    <div class="order_management">
		    <h2>Order Management</h2>
		    <?php foreach($orders as $order) { ?>
                <span><strong>Order:</strong> <?php echo $order['id'][''] ?></span>
                <br>
                <span><strong>Address:</strong> <?php echo $order['shipping_info']['address'] ?></span>
                <br>
                <span><strong>City:</strong> <?php echo $order['shipping_info']['city'] ?></span>
                <br>
                <span><strong>State:</strong> <?php echo $order['shipping_info']['state'] ?></span>
                <br>
                <span><strong>Zip:</strong> <?php echo $order['shipping_info']['zip'] ?></span>
                <br>
                <br>
                <br>
                <br>
            <?php } ?>
            </div>

		</div>

	</div>
	</div>
    <?php } else { ?>
	<form action="admin.php" method="post">
        <h3>Admin Login</h3>
        <input name="admin_username" type="text">
        <input name="admin_password" type="password">
        <button type="submit" value="Submit">Submit</button>
    </form>
    <?php } ?>
</body>
</html>