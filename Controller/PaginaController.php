<?php

namespace Controller;
use Model\EnlacesModel;

class PaginaController{

    
    /**
     * mostrarInicio
     *La página que coloca la página de la vista inicio
     * @return void
     */
    public function mostrarInicio(){
        require_once("view/template.php");
    }

    public function enlacesPagina(){
        if(isset($_GET['action'])){//Está definida la var. action?
            //Me llevará al modelo
            $enlace = $_GET['action'];
        }else{//Me llevará a la página de inicio.
            $enlace = "inicio";
        }
        $respuesta = EnlacesModel::enlacesPagina($enlace);//El modelo devuelve la ruta de la pág

        require_once($respuesta);
    }

}

?>