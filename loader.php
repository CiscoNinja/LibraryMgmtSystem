<?php
$page=$_GET['page'];
if (!isset($page)){$content='home.php';}
else{
	if($page=="admin"){$content='admin.php';}
	else if ($page=="book"){$content='book.php';}
	else if ($page=='register'){$content='register.php';}
	else if ($page=='req'){$content='req.php';}
	else if ($page=='addbook'){$content='addbook.php';}
	else if ($page=='viewcustomers'){$content='viewcustomers.php';}
	else if ($page=='lended'){$content='lended.php';}
	else if ($page=='addcategory'){$content='addcategory.php';}
	else if ($page=='profile'){$content='profile.php';}
	else if ($page=='editbook'){$content='editbook.php';}
}
