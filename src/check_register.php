<?php
	error_reporting(!E_ALL);
    require_once "sql_methods.php";
    session_start();

    $conn = create_conn();                                          // Создаем подключение к бд
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
        $email = $conn->real_escape_string($email);                         //Убираем sql injection
        $password = $conn->real_escape_string($password);                   //Убираем sql injection
        if(select_sql($conn, "SELECT email FROM user WHERE email = '$email'") === false){                        //Проверяем есть ли такой пользователь в базе
            $password = password_hash($password, PASSWORD_DEFAULT);
            insert_sql($conn, "INSERT INTO user (email, password) VALUES ('$email', '$password')");              //Запись в бд
            close_conn($conn);
            $_SESSION["isValidRegistration"] = "Вы успешно зарегистрированы";
            header('Location: login.php');
        }   
        else{
            $_SESSION["isAlredyRegistered"] = "Пользователь с такой почтой уже есть";
            close_conn($conn);
            header('Location: register.php');
        }
    }
    else{
        close_conn($conn);
        header('Location: register.php');
    }

?>
