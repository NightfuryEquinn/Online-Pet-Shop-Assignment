<?php
    include("conn.php");
    //get the cart id
    if(isset($_GET['id'])){
        $cart_id=intval($_GET['id']);
    }

    $result = mysqli_query($con,"DELETE FROM shoppingcart WHERE Shopping_ID=$cart_id");

    mysqli_close($con);
    header('Location: userprofile.php');
    echo"<script>alert(\"All items in your cart has been cleared.\")</script>"
?>