<?php 
session_start();
$connect = mysqli_connect("localhost","root","","assignment","3306");

    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $checkpassword = mysqli_real_escape_string($connect, $_POST['checkpassword']);
    $update_pass = "UPDATE customer SET  password = '$password' WHERE email = '$email'";

    if($password !== $checkpassword){
        echo 
        '<script>
        alert ("Please enter the same password!.")
        window.location.href = "resetpassword.html";
        </script>';  
        

    if(mysqli_query($connect, $update_pass)){
        echo 
        '<script>
        alert ("Password successfully changed. Please login again.")
        window.location.href = "login.html";
        </script>'; 
    }
    else{
        echo
        '<script>
        alert ("Failed to change password. Please try again.")
        window.location.href = "resetpassword.html";
        </script>';
       }
    }
?>