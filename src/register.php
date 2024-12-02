<?php
	error_reporting(!E_ALL);
    session_start();
    require_once "api.php";
    if (!isset($_SESSION["isEmailValid"]) && !isset($_SESSION["isPasswordValid"]) && !isset($_SESSION["isAlredyRegistered"])){
        $_SESSION["isEmailValid"] = "";
        $_SESSION["isPasswordValid"] = "";
        $_SESSION["isAlredyRegistered"] = "";
    }

    $isEmailValid = $_SESSION["isEmailValid"];
    $isPasswordValid = $_SESSION["isPasswordValid"];
    $isAlreadyRegistered = $_SESSION["isAlredyRegistered"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>auth-test</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <div class="p-5 bg-primary text-white text-center">
    <?php $message = get_api_data();
        if(strpos($message, "https://") !== false){?>
            <img src=" <?php echo $message ?> "/>
        <?php } else {?>
            <h3><?php echo $message ?></h3>
        <?php } ?> 
    </div>
    <body>    
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 150px;">
                <div class="col-md-4">
                    <h2 class="text-center">Зарегистрироваться</h2>
                    <form action="check_register.php" method="POST">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Введите почту" style="margin-top: 20px;" required>
                            <label for="email" style="color:  #d30000;"><?php echo "$isEmailValid" . "$isAlreadyRegistered"?></label>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Придумайте пароль из 8 символов" style="margin-top: 5px;" required> 
                            <label for="password" style="color:  #d30000;"><?php echo "$isPasswordValid" ?></label>
                        </div>
                        <div class="text-center" style="margin-top: 10px;">
                            <button type="submit" class="btn btn-primary btn-block">Зарегистрироваться</button>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    unset($_SESSION["isAlredyRegistered"]);
    unset($_SESSION["isEmailValid"]);
    unset($_SESSION["isPasswordValid"]);
    unset($_SESSION["isLogined"]);
?>
