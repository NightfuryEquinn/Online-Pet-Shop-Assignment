<?php
$connect = mysqli_connect("localhost","root","","assignment","3306");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $aadminid = $_POST['admin_ID'];
    $ausername = $_POST['username'];
    $apassword = $_POST['password'];


    $adminid = mysqli_real_escape_string($connect, $aadminid);
    $username=mysqli_real_escape_string($connect,$ausername);
    $password=mysqli_real_escape_string($connect,$apassword);

    $adminlogin ="SELECT * FROM admin WHERE admin_ID = '$adminid' and username='$ausername' and 
    password='$password'";
    


        if ($result=mysqli_query($connect,$adminlogin)) {
            $rowcount=mysqli_num_rows($result);
            }
        if($rowcount==1) {
            session_start();
            echo "Login Succesful. Welcome back";
            echo $ausername;
            //header("location: view.php");
            }
        else {
            $error=printf("Legal action will be taken against unauthorized access.<br/><br/>");
            }
mysqli_close($connect);
}
?>