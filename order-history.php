<?php
session_start();
require_once "config.php";

/* 🔐 Protect Page */
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?redirect=order-history.php");
    exit();
}

$user_id  = $_SESSION['user_id'];
$username = $_SESSION['user_name'];

/* Get only logged-in user's orders */
$result = mysqli_query($conn, 
    "SELECT * FROM orders 
     WHERE user_id = '$user_id' 
     ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>My Orders | Rajnandini</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #111;
    color: white;
}

.card {
    background: #1b1b1b;
    border: 1px solid #333;
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(255,190,51,0.3);
}

h2 span {
    color: #ffbe33;
}
</style>
</head>

<body>

<div class="container py-5">

<h2 class="text-center mb-4">
    My Orders – <span><?php echo htmlspecialchars($username); ?></span>
</h2>

<?php if ($result && mysqli_num_rows($result) > 0): ?>

<div class="row">

<?php while($row = mysqli_fetch_assoc($result)): ?>

<div class="col-md-6 mb-4">
<div class="card p-3">

<h5>🍽 <?php echo htmlspecialchars($row['food_item']); ?></h5>

<p>
<strong>Name:</strong> <?php echo htmlspecialchars($row['name']); ?><br>
<strong>Phone:</strong> <?php echo htmlspecialchars($row['phone']); ?><br>
<strong>Address:</strong> <?php echo htmlspecialchars($row['address']); ?><br>
<strong>Price:</strong> ₹<?php echo $row['price']; ?><br>
<strong>Qty:</strong> <?php echo $row['quantity']; ?><br>
<strong>Payment:</strong> <?php echo htmlspecialchars($row['payment_method']); ?><br>
<strong>Note:</strong> <?php echo htmlspecialchars($row['note']); ?><br>
<strong>Date:</strong> <?php echo $row['created_at']; ?><br>
</p>

<h6>
💰 Total: ₹<?php echo $row['total_amount']; ?>
</h6>

<p>
<strong>Status:</strong>

<?php
$status = $row['status'];

if ($status == "pending") {
    echo "<span class='badge badge-warning'>Pending</span>";
} elseif ($status == "approved") {
    echo "<span class='badge badge-success'>Approved</span>";
} elseif ($status == "cancelled") {
    echo "<span class='badge badge-danger'>Cancelled</span>";
}
?>
</p>

<?php if($row['status'] == 'pending'): ?>
    <a href="cancel-order.php?id=<?php echo $row['id']; ?>" 
       class="btn btn-sm btn-danger"
       onclick="return confirm('Are you sure you want to cancel this order?');">
       Cancel Order
    </a>
<?php endif; ?>

</div>
</div>

<?php endwhile; ?>

</div>

<?php else: ?>

<div class="alert alert-warning text-center">
    No orders found 😔
</div>

<?php endif; ?>

<div class="text-center mt-4">
<a href="menu.php" class="btn btn-warning">
🍔 Back to Menu
</a>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>