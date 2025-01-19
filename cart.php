<?php
session_start();
include('./admin/include/dbconnection.php');

function countCartItems($conn) {
  $count_sql = "SELECT SUM(product_qty) AS total_items FROM cart";
  $count_result = mysqli_query($conn, $count_sql);
  $count_row = mysqli_fetch_assoc($count_result);
  return $count_row['total_items'];
}

// if(isset($_POST['delete'])){ 
//     $product_id = $_POST['product_id'];
//     $check_sql = "SELECT * FROM cart WHERE product_id = '$product_id'";
//   $check_result = mysqli_query($conn, $check_sql);
  
//   if(mysqli_num_rows($check_result) > 0) {
//     // Product exists, update the quantity
//     $product_qty = "SELECT product_qty from cart WHERE product_id = '$product_id'";
//     mysqli_query($conn,$product_qty);
//     if($product_qty == 0){
//         $delete_sql = "DELETE FROM cart WHERE product_id = '$product_id'";
//         mysqli_query($conn,$delete_sql);
//     }
//     $update_sql = "UPDATE cart SET product_qty = product_qty - 1 WHERE product_id = '$product_id'";
//     $update_result = mysqli_query($conn, $update_sql);
   
//   }
// }

$cart_count = countCartItems($conn);

// Fetch cart items
$cart_items_sql = "SELECT cart.product_id, cart.product_qty, product.product_name, product.price, product.image 
                   FROM cart 
                   JOIN product ON cart.product_id = product.id";
