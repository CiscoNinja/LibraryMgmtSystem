<?php

include('db.php');

//echo (isset($_GET['r'])?'true':'false');
$re=$_GET['r'];
$req="select * from land where land_id='$re'";
$r=mysqli_query($con,$req);
$rr=mysqli_fetch_assoc($r);
$book=$rr['book_id']; 	
$student=$rr['student_ID'];

$reb="select * from books where book_id='$book'";
$rb=mysqli_query($con,$reb);
$b=mysqli_fetch_assoc($rb);
$bookt=$b['book_title'];
$bookqty=$b['book_qty'];
$newbook=$bookqty+1;

//-----------------

$res="select * from students where student_ID='$student'";
$rs=mysqli_query($con,$res);
$s=mysqli_fetch_assoc($rs);
$stud=$s['fname']."-".$s['lname'];
$books=$s['books']-1;

//echo $date; echo $deadline; echo $stud; echo $bookt; echo $sat;


$sqlb="update books set book_qty='$newbook' where book_id='$book' ";
$sqls="update students set books='$books' where student_id='$student' ";
$sqle="delete from land where land_id='$re' ";



mysqli_query($con,$sqlb);
mysqli_query($con,$sqls);
mysqli_query($con,$sqle);


if(mysqli_affected_rows()>0){
session_start();
	$_SESSION['message']="Book returned";
		header('Location: index.php?page=lended');
}else{
	header('Location: index.php?page=lended');
}
?>
