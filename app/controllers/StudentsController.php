<?php
require_once('app/models/StudentsModel.php');
global $dirBase;
global $errorDb;
global $json;
$peticion=getRequest();
    switch ($peticion) {
        case 'GET':
            peticionGet();
            break;
        case 'POST':
            peticionPost();
            break;
        case 'DELETE':
            peticionDelete();
            break;
        case 'PUT':
            peticionPut();
            break;
        default:
            header("HTTP/1.1 400 Bad Request");
    }
/**
 * Comprueba si en la petición viene un parámetro id
 * llama a la función que corresponda
 * muestra el resultado
 */
function peticionGet(){
    $json=Students::getAllStudetns();
    respuesta($respuesta);
}

/**
 * llama a la función que guarda los datos del nuevo registro
 * muestra el resultado
 */
function peticionPost(){
    $respuesta = Clientes::setNewCliente($_POST);
    respuesta($respuesta);
}

/**
 * llama a la función que elimina un registro
 *  muestra el resultado
 */
function peticionDelete(){
    $respuesta = Clientes::deleteCliente($_GET);
    respuesta($respuesta);
}

/**
 * llama a la función que modifica un registro
 * muestra el resultado
 */
function peticionPut(){
    respuesta(Clientes::modificaCliente($_GET));
}
  /**
   * Devuelve las cabeceras de la petición
   * dependiendo si el servidor es apache o nginx
   */
  function getRequest(){
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
  require_once('app/views/StudentView.php');
?>