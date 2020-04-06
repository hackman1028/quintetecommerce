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


if (isset($_POST['submit']))
{
  if($_POST['submit']=="login")
  {
    $username=$_POST['login_username'];
    $password=$_POST['login_password'];
    $query = "SELECT * from users where UserName = '$username' AND Password='$password'";
    $result = mysqli_query($con,$query)or die(mysql_error());
    if(mysqli_num_rows($result) > 0)
    {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['user']=$row['UserName'];
      print'
      <script type="text/javascript">alert("sucessfully logged in!!");</script>
      ';
    }
    else
    {
      print'
      <script type="text/javascript">alert("Incorrect Username Or Password!!");</script>
      ';
    }
  }
  else if($_POST['submit']=="register")
  {
    $username=$_POST['register_username'];
    $password=$_POST['register_password'];
    $query="SELECT * from user where UserName = '$username'";
    $result=mysqli_query($con,$query) or die(mysqli_error());
    if(mysqli_num_row($result)>0)
    {
      print'
      <script type="text/javascript">alert("username is taken");</script>';
    }
    else
    {
      $query="INSERT INTO users VALUES ('$username','$password')";
      $result=mysqli_query($con,$query);
      print'
      <script type="text/javascript">
      alert("Sucessfully Registered!!");
      </script>';
    }
  }
  }

?>


<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
 
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

<link href="css/my.css" rel="stylesheet">



<body>
<!-- Navigation -->

<div class="navbar">
  <a class="logo" href="index.php"><strong>QUINTET</strong></a>

<div id="searchbox">
<form role="search" method="POST" action="Result.php" style="border: 0px;">
  <input type="text" name="keyword" placeholder="Search.." style="width: 50%;">
  </form>
  </div> 

    <div class="navbar-right">
      <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
      <a href="bookstore.php"><i class="fa fa-fw fa-book"></i> Bookstore</a>
      <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
      <a href="login.php"><i class="fa fa-fw fa-user"></i> Login</a>
    </div>
</div>

<!-- 
  <div id="top" >
      <div id="searchbox" class="container-fluid" style="width:112%;margin-left:-6%;margin-right:-6%;">
          <div>
              <form role="search" method="POST" action="Result.php">
                  <input type="text" class="form-control" name="keyword" style="width:80%;margin:20px 10% 20px 10%;" placeholder="Search for a Book , Author Or Category">
              </form>
          </div>
      </div> -->
  <!--  <div id="searchbox1" >
              <form class="navbar-form navbar-left" role="search" method="POST" action="Result.php">
                  <input type="text" class="form-control" name="keyword" style="width:250%; margin-left: 20%" placeholder="Search for a Book, Author or Category">
              </form>
          </div> -->

<!-- Slide Show -->
<section>
  <img class="mySlides" src="img/carousel/1.jpg"
  style="width:100%">
  <img class="mySlides" src="img/carousel/2.jpg"
  style="width:100%">
  <img class="mySlides" src="img/carousel/3.jpg"
  style="width:100%">
</section>

<!-- Book section -->
<div class="header">
  <h2>RECENTLY ADDED</h2>
</div>

<!-- Book Description -->
<div class="container-fluid">
<div class="row" >
  <div class="column">
   <a href="description.php?ID=NEW-1&category=new">
    <div class="card">
      <img src="img/books/book1.jpg" alt="1" style="width:100%">
    </div>
      <div class="container">
        <h2> 1 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div> 
      </a>   
  </div>

  

  <div class="column">
    <a href="description.php?ID=NEW-2&category=new">
    <div class="card">
      <img src="img/books/book2.jpg" alt="2" style="width:100%">
    </div>
      <div class="container">
        <h2> 2 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column">
  <a href="description.php?ID=NEW-3&category=new">
    <div class="card">
      <img src="img/books/book3.jpg" alt="3" style="width:100%">
    </div>
      <div class="container">
        <h2> 3 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column">
  <a href="description.php?ID=NEW-4&category=new">    
    <div class="card">
      <img src="img/books/book4.jpg" alt="4" style="width:100%">
    </div>
      <div class="container">
        <h2> 4 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column">
   <a href="description.php?ID=ENT-1&category=new">   
    <div class="card">
      <img src="img/books/book5.jpg" alt="5" style="width:100%">
    </div>
      <div class="container">
        <h2> 5 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column">
  <a href="description.php?ID=ENT-2&category=new">
    <div class="card">
      <img src="img/books/book6.jpg" alt="6" style="width:100%">
    </div>
      <div class="container">
        <h2> 6 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>
</div>
</div>

<!-- Book section -->
<div class="header">
  <h2>BEST SELLER</h2>
</div>

<!-- Book Description -->
<div class="container-fluid">
<div class="row">
  <div class="column">
    <a href="description.php?ID=ENT-3&category=new">
    <div class="card">
      <img src="img/books/book1.jpg" alt="1" style="width:100%">
    </div>
      <div class="container">
        <h2> 1 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column">
    <a href="description.php?ID=ENT-4&category=new">
    <div class="card">
      <img src="img/books/book2.jpg" alt="2" style="width:100%">
    </div>
      <div class="container">
        <h2> 2 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column">
    <a href="description.php?ID=ENT-5&category=new">
    <div class="card">
      <img src="img/books/book3.jpg" alt="3" style="width:100%">
    </div>
      <div class="container">
        <h2> 3 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column">
    <a href="description.php?ID=ENT-60&category=new">
    <div class="card">
      <img src="img/books/book4.jpg" alt="4" style="width:100%">
    </div>
      <div class="container">
        <h2> 4 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column">
    <a href="description.php?ID=ENT-7&category=new">
    <div class="card">
      <img src="img/books/book5.jpg" alt="5" style="width:100%">
    </div>
      <div class="container">
        <h2> 5 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
    </a>
  </div>

  <div class="column">
    <a href="description.php?ID=ENT-8&category=new">
    <div class="card">
      <img src="img/books/book6.jpg" alt="6" style="width:100%">
    </div>
      <div class="container">
        <h2> 6 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>
</div>
</div>



 <footer class="footer-distributed">
 
      <div class="footer-left">
          <img src="img/quintet-logo.png">
 
        <p class="footer-links">
          <a href="#">Home</a>
          |
          <a href="#">Bookstore</a>
          |
          <a href="#">Contact</a>
        </p>
 
        <p class="footer-company-name">© 2020 Quintet Bookstore Pvt. Ltd.</p>
      </div>
 
      <div class="footer-center">
        <div>
          <i class="fa fa-map-marker"></i>
            <p><span>Mithala Chwok, Tinkune</span>
            Kathmandu, Nepal</p>
        </div>
 
        <div>
          <i class="fa fa-phone"></i>
          <p>+977 9849019990</p>
        </div>
        <div>
          <i class="fa fa-envelope"></i>
          <p><!-- <a href="mailto:info@quintet.com"> -->info@quintet.com</a></p>
        </div>
      </div>
      <div class="footer-right">
        <h4 style="color:#fff;">About the company</h4>
          <p>We offer varrieties of books at your doorstep. We are the top books seller of Nepal with huge categories of books</p>
        <div class="footer-icons">
           <a href="#"><i class="fa fa-facebook-official"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-flickr"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
        </div>
      </div>
    </footer>







<script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000);
}
</script>

</body>
</html>

