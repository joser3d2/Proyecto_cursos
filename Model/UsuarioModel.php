<?php

namespace Model;

use Model\ConexionModel;

class UsuarioModel{

    public static function login($datos){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM usuario where usuario=:usuario");
        $stmt->bindParam(":usuario", $datos['usuario'], \PDO::PARAM_STR);
        $stmt->execute();
        //Si hay un resultado que coincide
        return $stmt->fetch();//devolviendo la respuesta
    }


    public static function guardarUsuarioEstudiante($datos){
    try{
        $stmt = ConexionModel::conectar()->prepare("INSERT INTO usuario (nombres,apellidos,usuario,password,rol) VALUES (:nombres,:apellidos,:usuario,:password,:rol)");
        $stmt->bindParam(":nombres", $datos['nombres'], \PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos['apellidos'], \PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos['usuario'], \PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos['password'], \PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datos['rol'], \PDO::PARAM_STR);
        //Delete o update
        //No ejecución de Código SQL
        return $stmt->execute() ? true : false;
        }catch( \Throwable $th ){
            return $th;
        }
    }


}

?>