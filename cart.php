
<?php
include "header.php";
if(!isset($_SESSION['user']))
  header("location: index.php?Message=Login to Continue");

  $customer=$_SESSION['user'];


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

<?php
if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
            $count = count($_SESSION["shopping_cart"]);  
            $item_array = array(  
             'item_id'      =>     $_GET["id"],  
             'item_name'    =>     $_POST["hidden_name"],  
             'item_price'   =>     $_POST["hidden_price"],  
             'item_quantity'=>     $_POST["quantity"]  
           );  
            $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="index.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="index.php"</script>';  
                }  
           }  
      }  
 }  

?>


<?php

      if(isset($_POST['remove']))
      {
        $remove_id=$_POST['remove'];
        $query="DELETE FROM cart where Customer='$customer' AND Product='$remove_id'";
        $result=mysqli_query($con,$query);
      ?>
        <script type="text/javascript">window.open('cart.php','_self');
        </script>
        <?php
      }
  ?>

    <style>
        #cart {margin-top:30px;margin-bottom:30px;}
        .panel {border:1px solid #0E345A;padding-left:0px;padding-right:0px;}
        .panel-heading {background:#0E345A !important;color:white !important; padding: 10px;}        
        @media only screen and (width: 767px) { body{margin-top:150px;}}
    </style>

<!-- 
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
	                         { $query="INSERT INTO cart (Customer, Product, Quantity) VALUES ('$customer', '$product', '$quantity')"; 
                              $result=mysqli_query($con,$query);
                            }
                        else
                           { $new=$_GET['Quantity'];
                             $query="UPDATE cart SET Quantity=$new WHERE Customer='$customer' AND Product='$product'";
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
                             if($j % 2 == 0)
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
 -->



<!-- extra -->
<div class="row">
<div class="main">

   <!-- update book -->
   <div class="container">
    <div class="form-style" style="padding: 0px;" >
      <table class="table" >
        <tr>
          <th>#</th>
          <th colspan="2" style="text-align:center;">Product </th>
          <th style="text-align: center;">Action</th>
        </tr>
        <tbody>
          <form action="" method="post">
<?php 

  $count = 1;

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
         { $query="INSERT INTO cart (Customer, Product, Quantity) VALUES ('$customer', '$product', '$quantity')"; 
       $result=mysqli_query($con,$query);
     }
     else
       { $new=$_GET['Quantity'];
     $query="UPDATE cart SET Quantity=$new WHERE Customer='$customer' AND Product='$product'";
     $result=mysqli_query($con,$query);
       }
  }
       $query="SELECT PID,Title,Author,Publisher,Quantity,Price FROM cart INNER JOIN products ON cart.Product=products.PID WHERE Customer='$customer'";
       $result=mysqli_query($con,$query); 
       $total=0;
       if(mysqli_num_rows($result)>0)
        { 
         while($row = mysqli_fetch_assoc($result))
           { 
         $Stotal = $row['Quantity'] * $row['Price'];
         $productid=$row['PID'];

                     
         echo "<tr>
            <td scope='row'><h3>".$count++."</h3></td>

            <td><img src='img/books/".$row['PID'].".jpg' width='130px' height='200px'></td>    


            <td><p>  
            PRODUCT CODE  :  ".$row['PID']."   <hr> 
            TITLE         :  ".$row['Title']." <hr> 
            AUTHOR        :  ".$row['Author']." <hr> 
            PUBLISHER     :  ".$row['Publisher']." <hr> 
            Quantity      :  ".$row['Quantity']." <hr>
            Price         :  Rs. ".$row['Price']." X ".$row['Quantity']." = Rs.".$Stotal." <hr>
            </P></td>  


            <td>

            <button name='remove' type='submit' style='background-color:#f44336;' value='".$productid."'>Delete From Cart</button>
            </td>

            </tr>";

           echo '</div>';                                 
         $total=$total + $Stotal;                                                
       }
       }
       } 

?>

<!-- 
<?php


           $count = 1;
           $get_cart = "SELECT * FROM products WHERE PID IN (SELECT Product FROM cart)";
           $cart_items = mysqli_query($con, $get_cart);
           $total_price =0;    
           while($bk = mysqli_fetch_array($cart_items))
           {
            $price_arr = array($bk['Price']);
             //$total_price = array_sum($price_arr);
            $single_price = $bk['Price'];
            $total_price += $single_price;  
            $bk_title = $bk['Title'];
            $productid = $bk['PID'];

            // echo "<tr>
            // <td scope='row'><h3>".$count++."</h3></td>

            // <td><img src='img/books/".$bk['PID'].".jpg' width='130px' height='200px'></td>    


            // <td><p>  
            // PRODUCT CODE  :  ".$bk['PID']."   <hr> 
            // TITLE         :  ".$bk['Title']." <hr> 
            // AUTHOR        :  ".$bk['Author']." <hr> 
            // PUBLISHER     :  ".$bk['Publisher']." <hr> 
            // Quantity      :  ".$row['Quantity']." <hr>
            // Price         :  Rs. ".$bk['Price']." <hr>
            // </P></td>  


            // <td>

            // <button name='remove' type='submit' style='background-color:#f44336;' value='".$productid."'>Delete From Cart</button>
            // </td>

            // </tr>";

          }

          ?> -->

        </form>
      </tbody>

    </table>

  </div>
</div>


  </div> <!-- main div -->
    
  <div class="side" style="flex: 20%;">
    <h2> CART BILL</h2>
    <p>  
      <?php
      echo"<hr><h3> TOTAL AMOUNT : Rs. ".$total." <h3><hr>";
      ?>      
      </P>
  </div>  
</div>


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

    <br> <br>
    <div class="ShoppingOrder" align="center">
          <div class=" navbar-right">
            <button>
              <a href="index.php" style="color:white;font-weight:800;">Continue Shopping</a> </button>
          </div> <!-- &nbsp &nbsp &nbsp &nbsp -->
          <div class="navbar-right">
            <button class=>
            <a href="cart.php?place=true" style="color:white;font-weight:800;margin-top:5px;">Place Order</a>
            </button>
          </div>
    </div>

                           
  














</body>
</html>		