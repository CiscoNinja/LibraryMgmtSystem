<?php 
include('../database.php');

if (isset($_POST['submit']))
{
	$order=$_POST['order'];
	if (!isset($_POST['order']))
	{header('location:../index.php?q=54&&msg=Choose An option');}
	else if ($_POST['order'])
	{
		{header('location:../index.php?q=55');}
	}
}
else{
	header('location:../index.php?q=20');
	}

?>
