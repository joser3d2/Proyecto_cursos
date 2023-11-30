<?php

namespace Controller;
use Model\CategoriaModel;
use Controller\PDF;
use Controller\Trait\Categoria\pdfCategoria;


class CategoriaController{
    use pdfCategoria;

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