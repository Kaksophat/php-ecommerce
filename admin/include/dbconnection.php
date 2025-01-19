<?php

   $conn = mysqli_connect('localhost','root','','php-ecommerce');
   if(!$conn){
    echo "database connection failed";
    exit();
   }

?>