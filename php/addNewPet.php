<?php
include("conn.php");

$sql="INSERT INTO pet (Pet_Name, Pet_Price, Pet_Description, Image_Source) VALUES ('$_POST[name]', '$_POST[price]', '$_POST[description]', '$_POST[image]')";

if (!mysqli_query($con,$sql)){
	die('Error: ' . mysqli_error($con));
}
else {
	echo '<script>alert("New pet added!");
	window.location.href= "homepage.html";
	</script>';
}

mysqli_close($con);
?>