<?php
 $categoryresult = $db->getdata("category");
 $brandresult = $db->getdata("brand");
 $buttonLabel = "Add Product";
 $action = "add";

if (isset($_POST['submit'])) {

  $productName =  $_POST['productName'];
  $categoryId =  $_POST['categoryid'];
  $productPrice = $_POST['productPrice'];
  $productQty = $_POST['productQty'];
  $brand_id = $_POST['brandid'];
  $productImage = $_FILES['productImage']['name'];
  $target_dir = "./upload/";
  $id = $_POST['id'] ?? "";

  if (!empty($productImage)) {
    $target_file = $target_dir . basename($productImage);
    move_uploaded_file($_FILES['productImage']['tmp_name'], $target_file);
} else {
    $existingData = $db->getdatabyid("product", "id", $id,"");
    $productImage = $existingData['image'] ?? "";
}
  
    $data=[
        "category_id" => $categoryId,
        "brand_id" => $brand_id,
        "title" => $productName,
        "image" => $productImage,
        "price" => $productPrice,
        "qty" => $productQty
    
      ];
    if ($_POST['action'] == "update" && $id !== "") {
        $result = $db->updatedata("product", $data, $id);
     
    } else {
        $result = $db->insertdata("product", $data);
    }
  
 
 
     
}



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $db->getdatabyid("product", "id",$id);
    
    if ($result) {
            $categoryid = $result["category_id"];
            $brand_id = $result["brand_id"];
            $product_name = $result["title"];
            $image = $result["image"];
            $price = $result["price"];
            $qty = $result["qty"];
        
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
                            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ""; ?>">
                            <div class="form-group">
                                <label for="productName">Product Name</label>
                                <input type="text" class="form-control" id="productName" value="<?php echo isset($product_name) ? $product_name : "" ?>" name="productName" >
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Product Price</label>
                                <input type="number" class="form-control" id="productPrice" value="<?php echo isset($price) ? $price : "" ?>" name="productPrice" >
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Product Qty</label>
                                <input type="number" class="form-control" id="productPrice" value="<?php echo isset($qty) ? $qty : "" ?>" name="productQty" >
                            </div>
                            <div class="form-group">
                                        <label for="categoryId">Category</label>
                                        <select class="form-control" id="categoryid" name="categoryid"  >
                                        <option value="">Select Category</option>
                                      <?php
                                                 if ($categoryresult) {
                                                     foreach ($categoryresult as $category) {
                                                     $selected = (isset($categoryid) && $categoryid == $category['id']) ? "selected" : "";
                                                      echo "<option value='" . $category['id'] . "' $selected>" . $category['name'] . "</option>";
                                                           }
                                                        }
                                                         ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="categoryId">Brand</label>
                                        <select class="form-control" id="categoryid" name="brandid"  >
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
                            <input type="hidden" name="action" value="<?php echo $action; ?>">
                            <input type="submit" value="<?php echo $buttonLabel; ?>" name="submit" class="btn btn-primary">
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>