<?php
$category=$_POST['category'];
include('../database.php');
$sql="insert into category (category) values('$category')";
mysqli_query($con,$sql);
header('location:../index.php');
?>
