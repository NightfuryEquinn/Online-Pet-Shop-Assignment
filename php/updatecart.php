<?php
    include("conn.php");

    if (isset($_POST['Update'])) {

        $usid = $_POST['sid'];
        $upid = $_GET['Product_ID'];
        $uqty = $_POST['update-qty'];

    $update = mysqli_query($con, "UPDATE shopping_product SET Quantity = $uqty WHERE Shopping_ID = $usid AND Product_ID = $upid");

    if ($update) {
        echo'<script>alert("Updated successfully.");
        window.location.href = "userprofile.php"; 
        </script>';
    }
    else {
        echo'<script>alert("Updated failed.");
        </script>';
    }
}
mysqli_close($con);
?>