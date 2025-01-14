<?php
	//error_reporting(!E_ALL);
    require_once "sql_methods.php";
    require_once "session.php";
    Session::start_session();

    $email = "";
    $password = "";
    if(isset($_POST["email"])){                                     // Получаем почту и пароль введеные пользователем
        $email = htmlentities($_POST["email"]);
    }
    if(isset($_POST["password"])){
        $password = htmlentities($_POST["password"]);
    }

    $user = new User($email, $password);
    if($user->select_user_db()){   //Проверяем есть ли такой пользователь в базе 
        if(password_verify($password, $user->select_user_passwd_db())){
            Session::set_islogined(true);
            Session::set_email($email);
            header('Location: user.php');
        }
        else{
            Session::set_isLogined(false);
            Session::set_wrongPasswd(true);
            header('Location: login.php');
        }
    }
    else{
        Session::set_isLogined(false);
        Session::set_wrongLogin(true);
        header('Location: login.php');
    }

?>
