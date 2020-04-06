<?php


  ?>





<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<!-- <link href="css/my.css" rel="stylesheet"> -->


<link href="css/css/bootstrap.min.css" rel="stylesheet">
<link href="css/css/my.css" rel="stylesheet">
<link href="css/my.css" rel="stylesheet">

<body>
<?php
        if(!isset($_SESSION['user']))
          {
            echo'

<form class="form" action="index.php" method="post" role="form">
  <div class="imgcontainer">
    <img src="img/img_avatar2.png" alt="Avatar" class="avatar" style="width:200px; height:auto;">
  </div>

  <div class="container">
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
                                                  <button type="submit" name="submit" value="login" class="btn btn-block">
                                                      Sign in
                                                  </button>
                                              </div>
                                        
                                          </form>


   <form class="form" action="index.php" method="post" role="form">
   <h2> Member sign up </h2>

                                            <div class="form-group">
                                                <label class="sr-only" for="username">Username</label>
                                                <input type="text" name="register_username" class="form-control" placeholder="Username" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="password">Password</label>
                                                <input type="password" name="register_password" class="form-control"  placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="submit" value="register" class="btn btn-block">
                                                    Sign Up
                                                </button>
                                            </div>
                                            </div> 
                                        </form>
                                          ';
                                          } 
        else
          {   echo' 
                    <div>
                    <li> <a href="#" class="btn btn-lg"> Hello ' .$_SESSION['user']. '.</a></li>
                    <li> <a href="cart.php" class="btn btn-lg"> Cart </a> </li>; 
                    <li> <a href="destroy.php" class="btn btn-lg"> LogOut </a> </li>
                    </div>';
                    
          }
?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>
</html>