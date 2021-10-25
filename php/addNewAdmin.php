// Add new pet data from addNew.html
<?php
include("conn.php");

$image = $_FILES['image']['tmp_name'];

$img = file_get_contents($image);

$sql="INSERT INTO product (Product_Name, Product_Price, Product_Description, Product_Category, Product_Stock, ?) 

VALUES 

('$_POST[name]', '$_POST[price]', '$_POST[description]', '$_POST[adding]', '$_POST[stock]', ?)";

$stmt = mysqli_prepare($con,$sql);

mysqli_stmt_bind_param($stmt,"s",$img);

mysqli_stmt_execute($stmt);

$check = mysqli_stmt_affected_rows($stmt);

if($check == 1) {
    echo '<script> alert ("1 record added! Image sucessfully uploaded!");
    window.location.href= "homepage.html";
    </script>';

} else {
    echo 'Upload failed';
}

mysqli_close($con);
?>