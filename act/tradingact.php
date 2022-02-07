<?php
$trading_title=$_POST['title'];
$trading_description=$_POST['descript'];
include('../database.php');
$sql32="insert into trading (trading_title, trading_description) values ('$trading_title','$trading_description')";
mysqli_query($con,$sql32);
header('location: ../index.php?q=4');
?>
