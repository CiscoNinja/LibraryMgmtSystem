<?php
include('db.php');
$re=$_GET['r'];
$sqld="delete from request where request_id='$re'";
mysqli_query($con,$sqld);
	session_start();
	$_SESSION['message']="Request Cancelled";
		header('Location: index.php?page=req');
//echo $re
?>
