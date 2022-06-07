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