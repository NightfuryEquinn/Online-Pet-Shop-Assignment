<?php

include('conn.php');

$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$checkpassword = mysqli_real_escape_string($con, $_POST['checkpassword']);
$checkemail =  "SELECT * FROM customer WHERE email = '$email'";
$validate = mysqli_query($con, $checkemail);
$insert="INSERT INTO customer (username, name, email, password)
            VALUES
        ('$_POST[username]','$_POST[name]', '$_POST[email]', '$_POST[password]');";

if($password !== $checkpassword){
    echo 
    '<script>
    alert ("Please enter the same password!")
    window.location.href = "../loginform.html";
    </script>';
};

if(mysqli_num_rows($validate) > 0){
    echo 
    '<script>
    alert ("An account under this email already exists. Please log in instead.")
    window.location.href = "../loginform.html";
    </script>';
};

if (mysqli_query($con,$insert)) {
    echo 
    '<script>
    alert("Thank you for signing up! Please login to access the other features!");
    window.location.href = "../loginform.html"; 
    </script>';
} 

else {
    echo 
    '<script>
    alert("Sign up failed. Please try again.");
    window.location.href = "../loginform.html"; 
    </script>';
};

mysqli_close($con);
?>