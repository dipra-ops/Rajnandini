<?php
session_start();
require_once "config.php";  // ✅ FIXED PATH

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = "SELECT * FROM admins WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {

        $row = mysqli_fetch_assoc($result);

        // Plain password comparison
        if ($password === $row['password']) {

            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['username'];

            header("Location: dashboard.php");
            exit();

        } else {
            $message = "❌ Incorrect password!";
        }

    } else {
        $message = "⚠️ Owner not found!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Owner Login | Rajnandini</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Poppins', sans-serif;
    height: 100vh;
    background: linear-gradient(135deg, #141e30, #243b55);
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-card {
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(15px);
    border-radius: 15px;
    padding: 40px;
    width: 100%;
    max-width: 420px;
    box-shadow: 0 10px 35px rgba(0,0,0,0.5);
    color: white;
}

.login-card h3 {
    text-align: center;
    margin-bottom: 25px;
    color: #ffbe33;
    font-weight: 600;
}

.form-control {
    background: rgba(255,255,255,0.2);
    border: none;
    color: white;
    border-radius: 25px;
    padding: 12px 18px;
}

.form-control::placeholder {
    color: rgba(255,255,255,0.7);
}

.form-control:focus {
    background: rgba(255,255,255,0.25);
    box-shadow: none;
    color: white;
}

.btn-custom {
    background: #ffbe33;
    border: none;
    border-radius: 25px;
    padding: 10px;
    font-weight: bold;
    transition: 0.3s;
}

.btn-custom:hover {
    background: #ff9f00;
    transform: translateY(-2px);
}

a {
    color: #ffbe33;
}

</style>
</head>

<body>

<div class="login-card">

    <h3>👑 Owner Login</h3>

    <?php if(!empty($message)): ?>
        <div class="alert alert-<?php echo $messageType; ?> text-center">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <form method="POST">

        <input type="email"
               name="email"
               class="form-control mb-3"
               placeholder="Owner Email"
               required>

        <input type="password"
               name="password"
               class="form-control mb-4"
               placeholder="Password"
               required>

        <button type="submit" class="btn btn-custom btn-block">
            Login as Owner
        </button>

    </form>

    <div class="text-center mt-3">
        <a href="index.php">← Back to Website</a>
    </div>

</div>

</body>
</html>