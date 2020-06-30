
<?php echo $date=date("Y/m/d"); ?>
<?php
include "header.php";
if(!isset($_SESSION['user']))
  header("location: index.php?Message=Login to Continue");

  $customer=$_SESSION['user'];
  



  if(isset($_GET['place']))
      {

        $ordersql = "INSERT INTO order_request (Order_id, Purchased_date, Customer_id, Vendor_id) SELECT Product, Purchased_date, Customer, Vendor_ID FROM cart WHERE Customer='$customer'";
        $resultID=mysqli_query($con, $ordersql);

      $query="DELETE FROM cart where Customer='$customer'";
      $result=mysqli_query($con,$query);
      ?>
      <script type="text/javascript">
        alert("Order Successfully Placed 1!!!");
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

      if(isset($_POST['remove']))
      {
        $remove_id=$_POST['remove'];
        $query="DELETE FROM cart where Customer='$customer' AND Product='$remove_id'";
        $result=mysqli_query($con,$query);
      ?>
        <script type="text/javascript">alert("Item Successfully removed from cart");</script>
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





<!-- extra -->
<div class="row">
<div class="main">

   <!-- update book -->
   <div class="container">
    <div class="form-style" style="padding: 0px;" >
      <table class="table">
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


     
        echo $Purchased_date=date("Y/m/d");
        $vendorId= $_GET['Vid'];
        echo $vendorId;

      $query="SELECT * from cart where Customer='$customer' AND Product='$product'";
      $result=mysqli_query($con,$query);
      $row = mysqli_fetch_assoc($result);
      if(mysqli_num_rows($result)==0)
       {  
        $query="INSERT INTO cart(Customer, Product, Quantity, Vendor_ID, Purchased_date) VALUES ('$customer','$product','$quantity','$vendorId', '$Purchased_date')"; 
       $result=mysqli_query($con,$query);
   }
   else
     { $new=$_GET['Quantity'];
   $query="UPDATE cart SET Quantity=$new WHERE Customer='$customer' AND Product='$product'";
   $result=mysqli_query($con,$query);
 }
}
$query="SELECT PID,Title,Author,Publisher,Quantity,Price FROM cart INNER JOIN products ON cart.Product=products.PID 
WHERE Customer='$customer'";
$result=mysqli_query($con,$query); 
$total=0;
if(mysqli_num_rows($result)>0)
  {    $i=1;
   $j=0;
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

      <div class="" align="center">
          <div class=" ">
            
              <a href="bookstore.php" ><button>Continue Shopping</button></a> 
          </div> <!-- &nbsp &nbsp &nbsp &nbsp --> 
          <div class="">
            <a href="cart.php?place=true"><button style="background-color: #4CAF50;" value='".$productid."'>Place Order</button></a>
          </div>
    </div>

  </div>  
</div>


</div>

<!-- <div class="container-fluid" align="center" ><h3> <a  style="text-decoration:none " href="cart.php?place=true">CHECKOUT </a></h3> -->
          </div>

    <br> <br>
    
</body>
</html>   