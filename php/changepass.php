<?php 
$connect = include("conn.php");

    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $newpassword = mysqli_real_escape_string($connect, $_POST['password']);
    $checkpassword = mysqli_real_escape_string($connect, $_POST['checkpassword']);
    $changepass = "UPDATE customer SET  password = '$newpassword' WHERE email = '$email'";

    if($password !== $checkpassword){
        echo 
        '<script>
        alert ("The passwords entered do not match. Please try again.")
        </script>'; 
        header('Location: resetpassword.html'); 
        
    if ($newpassword == $checkpassword) {
        if(mysqli_query($connect, $changepass)){
            echo 
            '<script>
            alert ("Password successfully changed. Please login again.")
            </script>';
            mysqli_close($connect);
            header('Location: login.html');  

        }
    }
    else{
        echo
        '<script>
        alert ("Failed to change password. Please try again.")
        </script>';
        header('Location: resetpassword.html'); 
       }
    }
?>