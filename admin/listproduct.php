<?php
 if (isset($_GET['id'])) {
    $id = ($_GET['id']);
    $result1 = $db->deletedata("product", $id);
}
$result = $db->getdata("product");
?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">ListProduct</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="./index.php">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">ListProduct</a>
                </li>
            </ul>
        </div>
        <div class="row">  
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title flex-grow-1 text-center">ListProduct</h4>
                        <a href="index.php?p=addproduct" class="btn btn-primary">New</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>CategoryID</th>
                                    <th>BrandID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($result): ?>
                                    <?php foreach ($result as $row): ?>
                                        <tr>
                                            <td><?= $row['id'] ?></td>
                                            <td><?= $row['category_id'] ?></td>
                                            <td><?= $row['brand_id'] ?></td>
                                            <td><?= $row['title'] ?></td>
                                            <td><?= $row['price'] ?></td>
                                            <td><?= $row['qty'] ?></td>
                                            <td style='width:80px'>
                                                <img src='./upload/<?= $row['image'] ?>' alt='<?= $row['title'] ?>' width='70px' height='70px'>
                                            </td>
                                            <td>
                                                <a href='index.php?p=addproduct&id=<?= $row['id'] ?>' class='btn btn-success'>Edit</a>
                                                <button class='btn btn-danger' class="btn btn-danger" onclick="confirmDelete('<?php echo $row['id']; ?>', '<?php echo $row['title']; ?>')">Delete</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan='8' class='text-center'>No products found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Delete Confirmation Modal Component -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true" style="margin-top: 200px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal-btn" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modalMessage">Are you sure you want to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close" >Cancel</button>
                <a id="confirmDeleteBtn" href="#" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmDelete(productId, productName = "this item", returnUrl = "index.php?p=listproduct") {
        let deleteUrl = returnUrl + "&id=" + productId;
        document.getElementById("confirmDeleteBtn").href = deleteUrl;
        document.getElementById("modalMessage").innerText = "Are you sure you want to delete " + productName + "?";
        $('#deleteModal').modal('show'); 
    }
    document.querySelector('[data-dismiss="modal"]').addEventListener('click', function() {
        $('#deleteModal').modal('hide'); 
    });
    document.querySelector('[data-dismiss="modal-btn"]').addEventListener('click', function() {
        $('#deleteModal').modal('hide'); 
    });
</script>




