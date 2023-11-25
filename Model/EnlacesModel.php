<?php

namespace Model;

class EnlacesModel{

    public static function enlacesPagina($enlace){
        $modulo = match($enlace){
            "inicio" => "View/inicio.php",
            "contacto" => "View/contacto.php",
            "nosotros" => "View/nosotros.php",
            "inscripcion" => "View/inscripcion.php",
            "verinscripcion" => "View/mostrarinscripcion.php",
            "editarInscripcion" => "View/editarInscripcion.php",
            "eliminarInscripcion" => "View/eliminarInscripcion.php",
            "login" => "View/login.php",
            "logout" => "View/logout.php",
            "inscripcioncategoria" => "View/inscripcioncategoria.php",
            "crearUsuarioEstudiante" => "View/nuevoUsuario.php",
            "grafica" => "View/grafica.php",
            "pdf" => "View/pdf.php",
            "mostrarTablas" => "View/mostrarTablas.php",
            "recibirCursoAjax" => "View/recibirCursoAjax.php",
            "enviarCursoAjax" => "View/enviarCursoAjax.php",
            default => "View/error.php"
        };
        return $modulo;
    }

}

?>