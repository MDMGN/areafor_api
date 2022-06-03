<?php
    class Model extends App{

        /** @var string Directorio en el que se ejecuta nuestra app */ 
        protected static $dirBase = false;
        public static function setDirBase($arg) { self::$dirBase = $arg; }
    }