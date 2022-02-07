<?php
include('../database.php');
$price=$_POST['pprice'];
$panier_id=$_POST['panier_id']; 
$new_qty=$_POST['nq'];
$action=$_POST['cart'];
	if($action=="Empty Basket"){
	
	$empty_query="delete from panier where 1";
	mysqli_query($con,$empty_query);
	header('location:../index.php?q=40');
}
else if($action=="Update Cart"){
	if  ($new_qty==0){
		mysqli_query($con,"delete from panier where panier_id=$panier_id");
		header('location:../index.php?q=40');
		}
	else{
	$up_query="update panier set item_qty='$new_qty', pricet='$new_qty'*'$price' where panier_id=$panier_id";
	mysqli_query($con,$up_query);
	header('location:../index.php?q=40');
		}
	}
else if($action=="Cancel"){
	header('location:../index.php?q=3');
	
	}
else if($action=="Confirm Achat"){
	header('location:../index.php?q=54');	
	}
?>
