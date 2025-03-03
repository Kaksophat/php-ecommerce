<?php
$buttonLabel = "Add Category";
$action = "add";




if (isset($_POST['submit'])) {
    $categoryname = $_POST['categoryname'] ?? "";
    $categoryslug = $_POST['categoryslug'] ?? "";
    $id = $_POST['id'] ?? "";

    if ($categoryname !== "" && $categoryslug !== "") {
        $data = [
            "name" => $categoryname,
            "slug" => $categoryslug
        ];

        if ($_POST['action'] == "update" && $id !== "") {
            $result = $db->updatedata("category", $data, $id);
            if($result){
            header("Location: index.php");

            }
        } else {
            $result = $db->insertdata("category", $data);
        }
    } else {
        echo "<p style='color: red;'>Category Name and Slug are required!</p>";
    }
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $db->getdatabyid("category", "id",$id);
    
    if ($result) {
            $name = $result["name"];
            $slug = $result["slug"];
        
    }
    
    $buttonLabel = "Update Category";
    $action = "update";
}
?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3"><?php echo $buttonLabel; ?></h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#"><i class="icon-home"></i></a>
                </li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#"><?php echo $buttonLabel; ?></a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title flex-grow-1 text-center"><?php echo $buttonLabel?></h4>
                                    <a href="index.php?p=listcategory" class="btn btn-primary">Back</a>
                                </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <div class="form-group">
                                <label for="productName">Category Name</label>
                                <input type="text" class="form-control" id="productName" name="categoryname" 
                                    value="<?php echo isset($name) ? $name : ""; ?>">
                            </div>
                            <div class="form-group">
                                <label for="categorySlug">Category Slug</label>
                                <input type="text" class="form-control" id="categorySlug" name="categoryslug" 
                                    value="<?php echo isset($slug) ? $slug : "" ?>" >
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
