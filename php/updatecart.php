<?php
    include("conn.php");
    $flag = TRUE;
    if (isset($_POST['Update'])){
        $sid_array = intval($_POST['sid']);
        $pid_array = intval($_POST['pid']);
        $qty_array = $_POST['update-qty'];
        //loop the update quantity sql for each product
        for($i=0;$i<$count;$i++){ 
            $sid = $sid_array[$i];
            $pid = $pid_array[$i]; 
            $qty = $qty_array[$i];
            $sql="UPDATE shopping_product SET 
            Quantity='$qty'
            WHERE Shopping_ID='$sid' AND Product_ID='$pid'"; 
            if (mysqli_query($con, $sql)){
                $flag = FALSE;
            }
        }
    }
        if ($flag){
            mysqli_close($con);
            echo "Update succesfully.";
        }
        header('Location: userprofile.php');
?>