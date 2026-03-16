<?php
session_start();
require_once "config.php";

/* Protect */
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

/* Check payment session */
if (!isset($_SESSION['payment_data'])) {
    header("Location: menu.php");
    exit();
}

$user_id  = $_SESSION['user_id'];
$order_id = $_SESSION['order_id'] ?? ("RN" . date("YmdHis") . rand(100,999));
$data     = $_SESSION['payment_data'];

/* Detect Payment Method */
$payment_method = $_POST['payment_method'] ?? 'Online';

/* Insert Orders */
foreach ($data['items'] as $item) {

    $food_item = mysqli_real_escape_string($conn, $item['food_item']);
    $price     = floatval($item['price']);
    $quantity  = intval($item['quantity']);
    $status    = "paid";

    $name    = $data['delivery']['name']    ?? '';
    $phone   = $data['delivery']['phone']   ?? '';
    $address = $data['delivery']['address'] ?? '';
    $note    = $data['delivery']['note']    ?? '';

    $query = "INSERT INTO orders 
        (user_id, name, phone, address, food_item, price, quantity, payment_method, note, status, created_at)
        VALUES
        ('$user_id','$name','$phone','$address','$food_item','$price','$quantity','$payment_method','$note','$status', NOW())";

    if (!mysqli_query($conn, $query)) {
        die("Order Insert Error: " . mysqli_error($conn));
    }
}

/* Clear cart if cart purchase */
if ($data['type'] === 'cart') {
    mysqli_query($conn,
        "DELETE FROM cart WHERE user_id='$user_id'");
}

/* Clear payment session */
unset($_SESSION['payment_data']);

/* Save order ID */
$_SESSION['order_id'] = $order_id;

header("Location: payment-success.php");
exit();
?>