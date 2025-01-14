<?php
    class Session{
        
//===========================================================================
        static function set_isLogined($value){
            $_SESSION["isLogined"] = $value;
        }
        static function get_isLogined(){
            return $_SESSION["isLogined"];
        }
        static function isset_isLogined(){
            if(isset($_SESSION["isLogined"]))
                return true;
            return false;
        }
//===========================================================================
        static function set_email($value){
            $_SESSION["email"] = $value;
        }
        static function get_email(){
            return $_SESSION["email"];
        }
        static function isset_email(){
            if(isset($_SESSION["email"]))
                return true;
            return false;
        }
//===========================================================================
        static function set_wrongPasswd($value){
            $_SESSION["wrongPasswd"] = $value;
        }
        static function get_wrongPasswd(){
            return $_SESSION["wrongPasswd"];
        }
        static function isset_wrongPasswd(){
            if(isset($_SESSION["wrongPasswd"]))
                return true;
            return false;
        }
//===========================================================================
        static function set_wrongLogin($value){
            $_SESSION["wrongLogin"] = $value;
        }
        static function get_wrongLogin(){
            return $_SESSION["wrongLogin"];
        }
        static function isset_wrongLogin(){
            if(isset($_SESSION["wrongLogin"]))
                return true;
            return false;
        }
//===========================================================================
        static function set_isEmailValid($value){
            $_SESSION["isEmailValid"] = $value;
        }
        static function get_isEmailValid(){
            return $_SESSION["isEmailValid"];
        }
        static function isset_isEmailValid(){
            if(isset($_SESSION["isEmailValid"]))
                return true;
            return false;
        }
//===========================================================================
        static function set_isPasswdValid($value){
            $_SESSION["isPasswordValid"] = $value;
        }
        static function get_isPasswdValid(){
            return $_SESSION["isPasswordValid"]; 
        }
        static function isset_isPasswdValid(){
            if(isset($_SESSION["isPasswordValid"]))
                return true;
            return false;
        }
//===========================================================================
        static function set_isRegistrationValid($value){
            $_SESSION["isRegistrationValid"] = $value;
        }
        static function get_isRegistrationValid(){
            return $_SESSION["isRegistrationValid"];
        }
        static function isset_isRegistrationValid(){
            if(isset($_SESSION["isRegistrationValid"]))
                return true;
            return false;
        }
//===========================================================================
        static function set_isAlreadyRegistered($value){
            $_SESSION["isAlreadyRegistered"] = $value;
        }
        static function get_isAlreadyRegistered(){
            return $_SESSION["isAlreadyRegistered"];
        }
        static function isset_isAlreadyRegistered(){
            if(isset($_SESSION["isAlreadyRegistered"]))
                return true;
            return false;
        }
//===========================================================================
        static function start_session(){
            session_start();
        }
        static function unset_session(){
            unset($_SESSION["isRegistrationValid"]);
            unset($_SESSION["isEmailValid"]);
            unset($_SESSION["isPasswordValid"]);
            unset($_SESSION["isAlreadyRegistered"]);
            unset($_SESSION["isLogined"]);
            unset($_SESSION["email"]);
            unset($_SESSION["wrongPasswd"]);
            unset($_SESSION["wrongLogin"]);
        }

        static function destroy_session(){
            session_destroy();
        }
//===========================================================================
    }
?>