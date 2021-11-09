<?php
include("conn.php");
if (isset($_POST['pay'])){
    //today date
    $date = date("Y-m-d");
    $sql="UPDATE shoppingcart SET
    Status='paid', Checkout_Date='$date'
    WHERE Shopping_ID = '$_GET[id]'";
}
if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: userprofile.php'); 
}
?>