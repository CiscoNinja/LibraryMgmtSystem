<?php
$id=$_GET['u'];
if(isset($id)){
	include('db.php');
	$querr="delete from book_category where book_category_id=$id";
	mysqli_query($con,$querr);
	session_start();
	$_SESSION['message']="Category successfully deleted";
		header('Location: index.php?page=addcategory');
}

