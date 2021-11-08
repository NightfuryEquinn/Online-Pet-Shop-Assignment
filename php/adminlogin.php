<?php
$connect = include("conn.php");
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
            echo "Login Succesful. Welcome back".$ausername;
            header("location: homepage.html");
            }
        else {
            echo 
            '<script>
            alert("Legal action will be taken against unauthorized access.");
            </script>';
            header('Location: login.html');
            }
mysqli_close($connect);
}
?>