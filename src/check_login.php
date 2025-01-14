<?php
	//error_reporting(!E_ALL);
    require_once "sql_methods.php";
    session_start();

    //$conn = create_conn();                                          // Создаем подключение к бд
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
        //close_conn($conn);
        if(password_verify($password, $user->select_user_passwd_db())){
            $_SESSION["isLogined"] = true;
            $_SESSION["email"] = $email;
            header('Location: user.php');
        }
        else{
            $_SESSION["isLogined"] = false;
            $_SESSION["wrongPasswd"] = true;
            header('Location: login.php');
        }
    }
    else{
        //close_conn($conn);
        $_SESSION["isLogined"] = false;
        $_SESSION["wrongLogin"] = true;
        header('Location: login.php');
    }

?>
