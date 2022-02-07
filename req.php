<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="styles/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="styles/font-awesome.min.css" rel="stylesheet" type="text/css" />
     
    <!-- DATA TABLES -->
    <link href="styles/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="styles/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
      </head>

      <body class="skin-blue">
        <div id="services">
            <center><h2><font color='blue' size='5'><p id='request'></p></font></center>
        </div>
        <section class="content">
          <?php
              session_start();
              if(isset($_SESSION['message'])){?>
                <div class="row">
                <div class="col-xs-12">
                  <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4>Alert!</h4>
                    <p><?php echo $_SESSION['message'];?></p>
                  </div>
                  </div>
                </div>

                <?php unset($_SESSION['message']);
              }
              ?>
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                  <h3 class="box-title">Book Requests</h3>
                </div><!-- /.box-header -->
                <?php include('db.php');?>
                <div class="box-body table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  		<tr>
                  			<th>Request ID</th>
                  			<th>Book id</th>
                  			<th>Student id</th>
                  			<th>Action</th>
                  		</tr> 
                  	</thead>
                  	<tbody>
                  		<tr>
                  			<?php
                  			$req="select * from request";
                  			$r=mysqli_query($con,$req);
                        
                  			while($rr=mysqli_fetch_assoc($r)){?>
                  			<td><?php echo $rr['request_id'];?></td>
                  			<?php $b=$rr['book_id'];?>
                  			<td><?php echo $rr['book_id'];?></td>
                  			<?php $s=$rr['student_ID'];?>
                  			<td><?php echo $rr['student_ID'];?></td>
                  			<?php

                  			$sqlbk="select * from books where book_id='$b' ";
                  			$resultbk=mysqli_query($con,$sqlbk);
                  			$datab=mysqli_fetch_assoc($resultbk);

                  			$sqlcount="select * from students where student_ID='$s' ";
                  			$resultcount=mysqli_query($con,$sqlcount);
                  			$data=mysqli_fetch_assoc($resultcount);
                  			if($data['books']<3) { ?>
                  			<td><a href="land.php?r=<?php echo $rr['request_id'];?>">lend</a> |<a href="noland.php?r=<?php echo $rr['request_id'];?>"> Cancel</a></td>
                  			<?php }
                  			else if($datab['book_qty']<=0){ ?><td><font color='red'> Book Unvailable </font> |<a href="noland.php?r=<?php echo $rr['request_id'];?>"> Cancel</a></td> <?php }
                  			else {?> <td><font color='red'>limit reached </font> |<a href="noland.php?r=<?php echo $rr['request_id'];?>"> Cancel</a></td><?php }?>
                  			
                  		</tr>
                  		<?php } ?>
				 </tbody>
				 <tfoot>
				 	<tr>
				 		<th>Request ID</th>
				 		<th>Book id</th>
				 		<th>Student id</th>
				 		<th>Action</th>
				 	</tr> 
				 </tfoot>
			</table>
        </div>
    </div>

</div>
</div>
</section>
</body>
<script src="styles/jquery.min.js"></script>
<script src="styles/bootstrap.min.js" type="text/javascript"></script>
      <!-- DATA TABES SCRIPT -->
<script src="styles/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="styles/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="styles/js/AdminLTE/demo.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
    $(function() {
      $("#example1").dataTable();
      $('#example2').dataTable({
        "bPaginate": true,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false
    });
  });
</script>
