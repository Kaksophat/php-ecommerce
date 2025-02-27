<?php
 $categoryresult = $db->getdata("category");
 $brandresult = $db->getdata("brands");
 $buttonLabel = "Add Product";
 $action = "add";

if (isset($_POST['submit'])) {

  $productName =  $_POST['productName'];
  $categoryId =  $_POST['categoryid'];
  $productPrice = $_POST['productPrice'];
  $productImage = $_FILES['productImage']['name'];
  $target_dir = "./upload/";
  $target_file = $target_dir . basename($productImage);

  move_uploaded_file($_FILES['productImage']['tmp_name'], $target_file);
  $data=[
    "category_id" => $categoryId,
    "product_name" => $productName,
    "image" => $productImage,
    "price" => $productPrice

  ];
 
 
  $result = $db->insertdata("product" , $data);
     
}



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $db->getdatabyid("product", "id",$id);
    
    if ($result) {
        foreach ($result as $row) {
            $categoryid = $row["category_id"];
            $brand_id = $row["brand_id"];
            $product_name = $row["product_name"];
            $image = $row["image"];
            $price = $row["price"];
        }
    }
    
    $buttonLabel = "Update Product";
    $action = "update";
}


      


?>
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3"><?php echo $buttonLabel ?></h3>
          
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
                    <a href="#"><?php echo $buttonLabel ?></a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center"><?php echo $buttonLabel ?></h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="productName">Product Name</label>
                                <input type="text" class="form-control" id="productName" value="<?php echo isset($product_name) ? $product_name : "" ?>" name="productName" >
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Product Price</label>
                                <input type="number" class="form-control" id="productPrice" value="<?php echo isset($price) ? $price : "" ?>" name="productPrice" >
                            </div>
                            <div class="form-group">
                                        <label for="categoryId">Category</label>
                                        <select class="form-control" id="categoryid" name="categoryid"  >
                                            <!-- <option value=""><?php $categoryresult["name"]?></option> -->
                                            <?php
                                            if ( $categoryresult) {
                                                foreach($categoryresult as $category) {
                                                  echo "<option value='" .  $category['id'] . "'>" . $category['name'] . " </option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="categoryId">Brand</label>
                                        <select class="form-control" id="categoryid" name="categoryid"  >
                                        <!-- <option value="">Select Brand</option> -->
                                            <?php
                                            if ( $brandresult) {
                                                foreach($brandresult as $brand) {
                                                  echo "<option value='" . $brand['id'] . "'>" . $brand['name'] . " </option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                            <div class="form-group">
                                <label for="productImage">Product Image</label>
                                <input type="file" class="form-control" id="productImage" value="" name="productImage" >
                                <!-- <?php echo " <img src='./upload/$image' class='w-25'>"  ?> -->
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