<?php
    session_start();
    require_once "api.php";
    if (!isset($_SESSION["isValidRegistration"]) && !isset($_SESSION["isLogined"])){
        $_SESSION["isValidRegistration"] = "";
        $_SESSION["isLogined"] = "";
    }
    $isValidRegistration = $_SESSION["isValidRegistration"];
    $isLogined = $_SESSION["isLogined"];
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
                    <h2 class="text-center">Войти</h2>

                    <?php if($isValidRegistration != ""){ ?>
                    <label for="isRegistered" style="color:   #61dc00;"><?php echo $isValidRegistration ?></label>
                    <?php } else if($isLogined != ""){ ?>
                    <label for="isLogined" style="color:   #d30000;"><?php echo $isLogined ?></label>
                    <?php } ?>
                    <form action="check_login.php" method="POST">
                        <div class="form-group">
                            <label for="username">Почта</label>
                            <input type="email" class="form-control" name="email" placeholder="Введите свою почту" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" name="password" placeholder="Введите пароль" required>
                        </div>
                        <div class="text-center" style="margin-top: 10px;">
                            <button type="submit" class="btn btn-primary btn-block" style="margin-left: 10px; margin-right: 10px;">Войти</button>    
                            <a class="btn btn-primary btn-block" href="register.php">Зарегистрироваться</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    unset($_SESSION["isValidRegistration"]);
    unset($_SESSION["isEmailValid"]);
    unset($_SESSION["isPasswordValid"]);
    unset($_SESSION["isAlredyRegistered"]);
    unset($_SESSION["isLogined"]);
?>
