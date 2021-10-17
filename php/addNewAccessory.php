<?php
include("conn.php");

$sql="INSERT INTO accessory (Accessory_Name, Accessory_Price, Accessory_Description, Image_Source) VALUES ('$_POST[name]', '$_POST[price]', '$_POST[description]', '$_POST[image]')";

if (!mysqli_query($con,$sql)){
	die('Error: ' . mysqli_error($con));
}
else {
	echo '<script>alert("New accessory added!");
	window.location.href= "homepage.html";
	</script>';
}

mysqli_close($con);
?>