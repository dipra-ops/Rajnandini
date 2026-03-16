<?php
session_start();
require_once "config.php";

$message = "";
$messageType = "info";


if (isset($_GET['logout']) && $_GET['logout'] == "success") {
    $message = "✅ You have logged out successfully!";
    $messageType = "success";
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row['password'])) {

                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['username'];

                
                if (isset($_GET['redirect']) && !empty($_GET['redirect'])) {
                    header("Location: " . $_GET['redirect']);
                } else {
                    header("Location: index.php"); 
                }
                exit();

            } else {
                $message = "❌ Incorrect password!";
                $messageType = "danger";
            }

        } else {
            $message = "⚠️ Email not registered!";
            $messageType = "warning";
        }

    } else {
        $message = "❌ Please fill all fields!";
        $messageType = "danger";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Rajnandini</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- ✅ Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- ✅ Dancing Script -->
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600;700&display=swap" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      background: url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1974') center center / cover no-repeat;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', sans-serif;
    }

    .login-card {
      background: rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(12px);
      border-radius: 15px;
      box-shadow: 0 10px 35px rgba(0,0,0,0.5);
      color: white;
    }

    h3 {
      font-family: 'Dancing Script', cursive;
      font-size: 32px;
      text-align: center;
      margin-bottom: 25px;
      color: #ffbe33;
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
      font-weight: bold;
      border-radius: 25px;
      padding: 10px;
      transition: 0.3s;
    }

    .btn-custom:hover {
      background: #ff9f00;
      transform: translateY(-2px);
    }

    a { color: #ffbe33; }
    a:hover { color: #ff9f00; }

    @media (max-width: 576px) {
      h3 { font-size: 26px; }
    }
  </style>
</head>

<body>

<div class="container">
  <div class="row justify-content-center w-100">
    <div class="col-11 col-sm-9 col-md-6 col-lg-4">

      <div class="login-card p-4 p-md-5">

        <h3>Welcome Back</h3>

        <?php if(!empty($message)): ?>
          <div class="alert alert-info text-center">
            <?php echo $message; ?>
          </div>
        <?php endif; ?>

        <form method="POST" autocomplete="off">

          <input type="email" 
                 name="email" 
                 class="form-control mb-3" 
                 placeholder="Email Address" 
                 required>

          <input type="password" 
                 name="password" 
                 class="form-control mb-4" 
                 placeholder="Password" 
                 required>

          <button type="submit" class="btn btn-custom btn-block">
            Login Now
          </button>

        </form>

        <div class="text-center mt-3">
          New user?
          <a href="register.php">Create account</a>
        </div>

      </div>

    </div>
  </div>
</div>

<!-- ✅ Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- ✅ Auto Fade Alert -->
<script>
  setTimeout(function() {
    let alert = document.querySelector('.alert');
    if(alert){
      alert.style.transition = "0.5s";
      alert.style.opacity = "0";
    }
  }, 2000);
</script>

</body>
</html>