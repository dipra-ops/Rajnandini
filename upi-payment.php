
<?php
session_start();

if (!isset($_SESSION['payment_data'])) {
    header("Location: menu.php");
    exit();
}

$order_id = $_SESSION['order_id'];
?>

<!DOCTYPE html>
<html>
<head>
<title>UPI Payment</title>
<link rel="stylesheet" href="css/bootstrap.css">
<style>
body{background:#0f172a;color:white;text-align:center;}
.box{
background:#1e293b;
padding:30px;
margin-top:60px;
border-radius:15px;
}
</style>
</head>
<body>

<div class="container box">

<h3>📱 UPI Payment</h3>
<hr>

<p>Order ID: <?php echo $order_id; ?></p>

<p>Scan QR & Click Confirm (Demo Payment)</p>

<img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=RajnandiniPayment">

<br><br>

<form action="verify.php" method="POST">
<button type="submit" class="btn btn-success btn-block">
I Have Paid →
</button>
</form>

</div>

</body>
</html>