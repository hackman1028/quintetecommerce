<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
 
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

<link href="css/my1.css" rel="stylesheet">

<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container2 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}






.column1 {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card1 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container1 {
  padding: 0 16px;
}

.container1::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>




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
      <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
      <a href="bookstore.php"><i class="fa fa-fw fa-book"></i> Bookstore</a>
      <a class="active" href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
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



<h3>Contact Form</h3>

<div class="container2">
  <form action="contact.php">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="place">Place</label>
    <select id="place" name="place">
      <option value="Kathmandu">Kathmandu</option>
      <option value="Bhaktapur">Bhaktapur</option>
      <option value="Lalitpur">Lalitpur</option>
      <option value="Pokhara">Pokhara</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>





<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column1">
    <div class="card1">
      <img src="img/author/trishant.jpg" alt="Trishant" style="width:100%">
      <div class="container1">
        <h2>Jane Doe</h2>
        <p class="title">CEO & Founder</p>
        <p>trishantsthapit10@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column1">
    <div class="card1">
      <img src="img/author/pratima.jpg" alt="Pratima" style="width:100%">
      <div class="container1">
        <h2>Pratima K.C</h2>
        <p class="title">Art Director</p>
        <p>kcpratima44@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
  
  <div class="column1">
    <div class="card1">
      <img src="img/author/biplav.jpg" alt="Biplav" style="width:100%">
      <div class="container1">
        <h2>Biplav Sainju</h2>
        <p class="title">Designer</p>
        <p>sainjubiplav@gmail..com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>

</body>
</html>
