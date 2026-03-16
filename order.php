<?php
session_start();
require_once "config.php";

/* 🔐 Protect Page */
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?redirect=menu.php");
    exit();
}

/* Get item from Buy button */
$selected_item  = $_GET['item'] ?? '';
$selected_price = $_GET['price'] ?? '';

/* Handle Order Submit */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $food_item = $_POST['food_item'] ?? '';
    $price     = floatval($_POST['price'] ?? 0);
    $quantity  = intval($_POST['quantity'] ?? 1);

    if ($food_item != "" && $price > 0) {

        /* Store everything in ONE payment session */
        $_SESSION['payment_data'] = [
            'type' => 'buy',
            'items' => [
                [
                    'food_item' => $food_item,
                    'price'     => $price,
                    'quantity'  => $quantity
                ]
            ],
            'delivery' => [
                'name'    => $_POST['name'] ?? '',
                'phone'   => $_POST['phone'] ?? '',
                'address' => $_POST['address'] ?? '',
                'note'    => $_POST['note'] ?? ''
            ]
        ];

        header("Location: payment.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Food | Rajnandini</title>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

<div class="container mt-5">

    <h3 class="text-center mb-4">🍔 Place Your Order</h3>

    <form method="POST">

        <div class="form-row">

            <div class="form-group col-md-6">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>

        </div>

        <div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>

        <div class="form-row">

            <div class="form-group col-md-6">
                <label>Food Item</label>
                <input type="text" 
                       name="food_item" 
                       value="<?php echo htmlspecialchars($selected_item); ?>" 
                       class="form-control" readonly required>
            </div>

            <div class="form-group col-md-3">
                <label>Price</label>
                <input type="text" 
                       name="price" 
                       value="<?php echo htmlspecialchars($selected_price); ?>" 
                       class="form-control" readonly required>
            </div>

            <div class="form-group col-md-3">
                <label>Quantity</label>
                <input type="number" 
                       name="quantity" 
                       value="1" 
                       min="1" 
                       class="form-control" required>
            </div>

        </div>

        <div class="form-group">
            <label>Note (Optional)</label>
            <textarea name="note" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-warning btn-block">
            Proceed To Payment
        </button>

    </form>

</div>

</body>
</html>