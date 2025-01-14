<?php
	//error_reporting(!E_ALL);
    require_once "sql_methods.php";
    session_start();

    $email = "";
    $password = "";
    if(isset($_POST["email"])){                                     // Получаем почту и пароль введенные пользователем
        $email = htmlentities($_POST["email"]);
    }
    if(isset($_POST["password"])){
        $password = htmlentities($_POST["password"]);
    }

    $isEmailValid = false;
    $isPasswordValid = false;

    //_______________________________________________________________________________________________________________//
    //                                      Проверка правильности почты и пароля
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $isEmailValid = true;
    }
    else{
        $_SESSION["isEmailValid"] = "Не правильная почта";
    }
    if ( preg_match("/^[^А-Яа-я]*$/", $password) && strlen($password)>=8){
        $isPasswordValid = true;
    }else{
        $_SESSION["isPasswordValid"] = "Используйте латинский алфавит и спец. символы";
    }
    //_______________________________________________________________________________________________________________//
    //                Проверяем существует ли такой пользователь или нет, если нет, то регистрируем 

    if($isEmailValid && $isPasswordValid){
        $user = new User($email, $password);
        if($user->select_user_db() === false){                        //Проверяем есть ли такой пользователь в базе
            $user->create_user_db();
            $_SESSION["isValidRegistration"] = true;
            header('Location: login.php');
        }   
        else{
            $_SESSION["isAlreadyRegistered"] = "Пользователь с такой почтой уже есть";
            header('Location: register.php');
        }
    }
    else{
        header('Location: register.php');
    }

?>
