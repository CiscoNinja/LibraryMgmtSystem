<?php 
require_once('../db.php');
$usr_name = $_POST['email'];
$usr_pword =$_POST['password'];
//$con = mysqli_connect("localhost","tprime","1tprime.com","library");

    $user_name = mysqli_real_escape_string($con, $usr_name);
    $user_pword = mysqli_real_escape_string($con, $usr_pword);

    $query = "SELECT * FROM students WHERE student_ID='$usr_name' and password='$usr_pword'";
    $result = mysqli_query($con, $query);
    $querys= "SELECT * FROM admins WHERE admin_log='$usr_name' and admin_password='$usr_pword'";
    $results = mysqli_query($con, $querys);
     
    if(mysqli_num_rows($result)==1) // User not found. So, redirect to login_form again.
    {   
	ob_start();
	session_cache_limiter('nocache');
	session_start();
	$userData = mysqli_fetch_assoc($result);
	$_SESSION['id'] = $userData['student_ID'];
    $_SESSION['lname'] = $userData['fname'];
    $_SESSION['secondname'] = $userData['lname'];
    $_SESSION['semail'] = $userData['email'];
    $_SESSION['contact'] = $userData['phone'];
    $_SESSION['warnings'] = $userData['warning'];
    $_SESSION['profilepic'] = $userData['profile_pic'];
	$_SESSION['test']=1; // dummy variable to check if connect or not
    $_SESSION['book']=$userData['books'];  // dummy variable for buying action
	header('Location:../index.php');
	//echo "user";
	}
    else if(mysqli_num_rows($results)==1)
    {
	ob_start();
	session_cache_limiter('nocache');
	session_start();
    $userData1 = mysqli_fetch_assoc($results);
    $_SESSION['adid'] = $userData1['admin_ID'];
    $_SESSION['adusr'] = $userData1['admin_log'];
    $_SESSION['test']=2;    
    $_SESSION['lname']='Administrator';
    header('Location:../index.php');
    //echo "admin";
    }    
    else{ //header('Location:../index.php'); 
		session_start();
    $_SESSION['message']="Username or password incorrect";
        header('Location:../index.php');
		}
?>
