<?php include '../seller/seller.php' ?>


<!-- main div 80%flex -->
  <div class="main">

   <!-- update book -->
   <div class="container">
    <div class="form-style" style="padding: 0px;" >
      <table class="table" >
        <tr>
          <th>#</th>
          <th colspan="2" style="text-align:center;">Product </th>
          <th>Action</th>
        </tr>
        <tbody>
          <form action="editbook.php?action=edit&id=$productid" method="post">
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

            echo "<tr>
            <td scope='row'><h3>".$count++."</h3></td>

            <td><img src='../img/books/".$bk['PID'].".jpg' width='150px' height='250px'></td>    


            <td><p>  
            PRODUCT CODE  :  ".$bk['PID']."   <hr> 
            TITLE         :  ".$bk['Title']." <hr> 
            AUTHOR        :  ".$bk['Author']." <hr>
            AVAILABLE     :  ".$bk['Available']." <hr> 
            PUBLISHER     :  ".$bk['Publisher']." <hr> 
            EDITION       :  ".$bk['Edition']." <hr>
            </P></td>  


            <td>
            <button name='edit' type='submit' style='background-color:#4CAF50;' value='".$productid."'>Edit book</button>                      
            <br><br>
            <button name='delete' type='submit' style='background-color:#f44336;' value='".$productid."'>Delete Book</button>
            </td>

            </tr>";

          }

          ?>

        </form>
      </tbody>

    </table>

  </div>
</div>


  </div> <!-- main div -->

</div> <!-- row div -->


</body>
</html>