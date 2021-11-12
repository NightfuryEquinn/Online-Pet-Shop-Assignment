<?php
include ('conn.php');
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $pemail = $_POST['email'];
    $ppassword = $_POST['password'];

    $email=mysqli_real_escape_string($con,$pemail);
    $password=mysqli_real_escape_string($con,$ppassword);

    $login ="SELECT * FROM customer WHERE email='$email' and 
    password='$password'";

    $retrieve = "SELECT Customer_ID FROM customer WHERE email = '$pemail'";
    $sql = mysqli_query($con, $retrieve);
    if($sql){
    $fetch = mysqli_fetch_assoc($sql);
    }

        if ($result=mysqli_query($con,$login)) {
            $rowcount=mysqli_num_rows($result);
            }
            if($rowcount==1) {
                session_start();
                $_SESSION['Customer_ID'] = $fetch;
                header("location: homepage.php");
                echo '<script>
                alert ("Login Successful. Welcome back!")
                </script>';
            }
            else {
                echo
                '<script>
                alert ("Invalid credentials, please try again.<br/><br/>")
                window.location.href: ../loginform.html";
                </script>';
            };
mysqli_close($con);
}
?>
 

