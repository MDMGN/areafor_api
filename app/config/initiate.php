<?php
       error_reporting(0);
       ini_set("display_errors",1);
       try{
          Db::connect(require('db.php'));
       }catch(Exception $e){
              $errorDb = true;
       }

       // pondremos esta variable en nuestras rutas en el frontend
       $dirBase = explode('/', $_SERVER['REQUEST_URI']); 
       $dirBase = '/'. $dirBase[1];       
       Model::setDirBase($dirBase);
       // usaremos el nombre de la tabla que viene por URL.
       $table=explode('/', $_SERVER['REQUEST_URI']);
       $table= $table[2];
       Model::setTable($table);
       //Guadaremos en una variable si exite un error con la base de datos para no renderizar el index.
       $errorDb=false;
       // Iniciamos el enrutamiento de controladores 
       Router::setRoutes(require('routes.php'));
?>