<?php

final class StudentsModel extends Model {
    const NOMBRE_TABLA = "alumnos";

    private static function validData($data):bool{
        $regExp=[
        "name"=>"/^[a-zA-ZÀ-ÿ\s]{4,16}$/", // Letras y espacios, pueden llevar tildes.
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
    private static function verifyStudent($name,$surname):bool{
        $sql= "SELECT nombre FROM alumnos WHERE nombre=:name AND apellidos=:surname";
        $result=self::$conn->prepare($sql);
        $result->bindValue(":name",$name);
        $result->bindValue(":surname",$surname);
        $result->execute();

        if(!self::$conn) 
            throw new Exception(self::$conn->error);

        $count=$result->rowCount();
        if($count > 0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Devuelve todos los alumnos
     * @return lista con todos los clientes o error
     */
    public static function getAllStudents():Array{
            
            $sql="SELECT * FROM " . self::NOMBRE_TABLA;
            $response=self::$conn->prepare($sql);
            $response->execute();
            $response->setFetchMode(PDO::FETCH_ASSOC);

            $result = $response->fetchAll();

            if(!self::$conn) 
            throw new Exception(self::$conn->error);

            return $result;
    }

    /**
     * Inserta nuevo alumno
     * @param $student array con los datos del nuevo alummno
     * @return {Array} del resultado de la inserción
     */
    public static function setNewStudent($student):Array{

            $sql = "INSERT INTO " . self::NOMBRE_TABLA . " (`nombre`, `apellidos`, `email`,`conocimientos`)
                    VALUES (:name,:surname,:email,:knowledge)";

            $response = self::$conn->prepare($sql);
            $name=htmlentities(addslashes($student['name']));
            $surname=htmlentities(addslashes($student['surname']));
            $email=htmlentities(addslashes($student['email']));
            $knowledge=htmlentities(addslashes($student['knowledge']));
            $data=[
                "name"=>$name,
                "surname"=>$surname,
                "email"=>$email,
                "knowledge"=>$knowledge
            ];
            if(self::validData($data)){
                if(self::verifyStudent($name,$surname)){
                    $result=[
                        "error"=>true,
                        "message"=>"El estudiante ya existe."
                    ];
                }else{
                    $response->bindValue(":name",$name);
                    $response->bindValue(":surname",$surname);
                    $response->bindValue(":email",$email);
                    $response->bindValue(":knowledge",$knowledge);
                    $response->execute();
                    $result=[
                        "error"=>false,
                        "message"=>"Estudiante insertado exitosamente."
                    ];
                }
            }else{
                $result=[
                    "error"=>true,
                    "message"=>"Error al intentar insertar los datos. Comprueba que los datos sean validos y no estén vacíos."
                ];
            }
            if(!self::$conn) throw new Exception(self::$conn->error);
            return $result;
    }

     /**
     * Actualiza un alumno relacionado con un id de la base de datos 
     * @param $datos nuevos datos
     * @return resultado de la modificación
     */
    public static function setStudent($datos){
        $sql = "UPDATE " . self::NOMBRE_TABLA . " SET nombre =:name, apellidos=:surname, email= :email,
                conocimientos=:knowledge WHERE id =:id";

        $response = self::$conn->prepare($sql);
        $name=htmlentities(addslashes($datos['name']));
        $surname=htmlentities(addslashes($datos['surname']));
        $email=htmlentities(addslashes($datos['email']));
        $knowledge=htmlentities(addslashes($datos['knowledge']));
        $id=htmlentities(addslashes($datos['id']));
        $data=[
            "name"=>$name,
            "surname"=>$surname,
            "email"=>$email,
            "knowledge"=>$knowledge
        ];
        if(self::validData($data)){
            $response->bindValue(":name",$name);
            $response->bindValue(":surname",$surname);
            $response->bindValue(":email",$email);
            $response->bindValue(":knowledge",$knowledge);
            $response->bindValue(":id",$id);
            $response->execute();
            $result=[
                "error"=>false,
                "message"=>"Datos actualizados exitosamente."
            ];
        }else{
            $result=[
                "error"=>true,
                "message"=>"Error al intentar actulizar los datos. Comprueba que los datos sean validos y no estén vacíos."
            ];
        }
        if(!self::$conn) throw new Exception(self::$conn->error);
        return $result;
    }

    /**
     * Elimina un alumno por su id
     * @param $datos con el id
     * @return resultado de la eliminación
     */
    public static function deleteStudent($data){

                $sql="DELETE FROM " . self::NOMBRE_TABLA . " WHERE id=:id";
                $response = self::$conn->prepare($sql);
                $id=htmlentities(addslashes($data['id']));
                $response->bindValue(":id", $id);
                $response->execute();
                $reg=$response->rowCount();
                if($reg>0){
                    $result=[
                        "error"=>false,
                        "message"=>"Alumno eliminado exitosamente"
                    ];
                }else{
                    $result=[
                        "error"=>true,
                        "message"=>"Error al intentar la eliminación. Comprueba que el id es valido."
                    ];
                }
                if(!self::$conn) throw new Exception(self::$conn->error);
                return $result;

    }

}