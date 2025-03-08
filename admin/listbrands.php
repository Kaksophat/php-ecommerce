<?php
if (isset($_GET['id'])) {
    $id = ($_GET['id']);
    $result1 = $db->deletedata("brand", $id);
}
$result = $db->getdata("brand");
?>
 

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">ListBrand</h3>
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
                    <a href="#">ListBrand</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title flex-grow-1 text-center">ListBrand</h4>
                        <a href="index.php?p=addbrand" class="btn btn-primary">New</a>
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
                                        echo "<td><a href='index.php?p=addbrand&id=" . $row['id'] . "' class='btn btn-success'>Edit</a> 
                                        <a href='#' class='btn btn-danger' onclick='confirmDelete(" . $row['id'] . ", \"" . $row['name'] . "\")'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>No brands found</td></tr>";
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

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true" style="margin-top: 200px;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="close" data-dismiss="modal-btn" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <strong id="brandName"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id, name) {
        document.getElementById('brandName').innerText = name;
        $('#deleteModal').modal('show');
        document.getElementById('confirmDeleteBtn').onclick = function() {
            window.location.href = "index.php?p=listbrand&id=" + id;  
        };
    }

    document.querySelector('[data-dismiss="modal"]').addEventListener('click', function() {
        $('#deleteModal').modal('hide'); 
    });
    document.querySelector('[data-dismiss="modal-btn"]').addEventListener('click', function() {
        $('#deleteModal').modal('hide'); 
    });
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
