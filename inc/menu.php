<div id="topbar">
  <div id="topnav">
    <?php if (isset($_SESSION['test']) && $_SESSION['test']==2) {$admin="<a href='index.php?page=admin'>Admin</a>"; }
    else{$admin="" ;} ?>
    <ul>
      <li class=<?php if(!isset($_GET['page'])){ echo "active";} else {echo "";}?>><a href="index.php">Home</a></li>
      <li class=<?php if(isset($_GET['page']) && $_GET['page']=='book'){echo "active";} else {echo "";}?>><a href="index.php?page=book">All Books</a></li>
      <li class=<?php if(isset($_GET['page']) && $_GET['page']=='admin' && (!isset($_GET['cat']))){echo 'active';} else{echo '';}?>><?php echo $admin;?>
        <ul>
         <li><a href="index.php?page=addbook" >Add Book</a></li>

         <li><a href="index.php?page=viewcustomers">View User</a></li>
       
         <li><a href="index.php?page=req">Check Request</a></li>
        
         <li><a href="index.php?page=lended">Lended Books</a></li>
       
        <li><a  href="index.php?page=addcategory">Add Book Category</a></li>
        <li><a href="index.php?page=editbook" >Edit Books</a></li>
       
      </ul>
    </li>
    <li class=<?php if(isset($_GET['cat'])) {echo "active";} else{ echo "";}?> ><a href="#">By Category</a>
      <ul>
       <?php
       include("db.php");
       $queq="select * from book_category";
       $resq=mysqli_query($con, $queq);
       while($datq=mysqli_fetch_assoc($resq)){?>      
       <li><a href="index.php?page=book&&cat=<?php echo $datq['book_category_name']; ?>"><?php echo $datq['book_category_name'];?></a></li>
       <?php } ?>
     </ul>
   </li>
   </ul>
</div>
<div id="search">
  <li><a href="index.php?page=profile" >My Profile</a></li>
</div>
<br class="clear" />
</div>
<script>
  function lend()
  {
    document.getElementById("lend").innerHTML ="<table> <tr><th>Lend ID</th><th>Book</th><th>Student</th><th>date taken</th><th>date back</th><th>Status</th><th>Action</th>  </tr><tr><?php include ('db.php'); $req='select * from land'; $r=mysqli_query($con,$req); while($rr=mysqli_fetch_assoc($r)){?> <td><?php echo $rr['land_id'];?></td> <td><?php echo $rr['book'];?></td> <td><?php echo $rr['student'];?></td> <td><?php echo $rr['time'];?></td><td><?php echo $rr['deadline'];?></td> <td><?php echo $rr['status'];?></td><td><a href='land.php?r=<?php echo $rr['request_id'];?>'>received</a> | <a href='noland.php?r=<?php echo $rr['request_id'];?>'> Warn</a></td></tr><?php } ?></table>";
    document.getElementById("request").innerHTML ="";
    document.getElementById("book").innerHTML ="";
    document.getElementById("cat").innerHTML ="";
    document.getElementById("view").innerHTML ="";
  }

  function request()
  {
    document.getElementById("lend").innerHTML ="";
    document.getElementById("request").innerHTML ="<table><tr><th>Request ID</th><th>Book id</th><th>Student ID</th><th>Action</th> </tr><tr><?php include ('db.php'); $req='select * from request'; $r=mysqli_query($con, $req); while($rr=mysqli_fetch_assoc($r)){?><td><?php echo $rr['request_id'];?></td><td><?php echo $rr['book_id'];?></td> <?php $s=$rr['student_ID'];?><td><?php echo $rr['student_ID'];?></td><?php $id=$rr['student_ID']; $sqlcount='select * from students where student_ID=\'$id\''; $resultcount=mysqli_query($con, $sqlcount); $data=mysqli_fetch_assoc($resultcount);  if($data['books']<3){ ?> <td><a href='land.php?r=<?php echo $rr['request_id']; ?>'>Lend</a> | <a href='noland.php?r=<?php echo $rr['request_id']; ?>'> Cancel</a></td></tr> <?php } else{?> <td><font color='red'>limit reached </font> |<a href='noland.php?r=<?php echo $rr['request_id'];?>'> Cancel</a></td><?php }  } ?></table> ";
    document.getElementById("book").innerHTML ="";
    document.getElementById("cat").innerHTML ="";
    document.getElementById("view").innerHTML ="";
  }

  function viewstudents()
  {
    document.getElementById("lend").innerHTML ="";
    document.getElementById("request").innerHTML ="";
    document.getElementById("view").innerHTML ="<?php include('db.php');?><div><table><tr> <th>ID</th> <th>FName</th> <th>LName</th><th>Email</th><th>phone</th><th>password</th><th>Action</th></tr><?php $sql1='SELECT * FROM students'; $result= mysqli_query($con, $sql1); while($row=mysqli_fetch_assoc($result)) { ?> <tr><td><?php echo $row['student_ID'];?> </td> <td><?php echo $row['fname'];?> </td> <td><?php echo $row['lname'];?> </td> <td><?php echo $row['email'];?> </td> <td><?php echo $row['phone'];?> </td> <td><?php echo $row['password'];?> </td> <td><a href='deluser.php?u=<?php echo $row['student_ID']; ?>'>Effacer</a></td></tr> <?php }?></table></div>";
    document.getElementById("book").innerHTML ="";
    document.getElementById("cat").innerHTML ="";
  }

  function addcat()
  {
    document.getElementById("lend").innerHTML ="";
    document.getElementById("request").innerHTML ="";
    document.getElementById("cat").innerHTML ="<form method='post' action='act/addcategoryact.php'> <table><tr><th>Category</th><th>Action</th></tr><?php $que='select * from book_category'; $res=mysqli_query($con, $que); while($dat=mysqli_fetch_assoc($res)){?> <tr><td><?php echo $dat['book_category_name'];?></td><td><a href='delcat.php?u=<?php echo $dat['book_category_id'];?>'>Delete</a></td></tr><?php }?></table> category<input type='text' name='category'><br><input type='hidden' value='insert'><input type='submit' value='Ajouter Category'> </form>";
    document.getElementById("book").innerHTML ="";
    document.getElementById("view").innerHTML ="";
  }
  function addbook()
  {
    document.getElementById("lend").innerHTML ="";
    document.getElementById("book").innerHTML ="<div id='newsletter'><?php include('db.php');?><form method='post' action='act/addbookact.php' enctype='multipart/form-data'><fieldset>Tilte : <input type='text' name='title' required><br> Author: <input type='text' name='author' required> <br> Category:<select name='cat'> <?php $sql5='select * from book_category'; $result5=mysqli_query($con, $sql5); while($row5=mysqli_fetch_assoc($result5)){?> <option><?php echo $row5['book_category_name'];?></option> <?php } ?> </select> <br>Quantity: <input type='number' name='qty' min='0' max='30' required> <br> Cover:<input type='file' name='file' id='file'> <br> <input type='submit' value='SAVE' id='go'></fieldset></form></div>";
    document.getElementById("cat").innerHTML ="";
    document.getElementById("view").innerHTML ="";
  }
</script>