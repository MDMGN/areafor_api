<?php
       try{
          Db::connect(require('db.php'));
       }catch(Exception $e){
              $errorDb = true;
       }

       $errorDb=false;

       // pondremos esta variable en nuestras rutas en el frontend
       $dirBase = explode('/', $_SERVER['REQUEST_URI']); 
       $dirBase = '/'. $dirBase[1];       
       Model::setDirBase($dirBase);

       // Iniciamos el enrutamiento de controladores 
       Router::setRoutes(require('routes.php'));
?>