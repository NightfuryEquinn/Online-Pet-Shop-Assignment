<?php
    session_start();
        if (!isset($_SESSION['Admin_ID']))
    {
        header("location: ../adminaccess.html");
    }
?>
