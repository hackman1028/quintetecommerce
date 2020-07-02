<?php
session_start();
include "dbconnect.php";

if(isset($_GET['Message'])) {
  print '<script type="text/javascript">
  alert("'. $_GET['Message'] . '");
  </script>';
}

if (isset($_GET['response'])){
  print '<script type="text/javascript">
  alert("'. $_GET['response'] . '");
  </script>';
}


?>


<?php
if(isset($_POST['submit']))
{
  if($_POST['submit']=="login")
  { 
        $username=$_POST['login_username'];
        $password=$_POST['login_password'];
        $usertype=$_POST['login_UserType'];
       
    if($_POST['login_UserType']=='Customer')
    {   
        $query = "SELECT * from users where UserName ='$username'AND Password='$password'";
        mysqli_query($con,$query)or die(mysql_error($con));

        $query = "SELECT * from users where Username='$username' AND UserType='$usertype'";
        $result = mysqli_query($con,$query) or die (mysqli_error($con));
        if(mysqli_num_rows($result) > 0)
        {
             $row = mysqli_fetch_assoc($result);
             $_SESSION['user']=$row['UserName'];
             echo'<script type="text/javascript">alert("Successfully logged in as Customer!!!");</script>';
        }
        else
        {    print'
              <script type="text/javascript">alert("Incorrect Username, Password or User Type C!!");</script>
                  ';
        }
      }
      else
      {
        $query = "SELECT * from vendor_user where UserName ='$username'AND Password='$password'";
        mysqli_query($con,$query)or die(mysql_error($con));
        $query = "SELECT * from vendor_user where Username='$username' AND UserType='$usertype'";
        $result = mysqli_query($con,$query) or die (mysqli_error($con));
        
        if(mysqli_num_rows($result) > 0)
        {
             $row = mysqli_fetch_assoc($result);
             $_SESSION['user']=$row['UserName'];
             echo'<script type="text/javascript">alert("Successfully logged in as Vendor!!!");</script>';
             echo "<script>window.open('seller/seller.php','_self')</script>";
        }
        else
        {    print'
              <script type="text/javascript">alert("Incorrect Username, Password or User Type V!!");</script>
                  ';
        }
      }
  }
  else if($_POST['submit'] = "register")
  {
        $username=$_POST['register_username'];
        $password=$_POST['register_password'];
        $usertype=$_POST['signUp_UserType'];
        
        // if(mysqli_num_rows($result)>0)
        // $db_username = 'UserName';

       if($_POST['signUp_UserType']=='Customer')
    {  
      $query="SELECT * FROM users WHERE UserName = '$username'";
        $result=mysqli_query($con,$query) or die($con);

      if(mysqli_num_rows($result) > 0)
        {
          $row = mysqli_fetch_assoc($result);
          $db_username = $row['UserName'];
        
        
        if($username == $db_username)
          {   
            echo'<script type="text/javascript">alert("Sorry, This Username is taken");</script>';
            echo "<script>window.open('login/login1.php','_self')</script>";
          }
        }
        else
        {

          $query ="INSERT INTO users (UserName, Password, UserType) VALUES ('$username','$password', '$usertype')";
          $result=mysqli_query($con,$query);
          echo'
                <script type="text/javascript">
                 alert("Successfully Registered!!!");
                </script>';
          echo "<script>window.open('login/login1.php','_self')</script>";
        }
      }

      else
      {
        $query="SELECT * FROM vendor_user WHERE UserName = '$username'";
        $result=mysqli_query($con,$query) or die($con);
        if(mysqli_num_rows($result) > 0)
        {
          $row = mysqli_fetch_assoc($result);
          $db_username = $row['UserName'];
        
        
        if($username == $db_username)
          {   
            echo'<script type="text/javascript">alert("Sorry, This Username is taken");</script>';
            echo "<script>window.open('login/login1.php','_self')</script>";
          }
        }
        else
        {
          $query ="INSERT INTO vendor_user (UserName, Password, UserType) VALUES ('$username','$password', '$usertype')";
          $result=mysqli_query($con,$query);
          echo'
                <script type="text/javascript">
                 alert("Successfully Registered!!!");
                </script>';
          echo "<script>window.open('login/login1.php','_self')</script>";
        }
      }
  }
}



?>


<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="css/my1.css" rel="stylesheet">



<body>
<!-- Navigation -->

<div class="navbar">
  <a class="logo" href="index.php"><strong>QUINTET</strong></a>

<div class="searchbox">
  <form role="search" method="POST" action="Result.php">
  <input type="text" name="keyword" placeholder="Search for a Book, Author of Category">
  </form>
</div> 

<div class="navbar-right">
      <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
      <a href="bookstore.php"><i class="fa fa-fw fa-book"></i> Bookstore</a>
      <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
      

      <?php
      if(!isset($_SESSION['user']))
      {
        echo' <a href="login/login1.php"><i class="fa fa-fw fa-user"></i> Login</a>';
      }
     else
     {
      echo'
      <div class="dropdown">
        <button class="dropbtn" style="text-transform:uppercase;"> Hi, '.$_SESSION['user']. '&nbsp <i class="fa fa-caret-down"></i></button>
          <div class="dropdown-content">
              <a href="destroy.php" class="btn btn-lg"> Logout </a>

          </div>
      </div>
      <a href="cart.php" class="btn btn-lg"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart </a>  ';
     }
     ?>

     <!--  <a onclick="openForm()"><i class="fa fa-fw fa-user"></i> Login</a>
      <?php include 'login/login1.php' ?> 

                  <a href="seller/seller.php">Vender </a>
-->

</div>
</div>  <!-- navbar -->
 