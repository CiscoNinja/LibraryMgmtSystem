<?php
include('db.php');
session_start();
$id=$_SESSION['id'];
$book=$_GET['b'];
$sql="insert into request (student_ID, book_id) values ('$id','$book')";
mysqli_query($con,$sql);
header("location:index.php?page=book");
?>
