<?php
include("conn.php");

$sql="INSERT INTO petfood (Pet_Brand, Food_Price, Food_Description, Image_Source) VALUES ('$_POST[name]', '$_POST[price]', '$_POST[description]', '$_POST[image]')";

if (!mysqli_query($con,$sql)){
	die('Error: ' . mysqli_error($con));
}
else {
	echo '<script>alert("New pet food added!");
	window.location.href= "homepage.html";
	</script>';
}

mysqli_close($con);
?>