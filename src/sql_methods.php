<?php
	error_reporting(!E_ALL);
    function create_conn (){
        $conn = new mysqli("172.18.0.4:3306", "root", "admin", "php_login");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
    function insert_sql(&$conn, $sql_query){
        if ($conn->query($sql_query)){
        	$status = true;
        }
        else{
        	$status = false;
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
    function get_password_sql(&$conn, $sql_query){
        if ($result = $conn -> query($sql_query)){
            if($result->num_rows == 1){
                $row = $result -> fetch_assoc();
                return $row["password"];
            }
        }
    }
    function close_conn (&$conn){
        $conn->close();
    }
?>
