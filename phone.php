

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
            <?php
            // Fetch all products under category 1
            $result = $db->getdatabyid("product", "category_id", 1, "", "all");

            foreach ($result as $row) {
                $product_id = $row['id'];
                $product_name = htmlspecialchars($row['product_name']);
                $product_image = htmlspecialchars($row['image']);
                $product_price = number_format($row['price'], 2);
                $product_quantity = $row['qty'];

                echo "<div class='col-md-3 col-sm-6 col-12 mb-5 mt-5'>
                    <div class='product-card position-relative'>
                        <div class='image-holder'>
                            <img src='./admin/upload/$product_image' alt='product-item' class='card-img'>
                        </div>
                        <div class='cart-concern position-absolute'>
                            <div class='cart-button d-flex'>
                                <form method='POST' action=''>
                                    <input type='hidden' name='product_id' value='$product_id'>
                                    <input type='hidden' name='quantity' value='1' max='$product_quantity'>
                                    <button type='submit' class='btn btn-medium btn-black' name='add_to_cart'>Add to Cart
                                        <svg class='cart-outline'><use xlink:href='#cart-outline'></use></svg>
                                    </button>
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
        </div>
    </div>
</section>
