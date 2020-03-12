<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

* {box-sizing: border-box;}

.header{
  background-color: #0E345A;
  /*padding:5px;*/
  text-align: center;
  overflow: auto;
  color: white;
  /*height: 5%;*/

}



.navbar {
  width: 100%;
  background-color: #0E345A;
  overflow: auto;
  padding: 5px 50px;
}

.navbar a {
  float: left;
  padding: 10px;
  color: white;
  text-decoration: none;
  font-size: 18px;
  text-align: center;
  line-height: 25px;
  border-radius: 0px;
}

.navbar a:hover {
  background-color: #e9e9e9;
  color: #000;
}

.active {
  background-color: #0e3451;
}
.navbar a.logo {
  font-size: 25px;
  font-weight: bold;
}

.navbar-right {
  float: right;
}

.topnav input[type=text] {
  float: left;
  padding: 8px;
  margin-top: 4px;
  margin-left: 40px;
  margin-right: 20px;
  border:none;
  border-radius: 50px;
  font-size: 16px;
}

.navbar-form {
  padding: 10px 15px;
  margin-top: 8px;
  margin-right: -15px;
  margin-bottom: 8px;
  margin-left: -15px;
  border-top: 1px solid transparent;
  border-bottom: 1px solid transparent;
  -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1);
          box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1);
}


@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
  .navbar-right {
    float: none;
  }
}

  @media screen and (max-width: 600px) {
  .topnav a, .topnav input[type=text] {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
}
  
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }



.row {
  /*margin: 10px 100px;*/
  display: flex;
  width: 80%;
  margin-right: auto;
  margin-left: auto;

}

/* Add padding BETWEEN each column */
.row,
.row > .column {
  padding: 2px;
}

/* Clear floats after rows */ 
.row:after {
  content: "";
  display: flex;
  clear: both;
}



.container-fluid {
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}


  .column {
  	float: left;
  	margin-bottom: 0px;
  	/*padding: 0 2px;*/
    flex: 1;
  	/*display: none;*/

  }

  div.card img {
  	width:100%;
  	height: 100%;
  }
  .card{
  	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  	margin: 0px;
  	/*height: auto;*/
  	/*max-height: 250px;*/
  	height: 280px ;
  	display: block;
  	/*margin-left: auto;*/
  	/*margin-right: auto;*/
  	padding: 5px;
  	/*display: flex;*/


  	/*padding: -500px;*/
  	

  	overflow: hidden;
  }
  .container{
  	padding: 0 10px;
  	
  }
  .container::after, .row::after{
  	content:"";
  	clear: both;
  	display: table;

  }

  .title{
  	color: gray;
  }

  .button{
  	border: none;
  	outline: 0;
  	display: inline-block;
  	padding: 12px;
  	color: white;
  	background-color: #0E345A;
  	text-align: center;
  	cursor: pointer;
  	width: 100%;
  }

  .button:hover {
  	background-color: #555;
  }

  @media screen and (max-width: 650px){
  	.column{
  		width: 100%;
  		display: block;
  	}
  }




}
</style>

<body>
<!-- Navigation -->

<div class="navbar topnav">
	<a class="logo" href="#"><strong>QUINTET</strong></a>

	<input type="text" placeholder="Search.." style="width: 50%;"> 
		<div class="navbar-right">
		  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a>
		  <a href="#"><i class="fa fa-fw fa-book"></i> Bookstore</a>
		  <a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
		  <a href="#"><i class="fa fa-fw fa-user"></i> Login</a>
		</div>
</div>
 	<!-- 	<div id="searchbox1" >
              <form class="navbar-form navbar-left" role="search" method="POST" action="Result.php">
                  <input type="text" class="form-control" name="keyword" style="width:250%; margin-left: 20%" placeholder="Search for a Book, Author or Category">
              </form>
          </div> -->

