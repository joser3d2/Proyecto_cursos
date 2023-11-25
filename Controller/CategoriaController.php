<?php

namespace Controller;
use Model\CategoriaModel;

class CategoriaController{

    public function mostrar(){
        $inscripcion = CategoriaModel::mostrarCategoria();
        return $inscripcion;//se van a la vista
    }

    public function mostrarCursos(){
        if(!empty($_POST['idcategoria'])){
            //Filtro para esos valores
            $cursos = CategoriaModel::mostrarCursoCategoria($_POST['idcategoria']);
            return $cursos;
        }
    }
}

?>