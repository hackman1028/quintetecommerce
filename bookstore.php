<?php
session_start();
// if(!isset($_SESSION['user']))
//        header("location: index.php?Message=Login To Continue");

include "dbconnect.php";


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
<link href="css/my1.css" rel="stylesheet">

<body>
<!-- Navigation -->

<div class="navbar">
  <a class="logo" href="index.php"><strong>QUINTET</strong></a>
  <div class="searchbox">
  <input type="text" class="form-control" name="keyword" placeholder="Search for a Book, Author or Category" style="width: 50%;">
  </div> 
    <div class="navbar-right">
      <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
      <a class="active" href="bookstore.php"><i class="fa fa-fw fa-book"></i> Bookstore</a>
      <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
      <a onclick="openForm()"><i class="fa fa-fw fa-user"></i> Login</a>
      <form class="form-popup" id="myForm" action="bookstore.php" method="post" role="form">


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



<!-- book list -->
<div class="row">
    <div class="side" id="category">
  <!-- <div class="col-md-3 col-lg-3" id="category"> -->
        <div style="background:#D67B22;color:#fff;font-weight:800;border:none;padding:15px;">
         The Book Shop
        </div>
              <ul>
                  <li> <a href="bookstore.php?value=entrance%20exam"> Entrance Exam </a> </li>
                  <li> <a href="bookstore.php?value=Literature%20and%20Fiction"> Literature & Fiction </a> </li>
                  <li> <a href="bookstore.php?value=Academic%20and%20Professional"> Academic & Professional </a> </li>
                  <li> <a href="bookstore.php?value=Biographies%20and%20Auto%20Biographies"> Biographies & Auto Biographies </a> </li>
                  <li> <a href="bookstore.php?value=Children%20and%20Teens"> Children & Teens </a> </li>
                  <li> <a href="bookstore.php?value=Regional%20Books"> Regional Books </a> </li>
                  <li> <a href="bookstore.php?value=Business%20and%20Management"> Business & Management </a> </li>
                  <li> <a href="Product.php?value=Health%20and%20Cooking"> Health and Cooking </a> </li>             
               </ul>
        </div>
            <!-- </div> -->
          <!-- </div> -->


<!-- Book section -->
<div class="main">


  <?php
    // include "dbconnect.php";
    if(isset($_GET['value']))
        {  
           $_SESSION['category']=$_GET['value'];
        }
    $category=$_SESSION['category'];
    if(isset($_POST['sort']))
    {
        if($_POST['sort']=="price")
                {   $query = "SELECT * FROM products WHERE Category='$category' ORDER BY Price";
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                    ?>
                       <script type="text/javascript">
                          document.getElementById('select').Selected=$_POST['sort'];
                       </script>
                    <?php
                }
        else
        if($_POST['sort']=="priceh")
                {   $query = "SELECT * FROM products WHERE Category='$category' ORDER BY Price DESC";
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                }
        else
        if($_POST['sort']=="discount")
                {   $query = "SELECT * FROM products WHERE Category='$category' ORDER BY Discount DESC";
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                }
        else
        if($_POST['sort']=="discountl")
                {   $query = "SELECT * FROM products WHERE Category='$category' ORDER BY Discount";
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                }
    } 
    else   
            {   $query = "SELECT * FROM products WHERE Category='$category'";
                $result = mysqli_query ($con,$query)or die(mysqli_error($con));
            } 
    $i=0;
    echo '<div class="container-fluid" id="books">
        <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h2 style="color:rgb(228, 55, 25);text-transform:uppercase;margin-bottom:0px;"> '. $category .' STORE </h2>
           </div>
        </div>      
        <div class="container-fluid">
             <div class="row">
                  <div class="col-sm-5 col-sm-offset-6 col-md-5 col-md-offset-7 col-lg-4 col-lg-offset-8">
                       <form action="';echo $_SERVER['PHP_SELF'];echo'" method="post" class="pull-right">
                           <label for="sort">Sort by &nbsp: &nbsp</label>
                            <select name="sort" id="select" onchange="form.submit()">
                                <option value="default" name="default"  selected="selected">Select</option>
                                <option value="price" name="price">Low To High Price </option>
                                <option value="priceh" name="priceh">Highest To Lowest Price </option>
                                <option value="discountl" name="discountl">Low To High Discount </option>
                                <option value="discount" name="discount">Highest To Lowest Discount</option>
                            </select>
                       </form>
                  </div>
              </div>
        </div>';

        if(mysqli_num_rows($result) > 0) 
        {   
            while($row = mysqli_fetch_assoc($result)) 
            {
            $path="img/books/" .$row['PID'].".jpg";
            $description="description.php?ID=".$row["PID"];
            if($i%3==0)
            echo '<div class="row">';
            echo'
               <a href="'.$description.'">
                

              <div class="column">
                <div class="card" style="max-width: 120px;">
                  <img class="book block-center img-responsive" src="'.$path.'">
                </div>
                  <div class="container" style="width: 55%;">
                    <hr>
                    ' . $row["Title"] . '<br>
                    ' . $row["Price"] .'

                    <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
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




















<!--   <div class="header">
  <h2>RECENTLY ADDED</h2>
</div> -->
  <div class="column">
    <div class="card" >
      <img src="img/books/book1.jpg" alt="1" >
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column">
    <div class="card">
      <img src="img/books/book2.jpg" alt="2" >
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column">
    <div class="card">
      <img src="img/books/book3.jpg" alt="3" >
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column">
    <div class="card">
      <img src="img/books/book4.jpg" alt="4" >
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column">
    <div class="card">
      <img src="img/books/book5.jpg" alt="5">
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column">
    <div class="card">
      <img src="img/books/book6.jpg" alt="6">
    </div>
      <div class="container">
        <hr>
        6 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column" >
    <div class="card" >
      <img src="img/books/book1.jpg" alt="1" >
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column">
    <div class="card">
      <img src="img/books/book2.jpg" alt="2" >
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column">
    <div class="card">
      <img src="img/books/book3.jpg" alt="3" >
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column">
    <div class="card">
      <img src="img/books/book4.jpg" alt="4" >
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column">
    <div class="card">
      <img src="img/books/book5.jpg" alt="5">
    </div>
      <div class="container">
        <hr>
        1 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column">
    <div class="card">
      <img src="img/books/book6.jpg" alt="6">
    </div>
      <div class="container">
        <hr>
        6 book <br>
        Summer Love <br>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

</div>
</div>




<!-- Footer -->
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
  function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</body>
</html>

