<?php
if (isset($_POST['product_id'], $_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    if ($product_id ) {
        $data=[
            "product_id" => $product_id,
            "product_qty" => $quantity
        ];
       
             $cart = $db->insertdata("cart",$data);

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
                    <h1 class="text-center py-5" style="font-size: 30px;">Watch</h1>
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
       
          <!-- <div class="swiper product-swiper"> -->
            <!-- <div class="swiper-wrapper"> -->
             
            <?php
             $category = $db->getdatabyid("category","name","watchs","");
             $categoryid = $category["id"];
                     $result = $db->getdatabyid("product", "category_id",  $categoryid,"","all");
                 
                     foreach($result as $row) {
                        $product_id = $row['id'];
                        $product_name = $row['title'];
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
    </section>


    <!-- <section class="bg-secondary"  style="margin-top: 300px;">
        <h3 class="text-center">Shop Page</h3>

    </section> -->
   