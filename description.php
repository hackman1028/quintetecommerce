<?php
session_start();
if(!isset($_SESSION['user']))
  header("location: index.php?message=login to Continue");
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link href="css/my.css" rel="stylesheet">


<style>  
        @media only screen and (width: 768px) { body{margin-top:150px;}}
        @media only screen and (max-width: 760px) { #books .row{margin-top:10px;}}
        .tag {display:inline;float:left;padding:2px 5px;width:auto;background:#F5A623;color:#fff;height:23px;}
        .tag-side{display:inline;float:left;}
        #books {border:1px solid #DEEAEE; margin-bottom:20px;padding-top:30px;padding-bottom:20px;background:#fff; margin-left:10%;margin-right:10%;}
        #description {border:1px solid #DEEAEE; margin-bottom:20px;padding:20px 50px;background:#fff;margin-left:10%;margin-right:10%;}
        #description hr{margin:auto;}
        #service{background:#fff;padding:20px 10px;width:112%;margin-left:-6%;margin-right:-6%;}
        .glyphicon {color:#D67B22;}
    </style>
  </head>
<body>
<!-- Navigation -->

<div class="navbar">
  <a class="logo" href="index.php"><strong>QUINTET</strong></a>
  <input type="text" class="form-control" name="keyword" placeholder="Search for a Book, Author or Category" style="width: 50%;"> 
    <div class="navbar-right">
      <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
      <a class="active" href="bookstore.php"><i class="fa fa-fw fa-book"></i> Bookstore</a>
      <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
      <a href=login.php><i class="fa fa-fw fa-user"></i> Login</a>
    </div>
</div>


  
<?php
    include "dbconnect.php";
    $PID=$_GET['ID'];
    $query = "SELECT * FROM products WHERE PID='$PID'";
    $result = mysqli_query ($con,$query)or die(mysql_error());

        if(mysqli_num_rows($result) > 0) 
        {   
            while($row = mysqli_fetch_assoc($result)) 
            {
            $path="img/books/".$row['PID'].".jpg";
            $target="cart.php?ID=".$PID."&";
echo '
  <div class="container-fluid" id="books">
    <div class="row">
      <div class="col-sm-10 col-md-6">
                          <div class="tag">'.$row["Discount"].'%OFF</div>
                              <div class="tag-side"><img src="img/orange-flag.png">
                          </div>
                         <img class="center-block img-responsive" src="'.$path.'" height="550px" style="padding:20px;">
      </div>
      <div class="col-sm-10 col-md-4 col-md-offset-1">
        <h2> '. $row["Title"] . '</h2>
                                <span style="color:#00B9F5;">
                                 #'.$row["Author"].'&nbsp &nbsp #'.$row["Publisher"].'
                                </span>
        <hr>            
                                <span style="font-weight:bold;"> Quantity : </span>';
                                echo'<select id="quantity">';
                                   for($i=1;$i<=$row['Available'];$i++)
                                       echo '<option value="'.$i.'">'.$i.'</option>';
                               echo ' </select>';
echo'                           <br><br><br>
                                <a id="buyLink" href="'.$target.'" class="btn btn-lg btn-danger" style="padding:15px;color:white;text-decoration:none;"> 
                                    ADD TO CART for Rs '.$row["Price"] .' <br>
                                    <span style="text-decoration:line-through;"> RS'.$row["MRP"].'</span> 
                                    | '.$row["Discount"].'% discount
                                 </a> 

      </div>
    </div>
          </div>
     ';
echo '
          <div class="container-fluid" id="description">
    <div class="row">
      <h2> Description </h2> 
                        <p>'.$row['Description'] .'</p>
                        <pre style="background:inherit;border:none;">
   PRODUCT CODE  '.$row["PID"].'   <hr> 
   TITLE         '.$row["Title"].' <hr> 
   AUTHOR        '.$row["Author"].' <hr>
   AVAILABLE     '.$row["Available"].' <hr> 
   PUBLISHER     '.$row["Publisher"].' <hr> 
   EDITION       '.$row["Edition"].' <hr>
   LANGUAGE      '.$row["Language"].' <hr>
   PAGES         '.$row["page"].' <hr>
   WEIGHT        '.$row["weight"].' <hr>
                        </pre>
    </div>
  </div>
';

            
            }
        }
    echo '</div>';
    ?>  











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
            $(function () {
                var link = $('#buyLink').attr('href');
                $('#buyLink').attr('href', link + 'quantity=' + $('#quantity option:selected').val());
                $('#quantity').on('change', function () {
                    $('#buyLink').attr('href', link + 'quantity=' + $('#quantity option:selected').val());
                });
            });
    </script>
</body>
</html>

