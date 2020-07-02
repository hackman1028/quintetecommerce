<?php include '../seller/seller.php';

  
?>

	<div class="main">

		<!-- order book -->
<div class="container">
        <form action="" method="GET">
          
          <div class="category">
            <h2>Transaction History</h2>
          <button class="subCategory btn" name="week" value="week">Week</button>
          <button class="subCategory btn" name="month" value="month"> Month </button>
          <button class="subCategory btn" name="year" value="year"> Year </button>
        </div>
        </form>
</div>


<div class="form-style" style="padding: 0px; margin: 10px 5px;">
        <table class="table" >
          <tr>
            <th>#</th>
            <th colspan="2">Product </th>
            <th>Quantity</th>
            <th>Order Date</th>
            <th>Price</th>
            <th>Customer</th>
          </tr>
          <tbody>
<?php
    
    if(isset($_GET['week']))
    {
      $get_cart="SELECT * FROM products INNER JOIN transaction_detail ON products.PID=transaction_detail.Order_ID WHERE YEARWEEK(Purchased_Date) = YEARWEEK(NOW()) ORDER BY Purchased_Date DESC";

      $count = 1;

      $cart_items = mysqli_query($con, $get_cart);
      $total_price =0;    
      while($bk = mysqli_fetch_array($cart_items))
      {
       if($bk['Vendor_ID']==$vendor)
       {
        $price_arr = array($bk['Price']);
        $single_price = $bk['Price'];
        $total_price += $single_price;  
        $bk_title = $bk['Title'];
        $productid = $bk['PID'];
        $bk_order_date=$bk['Purchased_Date'];
        $bk_qty=$bk['Book_Quantity'];
        $customer=$bk['Customer_ID'];
        echo "<tr>
        <td scope='row'><h3>".$count++."</h3></td>

        <td><img src='../img/books/".$bk['PID'].".jpg' width='60px' height='80px'></td>    
        <td><p>".$bk_title."</p></td>
        <td><p>".$bk_qty."</p></td>
        <td><p>".$bk_order_date."</p></td>
        <td><p>Rs.".$single_price."</p></td>
        <td><p>".$customer."</p></td>

        </tr>";

      }
    }
  }
?>

<?php
    
    if(isset($_GET['month']))
    {
      $get_cart="SELECT * FROM products INNER JOIN transaction_detail ON products.PID=transaction_detail.Order_ID WHERE MONTH(Purchased_Date) = MONTH(NOW()) ORDER BY Purchased_Date DESC";

      $count = 1;

      $cart_items = mysqli_query($con, $get_cart);
      $total_price =0;    
      while($bk = mysqli_fetch_array($cart_items))
      {
       if($bk['Vendor_ID']==$vendor)
       {
        $price_arr = array($bk['Price']);
        $single_price = $bk['Price'];
        $total_price += $single_price;  
        $bk_title = $bk['Title'];
        $productid = $bk['PID'];
        $bk_order_date=$bk['Purchased_Date'];
        $bk_qty=$bk['Book_Quantity'];
        $customer=$bk['Customer_ID'];
        echo "<tr>
        <td scope='row'><h3>".$count++."</h3></td>

        <td><img src='../img/books/".$bk['PID'].".jpg' width='60px' height='80px'></td>    
        <td><p>".$bk_title."</p></td>
        <td><p>".$bk_qty."</p></td>
        <td><p>".$bk_order_date."</p></td>
        <td><p>Rs.".$single_price."</p></td>
        <td><p>".$customer."</p></td>

        </tr>";

      }
    }
  }
?>

<?php
    
    if(isset($_GET['year']))
    {
      $get_cart="SELECT * FROM products INNER JOIN transaction_detail ON products.PID=transaction_detail.Order_ID WHERE YEAR(Purchased_Date) = YEAR(NOW()) ORDER BY Purchased_Date DESC";

      $count = 1;

      $cart_items = mysqli_query($con, $get_cart);
      $total_price =0;    
      while($bk = mysqli_fetch_array($cart_items))
      {
       if($bk['Vendor_ID']==$vendor)
       {
        $price_arr = array($bk['Price']);
        $single_price = $bk['Price'];
        $total_price += $single_price;  
        $bk_title = $bk['Title'];
        $productid = $bk['PID'];
        $bk_order_date=$bk['Purchased_Date'];
        $bk_qty=$bk['Book_Quantity'];
        $customer=$bk['Customer_ID'];
        echo "<tr>
        <td scope='row'><h3>".$count++."</h3></td>

        <td><img src='../img/books/".$bk['PID'].".jpg' width='60px' height='80px'></td>    
        <td><p>".$bk_title."</p></td>
        <td><p>".$bk_qty."</p></td>
        <td><p>".$bk_order_date."</p></td>
        <td><p>Rs.".$single_price."</p></td>
        <td><p>".$customer."</p></td>

        </tr>";

      }
    }
  }
?>

      

           <!--  <form action="" method="post">
             <?php 
             $count = 1;
             $get_cart = "SELECT * FROM products INNER JOIN transaction_detail ON products.PID=transaction_detail.Order_ID";
             $cart_items = mysqli_query($con, $get_cart);
             $total_price =0;    
             while($bk = mysqli_fetch_array($cart_items))
             {
               if($bk['Vendor_ID']==$vendor)
              {
              $price_arr = array($bk['Price']);
              $single_price = $bk['Price'];
              $total_price += $single_price;  
              $bk_title = $bk['Title'];
              $productid = $bk['PID'];
              $date=date("Y/m/d");
              $bk_qty=$bk['Book_Quantity'];
              $customer=$bk['Customer_ID'];
              echo "<tr>
              <td scope='row'><h3>".$count++."</h3></td>

              <td><img src='../img/books/".$bk['PID'].".jpg' width='60px' height='80px'></td>    
              <td><p>".$bk_title."</p></td>
              <td><p>".$bk_qty."</p></td>
              <td><p>".$date."</p></td>
              <td><p>Rs.".$single_price."</p></td>
              <td><p>".$customer."</p></td>

              </tr>";

            }
          }
            ?>

          </form>
   -->      </tbody>

      </table>
      
    </div>
  </div>

	</div>  <!-- main div -->

</div> <!-- row div -->


</body>
</html>