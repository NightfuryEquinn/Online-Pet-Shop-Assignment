<?php
session_start();
$customer_id = $_SESSION['Customer_ID'];

include("conn.php");
$sql = "UPDATE customer SET Username='".$_POST['user_username']."', Name='".$_POST['user_name']."', 
Contact_No='".$_POST['user_contact_number']."', 
Email='".$_POST['user_email']."', 
Address='".$_POST['user_address']."', 
City='".$_POST['user_city']."', 
Postal_code='".$_POST['user_postcode']."', 
State='".$_POST['user_state']."'
WHERE Customer_ID=$customer_id";


if (mysqli_query($con, $sql)) {
    echo'<script>
    alert("Changes are made successfully.");
    window.location.href="userprofile.php";
    </script>';
    }
else{
    echo'<script>
    alert("Failed to update your information.");
    window.location.href="userprofile.php";
    </script>';
}
mysqli_close($con);
?>