<?php

	$cartid=$_POST['panier'];
	$order_description=$_POST['order_description'];
	$username=$_POST['name'];
	$link1="med.larilyasolutions.com";
	$customerid=$_POST['user'];
	$total=$_POST['total'];
	$useremail1=$_POST['user_email'];
	include('../database.php');
	//$query_order=
	mysqli_query($con,"insert into orders (user_id, total, order_description) values('$customerid','$total', '$order_description')");
	if (mysqli_affected_rows()==1)
	{
		/*echo $total;
		echo $customer;
		echo $cartid;*/
		$oid=mysqli_insert_id();
		//echo $oid;
		$check="select * from panier";

		$fill=mysqli_query($con,$check);
		while($line=mysqli_fetch_assoc($fill)){
			$iid=$line['item_id'];
			$iqty=$line['item_qty'];
			$ipr=$line['item_price'];
			//echo $iqty;
			$insrt_order="insert into order_content (order_id,item_id,item_qty,item_price) values ('$oid','$iid','$iqty','$ipr') ";
			mysqli_query($con,$insrt_order);
			header('location:../index.php?q=28');
			}
			mysqli_query($con,"delete from panier where 1"); // empty cart--
			//email notif to customer
			$msg_to_customer="Merci d'avoir utiliser les services de larilya\nNous vous contacterons le plus tot possible la livraison";
			mail($useremail1,"Order confirmation", $msg_to_customer,"from: igondjocarter@outlook.com");
						//email notif to admin
			$msg_to_admin="L utilisateur # $customerid  name: $username , just made an order \n Click on the link below and log on as admin to view it \n $link1 ";
			mail("makossan@larilyasolutions.com","Order confirmation", $msg_to_admin,"From: makossan@larilyasolutions.com" ."\r\n"."Reply-To: makossan@larilyasolutions.com");
			mysqli_query($con,"insert into alarm (alarm_title) values ('order') ");
			
		}
?>
