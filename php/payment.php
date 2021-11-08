<?php
include("conn.php");
if (isset($_POST['pay'])){
    $date = date("Y-m-d");
    $sql="UPDATE shoppingcart SET
    Status='paid', Checkout_Date='$date'
    WHERE Cart_ID = $_GET[id]";
}
if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: userprofile.php'); 
}
?>