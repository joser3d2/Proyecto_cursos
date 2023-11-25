<?php

namespace Controller;
use Model\InscripcionModel;

class InscripcionController{

    public function inscribir(){
        if( !empty($_POST['idcurso'])){
            $datos = array(
                "idcurso" => $_POST['idcurso'],
                "fecha" => date("Y/m/d")
            );
            $respuesta = InscripcionModel::guardarInscripcion($datos);

            return $respuesta ? "guardado" : "error";
        }
    }

    public function mostrar(){
        $inscripcion = InscripcionModel::mostrarInscripcion();
        return $inscripcion;//se van a la vista
    }

    public function editar(){
        $idInscripcion = $_GET['idInscripcion'];
        $inscripcion = InscripcionModel::editarInscripcion($idInscripcion);
        return $inscripcion;
    }

    public function actualizar(){
        if( !empty($_POST['idInscripcionn']) && !empty($_POST['idcurso']) ){
            $datos = array(
                "idinscripcion" => $_POST['idInscripcion'],
                "idcurso" => $_POST['idcurso'],
                "idusuario" => $_SESSION['id']
            );
            //Enviando los datos al modelo, para que se actualice el registro.
            $respuesta = InscripcionModel::actualizarInscripcion($datos);

            if($respuesta){ header("Location: index.php?action=verinscripcion"); }
        }
    }

    public function borrar(){
        if( !empty($_GET['idInscripcion'])){
            $inscripcion = InscripcionModel::borrarInscripcion($_GET['idInscripcion']);
            return $inscripcion;
        }
    }

    public function confirmarBorrar(){
        if( !empty($_POST['idInscripcion'])){
            $inscripcion = InscripcionModel::borrarConfirmadoInscripcion($_POST['idInscripcion']);
            if($inscripcion){ header("Location: index.php?action=verinscripcion"); }
        }
        
    }

}

?>