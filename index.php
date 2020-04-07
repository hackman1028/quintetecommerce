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
      // print'
      // <script type="text/javascript">alert("sucessfully logged in!!");</script>
      // ';
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

<link href="css/my1.css" rel="stylesheet">



<body>
<!-- Navigation -->

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
<div class="row" style="overflow-x: auto; width:100%; flex-wrap: nowrap; -webkit-appearance: none;">
  

 <div class="column" style="width: auto; ">
   <a href="description.php?ID=NEW-1&category=new">
    <div class="card">
      <img src="img/books/book1.jpg" alt="1" style="width:100%">
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div> 
      </a>   
  </div> <div class="column" style="width: auto; ">
   <a href="description.php?ID=NEW-1&category=new">
    <div class="card">
      <img src="img/books/book1.jpg" alt="1" style="width:100%">
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div> 
      </a>   
  </div> <div class="column" style="width: auto; ">
   <a href="description.php?ID=NEW-1&category=new">
    <div class="card">
      <img src="img/books/book1.jpg" alt="1" style="width:100%">
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div> 
      </a>   
  </div> <div class="column" style="width: auto; ">
   <a href="description.php?ID=NEW-1&category=new">
    <div class="card">
      <img src="img/books/book1.jpg" alt="1" style="width:100%">
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div> 
      </a>   
  </div> <div class="column" style="width: auto; ">
   <a href="description.php?ID=NEW-1&category=new">
    <div class="card">
      <img src="img/books/book1.jpg" alt="1" style="width:100%">
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div> 
      </a>   
  </div>









  <div class="column" style="width: auto; ">
   <a href="description.php?ID=NEW-1&category=new">
    <div class="card">
      <img src="img/books/book1.jpg" alt="1" style="width:100%">
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div> 
      </a>   
  </div>

  

  <div class="column" style="width: auto;">
    <a href="description.php?ID=NEW-2&category=new">
    <div class="card">
      <img src="img/books/book2.jpg" alt="2" style="width:100%">
    </div>
      <div class="container">
        <hr>
        2 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column" style="width: auto;">
  <a href="description.php?ID=NEW-3&category=new">
    <div class="card">
      <img src="img/books/book3.jpg" alt="3" style="width:100%">
    </div>
      <div class="container">
        <hr>
        2 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column"  style="width: auto;">
  <a href="description.php?ID=NEW-4&category=new">    
    <div class="card">
      <img src="img/books/book4.jpg" alt="4" style="width:100%">
    </div>
      <div class="container">
        <hr>
        2 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column" style="width: auto;">
   <a href="description.php?ID=ENT-1&category=new">   
    <div class="card">
      <img src="img/books/book5.jpg" alt="5" style="width:100%">
    </div>
      <div class="container">
        <hr>
        2 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column" style="width: auto;">
  <a href="description.php?ID=ENT-2&category=new">
    <div class="card">
      <img src="img/books/book6.jpg" alt="6" style="width:100%">
    </div>
      <div class="container">
        <hr>
        2 book <br>
        Summer Love <br>
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
<div class="row" style="overflow-x: auto; width:100%; flex-wrap: nowrap; -webkit-appearance: none;">
  

 <div class="column" style="width: auto; ">
   <a href="description.php?ID=NEW-1&category=new">
    <div class="card">
      <img src="img/books/book1.jpg" alt="1" style="width:100%">
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div> 
      </a>   
  </div> <div class="column" style="width: auto; ">
   <a href="description.php?ID=NEW-1&category=new">
    <div class="card">
      <img src="img/books/book1.jpg" alt="1" style="width:100%">
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div> 
      </a>   
  </div> <div class="column" style="width: auto; ">
   <a href="description.php?ID=NEW-1&category=new">
    <div class="card">
      <img src="img/books/book1.jpg" alt="1" style="width:100%">
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div> 
      </a>   
  </div> <div class="column" style="width: auto; ">
   <a href="description.php?ID=NEW-1&category=new">
    <div class="card">
      <img src="img/books/book1.jpg" alt="1" style="width:100%">
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div> 
      </a>   
  </div> <div class="column" style="width: auto; ">
   <a href="description.php?ID=NEW-1&category=new">
    <div class="card">
      <img src="img/books/book1.jpg" alt="1" style="width:100%">
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div> 
      </a>   
  </div>


  <div class="column" style="width: auto; ">
   <a href="description.php?ID=NEW-1&category=new">
    <div class="card">
      <img src="img/books/book1.jpg" alt="1" style="width:100%">
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div> 
      </a>   
  </div>

  

  <div class="column" style="width: auto;">
    <a href="description.php?ID=NEW-2&category=new">
    <div class="card">
      <img src="img/books/book2.jpg" alt="2" style="width:100%">
    </div>
      <div class="container">
        <hr>
        2 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column" style="width: auto;">
  <a href="description.php?ID=NEW-3&category=new">
    <div class="card">
      <img src="img/books/book3.jpg" alt="3" style="width:100%">
    </div>
      <div class="container">
        <hr>
        2 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column"  style="width: auto;">
  <a href="description.php?ID=NEW-4&category=new">    
    <div class="card">
      <img src="img/books/book4.jpg" alt="4" style="width:100%">
    </div>
      <div class="container">
        <hr>
        2 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column" style="width: auto;">
   <a href="description.php?ID=ENT-1&category=new">   
    <div class="card">
      <img src="img/books/book5.jpg" alt="5" style="width:100%">
    </div>
      <div class="container">
        <hr>
        2 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>
      </a>    
  </div>

  <div class="column" style="width: auto;">
  <a href="description.php?ID=ENT-2&category=new">
    <div class="card">
      <img src="img/books/book6.jpg" alt="6" style="width:100%">
    </div>
      <div class="container">
        <hr>
        2 book <br>
        Summer Love <br>
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

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>
</html>

