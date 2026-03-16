<?php
session_start();
require_once "config.php";

/* 🔐 Protect Page */
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

/* Get Cart Items */
$cart_query = mysqli_query($conn,
    "SELECT * FROM cart WHERE user_id='$user_id'");

if (!$cart_query) {
    die("Cart Query Error: " . mysqli_error($conn));
}

$total = 0;
$items = [];

while($item = mysqli_fetch_assoc($cart_query)){

    $subtotal = $item['price'] * $item['quantity'];
    $total += $subtotal;

    $items[] = [
        'food_item' => $item['food_item'],
        'price'     => $item['price'],
        'quantity'  => $item['quantity']
    ];
}

if (empty($items)) {
    header("Location: cart.php");
    exit();
}

/* Handle Checkout Submit */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION['payment_data'] = [
        'type' => 'cart',
        'items' => $items,
        'delivery' => [
            'name'    => $_POST['name'],
            'phone'   => $_POST['phone'],
            'address' => $_POST['address']
        ],
        'payment_method' => $_POST['payment_method']
    ];

    header("Location: payment.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Checkout - Rajnandini</title>
<link rel="stylesheet" href="css/bootstrap.css">
<style>
body{
    background:#1f2f46;
    color:#fff;
}
.checkout-box{
    background:#2c3e50;
    padding:30px;
    border-radius:15px;
    margin-top:40px;
}
</style>
</head>
<body>

<div class="container">
<div class="checkout-box">

<h3>🧾 Checkout</h3>
<hr>

<form method="POST">

<h5>Order Summary</h5>
<hr>

<?php foreach($items as $item): ?>
<p>
    <?php echo $item['food_item']; ?> 
    (x<?php echo $item['quantity']; ?>) 
    - ₹<?php echo number_format($item['price'] * $item['quantity'],2); ?>
</p>
<?php endforeach; ?>

<hr>
<h4>Total Amount: ₹<?php echo number_format($total,2); ?></h4>

<br>

<div class="form-group">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="form-group">
<label>Phone</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="form-group">
<label>Address</label>
<textarea name="address" class="form-control" required></textarea>
</div>

<div class="form-group">
<label>Select Payment Method</label>
<select name="payment_method" class="form-control" required>
<option value="">Choose</option>
<option value="Card">Card Payment</option>
<option value="UPI">UPI Payment</option>
</select>
</div>

<button type="submit" class="btn btn-warning btn-block">
Proceed to Payment →
</button>

</form>

</div>
</div>

</body>
</html>