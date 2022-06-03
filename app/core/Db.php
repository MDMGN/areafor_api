<?php
    final class Db extends App{
        /**
     * Abre la conexión a la bbdd.
     * @param array $data
     * @return void
     */
        public static function connect($data){
            try{
                self::$conn= new PDO("mysql:host=".$data['hostname'].";
                dbname=".$data['database'].";
                charset=utf8",
                $data['username'],
                $data['password']);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                die('Message: '.$e->getMessage().' Line:'.$e->getLine());
            }
        }
        public static function disconnect(){
            if(self::$conn)
                self::$conn=null;
        }
    }
?>