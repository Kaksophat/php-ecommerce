<?php

if (isset($_GET['id'])) {
    $id = ($_GET['id']);
    $result1 = $db->deletedata("slide", $id);
}

$result = $db->getdata("slide");

?>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">ListSlideshow</h3>
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
                    <a href="#">ListSlideshow</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title flex-grow-1 text-center">ListSlideshow</h4>
                        <a href="index.php?p=addslideshow" class="btn btn-primary">New</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <td>IMAGE</td>
                                    <th>Enable</th>
                                    <th>Ssorder</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result) {
                                    foreach ($result as $row) {
                                        if ($row['enable'] == 1) {
                                            $row['enable'] = "Enable";
                                            $class = "text-success";
                                        } else {
                                            $row['enable'] = "Disable";
                                            $class = "text-danger";
                                        }
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['title'] . "</td>";
                                        echo "<td>" . $row['subtitle'] . "</td>";
                                        echo "<td><img src='./upload/" . $row['image'] . "' width='100'></td>";
                                        echo "<td class='$class'>" . $row['enable'] . "</td>";
                                        echo "<td>" . $row['ssorder'] . "</td>";
                                        echo "<td><a href='index.php?p=addslideshow&id=" . $row['id'] . "' class='btn btn-success'>Edit</a> 
                                        <a href='#' class='btn btn-danger' onclick='confirmDelete(" . $row['id'] . ", \"" . $row['title'] . "\")'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>No slides found</td></tr>";
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

<!-- Modal for Confirm Deletion -->
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
                Are you sure you want to delete <strong id="slideTitle"></strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(id, title) {
        document.getElementById('slideTitle').innerText = title;
        $('#deleteModal').modal('show');
        document.getElementById('confirmDeleteBtn').onclick = function() {
            window.location.href = "index.php?p=listslideshow&id=" + id;
        };
    }
    document.querySelector('[data-dismiss="modal"]').addEventListener('click', function() {
        $('#deleteModal').modal('hide'); 
    });
    document.querySelector('[data-dismiss="modal-btn"]').addEventListener('click', function() {
        $('#deleteModal').modal('hide'); 
    });
</script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
