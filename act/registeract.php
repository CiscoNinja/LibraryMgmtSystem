<?php
$student_ID=$_POST['student_ID'];
$name=$_POST['name'];
$lname=$_POST['lastm'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$password1=$_POST['password1'];
$profile_pic="profilePics/".rand(1,1000)."."."jpg";

include('../db.php');

$query = mysqli_query($con,"SELECT email FROM students WHERE email='$email'");

if (mysqli_num_rows($query) != 0)
{
	session_start();
	$_SESSION['message']="User Already Exists";
	header('location:../index.php?page=register');
}

else
{

	if(strcmp($password, $password1) != 0){
		session_start();
	$_SESSION['message']="Passwords dont match";
		header('location:../index.php?page=register');}
	else if(filter_var($email, FILTER_VALIDATE_EMAIL)){

		if (isset($_FILES['file']) && $_FILES['file']['size']!= 0) {
			if ($_FILES['file']['type'] != "image/jpeg") {
				session_start();
				$_SESSION['message']="Picture must be uploaded in JPEG format";
				header('Location: ../index.php?page=register');
				die();
			}
			else {
				/* move uploaded file to final destination. */
    //echo $path;

				$result = move_uploaded_file($_FILES['file']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/temp/library/'.$profile_pic);
				if ($result == true){ 
					session_start();
					$_SESSION['message']="File successfully uploaded<br/>";
					header('Location: ../index.php?page=register');
				}

					else{ 
						session_start();
						$_SESSION['message']="There was a problem uploading the file<br/>";
						header('Location: ../index.php?page=register');
						die();
					}
				}
			}


			$sql="insert into students (student_ID,fname,lname,email,phone,password,profile_pic) values('$student_ID','$name','$lname','$email','$phone','$password','$profile_pic')";
			mysqli_query($con,$sql);
			if(mysqli_affected_rows()>0){
	/*$msg1="$prenom $name,\n Vous avez bien etez enregistrez sur med.larilyasolutions.com . \n\n\n MERCI infiniment";
	$msg2="Un nouveau utilisateur a ete inscrit sur med.larilyasolutions.com";*/
	session_start();
	$_SESSION['message']="Registration Successful";
 	header('location:../index.php?page=register');/*
 mail($email,"Inscription Confirmation", $msg1,"From: makossan@larilyasolutions.com" ."\r\n"."Reply-To: makossan@larilyasolutions.com");
 mail("makossan@larilyasolutions.com","Order confirmation", $msg2,"From: makossan@larilyasolutions.com" ."\r\n"."Reply-To: makossan@larilyasolutions.com");			
 */}else{
 session_start();
 $_SESSION['message']="Registration Unsuccessful";
 header('location:../index.php?page=register');

}
}

else{ 
	session_start();
	$_SESSION['message']="Invalid Email Address";
	header('location:../index.php?page=register');
}

}

?>
