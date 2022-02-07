<?php session_start();?>
<head>
  <meta charset="UTF-8">
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link href="styles/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="styles/bootstrap-theme.min" rel="stylesheet" type="text/css" />

  <!-- DATA TABLES -->
  <link href="styles/bootstrap.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="styles/css/bootstrap-theme" rel="stylesheet" type="text/css" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
        </head>
        <body>

          <form action="act/loginact.php" method="post" formenctype="application/x-www-form-urlencoded">
            <div class="container">
              <div class="row">
                <div class="panel-footer">

                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

                  <div class="panel panel-info">
                    <div class="panel-heading">
                      <h3 class="panel-title"><?php echo $_SESSION['lname'];?> <?php echo $_SESSION['secondname'];?></h3>
                    </div>
                    <!--<div class="col-xs-10 col-sm-10 hidden-md hidden-lg"> <br>
                  <dl>
                    <dt>DEPARTMENT:</dt>
                    <dd>Administrator</dd>
                    <dt>HIRE DATE</dt>
                    <dd>11/12/2013</dd>
                    <dt>DATE OF BIRTH</dt>class="img-circle"
                       <dd>11/12/2013</dd>
                    <dt>GENDER</dt>
                    <dd>Male</dd>
                  </dl>
                </div>-->
                
                <?php if ($_SESSION['lname']=="Administrator"){?>
                <div class="panel-body">
                      <div class="row">
                <div class=" col-md-9 col-lg-9 "> 
                     <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>My ID:</td>
                        <td><?php echo $_SESSION['adid'];?></td>
                      </tr>
                      <tr>
                        <td>My Username:</td>
                        <td><?php echo $_SESSION['adusr'];?></td>
                      </tr>
                       </tbody>
                </table>
              </div>
              </div>
              </div>
                <?php }
                else {?>

                <div class="panel-body">
                      <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> <img class="img-thumbnail img-circle" style="width: 100%; max-height: 150px" src="<?php echo $_SESSION['profilepic'];?>" > </div>
                      <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Student ID:</td>
                        <td><?php echo $_SESSION['id'];?></td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><a href=""><?php echo $_SESSION['semail'];?></a></td>
                      </tr>
                      <tr>
                        <td>Contact</td>
                        <td><?php echo $_SESSION['contact'];?></td>
                      </tr>

                      <tr>
                       <tr>
                        <td>Number of borrowed books</td>
                        <td><?php echo $_SESSION['book'];?></td>
                      </tr>
                      
                       <?php include('db.php');?>
                       <td>Borrowed books</td>
                       <?php
                        $n = 0;
                        $k= $_SESSION['id'];
                        $req="select * from land where student_ID='$k' ";
                        $r=mysqli_query($con,$req);?>
                        <td>
                        <?php
                        while($rr=mysqli_fetch_assoc($r)){?>
                        
                        <?php $n++;?>
                        <h4> <?php echo $n;?>. <?php echo $rr['book'];?></h4><h6>Borrow Date: <?php echo $rr['time'];?><br>Return Date: <?php echo $rr['deadline'];?></h6><br>
                    
                      <?php } ?>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
              
            </div>
          </div>
          <?php } ?>
      

        </div>
      </div>
    </div>
  </div>
</form>

</body>
<script type="text/javascript">
  $(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
              currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
              currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
          })
      });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
      e.preventDefault();
      alert("This is a demo.\n :-)");
    });
  });
</script>