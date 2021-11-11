<?php 
session_start();
include ("conn.php");

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $checkpassword = mysqli_real_escape_string($con, $_POST['checkpassword']);

    if($password !== $checkpassword){
        echo
        '<script>
        alert ("Please enter matching passwords.")
        window.location.href = "../resetpassword.html";
        </script>';
    }else{

        $update_pass = "UPDATE customer SET  password = '$password' WHERE email = '$email'";

        if(mysqli_query($con, $update_pass)){
            echo 
            '<script>
            alert ("Password successfully changed. Please login again.")
            window.location.href = "../loginform.html";
            </script>'; 
        }
        else{
            echo
            '<script>
            alert ("Failed to change password. Please try again.")
            window.location.href = "../resetpassword.html";
            </script>';
       }
    }

?>