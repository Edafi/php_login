<?php
    session_start();
    unset($_SESSION["isValidRegistration"]);
    unset($_SESSION["isEmailValid"]);
    unset($_SESSION["isPasswordValid"]);
    unset($_SESSION["isAlredyRegistered"]);
    unset($_SESSION["isLogined"]);
    session_destroy();
    header('Location: login.php');
?>