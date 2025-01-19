<?php

include('./dbconnection.php');

  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM product WHERE id = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
    header('location: ../listproduct.php');
         
    }

  }

?>