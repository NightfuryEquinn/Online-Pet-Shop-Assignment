<?php
session_start();
include("conn.php");

if (isset($_POST['pay'])){
    $customer_id = $_SESSION['Customer_ID'];
    //today date
    $date = date("Y-m-d");

    $result= mysqli_query($con,"SELECT * from shopping_product WHERE Shopping_ID=(SELECT Shopping_ID FROM shoppingcart WHERE Customer_ID = 2 AND Status ='unpaid')");
    
    $sql = "UPDATE shoppingcart SET Status='paid', Checkout_date='$date' WHERE Customer_ID=$customer_id AND Status='unpaid";
        
    while ($row = mysqli_fetch_array($result)){
        $pid = $row['Product_ID'];
        $qty = $row['Quantity'];
        $stocksql = "UPDATE product SET Product_Stock = Product_Stock - $qty WHERE Product_ID = $pid";
        
        mysqli_query($con, $stocksql);
    }

    if(mysqli_query($con, $sql)) {
        echo '<script>
        alert ("Payment is done successfully.");
        window.location.href= "userprofile.php";
        </script>';
    } else {
        echo '<script>
        alert ("Error! Failed to complete payment.");
        window.location.href= "userprofile.php";
        </script>';
    }
}
mysqli_close($con);
?>