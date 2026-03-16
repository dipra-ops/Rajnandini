<?php
session_start();

/* Protect Page */
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

/* Check Payment Data */
if (!isset($_SESSION['payment_data'])) {
    header("Location: menu.php");
    exit();
}

$data = $_SESSION['payment_data'];

/* Generate Order ID */
$order_id = "RN" . date("YmdHis") . rand(100,999);
$_SESSION['order_id'] = $order_id;

/* Calculate Total */
$total = 0;
foreach ($data['items'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Payment - Rajnandini</title>
<link rel="stylesheet" href="css/bootstrap.css">
<style>
body{
    background:#0f172a;
    color:#fff;
}
.payment-box{
    background:#1e293b;
    padding:30px;
    border-radius:15px;
    margin-top:40px;
}
.summary-box{
    background:#334155;
    padding:20px;
    border-radius:10px;
}
</style>
</head>
<body>

<div class="container">
<div class="payment-box">

<h3>💳 Payment Page</h3>
<hr>

<h5>Order ID: <?php echo $order_id; ?></h5>

<div class="summary-box mt-4">
<h5>🧾 Order Summary</h5>
<hr>

<?php foreach ($data['items'] as $item): ?>
<p>
    <?php echo htmlspecialchars($item['food_item']); ?>
    (x<?php echo $item['quantity']; ?>)
    - ₹<?php echo number_format($item['price'] * $item['quantity'],2); ?>
</p>
<?php endforeach; ?>

<hr>
<h4>Total Amount: ₹<?php echo number_format($total,2); ?></h4>
</div>

<hr>

<h5>Select Payment Method</h5>

<div class="row mt-4">

<div class="col-md-6 mb-3">
    <a href="upi-payment.php"
       class="btn btn-success btn-block p-3">
       📱 Pay via UPI
    </a>
</div>

<div class="col-md-6 mb-3">
    <a href="card-payment.php"
       class="btn btn-warning btn-block p-3">
       💳 Pay via Card
    </a>
</div>

</div>

<a href="menu.php" class="btn btn-light mt-3">
Cancel Payment
</a>

</div>
</div>

</body>
</html>