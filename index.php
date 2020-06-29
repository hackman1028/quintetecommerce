<?php include 'header.php' ?>



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

<?php

$_GET['value']="New Book";

if(isset($_GET['value']))
{  
 $_SESSION['category']=$_GET['value'];
}
$category=$_SESSION['category'];

$query = "SELECT * FROM products WHERE Category='$category'";
$result = mysqli_query ($con,$query)or die(mysqli_error($con));

$i=0;

echo '
<div class="header" id="heading">
<h2 style="text-transform:uppercase;"> '. $category .' STORE </h2>
</div>';

echo '
<div class="container-fluid">

<div class="row" style="overflow-x: auto; width: 100%; flex-wrap: nowrap; -webkit-appearance: none;">';


if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {
   $path="img/books/" .$row['PID'].".jpg";
   $description="description.php?ID=".$row["PID"];

   echo'
   <div class="column">
   <a href="'.$description.'">
   <div class="card">
   <img src="'.$path.'" style="width:100%">
   </div>
   <div class="container">
   <hr>
   ' . $row["Title"]. '<br>
   <h3><strong>Rs. ' . $row["Price"]. '</strong></h3>


   </div>

   </a>


   </div>';
 }
}

echo '
</div>
</div>';
?>

<?php

$_GET['value']="Literature and Fiction";

if(isset($_GET['value']))
{  
 $_SESSION['category']=$_GET['value'];
}
$category=$_SESSION['category'];

$query = "SELECT * FROM products WHERE Category='$category'";
$result = mysqli_query ($con,$query)or die(mysqli_error($con));

$i=0;

echo '
<div class="header" id="heading">
<h2 style="text-transform:uppercase;"> '. $category .' STORE </h2>
</div>';

echo '
<div class="container-fluid">

<div class="row" style="overflow-x: auto; width: 100%; flex-wrap: nowrap; -webkit-appearance: none;">';


if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {
   $path="img/books/" .$row['PID'].".jpg";
   $description="description.php?ID=".$row["PID"];

   echo'
   <div class="column">
   <a href="'.$description.'">
   <div class="card">
   <img src="'.$path.'" style="width:100%">
   </div>
   <div class="container">
   <hr>
   ' . $row["Title"]. '<br>
   <h3><strong>Rs. ' . $row["Price"]. '</strong></h3>


   </div>

   </a>


   </div>';
 }
}

echo '
</div>
</div>';
?>

<?php

$_GET['value']="Children and Teens";

if(isset($_GET['value']))
{  
 $_SESSION['category']=$_GET['value'];
}
$category=$_SESSION['category'];

$query = "SELECT * FROM products WHERE Category='$category'";
$result = mysqli_query ($con,$query)or die(mysqli_error($con));

$i=0;

echo '
<div class="header" id="heading">
<h2 style="text-transform:uppercase;"> '. $category .' STORE </h2>
</div>';

echo '
<div class="container-fluid">

<div class="row" style="overflow-x: auto; width: 100%; flex-wrap: nowrap; -webkit-appearance: none;">';


if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {
   $path="img/books/" .$row['PID'].".jpg";
   $description="description.php?ID=".$row["PID"];

   echo'
   <div class="column">
   <a href="'.$description.'">
   <div class="card">
   <img src="'.$path.'" style="width:100%">
   </div>
   <div class="container">
   <hr>
   ' . $row["Title"]. '<br>
   <h3><strong>Rs. ' . $row["Price"]. '</strong></h3>


   </div>

   </a>


   </div>';
 }
}

echo '
</div>
</div>';
?>

<?php

$_GET['value']="Regional Books";

if(isset($_GET['value']))
{  
 $_SESSION['category']=$_GET['value'];
}
$category=$_SESSION['category'];

$query = "SELECT * FROM products WHERE Category='$category'";
$result = mysqli_query ($con,$query)or die(mysqli_error($con));

$i=0;

echo '
<div class="header" id="heading">
<h2 style="text-transform:uppercase;"> '. $category .' STORE </h2>
</div>';

echo '
<div class="container-fluid">

<div class="row" style="overflow-x: auto; width: 100%; flex-wrap: nowrap; -webkit-appearance: none;">';


if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {
   $path="img/books/" .$row['PID'].".jpg";
   $description="description.php?ID=".$row["PID"];

   echo'
   <div class="column">
   <a href="'.$description.'">
   <div class="card">
   <img src="'.$path.'" style="width:100%">
   </div>
   <div class="container">
   <hr>
   ' . $row["Title"]. '<br>
   <h3><strong>Rs. ' . $row["Price"]. '</strong></h3>


   </div>

   </a>


   </div>';
 }
}

echo '
</div>
</div>';
?>

<?php

$_GET['value']="Health and Cooking";

if(isset($_GET['value']))
{  
 $_SESSION['category']=$_GET['value'];
}
$category=$_SESSION['category'];

$query = "SELECT * FROM products WHERE Category='$category'";
$result = mysqli_query ($con,$query)or die(mysqli_error($con));

$i=0;

echo '
<div class="header" id="heading">
<h2 style="text-transform:uppercase;"> '. $category .' STORE </h2>
</div>';

echo '
<div class="container-fluid">

<div class="row" style="overflow-x: auto; width: 100%; flex-wrap: nowrap; -webkit-appearance: none;">';


if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {
   $path="img/books/" .$row['PID'].".jpg";
   $description="description.php?ID=".$row["PID"];

   echo'
   <div class="column">
   <a href="'.$description.'">
   <div class="card">
   <img src="'.$path.'" style="width:100%">
   </div>
   <div class="container">
   <hr>
   ' . $row["Title"]. '<br>
   <h3><strong>Rs. ' . $row["Price"]. '</strong></h3>


   </div>

   </a>


   </div>';
 }
}

echo '
</div>
</div>';
?>







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

