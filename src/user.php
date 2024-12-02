<?php
	error_reporting(!E_ALL);
    session_start();
    if (!isset($_SESSION["isLogined"])){
        unset($_SESSION["isLogined"]);
        header('Location: login.php');
    }
    $isLogined = $_SESSION["isLogined"];
    require_once "api.php";
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
    <div class="text-end" style="margin-top: 10px; margin-right: 30px">    
        <a class="btn btn-primary btn-block" href="quit.php">Выйти</a>
    </div>
    <body>    
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 20px;">
                <div class="col-md-4">
                    <h2 class="text-center"><?php echo $isLogined ?></h2>
                </div>
            </div>
        </div>
    </body>
</html>
