<?php
$category=$_POST['category'];
include('../db.php');
$sql="insert into book_category (book_category_name) values('$category')";
mysqli_query($con,$sql);
session_start();
$_SESSION['message']="Category succesfully added";
		header('Location: ../index.php?page=addcategory');
?>
