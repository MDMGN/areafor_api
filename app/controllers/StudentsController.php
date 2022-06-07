<?php
require_once('app/models/StudentsModel.php');
global $dirBase;
global $errorDb;
global $json;
$peticion=$_SERVER['REQUEST_METHOD'];
    try{
        switch ($peticion) {
            case 'GET':
                $json=StudentsModel::getAllStudents();
                break;
            case 'POST':
                $json=StudentsModel::setNewStudent($_POST);
                break;
            case 'PUT':
                $json=StudentsModel::setStudent($_REQUEST);
                break;
            case 'DELETE':
                $json=StudentsModel::deleteStudent($_REQUEST);
                break;
            default:
                header("HTTP/1.1 400 Bad Request");
        }
    }catch(Exception $e){
        die($e);
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
  require_once('app/views/StudentsView.php');
?>