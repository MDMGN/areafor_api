
<?php
    final class Router extends App{
        private static $routes=null;

        public static function setRoutes($arg) {self::$routes=$arg;}

        public static function get($ruta) {

            // si no hay controlador especificado para la ruta obtenida, enrutamos a Home
            if(!self::$routes[$ruta])
                self::$routes[$ruta] = 'HomeController';
          
            require_once 'app/controllers/'. self::$routes[$ruta] .'.php';
        }
    }
?>