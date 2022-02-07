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
        <form method="post" action="act/updatebookact.php" enctype="multipart/form-data">
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
                  <h3 class="box-title">Edit Books</h3>
                  </div><!-- /.box-header -->
                  <?php include('db.php');
                  if (!isset($_GET['cat'])){
                    $sql3= "select * from books";}
                    else{$cat=$_GET['cat'];
                    $sql3="select * from books where book_category='$cat'";
                  }
                  $result3=mysqli_query($con,$sql3);
                  if (mysqli_num_rows($result3)==0){ ?>
                  <div class="wrapper col4">
                   <div id="services">

                     <center><h1><strong>  No Result Found !!! </strong></h1></center>

                     <?php } else {?>


                     <div class="box-body table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Cover</th>
                            <th>Book Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Quantity</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $a=0; while($row3=mysqli_fetch_assoc($result3)){
                           $it_id=$row3['book_id'];
                           session_cache_limiter('nocache');
                           session_start();
                           $_SESSION['book_id']=$row3['book_id'];
                           ?> <!-- item id-->

                           <!--<?php if ($a%3==0){echo "";} else {echo ""; /*$ol="<br class='clear' />"*/ } ?>-->

                           <tr style="width: 100%">
                            <td style="width: 10%"><img class="img-thumbnail img-responsive" style="width: 100%; max-height: 150px" src="<?php echo $row3['book_Cover'];?>" alt="" />
                              <a  style="width: 10%" href="" align="center" valign="middle"><input style="width: 100%" type='file' name='file' id='file'> </a>
                            </td>
                            <td style="width: 10%"> <input style="width: 100%" name='title' value="<?php echo $row3['book_title'];?>" ></td>
                            <td style="width: 10%"> <input style="width: 100%" name='cat' value="<?php echo $row3['book_category'];?>"></td>
                            <td style="width: 10%"> <input style="width: 100%" name='author' value="<?php echo $row3['book_author'];?>"></td>
                            <td style="width: 10%" align="center" valign="middle"><input style="width: 100%" type='number' name='qty' min='0' max='30' value="<?php echo $row3['book_qty'];?>" ></td>
                            <td style="width: 10%" align="center" valign="middle"><input type='submit' style="width:100px" value='Update' id='go'></td>
                          </tr>
                          <?php echo $ol;?>
                          <?php $a++; } ?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Cover</th>
                            <th>Book Title</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Quantity</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                  
                </div>
              </div>
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
    <script>
      function log(){
        document.getElementById("request").innerHTML ="Log-In as Student first!!!";
      }
      function request(){
        document.getElementById("request").innerHTML ="Request Sent!!!";
      }
      function request1(){
        document.getElementById("request").innerHTML ="Limit Book Borrowed Reached!!!";
      }
      function request2(){
        document.getElementById("request").innerHTML ="Not Available !!!";
      }
    </script>


    <?php } ?>

