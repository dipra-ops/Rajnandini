<?php
session_start();
?>
<!doctype html>
<html>
  <head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="" />

    <title>Rajnandini</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!--owl slider stylesheet -->
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <!-- nice select  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
      integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
      crossorigin="anonymous"
    />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
  </head>

  <body>
  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="" />
    </div>

    <!-- header section starts -->
    <header class="header_section">
  <div class="container">
    <nav class="navbar navbar-expand-lg custom_nav-container">

      <!-- Logo -->
      <a class="navbar-brand" href="index.php">
        <span> Rajnandini </span>
      </a>

      <!-- Mobile Toggle -->
      <button class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <!-- Center Menu -->
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="menu.php">Menu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="book.php">Book Table</a>
          </li>
        </ul>

        <!-- Right Side User Section -->
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

          <?php endif; ?>

        </ul>

      </div>
    </nav>
  </div>
</header>
    <?php if(isset($_GET['logout']) && $_GET['logout'] == "success"): ?>
  <div class="alert alert-success text-center m-0">
    You have logged out successfully!
  </div>
<?php endif; ?>
      <!-- end header section -->
      <!-- slider section -->
      <section class="slider_section">
  <div id="customCarousel1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">

      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-lg-6">
              <div class="detail-box">
                <h1>Welcome to Rajnandini</h1>
                <p>
                  Experience delicious flavors, freshly prepared dishes,
                  and a warm dining atmosphere crafted for food lovers.
                </p>
                <div class="btn-box">
                  <a href="menu.php" class="btn1">Order Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-lg-6">
              <div class="detail-box">
                <h1>Premium Taste & Quality</h1>
                <p>
                  We use only the finest ingredients to serve meals
                  that delight your taste buds and satisfy your cravings.
                </p>
                <div class="btn-box">
                  <a href="menu.php" class="btn1">Order Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="container">
          <div class="row">
            <div class="col-md-7 col-lg-6">
              <div class="detail-box">
                <h1>Perfect Place to Dine</h1>
                <p>
                  Whether it's a casual outing or a special occasion,
                  Rajnandini offers the ideal ambience and unforgettable taste.
                </p>
                <div class="btn-box">
                  <a href="menu.php" class="btn1">order now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Indicators -->
    <div class="container">
      <ol class="carousel-indicators">
        <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
        <li data-target="#customCarousel1" data-slide-to="1"></li>
        <li data-target="#customCarousel1" data-slide-to="2"></li>
      </ol>
    </div>

  </div>
</section>
      <!-- end slider section -->
    </div>

    <!-- offer section -->

    <section class="offer_section layout_padding-bottom">
      <div class="offer_container">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="box">
                <div class="img-box">
                  <img src="images/o1.jpg" alt="" />
                </div>
                <div class="detail-box">
                  <h5>Tasty Thursdays</h5>
                  <h6><span>20%</span> Off</h6>
                  <a href="menu.php">
                    Order Now
                    <svg
                      version="1.1"
                      id="Capa_1"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                      x="0px"
                      y="0px"
                      viewBox="0 0 456.029 456.029"
                      style="enable-background: new 0 0 456.029 456.029"
                      xml:space="preserve"
                    >
                      <g>
                        <g>
                          <path
                            d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                     c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z"
                          />
                        </g>
                      </g>
                      <g>
                        <g>
                          <path
                            d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                     C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                     c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                     C457.728,97.71,450.56,86.958,439.296,84.91z"
                          />
                        </g>
                      </g>
                      <g>
                        <g>
                          <path
                            d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                     c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z"
                          />
                        </g>
                      </g>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="box">
                <div class="img-box">
                  <img src="images/o2.jpg" alt="" />
                </div>
                <div class="detail-box">
                  <h5>Pizza Days</h5>
                  <h6><span>15%</span> Off</h6>
                  <a href="menu.php">
                    Order Now
                    <svg
                      version="1.1"
                      id="Capa_1"
                      xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink"
                      x="0px"
                      y="0px"
                      viewBox="0 0 456.029 456.029"
                      style="enable-background: new 0 0 456.029 456.029"
                      xml:space="preserve"
                    >
                      <g>
                        <g>
                          <path
                            d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                     c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z"
                          />
                        </g>
                      </g>
                      <g>
                        <g>
                          <path
                            d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                     C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                     c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                     C457.728,97.71,450.56,86.958,439.296,84.91z"
                          />
                        </g>
                      </g>
                      <g>
                        <g>
                          <path
                            d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                     c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z"
                          />
                        </g>
                      </g>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end offer section -->

    <!-- food section -->

    <section class="food_section layout_padding-bottom">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>Our Menu</h2>
    </div>

    <ul class="filters_menu">
      <li class="active" data-filter="*">All</li>
      <li data-filter=".burger">Burger</li>
      <li data-filter=".pizza">Pizza</li>
      <li data-filter=".pasta">Pasta</li>
      <li data-filter=".fries">Fries</li>
    </ul>

    <div class="filters-content">
      <div class="row grid">

        <!-- Pizza -->
        <div class="col-sm-6 col-lg-4 all pizza">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/f1.png" alt="" />
              </div>
              <div class="detail-box">
                <h5>Delicious Pizza</h5>
                <p>
                  Freshly baked pizza topped with rich mozzarella cheese,
                  premium vegetables, and our signature tomato sauce.
                </p>
                <div class="options">
                  <h6>$20</h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Burger -->
        <div class="col-sm-6 col-lg-4 all burger">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/f2.png" alt="" />
              </div>
              <div class="detail-box">
                <h5>Delicious Burger</h5>
                <p>
                  Juicy grilled patty layered with fresh lettuce, cheese,
                  onions, and our special house-made burger sauce.
                </p>
                <div class="options">
                  <h6>$15</h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pizza -->
        <div class="col-sm-6 col-lg-4 all pizza">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/f3.png" alt="" />
              </div>
              <div class="detail-box">
                <h5>Cheese Burst Pizza</h5>
                <p>
                  Crispy crust pizza filled with extra melted cheese
                  and topped with flavorful herbs and spices.
                </p>
                <div class="options">
                  <h6>$17</h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pasta -->
        <div class="col-sm-6 col-lg-4 all pasta">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/f4.png" alt="" />
              </div>
              <div class="detail-box">
                <h5>Creamy Pasta</h5>
                <p>
                  Smooth and creamy pasta tossed with fresh vegetables,
                  aromatic herbs, and a rich white sauce.
                </p>
                <div class="options">
                  <h6>$18</h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Fries -->
        <div class="col-sm-6 col-lg-4 all fries">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/f5.png" alt="" />
              </div>
              <div class="detail-box">
                <h5>French Fries</h5>
                <p>
                 Freshly baked pizza topped with rich mozzarella cheese,
                  premium vegetables, and our signature tomato sauce.
                </p>
                <div class="options">
                  <h6>$10</h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pizza -->
        <div class="col-sm-6 col-lg-4 all pizza">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/f6.png" alt="" />
              </div>
              <div class="detail-box">
                <h5>Veggie Pizza</h5>
                <p>
                  A delightful combination of farm-fresh vegetables,
                  melted cheese, and tangy tomato sauce.
                </p>
                <div class="options">
                  <h6>$15</h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Burger -->
        <div class="col-sm-6 col-lg-4 all burger">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/f7.png" alt="" />
              </div>
              <div class="detail-box">
                <h5>Classic Burger</h5>
                <p>
                  Freshly baked pizza topped with rich mozzarella cheese,
                  premium vegetables, and our signature tomato sauce.
                </p>
                <div class="options">
                  <h6>$12</h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Burger -->
        <div class="col-sm-6 col-lg-4 all burger">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/f8.png" alt="" />
              </div>
              <div class="detail-box">
                <h5>Double Patty Burger</h5>
                <p>
                  Freshly baked pizza topped with rich mozzarella cheese,
                  premium vegetables, and our signature tomato sauce.
                </p>
                <div class="options">
                  <h6>$14</h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pasta -->
        <div class="col-sm-6 col-lg-4 all pasta">
          <div class="box">
            <div>
              <div class="img-box">
                <img src="images/f9.png" alt="" />
              </div>
              <div class="detail-box">
                <h5>Italian Pasta</h5>
                <p>
                  Authentic Italian-style pasta infused with herbs,
                  rich sauce, and freshly prepared ingredients.
                </p>
                <div class="options">
                  <h6>$10</h6>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="btn-box">
      <a href="menu.php">View More</a>
    </div>
  </div>
