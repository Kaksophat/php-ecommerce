<?php

  include('./dbconnection.php');

  if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn,$sql);

    if(empty($email) || empty($password)){
        header('location:../index.php');
        
    }

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc(($result));
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];
        header('location:../index.php');
    }
    else{
        header('location:../login.php');
    }
  }

?>