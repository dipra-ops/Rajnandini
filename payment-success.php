<?php
session_start();
require_once "config.php";

/* Protect Page */
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$order_id = $_SESSION['order_id'] ?? uniqid("RN");

/* ===============================
   HANDLE DIRECT BUY ORDER
================================= */
if (isset($_SESSION['direct_order'])) {

    $order = $_SESSION['direct_order'];

    mysqli_query($conn,
        "INSERT INTO orders
        (user_id, name, phone, address, food_item, price, quantity, payment_method, note, status)
        VALUES
        ('$user_id',
         '{$order['name']}',
         '{$order['phone']}',
         '{$order['address']}',
         '{$order['food_item']}',
         '{$order['price']}',
         '{$order['quantity']}',
         '{$order['payment']}',
         '{$order['note']}',
         'Paid')");

    unset($_SESSION['direct_order']);
}

/* ===============================
   HANDLE CART CHECKOUT
================================= */
if (isset($_SESSION['checkout_data'])) {

    $data = $_SESSION['checkout_data'];

    $cart = mysqli_query($conn,
        "SELECT * FROM cart WHERE user_id='$user_id'");

    while ($row = mysqli_fetch_assoc($cart)) {

        mysqli_query($conn,
            "INSERT INTO orders
            (user_id, name, phone, address, food_item, price, quantity, payment_method, status)
            VALUES
            ('$user_id',
             '{$data['name']}',
             '{$data['phone']}',
             '{$data['address']}',
             '{$row['food_item']}',
             '{$row['price']}',
             '{$row['quantity']}',
             '{$data['payment_method']}',
             'Paid')");
    }

    /* Clear Cart */
    mysqli_query($conn, "DELETE FROM cart WHERE user_id='$user_id'");

    unset($_SESSION['checkout_data']);
}

/* Clear Order ID */
unset($_SESSION['order_id']);
?>

<!DOCTYPE html>
<html>
<head>
<title>Payment Success</title>
<link rel="stylesheet" href="css/bootstrap.css">
<style>
body{
background:#0f172a;
color:white;
text-align:center;
}
.success-box{
margin-top:120px;
}
</style>
</head>
<body>

<div class="success-box">
<h1>✅ Payment Successful</h1>
<h4>Order ID: <?php echo htmlspecialchars($order_id); ?></h4>

<br>

<a href="order-history.php" class="btn btn-warning">
View My Orders
</a>

<a href="menu.php" class="btn btn-light ml-2">
Continue Shopping
</a>

</div>

</body>
</html>