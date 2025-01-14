<?php
	//error_reporting(!E_ALL);
    class User{
        private $email, $passwd, $conn;

        private function create_conn(){
            $this->conn = new mysqli("172.18.0.4:3306", "root", "admin", "php_login");
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }

        public function create_user_db(){
            $this->passwd = password_hash($this->passwd, PASSWORD_DEFAULT);
            if ($this->conn->query("INSERT INTO user (email, password) VALUES ('$this->email', '$this->passwd')")){
                $status = "HEHEHEHA";
            }
            else{
                throw new Exception("Error Processing Request - create_user_db()", 1);
            }
        }
        
        public function select_user_db(){
            if ($response = $this->conn->query("SELECT email FROM user WHERE email = '$this->email'")){
                if($response->num_rows > 0){
                    return true;                      //Такой юзер есть
                }
                else
                    return false;                       //Такого юзера нет            
            }
        }
        
        public function select_user_passwd_db(){
            if ($response = $this->conn->query("SELECT email, password FROM user WHERE email = '$this->email'")){
                if($response->num_rows == 1){
                    $row = $response -> fetch_assoc();
                    return $row["password"];
                }
            }
            else{
                throw new Exception("Error Processing Request - select_user_passwd_db", 1);
            }
        }

        function __construct($email="", $passwd=""){
            $this->create_conn();
            $this->email = $email;
            $this->passwd = $passwd;
            $this->email = $this->conn->real_escape_string($this->email);
            $this->passwd = $this->conn->real_escape_string($this->passwd);
        }
        
        function __destruct(){
            $this->conn->close();
        }
    }
?>
