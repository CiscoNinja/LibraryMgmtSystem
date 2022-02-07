<?php
echo date('d-m-y');
$futuredate = strtotime("3 days");
$u=date('d-m-y', $futuredate);
//echo getdate();
echo $u;?>
<br>
<?php echo date("d+3-m-y");?>
<br>
<?php echo date('d+3');
?>

