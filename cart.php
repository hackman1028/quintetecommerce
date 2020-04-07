<?php
session_start();
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
                        $quantity=$_GET['quantity'];
                        $query="SELECT * from cart where Customer='$customer' AND Product='$product'";
                        $result=mysqli_query($con,$query);
                        $row = mysqli_fetch_assoc($result);
                        if(mysqli_num_rows($result)==0)
	                         { $query="INSERT INTO cart values('$customer','$product','$quantity')"; 
                              $result=mysqli_query($con,$query);
                            }
                        else
                           { $new=$_GET['quantity'];
                             $query="UPDATE `cart` SET Quantity=$new WHERE Customer='$customer' AND Product='$product'";
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

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
<html>		