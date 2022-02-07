<?php $title="larilya";?>
<?php include('database.php');?>
<div class='article'>
<form method="post" action='act/buyact.php'>
<center>
	Specify Qty and confirm 
</center>

<?php
$pp=($_GET['item']);

$sql6= "select * from items where item_id=$pp";
$result6= mysqli_query($con,$sql6);
$row6=mysqli_fetch_assoc($result6); ?>
	<p>
		<center><img src="<?php echo $row6['image'];?>" WIDTH=310 HEIGHT=240 /></center>
	</p>
	<p>
		Product : <?php echo $row6['name'];?><br />
		Model : <?php echo $row6['model'];?><br />
		Price : <?php echo $row6['price'];?><br />
	 </p>			 
	
		 Number of Pieces:  <select name="qty1"><?php $i=1;
		 while($i<=$row6['quantity']){?>
		  <option><?php echo $i;?> </option><?php $i++;}?>
		  </select>
		<input type="hidden" name="user_id1" value="<?php echo $_SESSION['user_id']; ?>" >
		<input type="hidden" name="item_id1" value= "<?php echo $pp; ?>" > 
		<input type="hidden" name="item_price" value= "<?php echo $row6['price']; ?>" > 
   	
	 
    <input type="submit" value="Add TO CART"> 
    </form>
</div>
<hr class="noscreen" />
