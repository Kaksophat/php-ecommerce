<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Add Product</h3>
          
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Add Product</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Add Product</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="productName">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="productName" >
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Product Price</label>
                                <input type="number" class="form-control" id="productPrice" name="productPrice" >
                            </div>
                            <div class="form-group">
                                        <label for="categoryId">Category</label>
                                        <select class="form-control" id="categoryid" name="categoryid"  >
                                            <option value="">Select Category</option>
                                            <?php
                                            if ( $categoryresult) {
                                                foreach($categoryresult as $category) {
                                                  echo "<option value='" . $category['id'] . "'>" . $category['name'] . " </option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                            <div class="form-group">
                                <label for="productImage">Product Image</label>
                                <input type="file" class="form-control" id="productImage" name="productImage" >
                            </div>
                            <!-- <input type="submit" class="btn btn-primary">Add Product</input> -->
                             <input type="submit" value="AddProduct" name="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>