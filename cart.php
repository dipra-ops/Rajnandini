<?php
session_start();
require_once "config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn,
    "SELECT * FROM cart WHERE user_id = '$user_id' ORDER BY id DESC");

$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>My Cart - Rajnandini</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link href="css/font-awesome.min.css" rel="stylesheet">

<style>
body{
    background:#1f2f46;
    color:#fff;
}
.cart-container{
    background:#2c3e50;
    padding:30px;
    border-radius:15px;
    margin-top:40px;
}
.table th, .table td{
    color:#fff;
    vertical-align:middle;
}
.total-section{
    text-align:right;
    margin-top:30px;
}
</style>

</head>
<body>

<div class="container">
    <h2 class="mt-4">
        🛒 My Cart
    </h2>

<div class="cart-container">

<?php if(mysqli_num_rows($result) > 0): ?>

<table class="table table-dark table-hover text-center">
    <thead>
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

    <?php while($row = mysqli_fetch_assoc($result)):

        $subtotal = $row['price'] * $row['quantity'];
        $total += $subtotal;
    ?>

    <tr>
        <td><?php echo htmlspecialchars($row['food_item']); ?></td>

        <td>₹<?php echo number_format($row['price'], 2); ?></td>

        <td><?php echo $row['quantity']; ?></td>

        <td>₹<?php echo number_format($subtotal, 2); ?></td>

        <td>
            <a href="remove-cart.php?id=<?php echo $row['id']; ?>"
               class="btn btn-sm btn-danger">
               Remove
            </a>
        </td>
    </tr>

    <?php endwhile; ?>

    </tbody>
</table>

<div class="total-section">
    <h4>
        💰 Total: ₹<?php echo number_format($total, 2); ?>
    </h4>

    <a href="menu.php" class="btn btn-secondary">
        ← Continue Ordering
    </a>

    <a href="checkout.php" class="btn btn-warning">
        Proceed to Checkout →
    </a>
</div>

<?php else: ?>

<div class="text-center">
    <h4>Your cart is empty 🛒</h4>
    <a href="menu.php" class="btn btn-warning mt-3">
        Go to Menu
    </a>
</div>

<?php endif; ?>

</div>
</div>

</body>
</html>