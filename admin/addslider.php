<?php

 $buttonLabel = "Add Slideshow";
 $action = "add";
 


      


if (isset($_POST['submit'])) {

    $title =  $_POST['title'];
    $subtitle =  $_POST['subtitle'];
    $link = $_POST['link'];
    $enable = $_POST['enable'];
    $ssorder = $_POST['ssorder'];
    // $Image = $_FILES['image']['name'];
    $id = $_POST['id'] ?? "";
    $Image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($Image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);


   
      
    
 
  if ($title !== "" && $subtitle !== "" && $link !== "" && $enable !== "" && $ssorder !== "" && $Image !== "") {
    $data = [
        "title" => $title,
        "subtitle" => $subtitle,
        "link" => $link,
        "image" => $Image,
        "enable" => $enable,
        "ssorder" => $ssorder
    ];

   
    

    if ($_POST['action'] == "update" && $id !== "") {
        $result = $db->updatedata("slider", $data, $id);
    
       
    } else {
        $result = $db->insertdata("slider", $data);
    }
} else {
    echo "<p style='color: red;'>Category Name and Slug are required!</p>";
}
 
 
     
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $db->getdatabyid("slider", "id",$id);
    
    if ($result) {
        foreach ($result as $row) {
            $title = $row["title"];
            $subtitle = $row["subtitle"];
            $link  = $row['link'];
            $enable = $row['enable'];
            $ssorder = $row['ssorder'];
            $image = $row["image"];
        }
    }
    
    $buttonLabel = "Update Slideshow";
    $action = "update";
}





?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3"><?php echo $buttonLabel ?></h3>
            <?php echo $action ?>
          
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
                                <label for="productName">Title</label>
                                <input type="text" class="form-control" id="productName" value="<?php echo isset($title) ? $title : "" ?>" name="title" >
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Sub Title</label>
                                <input type="text" class="form-control" id="productPrice" value="<?php echo isset($subtitle) ? $subtitle : "" ?>" name="subtitle" >
                            </div>
                       
                                  
                            <div class="form-group">
                                <label for="productImage">Link</label>
                                <input type="text" class="form-control"  value="<?php echo isset($link) ? $link : ""?>" name="link" >
                                <!-- <?php echo " <img src='./upload/$image' class='w-25'>"  ?> -->
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Enable</label>
                                <input type="number" class="form-control" value="<?php echo isset($enable) ? $enable :""?>" name="enable" >
                            </div>
                            <div class="form-group">
                                <label for="productPrice">ssorder</label>
                                <input type="number" class="form-control"value="<?php echo isset($ssorder) ? $ssorder :""?>"  name="ssorder" >
                            </div>
                            <div class="form-group">
                                  <label for="image">Image</label>
                                  <input type="file" class="form-control" name="image">
                                 <?php if (isset($image) && !empty($image)) { ?>
                                 <br>
                                 <img src="./upload/<?php echo $image; ?>" class="w-25">
                                  <input type="hidden" name="existing_image" value="<?php echo $image; ?>">
                               <?php } ?>
                               </div>


                            <input type="hidden" name="action" value="<?php echo $action; ?>">

                            <input type="submit" value="<?php echo $buttonLabel; ?>" name="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>