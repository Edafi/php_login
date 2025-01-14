<?php
    require_once "session.php";
    Session::start_session();
    if (!Session::isset_isLogined() || !Session::isset_email()) {
        Session::unset_session();
        header('Location: login.php');
    }
    require_once "api.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>auth-test</title>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <div class="p-5 bg-primary text-white text-center" style="height: 300px; overflow: hidden; position: relative;">
        <?php $message = get_api_data();
        if(strpos($message, "https://") !== false){?>
            <img src=" <?php echo $message ?> "style="width: 350px; height: 200px; object-fit: contain;"/>
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
                    <h2 class="text-center"><?php echo "Hello"." ".Session::get_email() ?></h2>
                </div>
            </div>
        </div>
    </body>
</html>
