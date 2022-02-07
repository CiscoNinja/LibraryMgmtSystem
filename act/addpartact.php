<?php
$company=$_POST['company'];
$part_des=$_POST['descript'];
$part_email=$_POST['email'];
$part_phone=$_POST['phone'];
include('../database.php');
$sql34="insert into partenaires (company, company_email, company_phone, company_description) values ('$company','$part_email','$part_phone','$part_des')";
mysqli_query($con,$sql34);
header('location: ../index.php?q=4');
?>
