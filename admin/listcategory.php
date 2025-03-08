<?php
  if (isset($_GET['id'])) {
      $id = ($_GET['id']);
      $result1 = $db->deletedata("category", $id);
  }

  $result = $db->getdata("category");
?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">ListCategory</h3>
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
                    <a href="#">ListCategory</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title flex-grow-1 text-center">ListCategory</h4>
                        <a href="index.php?p=addcategory" class="btn btn-primary">New</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if ($result) {
                                        foreach ($result as $row) {
                                            echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['slug'] . "</td>";
                                            echo "<td>" . $row['date'] . "</td>";
                                            echo "<td>
                                                    <a href='index.php?p=addcategory&id=" . $row['id'] . "' class='btn btn-success'>Edit</a> 
                                                    <button type='button' class='btn btn-danger' onclick='confirmDelete(" . $row['id'] . ", \"" . $row['name'] . "\")'>Delete</button>
                                                  </td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='5' class='text-center'>No categories found</td></tr>";
                                    }
                                ?>
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