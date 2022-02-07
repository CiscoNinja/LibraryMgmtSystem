<?php 
$title=$_POST['title'];
$author=$_POST['author'];
$cat=$_POST['cat'];
$qty=$_POST['qty'];
$path="upload/".rand(1,1000)."."."jpg" ;
//$price=$_POST['price'];
//echo "ërwerwe";
//echo isset($_FILES['file'])?"true":"false";
	
if (isset($_FILES['file']) && $_FILES['file']['size']!= 0) {
if ($_FILES['file']['type'] != "image/jpeg") {
	session_start();
	$_SESSION['message']="Picture must be uploaded in JPEG format";
		header('Location: ../index.php?page=addbook');
 	die();
}
else {
/* move uploaded file to final destination. */
    //echo $path;

	$result = move_uploaded_file($_FILES['file']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/temp/library/'.$path);
  if ($result == true){ 
  		session_start();
  		$_SESSION['message']="File successfully uploaded";
		header('Location: ../index.php?page=addbook');}
  	
  else{ 
  		session_start();
  		$_SESSION['message']="There was a problem uploading the file";
		header('Location: ../index.php?page=addbook');
		die();
	}
} #endIF
} 
  
include('../db.php');

$sql="insert into books (book_title,book_author,book_qty,book_category,book_Cover) values('$title','$author','$qty','$cat','$path')";
mysqli_query($con,$sql) or die(mysqli_error());
header('location:../index.php?page=addbook');
?>

