<?php
$connect = mysqli_connect("localhost","root","","assignment","3306");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $pemail = $_POST['email'];
    $ppassword = $_POST['password'];
    $email=mysqli_real_escape_string($connect,$pemail);
    $password=mysqli_real_escape_string($connect,$ppassword);
    $login ="SELECT * FROM customer WHERE email='$email' and 
    password='$password'";
    $username = "SELECT username FROM customer";
        if ($result=mysqli_query($connect,$login)) {
            $rowcount=mysqli_num_rows($result);
            }
        if($rowcount==1) {
            session_start();
            $_SESSION['mySession']=$username;
            echo "Login Succesful. Welcome back.";
            //header("location: view.php");
            }
        else {
            $error=printf("Invalid credentials, please try again.<br/><br/>");
            }
mysqli_close($connect);
}
?>