<!-- Slide Show -->
<section>
  <img class="mySlides" src="img/carousel/1.jpg"
  style="width:100%">
  <img class="mySlides" src="img/carousel/2.jpg"
  style="width:100%">
  <img class="mySlides" src="img/carousel/3.jpg"
  style="width:100%">
</section>

<!-- Book section -->
<div class="header">
  <h2>RECENTLY ADDED</h2>
</div>

<!-- Book Description -->
<div class="row">
	<div class="column">
		<div class="card">
			<img src="img/books/book1.jpg" alt="1" style="width:100%">
		</div>
			<div class="container">
				<h2> 1 book </h2>
				<p class="title">Summer Love</p>
				<p> Rs. 200 </p>
				<p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
			</div>		
	</div>

	<div class="column">
		<div class="card">
			<img src="img/books/book2.jpg" alt="2" style="width:100%">
		</div>
			<div class="container">
				<h2> 2 book </h2>
				<p class="title">Summer Love</p>
				<p> Rs. 200 </p>
				<p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
			</div>		
	</div>

	<div class="column">
		<div class="card">
			<img src="img/books/book3.jpg" alt="3" style="width:100%">
		</div>
			<div class="container">
				<h2> 3 book </h2>
				<p class="title">Summer Love</p>
				<p> Rs. 200 </p>
				<p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
			</div>		
	</div>

	<div class="column">
		<div class="card">
			<img src="img/books/book4.jpg" alt="4" style="width:100%">
		</div>
			<div class="container">
				<h2> 4 book </h2>
				<p class="title">Summer Love</p>
				<p> Rs. 200 </p>
				<p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
			</div>		
	</div>

	<div class="column">
		<div class="card">
			<img src="img/books/book5.jpg" alt="5" style="width:100%">
		</div>
			<div class="container">
				<h2> 5 book </h2>
				<p class="title">Summer Love</p>
				<p> Rs. 200 </p>
				<p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
			</div>		
	</div>

	<div class="column">
		<div class="card">
			<img src="img/books/book6.jpg" alt="6" style="width:100%">
		</div>
			<div class="container">
				<h2> 6 book </h2>
				<p class="title">Summer Love</p>
				<p> Rs. 200 </p>
				<p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
			</div>		
	</div>
</div>


<!-- Book section -->
<div class="header">
  <h2>BEST SELLER</h2>
</div>

<!-- Book Description -->
<div class="row">
  <div class="column">
    <div class="card">
      <img src="img/books/book1.jpg" alt="1" style="width:100%">
    </div>
      <div class="container">
        <h2> 1 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column">
    <div class="card">
      <img src="img/books/book2.jpg" alt="2" style="width:100%">
    </div>
      <div class="container">
        <h2> 2 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column">
    <div class="card">
      <img src="img/books/book3.jpg" alt="3" style="width:100%">
    </div>
      <div class="container">
        <h2> 3 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column">
    <div class="card">
      <img src="img/books/book4.jpg" alt="4" style="width:100%">
    </div>
      <div class="container">
        <h2> 4 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column">
    <div class="card">
      <img src="img/books/book5.jpg" alt="5" style="width:100%">
    </div>
      <div class="container">
        <h2> 5 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>

  <div class="column">
    <div class="card">
      <img src="img/books/book6.jpg" alt="6" style="width:100%">
    </div>
      <div class="container">
        <h2> 6 book </h2>
        <p class="title">Summer Love</p>
        <p> Rs. 200 </p>
        <p><button class="button"><i class="fa fa-fw fa-cart-plus"></i>ADD TO CART</button></p>
      </div>    
  </div>
</div>




<!-- Footer -->
<footer class="navbar container-fluid">
  <a href="#"><i class="fa fa-facebook-official"></i></a>
  <a href="#"><i class="fa fa-pinterest-p"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <a href="#"><i class="fa fa-flickr"></i></a>
  <a href="#"><i class="fa fa-linkedin"></i></a>
</footer>

<script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000);
}
</script>

</body>
</html>

