<?php
session_start();
require_once "config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {

    $order_id = intval($_GET['id']);
    $user_id  = $_SESSION['user_id'];

    $check = mysqli_query($conn, 
        "SELECT * FROM orders 
         WHERE id='$order_id' 
         AND user_id='$user_id' 
         AND status='pending'");

    if (mysqli_num_rows($check) > 0) {
        mysqli_query($conn, 
            "UPDATE orders 
             SET status='cancelled' 
             WHERE id='$order_id'");
    }
}

header("Location: order-history.php");
exit();
?>