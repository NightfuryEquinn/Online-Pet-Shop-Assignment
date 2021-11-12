<?php
include("conn.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $aadminid = $_POST['Admin_ID'];
    $ausername = $_POST['username'];
    $apassword = $_POST['password'];


    $adminid = mysqli_real_escape_string($con, $aadminid);
    $username = mysqli_real_escape_string($con, $ausername);
    $password = mysqli_real_escape_string($con, $apassword);

    $adminlogin = "SELECT * FROM admin WHERE Admin_ID = '$adminid' AND username='$ausername' AND password='$password'";

    if ($result=mysqli_query($con,$adminlogin)) {
        $rowcount=mysqli_num_rows($result);
        }
        if($rowcount==1) {
            session_start();
            $_SESSION['Admin_ID'] = $adminid;
            echo "Login Succesful. Welcome back".$ausername;
            header("location: ../homepage.html");
            }
        else {
            echo 
            '<script>
            alert("Legal action will be taken against unauthorized access.");
            </script>';
            header('Location: ../loginform.html');
        };
mysqli_close($con);
}
?>