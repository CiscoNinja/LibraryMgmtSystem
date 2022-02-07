<?php
$offre_title=$_POST['title'];
$offre_description=$_POST['descript'];
include('../database.php');
$sql33="insert into offres (offre_title, offre_description) values ('$offre_title','$offre_description')";
mysqli_query($con,$sql33);
header('location: ../index.php?q=4');
?>
