<?php include '../seller/seller.php';

  
?>

	<div class="main">

		<!-- order book -->
    <div class="container">
      
      <div class="form-style" style="padding: 0px; margin: 10px 5px;">
        <table class="table" >
          <tr>
            <th>#</th>
            <th colspan="2">Product </th>
            <th>Qty.</th>
            <th>Order Date</th>
            <th>Price</th>
            <th>Customer</th>
          </tr>
          <tbody>
            <form action="" method="post">
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