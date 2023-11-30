<?php
namespace Controller\Trait\Usuario;
use Model\UsuarioModel;

trait listPdfUsuario{
    public function listarUsuarios(){
        $listado = UsuarioModel::mostrarUsuariosPdf();
        return $listado;
    }
}
?>