<?php
    session_start();
    header("location: ../homepage.html");
    session_destroy();
?>