
<?php
session_start();


if(!isset($_SESSION['user']))
	header("location: index.php?Message=Login to Continue");
include '../dbconnect.php';
	$customer=$_SESSION['user'];
?>



<?php

      if(isset($_POST['remove']))
      {
        $remove_id=$_POST['remove'];
        $query="DELETE FROM cart where Customer='$customer' AND Product='$remove_id'";
        $result=mysqli_query($con,$query);
      ?>
        <script type="text/javascript">window.open('order.php','_self');
        </script>
        <?php
      }
  ?>
<?php

      if(isset($_POST['accept']))
      {
        $accept_id=$_POST['accept'];
        $query="DELETE FROM cart where Customer='$customer' AND Product='$accept_id'";
        $result=mysqli_query($con,$query);
      ?>
        <script type="text/javascript">window.open('order.php','_self');
        </script>
        <?php
      }
  ?>

<?php

      if(isset($_POST['delete']))
      {
        $remove_id=$_POST['delete'];
        $query="DELETE FROM cart where Customer='$customer' AND Product='$remove_id'";
        $result=mysqli_query($con,$query);
      ?>
        <script type="text/javascript">window.open('updatebook.php','_self');
        </script>
        <?php
      }
  ?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link href="../css/seller.css" type="text/css" rel="stylesheet">

<body>
<!-- Navigation -->
<div class="navbar">
  <a class="logo" href="../index.php"><strong>QUINTET</strong></a>

<div class="searchbox">
<form role="search" method="POST" action="../Result.php">
  <input type="text" name="keyword" placeholder="Search for a Book, Author of Category">
  </form>
  </div> 

    <div class="navbar-right">
      <a class="active" href="../index.php"><i class="fa fa-fw fa-home"></i> Home</a>
      <a href="../bookstore.php"><i class="fa fa-fw fa-book"></i> Bookstore</a>
      <a href="../contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a>



      <?php
      if(!isset($_SESSION['user']))
      {
        echo' <a href="login/login1.php"><i class="fa fa-fw fa-user"></i> Login</a>';
      }
     else
     {
      echo'
      <div class="dropdown">
        <button class="dropbtn"> Hello ' .$_SESSION['user']. '&nbsp <i class="fa fa-caret-down"></i></button>
          <div class="dropdown-content">
              <a href="../destroy.php" class="btn btn-lg"> Logout </a>
              <a href="../index.php">Customer </a>
          </div>
      </div>';
     }
     ?>

    </div>
</div>

<!----- menu------>
<div class="row">
	<div class="side">
		<div class="menu">
			<li class="category-box">
				<a href="seller.php" class="btn"><i class="fa fa-fw fa-home"></i> Home</a>	
			</li>

			<li class="category-box">
				<a href="order.php" class="btn"><i class="fa fa-shopping-cart"></i> Orders</a>	
			</li>

			<li class="category-box">
				<a href="seller.php" class="btn"><i class="fa fa-fw fa-product-hunt"></i> Products</a>
			</li>

			<li class="category-box">
				<a href="seller.php" class="btn"><i class="fa fa-fw fa-users"></i> Customer</a>
			</li>

			<li class="category-box">
				<a href="seller.php" class="btn"><i class="fa fa-fw fas fa-analytics"></i> Analytics</a>
			</li>

			<li class="category-box">
				<a href="seller.php" class="btn"><i class="fa fa-fw fa-badge-percent"></i> Discounts</a>
			</li>
			
		</div>
		
	</div>

	