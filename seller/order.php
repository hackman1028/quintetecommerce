<?php include '../seller/header.php'; ?>




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
            <form action="" method="post">
             <?php 

             $count = 1;
             $get_cart = "SELECT * FROM products WHERE PID IN (SELECT Product FROM cart)";
             $cart_items = mysqli_query($con, $get_cart);
             $total_price =0;    
             while($bk = mysqli_fetch_array($cart_items)){
              $price_arr = array($bk['Price']);
    //$total_price = array_sum($price_arr);
              $single_price = $bk['Price'];
              $total_price += $single_price;  
              $bk_title = $bk['Title'];
              $productid = $bk['PID'];
              $date=date("Y/m/d");

              echo "<tr>
              <td scope='row'><h3>".$count++."</h3></td>

              <td><img src='../img/books/".$bk['PID'].".jpg' width='60px' height='80px'></td>    
              <td><p>".$bk_title."</p></td>
              <td><p>1</p></td>
              <td><p>".$date."</p></td>
              <td><p>Rs.".$single_price."</p></td>
              <td><p>".$_SESSION['user']."</p></td>

              <td>
              <button name='accept' type='submit' style='background-color:#4CAF50; color: white;' value='".$productid."'>Accept</button>                      
              <br><br>
              <button name='remove' type='submit' style='background-color:#f44336; color: white;' value='".$productid."'>Remove</button>
              </td>

              </tr>";

            }
            echo "<tr><td colspan='8' align='right'><h3>Total=Rs.".$total_price."</h3></td></tr>" ;

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