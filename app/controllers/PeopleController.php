<?php
require_once('app/models/PeopleModel.php');
/**
 * Configuración de las cabeceras en la APIRest.
 */
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-type:application/json; charset=utf-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");

global $dirBase;
global $errorDb;
global $json;
$request=$_SERVER['REQUEST_METHOD'];
    try{
        if(http_response_code()===500){
            $json=[
                "error"=>true,
                "status"=>500,
                "message"=>"Error en el servidor."
            ];
        }else if(http_response_code()===404){
            $json=[
                "error"=>true,
                "status"=>404,
                "message"=>"El endpoint no existe."
            ];
        }else if(!PeopleModel::verifyAccess() && $request!=="GET"){
            header("HTTP/1.1 401 Unauthorized");
            $json=[
                "error"=>true,
                "status"=>401,
                "message"=>"No tienes autorización. Error con la llave API."
            ];
        }else{
            switch ($request) {
                case 'GET':
                    $json=(!isset($_GET['id'])) ? PeopleModel::getAllPeople() : PeopleModel::getPeopleById($_GET['id']);
                    break;
                case 'POST':
                    $json=PeopleModel::setNewPerson($_POST);
                    break;
                case 'PUT':
                    parse_str(file_get_contents("php://input"),$put_vars);
                    $json=PeopleModel::setPerson($put_vars);
                    break;
                case 'DELETE':
                    parse_str(file_get_contents("php://input"),$delete_vars);
                    $json=PeopleModel::deletePerson($delete_vars);
                    break;
                default:
                    header("HTTP/1.1 501 Not Implemented");
                    $json=[
                        "error"=>true,
                        "status"=>501,
                        "message"=>"La petición no es soportada por el servidor."
                    ];
            }
        }
    }catch(Exception $e){
        header("HTTP/1.1 500 Server Error");
        $json=[
            "error"=>true,
            "status"=>500,
            "message"=>"El servidor no ecuentra respuesta. $e"
        ];
        $errorDb=true;
    }
  /**
   * Devuelve las cabeceras de la petición
   * dependiendo si el servidor es apache o nginx
   */
  /* function apache_repliciment_to_nginx(){
    // apache_request_headers replicement for nginx
    if (!function_exists('apache_request_headers')) {
                foreach($_SERVER as $key=>$value) {
                    if (substr($key,0,5)=="HTTP_") {
                        $key=str_replace(" ","-",strtolower(str_replace("_"," ",substr($key,5))));
                        $out[$key]=$value;
                    }else{
                        $out[$key]=$value;
    		}
                }
                return $out;
    }else{
      return apache_request_headers();
    }
  } */
  require_once('app/views/PeopleView.php');
?>