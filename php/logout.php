<?php
    session_start();
    header("location: ../homepage.html");
    echo "<script>alert ('You have successfully logout.');</script>";
    session_unset();
    session_destroy();
?>