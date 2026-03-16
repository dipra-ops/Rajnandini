<?php
session_start();
require_once "config.php";

if (!isset($_SESSION['user_id'])) {
    echo "login_required";
    exit();
}

$user_id = $_SESSION['user_id'];

$food_item = isset($_POST['food_item']) ? mysqli_real_escape_string($conn, $_POST['food_item']) : '';
$price     = isset($_POST['price']) ? floatval($_POST['price']) : 0;
$quantity  = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

if (empty($food_item) || $price <= 0 || $quantity <= 0) {
    echo "invalid_data";
    exit();
}

/* Check if item exists */
$check = mysqli_query($conn,
    "SELECT id, quantity FROM cart 
     WHERE user_id = '$user_id' 
     AND food_item = '$food_item'");

if (mysqli_num_rows($check) > 0) {

    $row = mysqli_fetch_assoc($check);
    $new_qty = $row['quantity'] + $quantity;

    mysqli_query($conn,
        "UPDATE cart 
         SET quantity = '$new_qty'
         WHERE id = '{$row['id']}'");

} else {

    mysqli_query($conn,
        "INSERT INTO cart (user_id, food_item, price, quantity)
         VALUES ('$user_id', '$food_item', '$price', '$quantity')");
}

echo "success";
exit();