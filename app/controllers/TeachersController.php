<?php
require_once('app/models/TeachersModel.php');
global $dirBase;
global $errorDb;
global $json;
$request=$_SERVER['REQUEST_METHOD'];
    try{
        switch ($request) {
            case 'GET':
                $json=StudentsModel::getAllTeachers();
                break;
            case 'POST':
                $json=StudentsModel::setNewTeacher($_POST);
                break;
            case 'PUT':
                parse_str(file_get_contents("php://input"),$put_vars);
                $json=StudentsModel::setTeacher($put_vars);
                break;
            case 'DELETE':
                parse_str(file_get_contents("php://input"),$delete_vars);
                $json=StudentsModel::deleteTeacher($delete_vars);
                break;
            default:
                header("HTTP/1.1 400 Bad Request");
        }
    }catch(Exception $e){
        header("HTTP/1.1 500 Server Error");
        $errorDb=true;
    }