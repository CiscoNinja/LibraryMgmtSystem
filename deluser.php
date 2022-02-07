<?php
$id=$_GET['u'];
if(isset($id)){
	include('db.php');
	$querr="delete from students where student_ID=$id";
	mysqli_query($con,$querr);
	session_start();
	$_SESSION['message']="User successfully deleted";
		header('Location: index.php?page=viewcustomers');
}
