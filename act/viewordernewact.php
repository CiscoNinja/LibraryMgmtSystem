<?php
include('../database.php');
$orderid1=$_REQUEST['oid'];
$sqlb="update orders set order_status=1 where order_id=$orderid1";
mysqli_query($con,$sqlb);
header("location:../index.php?q=57&&od=$orderid1");
?>

