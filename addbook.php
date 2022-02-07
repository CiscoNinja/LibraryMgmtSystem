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
        <form method="post" action="act/addbookact.php" enctype="multipart/form-data">
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
                  <h3 class="box-title">Add Books</h3>
                </div><!-- /.box-header -->
                <?php include('db.php');?>
                <div class="box-body no-padding">
                  <table class="table table-striped">
                   <thead>
                    <tr>
                     <th>Title</th>
                     <th>Author</th>
                     <th>Category</th>
                     <th>Quantity</th>
                     <th>Cover</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody>
                  <tr>
                   <td align="center" valign="middle"><input type='text' name='title' required></td>
                   <td align="center" valign="middle"><input type='text' name='author' required></td> 
                   <td align="center" valign="middle">
                     <select name='cat'> 
                      <?php $sql5='select * from book_category'; 
                      $result5=mysqli_query($con,$sql5); 
                      while($row5=mysqli_fetch_assoc($result5)){?>	
                      <option>
                       <?php echo $row5['book_category_name'];?>
                     </option> <?php } ?>	
                   </select>
                 </td>
                 <td align="center" valign="middle"><input type='number' name='qty' min='0' max='30' required></td>
                 <td align="center" valign="middle"><input type='file' name='file' id='file'> </td>
                 <td align="center" valign="middle"><input type='submit' value='SAVE' id='go'></td>
               </tr>
             </tbody>
           </table>
         </div><!-- /.box-body -->
       </div><!-- /.box -->
     </div>
   </div>
 </section>
</body>
</form>
<script src="styles/jquery.min.js"></script>
<script src="styles/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="styles/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="styles/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="styles/js/AdminLTE/demo.js" type="text/javascript"></script>
<!-- page script -->

    				<!--<h5></h5>
    				<h6>Headline 6 Colour and Size</h6>
    				<p>This is a W3C compliant free website template from <a href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a>. This template is distributed using a <a href="http://www.os-templates.com/template-terms">Website Template Licence</a>.</p>
    				<p>You can use and modify the template for both personal and commercial use. You must keep all copyright information and credit links in the template and associated files. For more CSS templates visit <a href="http://www.os-templates.com/">Free Website Templates</a>.</p>
    				<p>Vestibulumaccumsan egestibulum eu justo convallis augue estas aenean elit intesque sed. Facilispede estibulum nulla orna nisl velit elit ac aliquat non tincidunt. Namjusto cras urna urnaretra lor urna neque sed quis orci nulla. Laoremut vitae doloreet condimentumst phasellentes dolor ut a ipsum id consectetus. Inpede cumst vitae ris tellentesque fring intesquet nibh fames nulla curabitudin.</p>
    				<ol>
    					<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
    					<li>Etiam vel sapien et est adipiscing commodo.</li>
    					<li>Duis pharetra eleifend sapien, id faucibus dolor rutrum et.</li>
    					<li>Donec et dui dolor, in lacinia leo.</li>
    					<li>Mauris posuere tellus ac purus adipiscing dapibus.</li>
    				</ol>-->
<!--  </div>
</div>-->

