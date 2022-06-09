<?php
    class Model extends App{

        /** @var string Directorio en el que se ejecuta nuestra app */ 
        protected static $dirBase = false;
        public static function setDirBase($arg) { self::$dirBase = $arg; }

        protected static function data_decode_entity($data):Array{
            foreach ($data as $key => $value) {
                foreach ($value as $key2 => $value2) {
                   if($key2 <> "id") $data[$key][$key2]= html_entity_decode($value2);
                }
            }
            return $data;
        }
        protected static function validData($data):bool{
            $regExp=[
            "name"=>"/^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]{4,16}+$/", // Letras y espacios, pueden llevar tildes.
            "surname"=>"/^[a-zA-ZÀ-ÿ\s]{4,16}$/", // Letras y espacios, pueden llevar tildes.
            "email"=> "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/"
            ];
            foreach($data as $key=>$value) {
                $value=trim($value);
                if(isset($value)){
                    if($key=="name" && !preg_match($regExp['name'],$value)) return false;
                    if($key=="surname" && !preg_match($regExp['surname'],$value)) return false;
                    if($key=="email" && !preg_match($regExp['email'],$value)) return false;
                }else{
                    return false;
                }
            }
            return true;
        }
    }