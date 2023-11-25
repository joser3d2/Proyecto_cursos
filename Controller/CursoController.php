<?php

namespace Controller;
use Model\CursoModel;

class CursoController{

    public function mostrar(){
        $curso = CursoModel::mostrarCurso();
        return $curso;//se van a la vista
    }

    public function getCurso(){
        if($_POST){
            $data = json_decode(file_get_contents("php://input"), true);
            echo "Hello, " . $data["name"] . "!";
            echo PHP_EOL;
            echo "hola";
        }
        else{
            echo "error";
        }
    }

}

?>