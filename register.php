    <head>
        <meta charset="UTF-8">
        
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="styles/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="styles/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        
        <link rel="stylesheet" href="styles/AdminLTE.css" type="text/css" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
      </head>
      <p><?php echo $regerr;?></p>

      <form method="post" action="act/registeract.php" enctype="multipart/form-data">
        <body class="bg-black">
            <?php
              session_start();
              if(isset($_SESSION['message'])){?>
                <div class="form-box">
                
                  <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4>Alert!</h4>
                    <p><?php echo $_SESSION['message'];?></p>
                  
                  </div>
                </div>

                <?php unset($_SESSION['message']);
              }
              ?>
<div class="form-box" id="login-box">
    <div class="header">Register New Student</div>

    <div class="body bg-gray">
        <div class="form-group">
            <input type="text" name="student_ID" class="form-control" placeholder="Student ID" required/>
        </div>
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="First Name" required/>
        </div>
        <div class="form-group">
            <input type="text" name="lastm" class="form-control" placeholder="Last Name" required/>
        </div>

        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="User Email" required/>
        </div>
        <div class="form-group">
            <input type="tel" name="phone" class="form-control" placeholder="Contact Number" />
        </div>
        <div class="form-group">
            <input type="password" name="password1" class="form-control" placeholder="Password" required/>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Retype password"/>
        </div>
        <div class="form-group">
            <h6>upload your picture</h6>
            <input type="file" name="file" id='file' required/>
        </div>
    </div>
    <div class="footer">
        <input type="submit" value="Register" class="btn bg-light-blue btn-block">
    </div>



</div>


</body>
</form>
<script src="styles/jquery.min.js"></script>
<script src="styles/bootstrap.min.js" type="text/javascript"></script>

