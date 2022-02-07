<?php
include('db.php');
session_start();
$id=$_SESSION['id'];
$book=$_GET['b'];
$sql="insert into request (student_ID, book_id) values ('$id','$book')";
$reb="select * from books where book_id='$book'";
$rb=mysqli_query($con,$reb);
$b=mysqli_fetch_assoc($rb);
$bookt=$b['book_title'];
$bookqty=$b['book_qty'];
$newbook=$bookqty-1;
$sqlb="update books set book_qty='$newbook' where book_id='$book'";
mysqli_query($con,$sql);
mysqli_query($con,$sqlb);
header("location:index.php?page=book");
?>
