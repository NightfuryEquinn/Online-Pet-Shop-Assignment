<!--Delete Data-->
<?php
include("conn.php");

$selectData = intval($_GET['id']);

$deleteQuery = mysqli_query($con, "DELETE * FROM product WHERE Product_ID=$selectData");

mysqli_close($con);
header('Location: ../homepage.html');

?>