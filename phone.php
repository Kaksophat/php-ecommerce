<?php
session_start();
include('./admin/include/dbconnection.php');

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;

    // Check if the product is already in the cart
    $cart_query = "SELECT * FROM cart WHERE product_id = ?";
    $stmt = $conn->prepare($cart_query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cart_item = $result->fetch_assoc();

    if ($cart_item) {
        // Update quantity if product is already in the cart
        $new_quantity = $cart_item['product_qty'] + $quantity;
        $update_query = "UPDATE cart SET product_qty = ? WHERE id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ii", $new_quantity, $cart_item['id']);
        $stmt->execute();
    } else {
        // Insert the product into the cart
        $insert_query = "INSERT INTO cart (product_id, product_qty) VALUES (?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ii", $product_id, $quantity);
        $stmt->execute();
    }
}




function countCartItems($conn) {
    $count_sql = "SELECT SUM(product_qty) AS total_items FROM cart";
    $count_result = mysqli_query($conn, $count_sql);
    $count_row = mysqli_fetch_assoc($count_result);
    return $count_row['total_items'];
}

$cart_count = countCartItems($conn);
?>


<section id="billboard" class="position-relative overflow-hidden bg-light-blue">
    <div class="swiper main-swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="container" style="margin-top: 100px;">
                    <div class="col-md-12">
                        <div class="banner-content">
                            <h1 class="text-center py-5" style="font-size: 30px;">Phone</h1>
                        </div>             
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
    <div class="container">
        <div class="row">
            <!-- <div class="d-flex"> -->
                <!-- <div class="swiper-wrapper"> -->
                    <?php
                   $result = $db->getdatabyid("product", "category_id",1);
                 
                   foreach($result as $row) {
                        $product_id = $row['id'];
                        $product_name = $row['product_name'];
                        $product_image = $row['image'];
                        $product_price = $row['price'];

                        echo "<div class='col-md-3 col-sm-6 col-12 mb-5 mt-5'>
                            <div class='product-card position-relative'>
                                <div class='image-holder'>
                                    <img src='./admin/upload/$product_image' alt='product-item' class='card-img'>
                                </div>
                                <div class='cart-concern position-absolute'>
                                    <div class='cart-button d-flex'>
                                        <form method='POST' action=''>
                                            <input type='hidden' name='product_id' value='$product_id'>
                                            <input type='hidden' name='quantity' value='1' min='1'>
                                            <button type='submit' class='btn btn-medium btn-black' name='add_to_cart'>Add to Cart<svg class='cart-outline'><use xlink:href='#cart-outline'></use></svg></button>
                                        </form>
                                    </div>
                                </div>
                                <div class='card-detail d-flex justify-content-between align-items-baseline pt-3'>
                                    <h3 class='card-title text-uppercase'>
                                        <a href='#'>$product_name</a>
                                    </h3>
                                    <span class='item-price text-primary'>$$product_price</span>
                                </div>
                            </div>
                        </div>";
                    }
                    ?>
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
    <!-- <div class="swiper-pagination position-absolute text-center"></div> -->
</section>

