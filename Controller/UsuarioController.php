<?php

namespace Controller;
use Model\UsuarioModel;

class UsuarioController{

    public function login(){
        $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(!empty($token) && !empty($_POST['usuario']) && !empty($_POST['password'])){//validar si se disparó el formulario
            $usuario = strClean($_POST['usuario']);
            $password = strClean($_POST['password']);
            //La comparación para ver si los datos coinciden
            $datos = array(
                'usuario' => $usuario,
            );

            $respuesta = UsuarioModel::login($datos);//Recibiendo todos los datos

            //Comparar la contraseña cifrada, de la contraseña del form.
            $resultado = password_verify($password,$respuesta['password']);

            if($resultado==true){//Hubo coincidencia
                $_SESSION['usuario'] = $respuesta['usuario'];
                $_SESSION['nombres'] = $respuesta['nombres'];
                $_SESSION['apellidos'] = $respuesta['apellidos'];
                $_SESSION['id'] = $respuesta['id'];
                //Rol
                header("location: index.php?action=inicio&id={$respuesta['id']}");
            }else{
                //mensaje error
                return "error";
            }
        }
    }

    public function logout(){
        session_destroy();
        header("location: index.php?action=inicio");
    }

    public function crearUsuarioEstudiante(){
        if(!empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['nombres'])){

            $usuario=strClean($_POST['usuario']);
            $password=strClean($_POST['password']);

            $password = password_hash($password,PASSWORD_ARGON2ID);//Contraseña cifrada

            $nombres=strClean($_POST['nombres']);
            $apellidos=strClean($_POST['apellidos']);

            $datos = array(
                'usuario' => $usuario,
                'password' => $password,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'rol' => 'e',
            );
            $respuesta = UsuarioModel::guardarUsuarioEstudiante($datos);

            return $respuesta;
        }
    }

    public function saluda(){
        return "hola";
    }

}

?>