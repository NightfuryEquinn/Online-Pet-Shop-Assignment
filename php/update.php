<!--Update Data-->
<?php
include("conn.php");

$uImage = $_FILES['image']['tmp_name'];

$uImg = file_get_contents($uImage);

$updateQuery = "UPDATE product SET Product_Name='$_POST[name]', Product_Price='$_POST[price]', Product_Description='$_POST[description]', Product_Category='$_POST[adding]', Product_Stock='$_POST[stock]', Product_Image=? WHERE Product_ID='$_POST[id]';";

$stmt = mysqli_prepare($con,$updateQuery);

mysqli_stmt_bind_param($stmt,"s",$uImg);

mysqli_stmt_execute($stmt);

$check = mysqli_stmt_affected_rows($stmt);

if ($check == 1) {
    echo '<script>
    alert ("Successfully updated data and image!");
    window.location.href= "../homepage.html";
    </script>';
} else {
    echo '<script>
    alert ("Failed to update relevant files.");
    </script>';
}

mysqli_close($con);
?>