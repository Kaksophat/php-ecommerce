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
                    <a href="#">
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
        <div class="row">  <div class="col-md-12">
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
                                        <a href='index.php?p=listslideshow&id=" . $row['id'] . "' class='btn btn-danger'
                                         >Delete</a></td>";
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

               
                                        
			