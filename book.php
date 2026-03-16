<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?redirect=book.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> Rajnandini</title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span>
              Rajnandini
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menu.php">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="book.php">Book Table <span class="sr-only">(current)</span> </a>
              </li>
            </ul>
          <ul class="navbar-nav">

            <?php if(isset($_SESSION['user_id'])): ?>

            <!-- Profile Dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-warning font-weight-bold"
                 href="#"
                 id="profileDropdown"
                 role="button"
                 data-toggle="dropdown"
                 aria-haspopup="true"
                 aria-expanded="false">

                 <i class="fa fa-user mr-1"></i>
                 <?php echo $_SESSION['user_name']; ?>
              </a>

              <div class="dropdown-menu dropdown-menu-right shadow">

                

                <a class="dropdown-item" href="profile.php">
                  🧑 My Profile
                </a>
                <a class="dropdown-item" href="order-history.php">
                  📦 My Orders
                </a>
                <a class="dropdown-item" href="cart.php">
               🛒 My Cart
                </a>


                <div class="dropdown-divider"></div>

                <a class="dropdown-item text-danger" href="logout.php">
                  🚪 Logout
                </a>

              </div>
            </li>

          <?php else: ?>

            <!-- Login Dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle"
                 href="#"
                 id="loginDropdown"
                 role="button"
                 data-toggle="dropdown">
                Login
              </a>

              <div class="dropdown-menu dropdown-menu-right shadow">
                <a class="dropdown-item" href="login.php">🧑 Customer Login</a>
                <a class="dropdown-item" href="admin.php">🧑‍💼 Owner Login</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>

          
        </ul>


           

    <!-- Login Dropdown -->
    

  <?php endif; ?>

            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- book section -->
  <section class="book_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Book A Table
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form_container">
            <form action="">
              <div>
                <input type="text" class="form-control" placeholder="Your Name" />
              </div>
              <div>
                <input type="text" class="form-control" placeholder="Phone Number" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Your Email" />
              </div>
              <div>
                <select class="form-control nice-select wide">
                  <option value="" disabled selected>
                    How many persons?
                  </option>
                  <option value="">
                    2
                  </option>
                  <option value="">
                    3
                  </option>
                  <option value="">
                    4
                  </option>
                  <option value="">
                    5
                  </option>
                </select>
              </div>
              <div>
                <input type="date" class="form-control">
              </div>
              <div class="btn_box">
                <button>
                  <a href="book.php">Book Table</a>
                </button>
              </div>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div class="map_container ">
            <div id="googleMap"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end book section -->

  <!-- footer section -->
  <footer class="footer_section">
  <div class="container">
    <div class="row">

      <!-- Contact Form -->
      <div class="col-md-4 footer-col">
        <div class="footer_contact">
          <h4>Contact Us</h4>

          <form action="contact.php" method="POST">

            <input
              type="text"
              name="name"
              class="form-control mb-2"
              placeholder="Your Name"
              required
            />

            <input
              type="email"
              name="email"
              class="form-control mb-2"
              placeholder="Your Email"
              required
            />

            <input
              type="text"
              name="subject"
              class="form-control mb-2"
              placeholder="Subject"
              required
            />

            <textarea
              name="message"
              class="form-control mb-2"
              rows="3"
              placeholder="Your Message"
              required
            ></textarea>

            <button type="submit" class="btn btn-warning btn-block">
              Send Message
            </button>

          </form>
        </div>
      </div>

      <!-- Restaurant Details -->
      <div class="col-md-4 footer-col">
        <div class="footer_detail">
          <a href="#" class="footer-logo"> Rajnandini </a>

          <p>
            Rajnandini offers a delightful dining experience with 
            carefully crafted dishes, premium ingredients, 
            and warm hospitality.
          </p>

          <div class="footer_social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
          </div>
        </div>
      </div>

      <!-- Opening Hours -->
      <div class="col-md-4 footer-col">
        <h4>Opening Hours</h4>
        <p>Everyday</p>
        <p>10:00 AM – 10:00 PM</p>

        <div class="contact_link_box mt-3">
          <p><i class="fa fa-phone"></i> +91 7908166386</p>
          <p><i class="fa fa-envelope"></i> diprajsarkar3@gmail.com</p>
        </div>
      </div>

    </div>

    <div class="footer-info">
      <p>
        © <span id="displayYear"></span> All Rights Reserved <br />
        Designed & Developed by <strong>Dipraj Sarkar</strong>
      </p>
    </div>
  </div>
</footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>