<?php
$pharma_title=$_POST['title'];
$pharma_description=$_POST['descript'];
include('../database.php');
$sql34="insert into pharma (pharma_title, pharma_description) values ('$pharma_title','$pharma_description')";
mysqli_query($con,$sql34);
header('location:../index.php?q=4');
?>
