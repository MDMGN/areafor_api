<?php
require_once('app/models/TeachersModel.php');
global $dirBase;
global $errorDb;
global $json;
$request=$_SERVER['REQUEST_METHOD'];
    try{
        switch ($request) {
            case 'GET':
                $json=TeachersModel::getAllTeachers();
                break;
            case 'POST':
                $json=TeachersModel::setNewTeacher($_POST);
                break;
            case 'PUT':
                parse_str(file_get_contents("php://input"),$put_vars);
                $json=TeachersModel::setTeacher($put_vars);
                break;
            case 'DELETE':
                parse_str(file_get_contents("php://input"),$delete_vars);
                $json=TeachersModel::deleteTeacher($delete_vars);
                break;
            default:
                header("HTTP/1.1 400 Bad Request");
        }
    }catch(Exception $e){
        header("HTTP/1.1 500 Server Error");
        die($e." Line:".$e->getLine());
        $errorDb=true;
    }
require_once("app/views/TeachersView.php");