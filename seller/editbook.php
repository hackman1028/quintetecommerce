<?php include '../seller/seller.php' ?>


<?php

	if(isset($_POST['edit']))
	{

		$PID= $_POST['edit'];
		$sql= "SELECT * FROM products WHERE PID='$PID'";
		$result = mysqli_query($con, $sql) or die(mysqli_error($con));
		if (mysqli_num_rows($result) > 0 )
		{
			$row = mysqli_fetch_array($result);
			
			$PID=$row['PID'];
			$Title=$row['Title'];
			$Author=$row['Author'];
			$MRP=$row['MRP'];
			$Price=$row['Price'];
			$Discount=$row['Discount'];
			$Available=$row['Available'];
			$Publisher=$row['Publisher'];
			$Edition=$row['Edition'];
			$Category=$row['Category'];
			$Description=$row['Description'];
			// $BookImage=$row['BookImage'];



		}
	}
?>


<?php

	if(isset($_POST['update']))
	{
		$PID= $_POST['PID'];
		$Title=$_POST['Title'];
		$Author=$_POST['Author'];
		$MRP=$_POST['MRP'];
		$Price=$_POST['Price'];
		$Discount=$_POST['Discount'];
		$Available=$_POST['Available'];
		$Publisher=$_POST['Publisher'];
		$Edition=$_POST['Edition'];
		$Category=$_POST['Category'];
		$Description=$_POST['Description'];

		$sql="UPDATE products SET Title='$Title', Author='$Author', MRP='$MRP', Price='$Price', Discount='$Discount', Available='$Available', Publisher= '$Publisher', Edition ='$Edition', Category = '$Category', Description = '$Description' WHERE PID='$PID'";

	$result = mysqli_query($con, $sql)or die(mysql_error($con));
	if(!$result)
	{
   	die('Query Failed' . mysqli_error($con));
    }
    else
    {
     echo '<script type="text/javascript">alert("data uploaded successfully")</script>';
    }
	}
	
?>

<!-- edit book -->


<div class ="container">
	<div class="form-style2">
	<form action="" method="POST" enctype="multipart/form-data">
		<h2> Edit Book </h2>
<div class="row">
	<div class="col-50">
	

	
		<label>Product ID</label>
		<input type="text" id="PID" name="PID" placeholder="Product ID" class="" value="<?php echo $PID; ?>">
	
	
		<label>Title</label>
		<input type="text" id="Title" name="Title" placeholder="Title" class="" value="<?php echo $Title; ?>">
	
		<label>Author</label>
		<input type="text" id="Author" name="Author" placeholder="Author" class=""  value="<?php echo $Author; ?>">
		<label>MRP</label>
		<input type="text" id="MRP" name="MRP" placeholder="MRP" class=""value="<?php echo $MRP; ?>">
		<label>Price</label>
		<input type="text" id="Price" name="Price" placeholder="Price" class="" value="<?php echo $Price; ?>">
	</div>
	<div class="col-50">

		<label>Discount</label>
		<input type="text" id="Discount" name="Discount" placeholder="Discount" class="" value="<?php echo $Discount; ?>">

		<label>Available Books</label>
		<input type="text" id="Available" name="Available" placeholder="Available Books" class="" value="<?php echo $Available; ?>">
		<label>Publisher</label>
		<input type="text" id="Publisher" name="Publisher" placeholder="Publisher" class="" value="<?php echo $Publisher; ?>">
	
		<label>Edition</label>
		<input type="text" id="Edition" name="Edition" placeholder="Edition" class="" value="<?php echo $Edition; ?>">
		<label>Category</label>
		<select type="text" name="Category" class="">
			<!-- <option value="<?php echo $Category; ?>"><?php echo $Category; ?></option> -->

<?php 
		$options= array('New Book','Entrance Exam', 'Literature and Fiction', 'Academic and Professional', 'Biographies and Auto Biographies', 'Children and Teens', 'Regional Books', 'Business and Management', 'Health and Cooking');

		foreach($options as $option)
		{
			if($Category==$option)
			{
				echo "<option selected = 'selected' value='$option'> $option </option>";
			}
			else
			{
				echo "<option value='$option'>$option</option>";
			}
		}

?>
		</select>
	</div>
	
	
</div>

<label>Description</label><br>
		<textarea id="Description" name="Description" placeholder="Describe about the product" onkeyup="adjust_textarea(this)"><?php echo $Description; ?>"</textarea>
		<!-- <P> Select image to upload:	<input type="file" name="BookImage" id="BookImage"> </P> -->
  		<br>
		<input type="submit" name="update" value="update">
	</form>
	</div>

	</div>
</div>


<script>

//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "50px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>

</body>
</html>