</section>
    
    <!-- end food section -->

    <!-- about section -->

    <section class="about_section layout_padding">
  <div class="container">
    <div class="row align-items-center">

      <div class="col-md-6">
        <div class="img-box">
          <img 
            src="images/ChatGPT Image Feb 25, 2026, 02_58_56 PM.png" 
            alt="Rajnandini Restaurant Ambience"
          />
        </div>
      </div>

      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>About Rajnandini</h2>
          </div>

          <p>
            Rajnandini is more than just a restaurant — it’s a place where 
            taste, tradition, and hospitality come together. We take pride 
            in serving freshly prepared dishes made from premium-quality 
            ingredients, delivering an unforgettable dining experience.
          </p>

          <p>
            Whether you're enjoying a casual meal, celebrating a special 
            occasion, or dining with family and friends, Rajnandini offers 
            a warm ambience, exceptional flavors, and outstanding service.
          </p>

          <a href="about.php">Read More</a>
        </div>
      </div>

    </div>
  </div>
</section>

    <!-- end about section -->

    <!-- book section -->
   
            </div>
          </div>
          <div class="col-md-6">
            <div class="map_container">
              <div id="googleMap"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end book section -->

    <!-- client section -->

    <section class="client_section layout_padding-bottom">
  <div class="container">
    <div class="heading_container heading_center psudo_white_primary mb_45">
      <h2>What Our Customers Say</h2>
    </div>

    <div class="carousel-wrap row">
      <div class="owl-carousel client_owl-carousel">

        <div class="item">
          <div class="box">
            <div class="detail-box">
              <p>
                “Absolutely loved the food at Rajnandini! 
                The flavors were authentic, the presentation was beautiful, 
                and the service was exceptional. Highly recommended.”
              </p>
              <h6>Rahul Sharma</h6>
              <p>Food Enthusiast</p>
            </div>
            <div class="img-box">
              <img src="images/client1.jpg" alt="Rahul Sharma" class="box-img" />
            </div>
          </div>
        </div>

        <div class="item">
          <div class="box">
            <div class="detail-box">
              <p>
                “A perfect place for family dining. 
                The ambience is cozy, staff are friendly, 
                and every dish we tried was delicious. 
                Will definitely visit again!”
              </p>
              <h6>Priya Sen</h6>
              <p>Regular Customer</p>
            </div>
            <div class="img-box">
              <img src="images/client2.jpg" alt="Priya Sen" class="box-img" />
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

    <!-- end client section -->

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
<script>
setTimeout(function() {
  let alertBox = document.querySelector('.alert');
  if(alertBox){
    alertBox.style.transition = "0.5s";
    alertBox.style.opacity = "0";
      }
   }, 3000);
</script>
    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
    <!-- End Google Map -->
  </body>
</html>
