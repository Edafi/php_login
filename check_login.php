<?php
    require_once "sql_methods.php";
    session_start();

    $conn = create_conn();                                          // Создаем подключение к бд
    $email = "";
    $password = "";
    if(isset($_POST["email"])){                                     // Получаем почту и пароль введеные пользователем
        $email = htmlentities($_POST["email"]);
    }
    if(isset($_POST["password"])){
        $password = htmlentities($_POST["password"]);
    }


    $email = $conn->real_escape_string($email);                         //Убираем sql injection
    $password = $conn->real_escape_string($password);                   //Убираем sql injection
    $password_db = get_password_sql($conn, "SELECT email, password FROM user WHERE email = '$email'");
    if(select_sql($conn, "SELECT email FROM user WHERE email = '$email'") && password_verify($password, $password_db)){   //Проверяем есть ли такой пользователь в базе
        close_conn($conn);
        $_SESSION["isLogined"] = "Добро пожаловать ".$email;
        header('Location: user.php');
    }
    else{
        close_conn($conn);
        $_SESSION["isLogined"] = "Не правильно введены данные";
        header('Location: login.php');
    }

?>