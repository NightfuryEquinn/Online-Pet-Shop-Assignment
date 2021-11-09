<?php
include("conn.php");

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$checkpassword = mysqli_real_escape_string($con, $_POST['checkpassword']);
$checkemail =  "SELECT * FROM customer WHERE email = '$email'";

if($password !== $checkpassword){
    echo 
    '<script>
    alert ("Please enter the same password!.")
    </script>';  
    header('Location: login.html');
}
if($email !== $checkemail){
    echo 
    '<script>
    alert ("An account under this email already exists. Please log in instead.")
    </script>';  
    header('Location: login.html');
}
if($password == $checkpassword){
    if($email == $checkemail){
        $insert="INSERT INTO customer (username, name, email, password)
        VALUES
        ('$_POST[username]','$_POST[name]', '$_POST[email]', '$_POST[password]');";
         echo 
         '<script>
         alert("Thank you for signing up! Please login to access the other features!");
         </script>';
         header('Location: login.html');
    }
}

if (mysqli_query($con,$insert)) {
    mysqli_close($con);
    header('Location: login.html');
} 
?>