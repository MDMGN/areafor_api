<?php
       require_once('app/models/UsuariosModel.php');
       session_start();
       ob_start();
       try{
          Db::connect(require('db.php'));
       }catch(Exception $e){
              $errorDb = true;
       }

      /* if(strpos($_SERVER['REQUEST_URI'], 'alumnos')===false && strpos($_SERVER['REQUEST_URI'], 'tutores')===false){
              if(!isset($_SESSION['usuario'])){
                     header("Location: login");
              }

      } */
       $errorDb=false;

       // pondremos esta variable en nuestras rutas en el frontend
       $dirBase = explode('/', $_SERVER['REQUEST_URI']); 
       $dirBase = '/'. $dirBase[1];       
       Model::setDirBase($dirBase);

       // Iniciamos el enrutamiento de controladores 
       Router::setRoutes(require('routes.php'));
?>