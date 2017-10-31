<?php

session_start();

$cart = $_SESSION['cart'];
$totalprice = 0;

foreach($cart as $cart_item){
 $totalprice += $cart_item['price'];
}

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href=".././styles/styles.css">

    <title>Shopping Cart</title>
</head>

<body>
    <header>
        <div>
            <img class="hot-icon" src=".././images/hot.png" alt="">
            <big>Team Fire Sauce Shopping Cart</big>
        </div>
        <a href="store.php">Store</a>
        <a href="cart.php">Cart</a>
    </header>

    <h1>Your Shopping Cart</h1>

<!-- The add to cart form -->	
<p> 
	Total Price: <?php echo $totalprice?>

</p>
<?php foreach($cart as $cart_item) { ?>
<img class="items" src=".././images/boss-sauce.png" alt="AwesomeSauce">

<p> 
	<?php echo $cart_item['name']?>

</p>

<p> 
	<?php echo $cart_item['description']?>
</p>
<?php } ?>

<form action="processpayment.php" method="post">
Payment Information:
<br>
Credit Card Number<input type="text" name= "card_number" inputmode="numeric"  maxlength="16">
<br>
CVV code<input type="text" name= "cvv" inputmode="numeric" maxlength="3">
<br>
Expiration <input type="month" name= "expiration"> 
<br>
Name on Card<input type="text" name= "card_holder">
<br>
<br>
Shipping Information:
<br>
Name <input type="text" name= "name">
<br>
Address<input type="text" name= "address">
<br>
City<input type="text" name= "city">
<br>
State<input type="text" name= "state" maxlength="2" placeholder="UT">
<br>
Zip<input type="number" name= "zip" >

<input type="hidden" name= "orders">

<input type="submit" name= "ProceedtoCheckout">
</form>



   <!--  <footer>
            Copyright © TeamFireSauceBoss. All rights reserved 
    </footer>
 -->
