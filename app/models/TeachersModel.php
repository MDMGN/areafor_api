<?php 
class TeachersModel extends Model{

    const NOMBRE_TABLA="tutores";

    private static function verifyTeacher($name,$surname):bool{
        $sql= "SELECT nombre FROM tutores WHERE nombre=:name AND apellidos=:surname";
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
     * Devuelve todos los tutores
     * @return Array con todos los datos
     */
    public static function getAllTeachers():Array{
            
            $sql="SELECT * FROM " . self::NOMBRE_TABLA;
            $response=self::$conn->prepare($sql);
            $response->execute();
            $response->setFetchMode(PDO::FETCH_ASSOC);

            $result = $response->fetchAll();

            if(!self::$conn) 
            throw new Exception(self::$conn->error);

            return self::data_decode_entity($result);
    }

    /**
     * Inserta nuevo tutor
     * @param $teachers array con los datos del nuevo tutor
     * @return Array del resultado de la inserción
     */
    public static function setNewTeacher($teachers):Array{

            $sql = "INSERT INTO " . self::NOMBRE_TABLA . " (`nombre`, `apellidos`, `email`,`conocimientos`)
                    VALUES (:name,:surname,:email,:knowledge)";

            $response = self::$conn->prepare($sql);
            $name=htmlentities(addslashes($teachers['name']));
            $surname=htmlentities(addslashes($teachers['surname']));
            $email=htmlentities(addslashes($teachers['email']));
            $knowledge=addslashes($teachers['knowledge']);
            $data=[
                "name"=>$name,
                "surname"=>$surname,
                "email"=>$email,
                "knowledge"=>$knowledge
            ];
            if(self::validData($data)){
                if(self::verifyTeacher($name,$surname)){
                    header("HTTP/1.1 400 Bad Request");
                    $result=[
                        "error"=>true,
                        "message"=>"El tutor ya existe."
                    ];
                }else{
                    $response->bindValue(":name",$name);
                    $response->bindValue(":surname",$surname);
                    $response->bindValue(":email",$email);
                    $response->bindValue(":knowledge",$knowledge);
                    $response->execute();
                    header("HTTP/1.1 200 OK");
                    $result=[
                        "error"=>false,
                        "message"=>"Tutor insertado exitosamente."
                    ];
                }
            }else{
                header("HTTP/1.1 400 Bad Request");
                $result=[
                    "error"=>true,
                    "message"=>"Error al intentar insertar los datos. Comprueba que los datos sean validos y no estén vacíos."
                ];
            }
            if(!self::$conn) throw new Exception(self::$conn->error);
            return $result;
    }

     /**
     * Actualiza un tutor relacionado con un id de la base de datos 
     * @param $datos nuevos datos
     * @return Array de respuesta
     */
    public static function setTeacher($datos):Array{
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
            $done = $response->rowCount();
            if($done){
                header("HTTP/1.1 200 OK");
                $result=[
                    "error"=>false,
                    "message"=>"Datos actualizados exitosamente."
                ];
            }else{
                header("HTTP/1.1 400 Bad Request");
                $result=[
                    "error"=>true,
                    "message"=>"Error al intentar actulizar los datos. Comprueba que el id sea valido"
                ];
            }
        }else{
            header("HTTP/1.1 400 Bad Request");
            $result=[
                "error"=>true,
                "message"=>"Error al intentar actulizar los datos. Comprueba que los datos sean validos y no estén vacíos."
            ];
        }
        if(!self::$conn) throw new Exception(self::$conn->error);
        return $result;
    }

    /**
     * Elimina un tutor por su id
     * @param $datos con el id
     * @return Array de respuesta
     */
    public static function deleteTeacher($data):Array{

                $sql="DELETE FROM " . self::NOMBRE_TABLA . " WHERE id=:id";
                $response = self::$conn->prepare($sql);
                $id=htmlentities(addslashes($data['id']));
                $response->bindValue(":id", $id);
                $response->execute();
                $res=$response->rowCount();
                if($res>0){
                    header("HTTP/1.1 200 OK");
                    $result=[
                        "error"=>false,
                        "message"=>"Alumno eliminado exitosamente"
                    ];
                }else{
                    header("HTTP/1.1 400 Bad Request");
                    $result=[
                        "error"=>true,
                        "message"=>"Error al intentar la eliminación. Comprueba que el id es valido."
                    ];
                }
                if(!self::$conn) throw new Exception(self::$conn->error);
                return $result;

    }
}