<?php
session_start();


function getIpAdd()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}



if(!isset($_SESSION['user']))
	heder("location: index.php?Message=Login to Continue");
include "dbconnect.php";
	$customer=$_SESSION['user'];
?>
<?php

	if(isset($_GET['place']))
			{
			$query="DELETE FROM cart where Customer='$customer'";
			$result=mysqli_query($con,$query);
			?>
			<script type="text/javascript">
				alert("Order Successfully Placed!!!");
			</script>
			<?php
			}
			if(isset($_GET['remove']))
			{
				$product=$_GET['remove'];
				$query="DELETE FROM cart where Customer='$customer' AND Product='$product'";
        $result=mysqli_query($con,$query);
			?>
				<script type="text/javascript">
					alert("Item Successfully removed");
				</script>
				<?php
			}
			?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Cart">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <title>order</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/my1.css" rel="stylesheet">
    <style>
        #cart {margin-top:30px;margin-bottom:30px;}
        .panel {border:1px solid #0E345A;padding-left:0px;padding-right:0px;}
        .panel-heading {background:#0E345A !important;color:white !important; padding: 10px;}        
        @media only screen and (width: 767px) { body{margin-top:150px;}}
    </style>

</head>
<body>

<div class="navbar topnav">
  <a class="logo" href="index.php"><strong>QUINTET</strong></a>
  <div class="searchbox">
  <form role="search" method="POST" action="Result.php">
  <input type="text" class="form-control" name="keyword" placeholder="Search.." style="width: 50%;">
  </form> 
</div>
    <div class="navbar-right">
      <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
      <a href="bookstore.php"><i class="fa fa-fw fa-book"></i> Bookstore</a>
      <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
      <a class="active" href="login.php"><i class="fa fa-fw fa-user"></i> Login</a>
    </div>
</div>


	<?php
echo '<div class="container-fluid" id="cart">
      <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h2 style="text-transform:uppercase;">  YOUR CART </h2>
           </div>
        </div>';
	if(isset($_SESSION['user']))
	    {   
              	if(isset($_GET['ID']))
	            {   
                        $product=$_GET['ID'];
                        $quantity=$_GET['Quantity'];
                        $query="SELECT * from cart where Customer='$customer' AND Product='$product'";
                        $result=mysqli_query($con,$query);
                        $row = mysqli_fetch_assoc($result);
                        if(mysqli_num_rows($result)==0)
	                         { $query="INSERT INTO cart values('$customer','$product','$quantity')"; 
                              $result=mysqli_query($con,$query);
                            }
                        else
                           { $new=$_GET['Quantity'];
                             $query="UPDATE 'cart' SET Quantity=$new WHERE Customer='$customer' AND Product='$product'";
	                           $result=mysqli_query($con,$query);
                            }
                    }
              	$query="SELECT PID,Title,Author,Edition,Quantity,Price FROM cart INNER JOIN products ON cart.Product=products.PID 
              	        WHERE Customer='$customer'";
	        $result=mysqli_query($con,$query); 
                $total=0;
                if(mysqli_num_rows($result)>0)
                {    $i=1;
                     $j=0;
                     while($row = mysqli_fetch_assoc($result))
                     {       $path = "img/books/".$row['PID'].".jpg";
                             $Stotal = $row['Quantity'] * $row['Price'];
                             if($i % 2 == 1)  $offset= 1;
                             if($i % 2 == 0)  $offset= 2;                                                
                             if($j%2==0)
                                 echo '<div class="row">'; 
                                 echo '                
                                      <div class="column" style="color:#0E345A;font-weight:800; width: 45%; display: table;">
                                          <div class="panel-heading">Order '. $i .' </div>
                                          <div class="container">
			                                                <img class="image-responsive block-center" src="'.$path.'" style="height :100px;"> <br>
           							                                                Title : '.$row['Title'].'  <br> 
                                                                        Code : '.$row['PID'].'     <br>        	 
                                                      									Author : '.$row['Author'].' <br>                            	      
                                                      									Edition : '.$row['Edition'].' <br>
                                                      									Quantity : '.$row['Quantity'].' <br>
                                                      									Price : '.$row['Price'].' <br>
                                                      									Sub Total : '.$Stotal.' <br>
                                                                       <button class="button"><a href="cart.php?remove='.$row['PID'].'"     style="color:white;font-weight:800;">
                                                                          Remove
                                                                        </a></button>
                                        </div>
                                    </div>';
                               if($j % 2==1)
                                   echo '</div>';                                 
                               $total=$total + $Stotal; 
                               $i++;
                               $j++;                                                 
                     } 
                    
                    echo '<div class="container">
                              <div class="row" >  
                                 <div class="container" style="font-weight:800; width: 50%;">
                                     <div class="panel-heading">TOTAL
                                     </div>
                                      <div class="panel-body">'.$total.'
                                     </div>
                                 </div>
                               </div>
                          </div>
                         ';
                     echo '<br> <br>';
                     echo '<div class="row">
                             <div class=" navbar-left">
                                  <button class="button"><a href="index.php" style="color:white;font-weight:800;">Continue Shopping</a> </button>
                             </div> &nbsp &nbsp &nbsp &nbsp
                             <div class="navbar-right">
                             <button class="button">
                                  <a href="cart.php?place=true" style="color:white;font-weight:800;margin-top:5px;">Place Order</a>
                                  </button>
                             </div>
                           </div>
                           ';
                } 
               else
                     {  
                        echo ' 
                         <div class="row">
                            <div class="col-xs-9 col-xs-offset-3 col-sm-4 col-sm-offset-5 col-md-4 col-md-offset-5">
                                 <span class="text-center" style="color:#D67B22;font-weight:bold;">&nbsp &nbsp &nbsp &nbspCart Is Empty</span>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-xs-9 col-xs-offset-3 col-sm-2 col-sm-offset-5 col-md-2 col-md-offset-5">
                                  <a href="index.php" class="btn btn-lg" style="background:#D67B22;color:white;font-weight:800;">Do Some Shopping</a>
                             </div>
                          </div>';
                     }               
	    }
	else
	    { 
	          echo "login to continue";
	    }
        echo '</div>';
	?>



<!-- extra -->
<div class="container-fluid" style="padding-left:15%; padding-right: 15%; ">
        <table class="table">
                <tr>
                    <th>#</th>
                    <th>Remove</th>

                    <th colspan="2">Product </th>
                    


                    <th>Quantity</th>
                    
                    <th>Price</th>
                </tr>
            <tbody>
                <form action="cart.php" method="post">
                <?php 


$conn=mysqli_connect("localhost", "root", "","ecommerce");
  $ip = getIpAdd();

    $count = 1;
  $get_cart = "SELECT * FROM products WHERE PID IN (SELECT Product FROM cart)";
  $cart_items = mysqli_query($conn,$get_cart);
$total_price =0;    
  while($bk = mysqli_fetch_array($cart_items)){
    $price_arr = array($bk['Price']);
    //$total_price = array_sum($price_arr);
    $single_price = $bk['Price'];
    $total_price += $single_price;  
    $bk_title = $bk['Title'];
    
    $quantity=$bk['Quantity'];
    echo "<tr>
                <td scope='row'><h3>".$count++."</h3></td>
                 <td scope='row' class='td-actions'>
                   
                   <h3> <div class='checkbox'>
                        <label>
                      <input type='checkbox'  name='remove[]' value='".$bk['PID']."'>
                          
                     </label>
                       </div></h3>
                      
                </td>
                <td><img src='img/books/".$bk['PID'].".jpg' width='60px' height='80px'></td>    
                <td><h3>".$bk_title."</h3></td>
                <td><h3>".$quantity."</h3></td>
                <td><h3>&#8377;".$single_price."</h3></td>
                
               
                
            </tr>";
    
  }
    echo "<tr><td colspan='6' align='right'><h3>Total=&#8377;".$total_price."</h3></td></tr>" ;
  




                ?>

         
        
        <div align="right">
            <!--<button class="btn"><input type="submit" value="Update" name="update_cart"/></button>-->
            <button name="update_cart" type="submit" class="btn btn-danger" style="width:10%;">Update</button>
           <!--<input type="submit" name="update_cart" value="update">-->
           

        </div>
                </form>
   </tbody>

        </table>
      
    </div>
    <?php 
    $ip = getIpAdd();
    if(isset($_POST['update_cart']))
    {
        foreach($_POST['remove'] as $remove_id){
            $delete_books = "delete from cart where product = '$remove_id' AND ip_add = '$ip'";
            $run_delete = mysql_query($delete_books, $conn);
            if($run_delete){
                echo "<script>window.open('cart.php','_self');</script>";
            }
        }
    }
        ?>

    <div class="container-fluid" align="center" ><h3> <a  style="text-decoration:none " href="cart.php?place=true">checkout </a></h3>
          </div>















</body>
<html>		























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








    <?php 
    // $ip = getIpAdd();
    if(isset($_POST['update_cart']))
    {
        foreach($_POST['remove'] as $remove_id)
        {
            $delete_books = "delete from cart where Product = '$remove_id'";
            $run_delete = mysql_query($con, $delete_books);
            if($run_delete)
            {
                echo "<script>window.open('cart.php','_self');</script>";
            }
        }
    }
        ?>



        <?php 
    if(isset($_POST['remove']))
    {
      $remove_id= $_POST['remove'];
      $delete_books = "delete from cart where Product = '$remove_id'";
            $run_delete = mysql_query($delete_books, $con);
            if($run_delete)
            {
                echo "<script>window.open('cart.php','_self');</script>";
            }
    }
        ?>


        <?php

  if(isset($_GET['place']))
      {
      $query="DELETE FROM cart where Customer='$customer'";
      $result=mysqli_query($con,$query);
      ?>
      <script type="text/javascript">
        alert("Order Successfully Placed!!!");
      </script>
      <?php
      }
      if(isset($_GET['remove']))
      {
        $product=$_GET['remove'];
        $query="DELETE FROM cart where Customer='$customer' AND Product='$product'";
        $result=mysqli_query($con,$query);
      ?>
        <script type="text/javascript">
          alert("Item Successfully removed");
        </script>
        <?php
      }
      ?>

















      <div class ="container containerForm">
  <div class="form">
  <form action="seller.php" method="POST" enctype="multipart/form-data">
    <h3> Add books </h3>

    <ul>
    <li>
    <label for="PID">Product ID</label>
    <input type="text" id="PID" name="PID" placeholder="Product ID">
    <label for="Title">Title</label>
    <input type="text" id="Title" name="Title" placeholder="Title">
  </li>
  <li>
    <label for="Author">Author</label>
    <input type="text" id="Author" name="Author" placeholder="Author">
    <label for="MRP">MRP</label>
    <input type="text" id="MRP" name="MRP" placeholder="MRP">
  </li>
    <label for="Price">Price</label>
    <input type="text" id="Price" name="Price" placeholder="Price">
    <label for="Discount">Discount</label>
    <input type="text" id="Discount" name="Discount" placeholder="Discount">
    <label for="Available">Available</label>
    <input type="text" id="Available" name="Available" placeholder="Available">
    <label for="Publisher">Publisher</label>
    <input type="text" id="Publisher" name="Publisher" placeholder="Publisher">
    <label for="Edition">Edition</label>
    <input type="text" id="Edition" name="Edition" placeholder="Edition">
    <label for="Category">Category</label>
    <input type="text" id="Category" name="Category" placeholder="Category">
    <label for="Description">Description</label>
    <TEXTAREA id="Description" name="Description" placeholder="Describe about the product" cols="50" rows="8"></TEXTAREA>
    <label for="BookImage">Select image to upload:</label>
      <input type="file" name="BookImage" id="BookImage">
      <br><br>
    <button type="submit" name="upload"> Upload </button>
  
  </ul>
  </form>
  </div>





  <!-- boookstore -->



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
        <div style="background:#337ab7;color:#fff;font-weight:800;border:none;padding:15px;">
         The Book Shop
        </div>
              <ul>
                  <li> <a href="bookstore.php?value=Entrance%20exam"> Entrance Exam </a> </li>
                  <li> <a href="bookstore.php?value=Literature%20and%20Fiction"> Literature & Fiction </a> </li>
                  <li> <a href="bookstore.php?value=Academic%20and%20Professional"> Academic & Professional </a> </li>
                  <li> <a href="bookstore.php?value=Biographies%20and%20Auto%20Biographies"> Biographies & Auto Biographies </a> </li>
                  <li> <a href="bookstore.php?value=Children%20and%20Teens"> Children & Teens </a> </li>
                  <li> <a href="bookstore.php?value=Regional%20Books"> Regional Books </a> </li>
                  <li> <a href="bookstore.php?value=Business%20and%20Management"> Business & Management </a> </li>
                  <li> <a href="bookstore.php?value=Health%20and%20Cooking"> Health and Cooking </a> </li>             
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
                  <div class="">
                       <form action="';echo $_SERVER['PHP_SELF'];echo'" method="post" class="">
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
            $target="cart.php?ID=".$row["PID"];
            
            if($i%3==0)
            echo '<div class="row">';
            echo'
               <a href="'.$description.'" style="text-decoration:none">
                

              <div class="column">
                <div class="card" style="max-width: 120px;">
                  <img class="book block-center img-responsive" src="'.$path.'">
                </div>
                  <div class="container" style="width: 55%;">
                    <hr>
                    ' . $row["Title"] . '<br>
                    <h3>Rs. ' . $row["Price"] .'</h3>

                    <p><a href="'.$target.'"><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></a></p>
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


