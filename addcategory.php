<?php echo $log_msg1; ?>
<head>
	<meta charset="UTF-8">
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<link href="styles/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="styles/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!-- DATA TABLES -->
	<link href="styles/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
	<link rel="stylesheet" href="styles/css/AdminLTE.css" type="text/css" />

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
        </head>
        <form method="post" action="act/addcategoryact.php">
          <body class="skin-blue">

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
                  <h3 class="box-title">Add Category</h3>
                </div><!-- /.box-header -->
               
                <div class="box-body no-padding">
                	<table class="table table-striped">
                		<thead>
                			<tr>
                				<th>Category Name</th>
                				<th>Action</th>
                			</tr>
                		</thead>
                		<tbody>
                			<tr>
                				<td> <input type="text" name="category"> </td>
                				<td><input type="submit" value="Add Category"> </td> 
                			</tr>
                		</tbody>
                	</table> 
                	</div><!-- /.box-body -->
       </div><!-- /.box -->
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
</form>


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
        <section class="content">
        
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                  <div class="box-header">
                  <h3 class="box-title">Categories</h3>
                </div><!-- /.box-header -->
                <?php include('db.php');?>
                <div class="box-body table-responsive">
                	<table id="example1" class="table table-bordered table-striped">
                		<thead>
                			<tr>
                				<th>Category</th>
                				<th>Action</th>
                			</tr>  
                	</thead>
                	<tbody>

                		<?php
                		$que="select * from book_category";
                		$res=mysqli_query($con,$que);
                		while($dat=mysqli_fetch_assoc($res)){?>
                		<tr>
                			<td><?php echo $dat['book_category_name'];?></td>
                			<td><a href="delcat.php?u=<?php echo $dat['book_category_id'];?>">Delete</a></td>
                		</tr>
                		<?php } ?>
                	</tbody>
                	<tfoot>
                		<tr>
                		<th>Category</th>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
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



