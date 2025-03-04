<?php
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $stmt = $pdo->prepare('SELECT * FROM product WHERE id = ?');
    $stmt->execute([$_POST['product_id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
   
}
?>

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

            <?php if (!empty($cart)): ?>
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
                        foreach ($cart as $product_id => $quantity): 
                            // Fetch product details from the database
                            $product = $db->getdatabyid("product", "id", $product_id, "", "single");

                            if ($product):
                                $product_name = $product['product_name'];
                                $product_image = $product['image'];
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
                                <form method="POST" action="remove_from_cart.php">
                                    <input type="hidden" name="product_id" value="<?= $product_id ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                        <?php 
                            endif; 
                        endforeach;
                        ?>
                    </tbody>
                </table>

                <h4 class="text-end">Grand Total: $<?= number_format($total_price, 2) ?></h4>

                <div class="text-center">
                    <a href="checkout.php" class="btn btn-success">Proceed to Checkout</a>
                </div>

            <?php else: ?>
                <p class="text-center">Your cart is empty.</p>
            <?php endif; ?>

        </div>
    </div>
</section>
