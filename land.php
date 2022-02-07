<?php
include('db.php');
$re=$_GET['r'];
$req="select * from request where request_id='$re'";
$r=mysqli_query($con,$req);
$rr=mysqli_fetch_assoc($r);
$book=$rr['book_id']; 	
$student=$rr['student_ID']; 

$reb="select * from books where book_id='$book'";
$rb=mysqli_query($con,$reb);
$b=mysqli_fetch_assoc($rb);
$bookt=$b['book_title'];
$bookqty=$b['book_qty'];

//-----------------

$res="select * from students where student_ID='$student'";
$rs=mysqli_query($con,$res);
$s=mysqli_fetch_assoc($rs);
$stud=$s['student_ID'];
$books=$s['books']+1;
$date=date('d-m-y');
$futuredate = strtotime("3 days");
$deadline=date('d-m-y', $futuredate);
$sat='out';
//echo $date; echo $deadline; echo $stud; echo $bookt; echo $sat;																																																																																																																				
$sqld="insert into land (time,deadline,student_ID,book,book_id,status) values ('$date','$deadline','$stud','$bookt','$book','$sat') ";
$sqls="update students set books='$books' where student_id='$student'";
$sqle="delete from request where request_id='$re'";
mysqli_query($con,$sqld);
mysqli_query($con,$sqls);
mysqli_query($con,$sqle);


session_start();
	$_SESSION['message']="Book Successfully Lended";
		header('Location: index.php?page=req');
/*if(mysqli_affected_rows()>0){
header('location:index.php?page=admin');}
else{echo "bad";}*/
?>
