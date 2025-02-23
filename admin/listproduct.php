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
                    <a href="#">
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
        <div class="row">  <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title text-center">ListProducts</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
												<th>CategoryID</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Image</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                   if ($result) {
                                    foreach ($result as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['category_id'] . "</td>";
                                        echo "<td>" . $row['product_name'] . "</td>";
                                        echo "<td>" . $row['price'] . "</td>";
                                        echo "<td style='width:80px'>
                                                <img src='./upload/" . $row['image'] . "' alt='" . $row['product_name'] . "' width='70px' height='70px'>
                                              </td>";
                                        echo "<td>
                                                <a href='editproduct.php?id=" . $row['id'] . "' class='btn btn-warning'>Edit</a> 
                                                <a href='./include/delete.php?id=" . $row['id'] . "' class='btn btn-danger'>Delete</a>
                                              </td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center'>No products found</td></tr>";
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
        </div>
    </div>
</div>

               
                                        
			