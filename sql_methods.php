<?php
    function create_conn (){
        $conn = new mysqli("localhost", "dan", "54321", "php_login");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
    function insert_sql(&$conn, $sql_query){
        if ($conn->query($sql_query)){
            echo "Данные успешно добавлены";
        }
        else{
            echo "Что-то не так";
        }
    }
    function select_sql(&$conn, $sql_query){
        if ($result = $conn -> query($sql_query)){
            if($result->num_rows > 0){
                return true;                      //Такой юзер есть
            }
            else
                return false;                       //Такого юзера нет            
        }
    }
    function close_conn (&$conn){
        $conn->close();
    }
?>