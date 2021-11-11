<?php
session_start();
include("conn.php");
$flag = TRUE;
if (isset($_POST['pay'])){
    //today date
    $Cart_ID = intval($_SESSION['Cart_ID']);
    $date = date("Y-m-d");
    $result= mysqli_query($con,"SELECT * from shopping_product WHERE Shopping_ID = $Cart_ID");
    $row = mysqli_fetch_row($result);

    while ($row = mysqli_fetch_row($result)){
        $pid = $row['Product_ID'];
        $qty = $row['Quantity'];
        $stocksql="UPDATE product SET 
            Product_Stock = Product_Stock - $qty
            WHERE Product_ID = $pid";
        if (!mysqli_query($con, $stocksql)){
            $flag = FALSE;
        }
    }

    $sql="UPDATE shoppingcart SET
    Status='paid', Checkout_Date='$date'
    WHERE Shopping_ID = $Cart_ID";
    if(!mysqli_query($con, $sql)) {
        $flag= FALSE;
    }
}

if (!$flag){
    echo "Fail to update product data.";
}
header('Location: userprofile.php'); 
?>