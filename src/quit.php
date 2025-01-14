<?php
    require_once "session.php";
    Session::start_session();
    Session::unset_session();
    Session::destroy_session();
    header('Location: login.php');
?>
