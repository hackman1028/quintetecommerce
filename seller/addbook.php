<?php
	include '../seller/seller.php'
?>




<div class ="container">
	<div class="form-style">
	<form action="" method="POST" enctype="multipart/form-data">
		<h2> Add books </h2>

		<ul>
	<li>
		<input type="text" id="PID" name="PID" placeholder="Product ID" class="field-split align-left" required>
		<input type="text" id="Title" name="Title" placeholder="Title" class="field-split align-right" required>
	</li>
	<li>
		<input type="text" id="Author" name="Author" placeholder="Author" class="field-split align-left" required>
		<input type="text" id="MRP" name="MRP" placeholder="MRP" class="field-split align-right" required>

	</li>
	<li>
		<input type="text" id="Price" name="Price" placeholder="Price" class="field-split align-left" required>
		<input type="text" id="Discount" name="Discount" placeholder="Discount" class="field-split align-right">
	</li>
	<li>
		<input type="text" id="Available" name="Available" placeholder="Available" class="field-split align-left" required>
		<input type="text" id="Publisher" name="Publisher" placeholder="Publisher" class="field-split align-right" required>
	</li>
	<li>	
		<input type="text" id="Edition" name="Edition" placeholder="Edition" class="field-split align-left">
		
		<select type="text" name="Category" class="field-split align-right">
			<?php 
		$options= array('New Book', 'Entrance Exam', 'Literature and Fiction', 'Academic and Professional', 'Biographies and Auto Biographies', 'Children and Teens', 'Regional Books', 'Business and Management', 'Health and Cooking' , 'Others');

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
	</li>
		<textarea id="Description" name="Description" placeholder="Describe about the product" onkeyup="adjust_textarea(this)" required></textarea>
		<P> Select image to upload:	<input type="file" name="BookImage" id="BookImage"> </P>
  		<br>
		<input type="submit" name="upload" value="upload">
	
	</ul>
	</form>
	</div>



<?php
if(isset($_POST['upload']))
{
	$PID=$_POST['PID'];
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
	// $BookImage=$_POST['BookImage'];

	$file = $_FILES['BookImage'];

	$fileName= $_FILES['BookImage']['name'];
	$fileTmpName = $_FILES['BookImage']['tmp_name'];
	$fileError = $_FILES['BookImage']['error'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	$allowed= array('jpg', 'jpeg', 'png', 'pdf');
	if(in_array($fileActualExt, $allowed))
	{
		if($fileError === 0)
		{
			$fileNameNew = $PID.".".$fileActualExt;
			$fileDestination = '../img/books/'.$fileNameNew;
			move_uploaded_file($fileTmpName, $fileDestination);
			// header("location: seller.php?uploadsuccess");
		}
	}
	else
	{
		echo "you cannot upload files of this type!";
	}



$sql="INSERT INTO products (PID, Title, Author, MRP, Price, Discount, Available, Publisher, Edition, Category, Description, Vendor_ID) VALUES ('$PID', '$Title', '$Author', '$MRP', '$Price', '$Discount', '$Available', '$Publisher', '$Edition', '$Category', '$Description', '$vendor')";

$result = mysqli_query($con, $sql) or die(mysqli_error($con));

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