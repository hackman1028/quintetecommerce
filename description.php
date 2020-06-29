<!-- Header has opening and navigation menu -->
<?php include 'header.php' ?>


<style>  
       
        .tag {display:inline;float:left;padding:2px 5px;width:auto;background:#F5A623;color:#fff;height:23px;}
        .tag-side{display:inline;float:left;}
        #books {border:1px solid #DEEAEE; margin-bottom:20px;padding-top:30px;padding-bottom:20px;background:#fff; margin-left:10%;margin-right:10%;}
        #description {border:1px solid #DEEAEE; margin-bottom:20px;padding:20px 20px;background:#fff;margin-left:3%;margin-right:3%; text-align: left; width: 100%;}
        #description hr{margin:auto;}
   
    </style>


    <?php
    

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
        <div class="container-fluid11" id="books11">
        <div class="row">
        <div class="main">
        <div class="card" style="width: 380px; height: 580px; margin: 30px;">
        <div class="tag">'.$row["Discount"].'%OFF</div>
        <div class="tag-side"><img src="img/orange-flag.png"></div>
        <img class="" src="'.$path.'" height="550px" style="padding:20px;">
        </div>
        <div class="container" style="width: 60%;">
        <h2> '. $row["Title"] . '</h2>
        <span style="color:#00B9F5;">
            #'.$row["Author"].'&nbsp &nbsp #'.$row["Publisher"].'
        </span>
        <hr> ';

        echo'
        <form method="GET" action="cart.php?action=add&ID='.$PID.'">  
        <input type="hidden" name="ID" value="'.$PID.'" />
          
        <span style="font-weight:bold;"> Quantity : </span>';
        echo'<select name="Quantity" id="Quantity">';
        for($i=1;$i<=$row['Available'];$i++)
        echo '<option value="'.$i.'">'.$i.'</option>';
        echo ' </select>';
        echo'   <br><br>
        
        <button type="submit" name="add_to_cart" class="" style="color: white; text-decoration: none;"> <i class="fa fa-shopping-cart"></i>&nbsp ADD TO CART &nbsp |&nbsp PRICE : Rs. '.$row["Price"].' (
        <span style="text-decoration:line-through;"> Rs. '.$row["MRP"].'</span> 
        | '.$row["Discount"].'% discount)</button>  

        </form> 


        <div class="container" id="description"> 
        <pre style="background:inherit;border:none;">
        PRODUCT CODE  :  '.$row["PID"].'   <hr> 
        TITLE         :  '.$row["Title"].' <hr> 
        AUTHOR        :  '.$row["Author"].' <hr>
        AVAILABLE     :  '.$row["Available"].' <hr> 
        PUBLISHER     :  '.$row["Publisher"].' <hr> 
        EDITION       :  '.$row["Edition"].' <hr>
        </pre>
        <h2> DESCRIPTION </h2>
        <hr> 
        <p align="justify">'.$row['Description'] .'</p>
        </div>
        </div>
        </div>';




echo'
<div class="side">

  <div class="column1">
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

  <div class="column1">
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

  </div>;


    </div>';           
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


</body>
</html>

