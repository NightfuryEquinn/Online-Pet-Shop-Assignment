<?php
    session_start();
    include("conn.php");
    // Get the cart id
    $customer_id = $_SESSION['Customer_ID'];

    $delete1 = mysqli_query($con,"DELETE FROM shopping_product WHERE EXISTS (SELECT Customer_ID, Status FROM shoppingcart WHERE Customer_ID = $customer_id AND Status = 'unpaid')");

    if ($delete1) {
        $delete2 = mysqli_query($con, "DELETE FROM shoppingcart WHERE Customer_ID = $customer_id AND Status = 'unpaid'");
        echo "<script>alert('All items in your cart have been cleared.')
        window.location.href ='userprofile.php'</script>";
        mysqli_close($con);
    }
    else {
        echo"<script>alert('Failed to clear the cart.')
        window.location.href ='userprofile.php'</script>";
        mysqli_close($con);
    }    
?>