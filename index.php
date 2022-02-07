<?php ob_start();
session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>A|Library</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="styles/layout.css" type="text/css" />
</head>
<body id="top">
<?php include("loader.php");?>
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><a href="index.php">Arnaud LIBRARY</a></h1>
      <p><strong>Online Library for GTUC Student</strong></p>
    </div>
    <div id="newsletter">
		<?php $test=$_SESSION['test'];?>
		<?php if(!isset($test)){?>
      <p>Sign in to order books online, or check availability.</p>
      <form action="act/loginact.php" method="post" formenctype="application/x-www-form-urlencoded">
        <fieldset>
          <input type="text" placeholder='Student ID' name='email' />
          <input type="password" placeholder="Password..." name='password' />
          <input type="submit" name="news_go" id="news_go" value="Sign In" />
        </fieldset>
      </form>
      <?php }
      else { ?>
		<form action="logout.php" method="post" formenctype="application/x-www-form-urlencoded">
        <fieldset>
          <input type="text" name="news_go" id="news_go"  value=<?php echo $_SESSION['lname'];?> />
          <input type="submit" name="news_go" id="news_go" value="Log Out" />
        </fieldset>
      </form>
  <?php } ?>
    </div>
    <br class="clear" />
  </div>
</div>
<div class="wrapper col2">
  <?php include ('inc/menu.php');?>
</div>
<?php include($content);?>  
<!--<div class="wrapper col7">
  <div id="copyright">
    <p class="fl_left">Copyright &copy; Arnaud 2014 - All Rights Reserved - <a href="#">Project</a></p>
    <p class="fl_right">Template by <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <br class="clear" />
  </div>-->
</div>
</body>
</html>