$cart_items_result = mysqli_query($conn, $cart_items_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="js/modernizr.js"></script>
    <title>Cart</title>
</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
<!-- SVG symbols here -->
</svg>  
<header id="header" class="site-header header-scrolled position-fixed text-black bg-light">
    <nav id="header-nav" class="navbar navbar-expand-lg px-3 mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/main-logo.png" class="logo">
            </a>
            <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="navbar-icon">
                    <use xlink:href="#navbar-icon"></use>
                </svg>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
                <div class="offcanvas-header px-4 pb-0">
                    <a class="navbar-brand" href="index.php">
                        <img src="images/main-logo.png" class="logo">
                    </a>
                    <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close" data-bs-target="#bdNavbar"></button>
                </div>
                <div class="offcanvas-body">
                    <ul id="navbar" class="navbar-nav text-uppercase justify-content-end align-items-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link me-4 active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link me-4 dropdown-toggle link-dark" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="phone.php" class="dropdown-item">Phone</a>
                                </li>
                                <li>
                                    <a href="watch.php" class="dropdown-item">Watch</a>
                                </li>      
                            </ul>
                        </li>
                        <li>
                            <a href="about.html" class="dropdown-item">About</a>
                        </li>
                        <li>
                            <a href="contact.html" class="dropdown-item">Contact</a>
                        </li>
                        <li class="nav-item">
                            <div class="user-items ps-5">
                                <ul class="d-flex justify-content-end list-unstyled">
                                    <li class="search-item pe-3">
                                        <a href="#" class="search-button">
                                            <svg class="search">
                                                <use xlink:href="#search"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li class="pe-3">
                                        <a href="#">
                                            <svg class="user">
                                                <use xlink:href="#user"></use>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="cart.php" class="position-relative">
                                            <svg class="cart">
                                                <use xlink:href="#cart"></use>
                                            </svg>
                                            <span class="cart-count position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                <?php echo $cart_count; ?>
                                            </span>
                                        </a>
                                    </li>            
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<section id="billboard" class="position-relative overflow-hidden bg-light-blue">
    <div class="swiper main-swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="container" style="margin-top: 100px;">
                    <div class="col-md-12">
                        <div class="banner-content">
                            <h1 class="text-center py-5" style="font-size: 30px;">Cart</h1>
                        </div>             
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="cart-items" class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Your Cart Items</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($cart_items_result) > 0) {
                        while ($row = mysqli_fetch_assoc($cart_items_result)) {
                            $product_image = $row['image'];
                            $product_id = $row['product_id'];
                            $product_name = $row['product_name'];
                            $product_qty = $row['product_qty'];
                            $product_price = $row['price'];
                            $total_price = $product_qty * $product_price;
                            echo "<tr>
                                    <td><img src='./admin/upload/$product_image' alt='$product_name' width='100'></td>
                                    <td>$product_name</td>
                                    <td>$product_qty</td>
                                    <td>$$product_price</td>
                                    <td>$$total_price</td>
                                     <td>
                                        <form method='POST' action=''>
                                            <input type='hidden' name='product_id' value='$product_id'>
                                            <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
                                        </form>
                                    </td>                                
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>Your cart is empty</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<footer id="footer" style="position:relative;">
    <div class="container">
        <div class="row">
            <div class="footer-top-area">
                <div class="row d-flex flex-wrap justify-content-between">
                    <div class="col-lg-3 col-sm-6 pb-3">
                        <div class="footer-menu">
                            <img src="images/main-logo.png" alt="logo">
                            <p>Nisi, purus vitae, ultrices nunc. Sit ac sit suscipit hendrerit. Gravida massa volutpat aenean odio erat nullam fringilla.</p>
                            <div class="social-links">
                                <ul class="d-flex list-unstyled">
                                    <li>
                                        <a href="#">
                                            <svg class="facebook">
                                                <use xlink:href="#facebook" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg class="instagram">
                                                <use xlink:href="#instagram" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg class="twitter">
                                                <use xlink:href="#twitter" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg class="linkedin">
                                                <use xlink:href="#linkedin" />
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <svg class="youtube">
                                                <use xlink:href="#youtube" />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 pb-3">
                        <div class="footer-menu text-uppercase">
                            <h5 class="widget-title pb-2">Quick Links</h5>
                            <ul class="menu-list list-unstyled text-uppercase">
                                <li class="menu-item pb-2">
                                    <a href="#">Home</a>
                                </li>
                                <li class="menu-item pb-2">
                                    <a href="#">About</a>
                                </li>
                                <li class="menu-item pb-2">
                                    <a href="#">Shop</a>
                                </li>
                                <li class="menu-item pb-2">
                                    <a href="#">Blogs</a>
                                </li>
                                <li class="menu-item pb-2">
                                    <a href="#">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 pb-3">
                        <div class="footer-menu text-uppercase">
                            <h5 class="widget-title pb-2">Help & Info Help</h5>
                            <ul class="menu-list list-unstyled">
                                <li class="menu-item pb-2">
                                    <a href="#">Track Your Order</a>
                                </li>
                                <li class="menu-item pb-2">
                                    <a href="#">Returns Policies</a>
                                </li>
                                <li class="menu-item pb-2">
                                    <a href="#">Shipping + Delivery</a>
                                </li>
                                <li class="menu-item pb-2">
                                    <a href="#">Contact Us</a>
                                </li>
                                <li class="menu-item pb-2">
                                    <a href="#">Faqs</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 pb-3">
                        <div class="footer-menu contact-item">
                            <h5 class="widget-title text-uppercase pb-2">Contact Us</h5>
                            <p>Do you have any queries or suggestions? <a href="mailto:yourinfo@gmail.com">yourinfo@gmail.com</a></p>
                            <p>If you need support? Just give us a call. <a href="tel:+5511122233344">+55 111 222 333 44</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
</footer>
<div id="footer-bottom" style="margin-bottom: 100px;">
    <div class="container">
        <div class="row d-flex flex-wrap justify-content-between">
            <div class="col-md-4 col-sm-6">
                <div class="Shipping d-flex">
                    <p>We ship with:</p>
                    <div class="card-wrap ps-2">
                        <img src="images/dhl.png" alt="visa">
                        <img src="images/shippingcard.png" alt="mastercard">
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="payment-method d-flex">
                    <p>Payment options:</p>
                    <div class="card-wrap ps-2">
                        <img src="images/visa.jpg" alt="visa">
                        <img src="images/mastercard.jpg" alt="mastercard">
                        <img src="images/paypal.jpg" alt="paypal">
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="copyright">
                    <p>© Copyright 2023 MiniStore. Design by <a href="https://templatesjungle.com/">TemplatesJungle</a> Distribution by <a href="https://themewagon.com">ThemeWagon</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>