<?php
include("conn.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $pemail = $_POST['email'];
    $ppassword = $_POST['password'];

    $email=mysqli_real_escape_string($con,$pemail);
    $password=mysqli_real_escape_string($con,$ppassword);

    $login ="SELECT * FROM customer WHERE email='$email' and password='$password'";

    $username = "SELECT username FROM customer";
        if ($result=mysqli_query($con,$login)) {
            $rowcount=mysqli_num_rows($result);
            }
        if($rowcount==1) {
            session_start();
            echo '
            <script> ("Login Succesful. Welcome back.");
            </script>;
            window.location.href = "homepage.html";'
            ;}
        else {   
            echo 
            '<script>
            alert("Invalid credentials, please try again.");
            </script>';
            header('Location: login.html');
        }
mysqli_close($con);
}
?>