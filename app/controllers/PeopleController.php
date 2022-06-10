<?php
require_once('app/models/PeopleModel.php');
global $dirBase;
global $errorDb;
global $json;
$request=$_SERVER['REQUEST_METHOD'];
    try{
        switch ($request) {
            case 'GET':
                $json=PeopleModel::getAllPeople();
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
                header("HTTP/1.1 400 Bad Request");
        }
    }catch(Exception $e){
        header("HTTP/1.1 500 Server Error");
        $errorDb=true;
    }
  /**
   * Devuelve las cabeceras de la petición
   * dependiendo si el servidor es apache o nginx
   */
  function apache_repliciment_to_nginx(){
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
  }
  require_once('app/views/PeopleView.php');
?>