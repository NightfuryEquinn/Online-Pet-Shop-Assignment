<?php
    session_start();
        if (!isset($_SESSION['Customer_ID']))
    {
        header("location: ../loginform.html");
    }
?>

