<?php
include('oop.php');

$db = new Ecommerce();
$conn = $db->getConnection();
if(isset($_GET['id']))
$id = $_GET['id'];
$sql = "DELETE FROM product where id = ?";

$stmt = $conn->prepare($sql);
// $stmt->bindParam("i",$id);
$stmt->execute([$id]);
$result= $stmt;
if($result){
  header("location: ../index.php?p=listproduct");
}



 

?>