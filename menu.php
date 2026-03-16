<?php session_start(); ?>

<?php
require_once "config.php";

$cart_count = 0;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $count_query = mysqli_query($conn,
        "SELECT SUM(quantity) AS total_items
         FROM cart
         WHERE user_id = '$user_id'");

    if ($count_query) {
        $data = mysqli_fetch_assoc($count_query);
        $cart_count = $data['total_items'] ?? 0;
    }
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

  <title> Rajnandini </title>

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
<script src="js/custom.js"></script>

<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?..."></script>

<!-- 🔥 AJAX ADD TO CART SCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", function () {

  document.querySelectorAll(".addToCartForm").forEach(form => {

    form.addEventListener("submit", function(e) {
      e.preventDefault();

      let formData = new FormData(this);

      fetch("add-to-cart.php", {
        method: "POST",
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        showToast("🛒 Item added to cart successfully!");
      })
      .catch(error => {
        showToast("❌ Something went wrong!");
      });

    });

  });

});

function showToast(message) {
  let toast = document.createElement("div");
  toast.innerText = message;

  toast.style.position = "fixed";
  toast.style.top = "20px";
  toast.style.right = "20px";
  toast.style.background = "#28a745";
  toast.style.color = "#fff";
  toast.style.padding = "12px 20px";
  toast.style.borderRadius = "6px";
  toast.style.boxShadow = "0 4px 12px rgba(0,0,0,0.2)";
  toast.style.zIndex = "9999";
  toast.style.opacity = "0";
  toast.style.transition = "0.3s";

  document.body.appendChild(toast);

  setTimeout(() => toast.style.opacity = "1", 50);
  setTimeout(() => {
    toast.style.opacity = "0";
    setTimeout(() => toast.remove(), 300);
  }, 2000);
}
</script>

