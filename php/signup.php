<?php
$connect = mysqli_connect("localhost","root","","assignment","3306");
$insert="INSERT INTO customer (username, name, email, password)
    VALUES
    ('$_POST[username]','$_POST[name]', '$_POST[email]', '$_POST[password]');";
if (!mysqli_query($connect,$insert)) {
die('Error: ' . mysqli_error($connect));
}
else {
echo '"Successfully registered";
window.location.href = "loginpage.html"; 
';
}
mysqli_close($connect);
?>