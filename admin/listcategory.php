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
            <h3 class="fw-bold mb-3">ListCategoty</h3>
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
                    <a href="#">ListCategoty</a>
                </li>
            </ul>
        </div>
        <div class="row">  <div class="col-md-12">
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
                                        echo "<td><a href='index.php?p=addcategory&id=" . $row['id'] . "' class='btn btn-success'>Edit</a> 
                                        <a href='index.php?p=listcategory&id=" . $row['id'] . "' class='btn btn-danger'
                                         onclick=' confirm('Are you sure you want to delete this category?');'>Delete</a></td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='5' class='text-center'>No products found</td></tr>";
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

               
                                        
			