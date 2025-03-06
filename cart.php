
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
                        $cart = $db->getdata("cart");
                        foreach ($cart as $cart){
                            $quantity = $cart['product_qty'];
                            $product_id = $cart['product_id'];
                            if (isset($_POST['remove'])) {
                                $product_id = $_POST['product_id'];
                                $db->delete("cart", "product_id", $product_id);
                                header("Location: cart.php");
                            }
                        }
                        $total_price = 0;
                      
                        foreach ($cart as $row)
                            // Fetch product details from the database
                            $product = $db->getdatabyid("product", "id", $product_id, "", "single");

                            if ($product):
                                $product_name = htmlspecialchars($product['title']);
                                $product_image = htmlspecialchars($product['image']);
                                $product_price = $product['price'];
                                $product_total = $product_price * $quantity;
                                $total_price += $product_total;
                        ?>
                        <tr>
                            <td>
                                <img src="./admin/upload/<?= $product_image ?>" alt="<?= $product_name ?>" width="50">
                            </td>
                            <td><?= $product_name ?></td>
                            <td><?= $quantity ?></td>
                            <td>$<?= number_format($product_price, 2) ?></td>
                            <td>$<?= number_format($product_total, 2) ?></td>
                            <td>
                                <form method="POST" action="">
                                    <input type="hidden" name="product_id" value="<?= $product_id ?>">
                                    <button type="submit" name="remove" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                        <?php 
                            endif; 
                        ?>
                    </tbody>
                </table>

                <h4 class="text-end">Grand Total: $<?= number_format($total_price, 2) ?></h4>

                <div class="text-center">
                    <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
                </div>

        

        </div>
    </div>
</section>
