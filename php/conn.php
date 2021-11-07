<!--Connect to PHPmyAdmin MySQL database-->
<?php
$con = mysqli_connect("localhost", "root", "", "lespetshop");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to PHPmyAdmin/MySQL: " . mysqli_connect_error();
}
?>