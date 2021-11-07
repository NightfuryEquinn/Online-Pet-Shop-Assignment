<?php

$connect = mysqli_connect("localhost","root","","assignment","3306");

$email = mysqli_real_escape_string($connect, $_POST['email']);
$password = mysqli_real_escape_string($connect, $_POST['password']);
$checkpassword = mysqli_real_escape_string($connect, $_POST['checkpassword']);
$checkemail =  "SELECT * FROM customer WHERE email = '$email'";


$insert="INSERT INTO customer (username, name, email, password)
VALUES
('$_POST[username]','$_POST[name]', '$_POST[email]', '$_POST[password]');";

if($password !== $checkpassword){
    echo 
    '<script>
    alert ("Please enter the same password!.")
    window.location.href = "login.html";
    </script>';  
}
if($email !== $checkemail){
    echo 
    '<script>
    alert ("An account under this email already exists. Please log in instead.")
    window.location.href = "login.html";
    </script>';  
}
if (!mysqli_query($connect,$insert)) {
    die('Error: ' . mysqli_error($connect));
} 

else {
    echo 
    '<script>
    alert("Thank you for signing up! Please login to access the other features!");
    window.location.href = "login.html"; 
    </script>';
}
mysqli_close($connect);
?>