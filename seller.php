<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link href="css/my1.css" rel="stylesheet">
<link href="css/seller.css" rel="stylesheet">

<body>
<!-- Navigation -->
<div class="navbar">
  <a class="logo" href="index.php"><strong>QUINTET</strong></a>

<div class="searchbox">
<form role="search" method="POST" action="Result.php" style="border: 0px;">
  <input type="text" name="keyword" placeholder="Search for a Book, Author of Category" style="width: 50%;">
  </form>
  </div> 

    <div class="navbar-right">
      <a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
      <a href="bookstore.php"><i class="fa fa-fw fa-book"></i> Bookstore</a>
      <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
      <a onclick="openForm()"><i class="fa fa-fw fa-user"></i> Login</a>
      <form class="form-popup" id="myForm" action="index.php" method="post" role="form">


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

<!----- menu------>

	<div class="middle">
		<div class="menu">
			<li class="category-box">
				<a href="seller.php" class="btn"><i class="fa fa-fw fa-home"></i> Home</a>
				
			</li>

			<li class="category-box">
				<a href="seller.php" class="btn"><i class="fa fa-fw fas fa-box-open"></i> Orders</a>
				
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
	<div>
		<h3 class="get-start">Get Ready to Sell Online. Try this tip to get started.</h3>

			<a href="seller.php" class="dot"><i class="fa fa-fw fas fa-ellipsis-h"></i></a>
				
	</div>
	<hr class="line">

	<div>
		<div class="category-menu">
		<li class="category-box">
				<a href="seller.php" class="category"></i> Add Products</a>
				
			</li>

			<li class="category-box">
				<a href="seller.php" class="category"></i> Priviously added books</a>
				
			</li>

			<li class="category-box">
				<a href="seller.php" class="category"></i> Update Book Detalis</a>
				
			</li>

			<li class="category-box">
				<a href="seller.php" class="category"></i> Sold Books</a>
				
			</li>
		</div>
	</div>


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