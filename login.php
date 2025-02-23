<?php
// session_start();
include('./admin/include/dbconnection.php');
include('./code-login.php');





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
                            <h1 class="text-center py-5" style="font-size: 30px;">Login</h1>
                        </div>             
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Login</h3>
                        <form method="post" >
                            <div class="mb-3">
                                <label for="password" class="form-label">Email</label>
                                <input type="email" class="form-control" id="password" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <div class="mb-3">
                               <p>dont`have an account ? <a href="index.php?p=register" class="text-danger">register here</a></p>
                            </div>
                            <div class="d-grid">
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   