<?php

   $conn = mysqli_connect('localhost','root','','phpecomerce');
   if(!$conn){
    echo "database connection failed";
    exit();
   }

?>