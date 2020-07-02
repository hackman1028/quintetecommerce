<?php
session_start();
if(!isset($_SESSION['user']))
       header("location: index.php?Message=Login To Continue");
?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link href="css/my1.css" rel="stylesheet">
<!-- <link href="css/css/bootstrap.css" rel="stylesheet"> -->

<style>
   
    #books {margin-bottom:50px;}

     @media only screen and (width: 767px) { body{margin-top:150px;}}
        #books .row{margin-top:20px;margin-bottom:10px;font-weight:800;}
        @media only screen and (max-width: 760px) { #books .row{margin-top:10px;}}
    </style>

<body>
<!-- Navigation -->

<div class="navbar">
  <a class="logo" href="index.php"><strong>QUINTET</strong></a>
  <input type="text" class="form-control" name="keyword" placeholder="Search for a Book, Author or Category" style="width: 50%;"> 
    <div class="navbar-right">
      <a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
      <a class="active" href="bookstore.php"><i class="fa fa-fw fa-book"></i> Bookstore</a>
      <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
      <a href="login.php"><i class="fa fa-fw fa-user"></i> Login</a>
    </div>
</div>




    <?php
    include "dbconnect.php";
    if(isset($_GET['value']))
        {  
           $_SESSION['category']=$_GET['value'];
        }
    $category=$_SESSION['category'];
    if(isset($_POST['sort']))
    {
        if($_POST['sort']=="price")
                {   $query = "SELECT * FROM products WHERE Category='$category' ORDER BY Price";
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                    ?>
                       <script type="text/javascript">
                          document.getElementById('select').Selected=$_POST['sort'];
                       </script>
                    <?php
                }
        else
        if($_POST['sort']=="priceh")
                {   $query = "SELECT * FROM products WHERE Category='$category' ORDER BY Price DESC";
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                }
        else
        if($_POST['sort']=="discount")
                {   $query = "SELECT * FROM products WHERE Category='$category' ORDER BY Discount DESC";
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                }
        else
        if($_POST['sort']=="discountl")
                {   $query = "SELECT * FROM products WHERE Category='$category' ORDER BY Discount";
                    $result = mysqli_query ($con,$query)or die(mysqli_error($con));
                }
    } 
    else   
            {   $query = "SELECT * FROM products WHERE Category='$category'";
                $result = mysqli_query ($con,$query)or die(mysqli_error($con));
            } 
    $i=0;
    echo '<div class="container-fluid" id="books">
        <div class="row">
          <div class="col-xs-12 text-center" id="heading">
                 <h2 style="color:rgb(228, 55, 25);text-transform:uppercase;margin-bottom:0px;"> '. $category .' STORE </h2>
           </div>
        </div>      
        <div class="container fluid">
             <div class="row">
                  <div class="col-sm-5 col-sm-offset-6 col-md-5 col-md-offset-7 col-lg-4 col-lg-offset-8">
                       <form action="';echo $_SERVER['PHP_SELF'];echo'" method="post" class="pull-right">
                           <label for="sort">Sort by &nbsp: &nbsp</label>
                            <select name="sort" id="select" onchange="form.submit()">
                                <option value="default" name="default"  selected="selected">Select</option>
                                <option value="price" name="price">Low To High Price </option>
                                <option value="priceh" name="priceh">Highest To Lowest Price </option>
                                <option value="discountl" name="discountl">Low To High Discount </option>
                                <option value="discount" name="discount">Highest To Lowest Discount</option>
                            </select>
                       </form>
                  </div>
              </div>
        </div>';

        if(mysqli_num_rows($result) > 0) 
        {   
            while($row = mysqli_fetch_assoc($result)) 
            {
            $path="img/books/" .$row['PID'].".jpg";
            $description="description.php?ID=".$row["PID"];
            if($i%4==0)
            echo '<div class="row">';
            echo'
               <a href="'.$description.'">
                <div class="col-sm-6 col-md-3 col-lg-3 text-center">
                    <div class="book-block" style="border :3px solid #DEEAEE;">
                        <img class="book block-center img-responsive" src="'.$path.'">
                        <hr>
                         ' . $row["Title"] . '<br>
                        ' . $row["Price"] .'  &nbsp
                        <span style="text-decoration:line-through;color:#828282;"> ' . $row["MRP"] .' </span>
                        <span class="label label-warning">'. $row["Discount"] .'%</span>
                    </div>
                </div>
                
               </a> ';
            $i++;
            if($i%4==0)
            echo '</div>';
            }
        }
    echo '</div>';
    ?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>	
