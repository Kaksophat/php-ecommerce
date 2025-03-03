<?php

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $data = [
        'name' => $name,
        'email' => $email,
        'password' => $password
    ];

  $result = $auth->register($data,"user");

   
}



?>


<div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Add Admin</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#"><i class="icon-home"></i></a>
                    </li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Add Admin</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title flex-grow-1 text-center">Add Admin</h4>
                            <a href="index.php?p=listadmin" class="btn btn-primary">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="adminName">Name</label>
                                    <input type="text" class="form-control" id="adminName" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="adminEmail">Email</label>
                                    <input type="email" class="form-control" id="adminEmail" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="adminPassword">Password</label>
                                    <input type="password" class="form-control" id="adminPassword" name="password">
                                </div>
                                <input type="submit" value="Add Admin" name="submit" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>