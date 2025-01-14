<?php
	error_reporting(!E_ALL);
    session_start();
    unset($_SESSION["isValidRegistration"]);
    unset($_SESSION["isEmailValid"]);
    unset($_SESSION["isPasswordValid"]);
    unset($_SESSION["isAlredyRegistered"]);
    unset($_SESSION["isLogined"]);
    unset($_SESSION["email"]);
    unset($_SESSION["wrongPasswd"]);
    unset($_SESSION["wrongLogin"]);
    session_destroy();
    header('Location: login.php');
?>
