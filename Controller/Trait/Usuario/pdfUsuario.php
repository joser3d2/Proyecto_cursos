<?php
namespace Controller\Trait\Usuario;
require_once('vendor/autoload.php'); //Composer

use Controller\PDF;//Header y Footer

trait pdfUsuario{
    public function pdfUsuarios(){
        $usuarioAllDB = $this->listarUsuarios();
        $pdf = new PDF();
        $pdf->title="Usuarios";
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);
        foreach($usuarioAllDB as $usuario){
            $pdf->Cell(0,10,$usuario["id"]." ".$usuario["nombres"],0,1);
        }
        ob_end_clean();//Limpiar las etiquetas del header
        $pdf->Output();
    }
}

?>