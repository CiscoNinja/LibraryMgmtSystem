<?php
include('db.php');
//$sqle="delete from panier where 1";
//mysqli_query($con,$sqle);
session_start();
session_destroy();

header('location: index.php');
?>

