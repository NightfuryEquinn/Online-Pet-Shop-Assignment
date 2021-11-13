<?php
session_start();
include("conn.php");

$customer_id=intval($_SESSION['Customer_ID']);

$cartItem = $_POST['Product_ID'];
$quantity =$_POST['Quantity'];

$check = mysqli_query($con, "SELECT count(*) FROM shoppingcart WHERE Customer_ID = $customer_id AND Status = 'unpaid';");

$r = mysqli_fetch_row($check);
$row_num = $r[0];

if ($row_num != 1) {
    $addQuery1 = "INSERT INTO shoppingcart (Customer_ID) VALUES ($customer_id);";
    mysqli_query($con, $addQuery1);
};

$find_cartid = mysqli_query($con, "SELECT Shopping_ID FROM shoppingcart WHERE Customer_ID = $customer_id AND Status = 'unpaid';");
$row = mysqli_fetch_array($find_cartid);
$cartid = $row['Shopping_ID'];

$addQuery2 = mysqli_query($con, "INSERT INTO shopping_product (Product_ID, Shopping_ID, Quantity) VALUES ($cartItem, $cartid, $quantity);");

if ($addQuery2) {
    echo '<script>
    alert ("Successfully added! One step closer taking it home!");
    window.location.href= "food.php";
    </script>';

} else {
    echo '<script>
    alert ("Error while adding item to cart.");
    window.location.href= "food.php";
    </script>';
};

mysqli_close($con);

?>