<?php
session_start();

if (!isset($_SESSION['payment_data'])) {
    header("Location: menu.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Card Payment</title>
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

<h3>💳 Card Payment (Demo)</h3>
<hr>

<p>Enter any card details (Demo Only)</p>

<form action="verify.php" method="POST">

<input type="text" class="form-control mb-3"
placeholder="Card Number" required>

<input type="text" class="form-control mb-3"
placeholder="Expiry" required>

<input type="text" class="form-control mb-3"
placeholder="CVV" required>

<button type="submit" class="btn btn-warning btn-block">
Pay Now →
</button>

</form>

</div>

</body>
</html>