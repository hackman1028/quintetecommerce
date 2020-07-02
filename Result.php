<?php
session_start();
if(!isset($_SESSION['user']))
       header("location: index.php?Message=Login To Continue");
?>


<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
<link href="css/my1.css" rel="stylesheet">
<body>
<style>

#books .row{margin-top:30px;font-weight:800;}
@media only screen and (max-width: 760px) { #books .row{margin-top:10px;}}
.book-block {margin-top:20px;margin-bottom:10px; padding:10px 10px 10px 10px; border :1px solid #DEEAEE;border-radius:10px;height:100%;}
</style>

</head>

<body>

<div class="navbar">
  <a class="logo" href="index.php"><strong>QUINTET</strong></a>

<div class="searchbox">
<form role="search" method="POST" action="Result.php" style="border: 0px;">
  <input type="text" name="keyword" placeholder="Search for a Book, Author of Category" style="width: 50%;">
  </form>
  </div> 

    <div class="navbar-right">
      <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
      <a href="bookstore.php"><i class="fa fa-fw fa-book"></i> Bookstore</a>
      <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
      <a onclick="openForm()"><i class="fa fa-fw fa-user"></i> Login</a>
    

    <!-- <button class="open-button" onclick="openForm()">Login</button> -->

<form class="form-popup" id="myForm" action="index.php" method="post" role="form">


    <?php
        if(!isset($_SESSION['user']))
          {
            echo'

  
  <div class="form-container">
  <div class="imgcontainer">
    <img src="img/img_avatar2.png" alt="Avatar" class="avatar" style="width:150px; height:auto;">
  </div>

  <h2> Login </h2>
   <div class="form-group">
      <label class="sr-only" for="username">Username</label>
      <input type="text" name="login_username" class="form-control" placeholder="Username" required>
  </div>
  <div class="form-group">
      <label class="sr-only" for="password">Password</label>
      <input type="password" name="login_password" class="form-control"  placeholder="Password" required>
  </div>
  <div class="form-group">
      <button type="submit" name="submit" value="login" class="btn btn-block"> Sign in </button>
      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>

  </div>
  </div>                                      
  ';
        } 
        else
          {   echo' 
                    <div>
                    <ul style="list-style-type:none; margin: 10px; padding: 0px;">
                    <li> <a href="#" class="btn btn-lg"> Hello ' .$_SESSION['user']. '.</a></li>
                    <li> <a href="cart.php" class="btn btn-lg"> Cart </a> </li> 
                    <li> <a href="destroy.php" class="btn btn-lg"> LogOut </a> </li>
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                    </ul>
                    </div>'; 
          }
?>
</form>


    </div>
</div>




      


<?php
include "dbconnect.php";
$keyword=$_POST['keyword'];

$query="select * from products  where PID like '%{$keyword}%' OR Title like '%{$keyword}%' OR Author like '%{$keyword}%' OR Publisher like '%{$keyword}%' OR Category like '%{$keyword}%'";
$result=mysqli_query($con,$query) or die(mysqli_error($con));;

    $i=0;
    echo '<div class="container-fluid" id="books">
        <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h4 style="color:#00B9F5;text-transform:uppercase;"> found  '. mysqli_num_rows($result) .' records </h4>
           </div>
        </div>';
        if(mysqli_num_rows($result) > 0) 
        {   
            while($row = mysqli_fetch_assoc($result)) 
            {
            $path="img/books/" .$row['PID'].".jpg";
            $description="description.php?ID=".$row["PID"];
            if($i % 3 == 0)  $offset= 0;
            else  $offset= 1; 
            if($i%3==0)
            echo '<div class="row">';
            echo'
               <a href="'.$description.'">
                <div class="col-sm-5 col-sm-offset-1 col-md-3 col-md-offset-'.$offset.' col-lg-3 text-center w3-card-8 w3-dark-grey">
                    <div class="book-block">
                        <img class="book block-center img-responsive" src="'.$path.'">
                        <hr>
                         ' . $row["Title"] . '<br>
                        ' . $row["Price"] .'  &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> ' . $row["MRP"] .' </span>
                        <span class="label label-warning">'. $row["Discount"] .'%</span>
                    </div>
                </div>
                
               </a> ';
            $i++;
            if($i%3==0)
            echo '</div>';
            }
        }
    echo '</div>';
?>


</body>
</html>		