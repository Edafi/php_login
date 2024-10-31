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
        echo "$password <br>";
    }


    $email = $conn->real_escape_string($email);                         //Убираем sql injection
    $password = $conn->real_escape_string($password);                   //Убираем sql injection

    if(select_sql($conn, "SELECT email, password FROM user WHERE email = '$email' and password = '$password'") === true){   //Проверяем есть ли такой пользователь в базе
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