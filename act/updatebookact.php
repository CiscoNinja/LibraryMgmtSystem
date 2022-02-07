<?php 
include('../db.php');
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
		header('Location: ../index.php?page=editbook');
 	die();
}
else {
/* move uploaded file to final destination. */
    //echo $path;

	$result = move_uploaded_file($_FILES['file']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/temp/library/'.$path);
  if ($result == true){ 
  		session_start();
  		$_SESSION['message']="File successfully uploaded";
		header('Location: ../index.php?page=editbook');}
  	
  else{ 
  		session_start();
  		$_SESSION['message']="There was a problem uploading the file";
		header('Location: ../index.php?page=editbook');
		die();
	}
} #endIF

session_start();
$b= $_SESSION['book_id'];
$sqls="update books set book_title='$title',book_author='$author',book_qty='$qty',book_category='$cat',book_Cover='$path' where book_id='$b' ";

} else{
	
session_start();
$b= $_SESSION['book_id'];
$sqls="update books set book_title='$title',book_author='$author',book_qty='$qty',book_category='$cat' where book_id='$b' ";

}
  

mysqli_query($con,$sqls) or die(mysqli_error());
  		$_SESSION['message']="Update Successful";
		header('Location: ../index.php?page=editbook');

?>