<?php 
$qty=$_POST['qty1'];
$item=$_POST['item_id1'];
$id=$_POST['user_id1'];
$val=$_POST['item_price'];
//$price1=$qty*$val;

include('../database.php');
$sql20="insert into panier (item_id,user_id,item_qty,item_price,pricet) values('$item','$id','$qty','$val','$val'*'$qty')";
mysqli_query($con,$sql20);
header('location:../index.php?q=3');
?>