</body>
</html>
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
              <li class="nav-item active">
                <a class="nav-link" href="menu.php">Menu <span class="sr-only">(current)</span> </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="book.php">Book Table</a>
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
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- food section -->

  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>

      <ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        <li data-filter=".burger">Burger</li>
        <li data-filter=".pizza">Pizza</li>
        <li data-filter=".pasta">Pasta</li>
        <li data-filter=".fries">Fries</li>
        <li data-filter=".chicken">Chicken</li>
        <li data-filter=".fish">Fish</li>
      </ul>

      <div class="filters-content">
  <div class="row grid">

    <!-- Pizza -->
    <div class="col-sm-6 col-lg-4 all pizza">
      <div class="box">
        <div>
          <div class="img-box">
            <img src="images/f1.png" alt="">
          </div>

          <div class="detail-box">
            <h5>Chicken Pizza</h5>

            <p>
              Freshly baked pizza topped with rich mozzarella cheese,
              premium vegetables, and our signature tomato sauce.
            </p>

            <div class="options d-flex justify-content-between align-items-center">

              <h6 class="mb-0">$20</h6>

              <div class="d-flex">

                <!-- Add To Cart -->
                <form class="addToCartForm mr-2 d-flex align-items-center">

              <input type="number"
                     name="quantity"
                     value="1"
                     min="1"
                     class="form-control form-control-sm mr-2"
                     style="width:65px;">

              <input type="hidden" name="food_item" value="Chicken Pizza">
              <input type="hidden" name="price" value="20">

              <button type="submit" class="btn btn-sm btn-warning">
                🛒 Add
              </button>

            </form>

            <!-- Buy Button -->
            <a href="order.php?item=Chicken Pizza&price=20"
               class="btn btn-sm btn-success custom-buy-btn"
               style="width:auto;height:auto;border-radius:5px;padding:4px 12px;background-color:green;">
               Buy
            </a>
                
              </div>
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
        <img src="images/f2.png" alt="">
      </div>

      <div class="detail-box">
        <h5>Delicious Burger</h5>

        <p>
          Freshly burger topped with rich mozzarella cheese,
          premium vegetables, and our signature tomato sauce.
        </p>

        <div class="options d-flex justify-content-between align-items-center">

          <h6 class="mb-0">$15</h6>

          <div class="d-flex">

            <!-- AJAX Add To Cart -->
            <form class="addToCartForm mr-2 d-flex align-items-center">

              <input type="number"
                     name="quantity"
                     value="1"
                     min="1"
                     class="form-control form-control-sm mr-2"
                     style="width:65px;">

              <input type="hidden" name="food_item" value="Delicious Burger">
              <input type="hidden" name="price" value="15">

              <button type="submit" class="btn btn-sm btn-warning">
                🛒 Add
              </button>

            </form>

            <!-- Buy Button -->
            <a href="order.php?item=Delicious Burger&price=15"
               class="btn btn-sm btn-success custom-buy-btn"
               style="width:auto;height:auto;border-radius:5px;padding:4px 12px;background-color:green;">
               Buy
            </a>

          </div>
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
            <img src="images/f4.png" alt="">
          </div>

          <div class="detail-box">
            <h5> Mayonnaise pasta</h5>

            <p>
              Freshly pasta topped with rich mozzarella cheese,
              premium vegetables, and our signature tomato sauce.
            </p>

            <div class="options d-flex justify-content-between align-items-center">

              <h6 class="mb-0">$18</h6>

              <div class="d-flex">

                <form class="addToCartForm mr-2 d-flex align-items-center">

              <input type="number"
                     name="quantity"
                     value="1"
                     min="1"
                     class="form-control form-control-sm mr-2"
                     style="width:65px;">

              <input type="hidden" name="food_item" value="Mayonnaise pasta">
              <input type="hidden" name="price" value="18">

              <button type="submit" class="btn btn-sm btn-warning">
                🛒 Add
              </button>

            </form>

            <!-- Buy Button -->
            <a href="order.php?item=Mayonnaise pasta&price=18"
               class="btn btn-sm btn-success custom-buy-btn"
               style="width:auto;height:auto;border-radius:5px;padding:4px 12px;background-color:green;">
               Buy
            </a>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

     <div class="col-sm-6 col-lg-4 all pizza">
      <div class="box">
        <div>
          <div class="img-box">
            <img src="https://png.pngtree.com/png-vector/20241211/ourmid/pngtree-authentic-italian-pizza-with-cheese-and-fresh-vegetable-toppings-png-image_14714611.png" alt="">
          </div>

          <div class="detail-box">
            <h5>Panir pizza</h5>

            <p>
              Freshly burger topped with rich mozzarella cheese,
              premium vegetables, and our signature tomato sauce.
            </p>

            <div class="options d-flex justify-content-between align-items-center">

              <h6 class="mb-0">$15</h6>

              <div class="d-flex">

                <form class="addToCartForm mr-2 d-flex align-items-center">

              <input type="number"
                     name="quantity"
                     value="1"
                     min="1"
                     class="form-control form-control-sm mr-2"
                     style="width:65px;">

              <input type="hidden" name="food_item" value="Panir pizza">
              <input type="hidden" name="price" value="15">

              <button type="submit" class="btn btn-sm btn-warning">
                🛒 Add
              </button>

            </form>

            <!-- Buy Button -->
            <a href="order.php?item=Panir pizza&price=15"
               class="btn btn-sm btn-success custom-buy-btn"
               style="width:auto;height:auto;border-radius:5px;padding:4px 12px;background-color:green;">
               Buy
            </a>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

     <div class="col-sm-6 col-lg-4 all burger">
      <div class="box">
        <div>
          <div class="img-box">
            <img src="https://png.pngtree.com/png-clipart/20240830/original/pngtree-burger-with-floating-ingredient-png-image_15881303.png" alt="">
          </div>

          <div class="detail-box">
            <h5>Veg Burger</h5>

            <p>
              Freshly  veg burger topped with rich mozzarella cheese,
              premium vegetables, and our signature tomato sauce.
            </p>

            <div class="options d-flex justify-content-between align-items-center">

              <h6 class="mb-0">$15</h6>

              <div class="d-flex">

                <form class="addToCartForm mr-2 d-flex align-items-center">

              <input type="number"
                     name="quantity"
                     value="1"
                     min="1"
                     class="form-control form-control-sm mr-2"
                     style="width:65px;">

              <input type="hidden" name="food_item" value="Veg Burger">
              <input type="hidden" name="price" value="15">

              <button type="submit" class="btn btn-sm btn-warning">
                🛒 Add
              </button>

            </form>

            <!-- Buy Button -->
            <a href="order.php?item=Veg Burger&price=15"
               class="btn btn-sm btn-success custom-buy-btn"
               style="width:auto;height:auto;border-radius:5px;padding:4px 12px;background-color:green;">
               Buy
            </a>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

     <div class="col-sm-6 col-lg-4 all burger">
      <div class="box">
        <div>
          <div class="img-box">
            <img src="https://static.vecteezy.com/system/resources/previews/048/045/017/non_2x/juicy-fried-chicken-burger-on-transparent-background-png.png" alt="">
          </div>

          <div class="detail-box">
            <h5>Chicken Burger</h5>

            <p>
              Freshly chicken  burger topped with rich mozzarella cheese,
              premium vegetables, and our signature tomato sauce.
            </p>

            <div class="options d-flex justify-content-between align-items-center">

              <h6 class="mb-0">$15</h6>

              <div class="d-flex">

                <form class="addToCartForm mr-2 d-flex align-items-center">

              <input type="number"
                     name="quantity"
                     value="1"
                     min="1"
                     class="form-control form-control-sm mr-2"
                     style="width:65px;">

              <input type="hidden" name="food_item" value="Chicken Burger">
              <input type="hidden" name="price" value="15">

              <button type="submit" class="btn btn-sm btn-warning">
                🛒 Add
              </button>

            </form>

            <!-- Buy Button -->
            <a href="order.php?item=Chicken Burger&price=15"
               class="btn btn-sm btn-success custom-buy-btn"
               style="width:auto;height:auto;border-radius:5px;padding:4px 12px;background-color:green;">
               Buy
            </a>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

     <div class="col-sm-6 col-lg-4 all pasta">
      <div class="box">
        <div>
          <div class="img-box">
            <img src="https://pngimg.com/d/pasta_PNG58.png" alt="">
          </div>

          <div class="detail-box">
            <h5>Delicious pasta</h5>

            <p>
              Freshly burger topped with rich mozzarella cheese,
              premium vegetables, and our signature tomato sauce.
            </p>

            <div class="options d-flex justify-content-between align-items-center">

              <h6 class="mb-0">$15</h6>

              <div class="d-flex">

                <form class="addToCartForm mr-2 d-flex align-items-center">

              <input type="number"
                     name="quantity"
                     value="1"
                     min="1"
                     class="form-control form-control-sm mr-2"
                     style="width:65px;">

              <input type="hidden" name="food_item" value="Delicious pasta">
              <input type="hidden" name="price" value="15">

              <button type="submit" class="btn btn-sm btn-warning">
                🛒 Add
              </button>

            </form>

            <!-- Buy Button -->
            <a href="order.php?item=Delicious pasta&price=15"
               class="btn btn-sm btn-success custom-buy-btn"
               style="width:auto;height:auto;border-radius:5px;padding:4px 12px;background-color:green;">
               Buy
            </a>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

     <div class="col-sm-6 col-lg-4 all chicken">
  <div class="box">
    <div>
      <div class="img-box">
        <img src="https://static.vecteezy.com/system/resources/thumbnails/021/665/568/small/delicious-grilled-chicken-cutout-png.png" alt="">
      </div>
      <div class="detail-box">
        <h5>Grilled Chicken</h5>
        <p>
          Juicy grilled chicken marinated with special spices
          and served hot.our signature tomato sauce.
        </p>

        <div class="options d-flex justify-content-between align-items-center">
          <h6 class="mb-0"> $40</h6>

          <div class="d-flex">

            <form class="addToCartForm mr-2 d-flex align-items-center">

              <input type="number"
                     name="quantity"
                     value="1"
                     min="1"
                     class="form-control form-control-sm mr-2"
                     style="width:65px;">

              <input type="hidden" name="food_item" value="Grilled Chicken">
              <input type="hidden" name="price" value="40">

              <button type="submit" class="btn btn-sm btn-warning">
                🛒 Add
              </button>

            </form>

            <!-- Buy Button -->
            <a href="order.php?item=Grilled Chicken&price=40"
               class="btn btn-sm btn-success custom-buy-btn"
               style="width:auto;height:auto;border-radius:5px;padding:4px 12px;background-color:green;">
               Buy
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
     <div class="col-sm-6 col-lg-4 all chicken">
  <div class="box">
    <div>
      <div class="img-box">
        <img src="https://static.vecteezy.com/system/resources/thumbnails/046/543/476/small/grilled-chicken-drumstick-with-glaze-free-png.png" alt="Chicken Barbeque">
      </div>
      <div class="detail-box">
        <h5>
          Chicken Barbeque
        </h5>
        <p>
          Tender chicken marinated in smoky BBQ sauce,
          grilled to perfection with rich flavor.our signature tomato sauce.
        </p>

        <div class="options d-flex justify-content-between align-items-center">

          <h6 class="mb-0">
            $22
          </h6>

          <div class="d-flex">

            <!-- Add to Cart -->
           <form class="addToCartForm mr-2 d-flex align-items-center">

              <input type="number"
                     name="quantity"
                     value="1"
                     min="1"
                     class="form-control form-control-sm mr-2"
                     style="width:65px;">

              <input type="hidden" name="food_item" value="Chicken Barbeque">
              <input type="hidden" name="price" value="22">

              <button type="submit" class="btn btn-sm btn-warning">
                🛒 Add
              </button>

            </form>

            <!-- Buy Button -->
            <a href="order.php?item=Chicken Barbeque&price=22"
               class="btn btn-sm btn-success custom-buy-btn"
               style="width:auto;height:auto;border-radius:5px;padding:4px 12px;background-color:green;">
               Buy
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

     <div class="col-sm-6 col-lg-4 all fish">
  <div class="box">
    <div>
      <div class="img-box">
        <img src="https://static.vecteezy.com/system/resources/thumbnails/036/497/878/small/ai-generated-grilled-fish-with-herbs-on-a-white-plate-isolated-on-transparent-background-png.png" alt="">
      </div>
      <div class="detail-box">
        <h5>Fried Fish</h5>
        <p>
          Crispy fried fish served with lemon and
          signature dipping sauce and our signature tomato sauce.
        </p>

        <div class="options d-flex justify-content-between align-items-center">
          <h6 class="mb-0">$19</h6>

          <div class="d-flex">

            <form class="addToCartForm mr-2 d-flex align-items-center">

              <input type="number"
                     name="quantity"
                     value="1"
                     min="1"
                     class="form-control form-control-sm mr-2"
                     style="width:65px;">

              <input type="hidden" name="food_item" value=">Fried Fish">
              <input type="hidden" name="price" value="19">

              <button type="submit" class="btn btn-sm btn-warning">
                🛒 Add
              </button>

            </form>

            <!-- Buy Button -->
            <a href="order.php?item=>Fried Fish&price=19"
               class="btn btn-sm btn-success custom-buy-btn"
               style="width:auto;height:auto;border-radius:5px;padding:4px 12px;background-color:green;">
               Buy
            </a>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
     <div class="col-sm-6 col-lg-4 all fish">
  <div class="box">
    <div>
      <div class="img-box">
        <img src="https://static.vecteezy.com/system/resources/thumbnails/045/910/276/small/plate-of-crispy-battered-fish-fillets-with-golden-coating-cut-out-stock-png.png" alt="Fish Fry">
      </div>
      <div class="detail-box">
        <h5>
          Fish Fry
        </h5>
        <p>
          Crispy golden fried fish seasoned with special spices,
          served hot and fresh and our signature tomato sauce.
        </p>

        <div class="options d-flex justify-content-between align-items-center">

          <h6 class="mb-0">
            $19
          </h6>

          <div class="d-flex">

            <!-- Add to Cart -->
             <form class="addToCartForm mr-2 d-flex align-items-center">

              <input type="number"
                     name="quantity"
                     value="1"
                     min="1"
                     class="form-control form-control-sm mr-2"
                     style="width:65px;">

              <input type="hidden" name="food_item" value=">Fish Fry">
              <input type="hidden" name="price" value="19">

              <button type="submit" class="btn btn-sm btn-warning">
                🛒 Add
              </button>

            </form>

            <!-- Buy Button -->
            <a href="order.php?item=>Fish Fry&price=19"
               class="btn btn-sm btn-success custom-buy-btn"
               style="width:auto;height:auto;border-radius:5px;padding:4px 12px;background-color:green;">
               Buy
            </a>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>

     <div class="col-sm-6 col-lg-4 all fries">
  <div class="box">
    <div>
      <div class="img-box">
        <img src="https://static.vecteezy.com/system/resources/thumbnails/036/290/866/small/ai-generated-french-fries-with-dipping-sauce-on-a-transparent-background-ai-png.png" alt="French Fries">
      </div>
      <div class="detail-box">
        <h5>
          Crispy French Fries
        </h5>
        <p>
          Golden crispy fries seasoned with special herbs,
          served hot and crunchy and our signature tomato sauce.
        </p>

        <div class="options d-flex justify-content-between align-items-center">

          <!-- Price -->
          <h6 class="mb-0">
            $10
          </h6>

          <!-- Buttons -->
          <div class="d-flex">

            <!-- Add to Cart -->
            <form class="addToCartForm mr-2 d-flex align-items-center">

              <input type="number"
                     name="quantity"
                     value="1"
                     min="1"
                     class="form-control form-control-sm mr-2"
                     style="width:65px;">

              <input type="hidden" name="food_item" value=">Crispy French Fries">
              <input type="hidden" name="price" value="10">

              <button type="submit" class="btn btn-sm btn-warning">
                🛒 Add
              </button>

            </form>

            <!-- Buy Button -->
            <a href="order.php?item=>Crispy French Fries&price=10"
               class="btn btn-sm btn-success custom-buy-btn"
               style="width:auto;height:auto;border-radius:5px;padding:4px 12px;background-color:green;">
               Buy
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
     <div class="col-sm-6 col-lg-4 all fries">
      <div class="box">
        <div>
          <div class="img-box">
            <img src="https://pngimg.com/d/fries_PNG47.png">
          </div>

          <div class="detail-box">
            <h5>Masala fries </h5>

            <p>
              Freshly fries topped with rich mozzarella cheese,
              premium vegetables, and our signature tomato sauce.
            </p>

            <div class="options d-flex justify-content-between align-items-center">

              <h6 class="mb-0">$15</h6>

              <div class="d-flex">

                <form class="addToCartForm mr-2 d-flex align-items-center">

              <input type="number"
                     name="quantity"
                     value="1"
                     min="1"
                     class="form-control form-control-sm mr-2"
                     style="width:65px;">

              <input type="hidden" name="food_item" value=">Masala fries">
              <input type="hidden" name="price" value="15">

              <button type="submit" class="btn btn-sm btn-warning">
                🛒 Add
              </button>

            </form>

            <!-- Buy Button -->
            <a href="order.php?item=>Masala fries&price=15"
               class="btn btn-sm btn-success custom-buy-btn"
               style="width:auto;height:auto;border-radius:5px;padding:4px 12px;background-color:green;">
               Buy
            </a>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-6 col-lg-4 all pizza">
      <div class="box">
        <div>
          <div class="img-box">
            <img src="https://static.vecteezy.com/system/resources/previews/051/773/625/non_2x/mushrooms-pizza-top-view-png.png">
          </div>

          <div class="detail-box">
            <h5>Mushroom pizza</h5>

            <p>
              Freshly pizzatopped with rich mozzarella cheese,
              premium vegetables, and our signature tomato sauce.
            </p>

            <div class="options d-flex justify-content-between align-items-center">

              <h6 class="mb-0">$15</h6>

              <div class="d-flex">

                <form class="addToCartForm mr-2 d-flex align-items-center">

              <input type="number"
                     name="quantity"
                     value="1"
                     min="1"
                     class="form-control form-control-sm mr-2"
                     style="width:65px;">

              <input type="hidden" name="food_item" value=">Mushroom pizza">
              <input type="hidden" name="price" value="15">

              <button type="submit" class="btn btn-sm btn-warning">
                🛒 Add
              </button>

            </form>

            <!-- Buy Button -->
            <a href="order.php?item=>Mushroom pizza&price=15"
               class="btn btn-sm btn-success custom-buy-btn"
                style="width:auto;height:auto;border-radius:5px;padding:4px 12px;background-color:green;">
               Buy
            </a>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


    <div class="col-sm-6 col-lg-4 all chicken">
      <div class="box">
        <div>
          <div class="img-box">
            <img src="https://png.pngtree.com/png-vector/20241219/ourmid/pngtree-roasted-chicken-kebab-served-with-vibrant-salad-greens-png-image_14798970.png" alt="">
          </div>

          <div class="detail-box">
            <h5>Chiken kabab</h5>

            <p>
              Freshly burger topped with rich mozzarella cheese,
              premium vegetables, and our signature tomato sauce.
            </p>

            <div class="options d-flex justify-content-between align-items-center">

              <h6 class="mb-0">$15</h6>

              <div class="d-flex">

                <form class="addToCartForm mr-2 d-flex align-items-center">

              <input type="number"
                     name="quantity"
                     value="1"
                     min="1"
                     class="form-control form-control-sm mr-2"
                     style="width:65px;">

              <input type="hidden" name="food_item" value=">Chiken kabab">
              <input type="hidden" name="price" value="15">

              <button type="submit" class="btn btn-sm btn-warning">
                🛒 Add
              </button>

            </form>

            <!-- Buy Button -->
            <a href="order.php?item=>Chiken kabab&price=15"
               class="btn btn-sm btn-success custom-buy-btn"
                style="width:auto;height:auto;border-radius:5px;padding:4px 12px;background-color:green;">
               Buy
            </a>


              </div>
            </div>

          </div>
        </div>
      </div>
    </div>



  </div>
</div>
      
    </div>
  </section>

  <!-- end food section -->

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
<script>
setTimeout(function() {
  let alertBox = document.querySelector('.alert');
  if(alertBox){
    alertBox.style.transition = "0.5s";
    alertBox.style.opacity = "0";
  }
}, 2500);
</script>
</body>

</html>