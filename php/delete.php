<!--Delete Data-->
<?php
include("conn.php");

$selectData = intval($_GET['Product_ID']);

$deleteQuery = mysqli_query($con, "DELETE FROM product WHERE Product_ID=$selectData;");

if ($deleteQuery) {
    echo '<script>
    alert ("Successfully delete data and image!");
    window.location.href= "../homepage.html";
    </script>';
    
} else {
    echo '<script>
    alert ("Unable to delete data and image!");
    window.location.href= "../homepage.html";
    </script>';
};

mysqli_close($con);
?>