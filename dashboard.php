<?php
session_start();
require_once "config.php";

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin.php");
    exit();
}

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Owner Dashboard | Rajnandini</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#f4f6f9; }

.sidebar {
    width:250px;
    height:100vh;
    position:fixed;
    background:linear-gradient(180deg,#141e30,#243b55);
    color:white;
    padding-top:20px;
}

.sidebar h4 {
    color:#ffbe33;
    text-align:center;
    margin-bottom:30px;
}

.sidebar a {
    display:block;
    color:white;
    padding:12px 20px;
    text-decoration:none;
}

.sidebar a:hover {
    background:rgba(255,255,255,0.1);
}

.main {
    margin-left:250px;
    padding:30px;
}

.table th {
    background:#ffbe33;
    color:white;
}
</style>
</head>

<body>

<div class="sidebar">
    <h4>👑 Rajnandini</h4>

    <a href="dashboard.php">📊 Dashboard</a>
    <a href="dashboard.php?page=bookings">🧾 Book Table</a>
    <a href="dashboard.php?page=orders">📦 Orders</a>
    <a href="dashboard.php?page=users">👥 Users</a>
    <a href="dashboard.php?page=cancelled">❌ Cancel Orders</a>

    <div class="text-center mt-5">
        <a href="admin.php" class="btn btn-warning btn-sm">Logout</a>
    </div>
</div>

<div class="main">

<h3>Welcome, <?php echo $_SESSION['admin_name']; ?> 👋</h3>
<hr>

<?php

/* ================= DASHBOARD ================= */
if ($page == 'dashboard') {

    echo "<h4>Admin Overview</h4>";
    echo "<p>Select a section from the left sidebar.</p>";
}

/* ================= BOOKINGS ================= */
elseif ($page == 'bookings') {

    echo "<h4>All Table Bookings</h4>";

    $result = mysqli_query($conn, "SELECT * FROM book_table ORDER BY id DESC");

    echo "<div class='table-responsive'>";
    echo "<table class='table table-bordered mt-3'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Persons</th>
                <th>Date</th>
            </tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['email']}</td>
                <td>{$row['persons']}</td>
                <td>{$row['booking_date']}</td>
              </tr>";
    }

    echo "</table></div>";
}

/* ================= ORDERS ================= */
elseif ($page == 'orders') {

    echo "<h4>All Orders</h4>";

    $result = mysqli_query($conn, "SELECT * FROM orders ORDER BY id DESC");

    echo "<div class='table-responsive'>";
    echo "<table class='table table-bordered mt-3'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Food Item</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Payment</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
            </tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['address']}</td>
                <td>{$row['food_item']}</td>
                <td>₹{$row['price']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['payment_method']}</td>
                <td><strong>₹{$row['total_amount']}</strong></td>
                <td>{$row['status']}</td>
                <td>{$row['created_at']}</td>
              </tr>";
    }

    echo "</table></div>";
}

/* ================= USERS ================= */
elseif ($page == 'users') {

    echo "<h4>All Users</h4>";

    $result = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");

    echo "<table class='table table-bordered mt-3'>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
            </tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['username']}</td>
                <td>{$row['email']}</td>
              </tr>";
    }

    echo "</table>";
}

/* ================= CANCELLED ORDERS ================= */
elseif ($page == 'cancelled') {

    echo "<h4>Cancelled Orders</h4>";

    $result = mysqli_query($conn, "SELECT * FROM orders WHERE status='cancelled' ORDER BY id DESC");

    echo "<table class='table table-bordered mt-3'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Total</th>
                <th>Status</th>
            </tr>";

    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>₹{$row['total_amount']}</td>
                <td>{$row['status']}</td>
              </tr>";
    }

    echo "</table>";
}

?>

</div>
</body>
</html>