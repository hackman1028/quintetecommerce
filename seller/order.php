<?php include '../seller/header.php';?>


<?php
       


  if(isset($_POST['accept_pd']))
      { 
       
         $order_id = $_POST['Order_id'];
        $customer_id = $_POST['Customer'];

        $transactionsql="INSERT INTO transaction_detail ( Order_ID, Customer_ID, Vendor_ID, Purchased_Date, Book_Quantity) SELECT Order_id, Customer_id, Vendor_id, Purchased_date, Quantity FROM order_request WHERE Vendor_id='$vendor' AND Order_id='$order_id' AND Customer_id= '$customer_id'";
        $resultID = mysqli_query($con,$transactionsql);
       

        $query="DELETE FROM order_request WHERE Order_id='$order_id' AND Customer_id='$customer_id'";
        $result=mysqli_query($con,$query);


        if(!$resultID || !$result)
        {
          echo " QUERY FAILED " . mysqli_error($con);
        }
        else
        {
          echo '<script type="text/javascript">alert("Item accepted");</script>';
        }

      }



       if(isset($_POST['remove_pd']))
      {
         $order_id = $_POST['Order_id'];
        $customer_id = $_POST['Customer'];

        $query="DELETE FROM order_request WHERE Order_id='$order_id' AND Customer_id='$customer_id'";
        $result=mysqli_query($con,$query);
      ?>
        <script type="text/javascript">window.open('order.php','_self');
        </script>
        <?php
      }
  
  ?>





    <!--     <?php 
    if(isset($_POST['remove']))
    {
      $remove_id= $_POST['remove'];
      $delete_books = "delete from cart where Product = '$remove_id'";
            $run_delete = mysqli_query($con, $delete_books);
            if($run_delete)
            {
                echo "<script>window.open('order.php','_self');</script>";
            }
    }
        ?> -->



	<div class="main">

		<!-- order book -->
    <div class="container">
      
      <div class="form-style" style="padding: 0px; margin: 10px 5px;">
        <table class="table" >
          <tr>
            <th>#</th>
            <th colspan="2">Product </th>
            <th>Quantity</th>
            <th>Order Date</th>
            <th>Price</th>
            <th>Customer</th>
            <th>Action</th>
          </tr>
          <tbody>
            

            <form action="" method="POST">
             <?php 

             // $sql= "SELECT * FROM order_request WHERE"
             $count = 1;
             // $get_cart = "SELECT * FROM products WHERE PID IN (SELECT Order_id FROM order_request) AND Vendor_ID = '$vendor'";

             $get_cart="SELECT * FROM products INNER JOIN order_request ON products.PID = order_request.Order_id ";
             $cart_items = mysqli_query($con, $get_cart);
             $total_price =0;    
             while($bk = mysqli_fetch_array($cart_items))
             {
              if($bk['Vendor_ID']==$vendor)
              {
              $price_arr = array($bk['Price']);
             //$total_price = array_sum($price_arr);
              $single_price = $bk['Price'];
              $total_price += $single_price;  
              $bk_title = $bk['Title'];
              $productid = $bk['PID'];
              $date=date("Y/m/d");
              $bk_qty=$bk['Quantity'];
              $customer=$bk['Customer_id'];

              echo "<tr>
              <td scope='row'><h3>".$count++."</h3></td>

              <td><img src='../img/books/".$bk['PID'].".jpg' width='60px' height='80px'></td>    
              <td><p>".$bk_title."</p></td>
              <td><p>".$bk_qty."</p></td>
              <td><p>".$date."</p></td>
              <td><p>Rs.".$single_price."</p></td>
              <td><p>".$customer."</p></td>

              <input type='hidden' name='Customer' value='".$customer."'/>
              <input type='hidden' name='Order_id' value='".$productid."' />

              <td>
              <button name='accept_pd' type='submit' style='background-color:#4CAF50; color: white;'>Accept
              </button>                             
              <br><br>
              <button name='remove_pd' type='submit' style='background-color:#f44336; color: white;'>Remove
              </button> 
            
              </td>

              </tr>";
            }
            }
            echo "<tr><td colspan='8' align='right'><h3>Total=Rs. ".$total_price."</h3></td></tr>" ;
            ?>
        </form>
         
        </tbody>

      </table>
      
    </div>
  </div>

	</div>  <!-- main div -->

</div> <!-- row div -->


</body>
</html>