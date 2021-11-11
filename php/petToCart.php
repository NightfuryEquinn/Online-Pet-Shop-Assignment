<?php
include("conn.php");

$customer_id=intval($_SESSION['Customer_ID']);

$cartItem = intval($_GET('Product_ID'));

$addQuery = mysqli_query($con, "INSERT INTO shopping_product (Product_ID, Shopping_ID) SELECT p.Product_ID, sp.Shopping_ID
FROM shoppingcart s, shopping_product sp, product p
WHERE p.Product_ID=$cartItem AND s.Customer_ID=$customer_id AND s.Shopping_ID=sp.Shopping_ID");

if ($addQuery) {
    echo '<script>
    alert ("Successfully added! One step closer taking it home!");
    window.location.href= "pet.php";
    </script>';

} else {
    echo '<script>
    alert ("Error while adding item to cart.");
    window.location.href= "pet.php";
    </script>';
};

mysqli_close($con);

?>