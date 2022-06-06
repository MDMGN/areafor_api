<!DOCTYPE html>
<html lang="es-Es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        require_once('app/core/App.php');
        require_once('app/core/Db.php');
        require_once('app/core/Router.php');
        require_once('app/core/Model.php');
        require_once('app/config/initiate.php');
        if(!$errorDb){
            Router::get($_GET['route']);
        }
    ?>


<?php 
    Db::disconnect()
?>
</body>
</html>