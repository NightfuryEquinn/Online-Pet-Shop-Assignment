<?php
$username = $_SESSION['mySession'];
include("conn.php");
$result = mysqli_query($con,"SELECT Password FROM customer WHERE Username=$username");

if($result == $_POST['user_currentpassword']){
    if($_POST['user_newpassword'] == $_POST['user_confirmpassword']){
        $sql = "UPDATE customer SET
        Password ='$_POST[user_newpassword]'
        WHERE Username=".$username;      
    }
}
if (mysqli_query($con, $sql)) {
    mysqli_close($con);
    header('Location: userprofile.php');
    }
?>
