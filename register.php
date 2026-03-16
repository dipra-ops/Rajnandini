<?php
require_once "config.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // ✅ Prevent undefined key errors
  if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Check duplicate email
    $checkQuery = "SELECT id FROM users WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
      $message = "⚠️ Email already registered!";
    } else {

      // Hash password
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      // ✅ Insert using username column
      $insertQuery = "INSERT INTO users (username, email, password)
                      VALUES ('$username', '$email', '$hashedPassword')";

      if (mysqli_query($conn, $insertQuery)) {
        $message = "✅ Registration successful!";
      } else {
        $message = "❌ Registration failed!";
      }
    }

  } else {
    $message = "❌ Please fill all fields!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register | Rajnandini</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ✅ Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- ✅ Dancing Script Font -->
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
       background: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1974') center center / cover no-repeat;
      font-family: 'Segoe UI', sans-serif;
      overflow: hidden;
    }
    body::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.65);
      z-index: 1;
    }

    .brand-font, h3 {
      font-family: 'Dancing Script', cursive;
      font-weight: 700;
      letter-spacing: 1px;
      color: #ffbe33;
    }

    .floating {
      position: fixed;
      width: 100%;
      height: 100%;
      left: 0;
      bottom: 0;
      pointer-events: none;
      z-index: 1;
    }

    .floating img {
      position: absolute;
      width: 90px;
      height: 90px;
      bottom: -120px;
      opacity: 1;
      animation: floatUp 12s infinite linear;
    }

    @keyframes floatUp {
      0% { transform: translateY(0) rotate(0deg); }
      100% { transform: translateY(-120vh) rotate(360deg); }
    }

    .center-wrapper {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 10;
      position: relative;
      padding: 20px;
    }

    .register-card {
      width: 100%;
      max-width: 420px;
      background: rgba(255,255,255,0.12);
      backdrop-filter: blur(12px);
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.4);
      color: white;
      padding: 35px;
    }

    .form-control {
      background: rgba(255,255,255,0.2);
      border: none;
      color: white;
      height: 45px;
    }

    .form-control::placeholder {
      color: rgba(255,255,255,0.7);
    }

    .btn-custom {
      background: #ffbe33;
      border: none;
      font-weight: bold;
      height: 45px;
    }

    .btn-custom:hover {
      background: #ff9f00;
    }

    a { color: #ffbe33; }

    @media (max-width: 576px) {
      .register-card { padding: 25px; }
      .floating img { width: 55px; height: 55px; }
    }
  </style>
</head>

<body>

<div class="floating">
  <img src="https://cdn-icons-png.flaticon.com/512/1404/1404945.png" style="left:5%; animation-delay:0s;">
  <img src="https://cdn-icons-png.flaticon.com/512/3075/3075977.png" style="left:25%; animation-delay:2s;">
  <img src="https://cdn-icons-png.flaticon.com/512/2515/2515183.png" style="left:45%; animation-delay:4s;">
  <img src="https://cdn-icons-png.flaticon.com/512/1046/1046784.png" style="left:65%; animation-delay:1s;">
  <img src="https://cdn-icons-png.flaticon.com/512/5787/5787016.png" style="left:85%; animation-delay:3s;">
</div>

<div class="center-wrapper">
  <div class="register-card">

    <h3 class="text-center mb-4 brand-font">Create Your Account</h3>

    <?php if($message): ?>
      <div class="alert alert-success text-center">
        <?php echo $message; ?>
      </div>
    <?php endif; ?>

    <form method="POST" autocomplete="off">
      <input type="text" name="username" class="form-control mb-3" placeholder="username" required>
      <input type="email" name="email" class="form-control mb-3" placeholder="Email Address" required>
      <input type="password" name="password" class="form-control mb-4" placeholder="Password" required>

      <button type="submit" class="btn btn-custom btn-block">
        Register Now
      </button>

    </form>

    <div class="text-center mt-3">
      Already have an account?
      <a href="login.php">Login here</a>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>