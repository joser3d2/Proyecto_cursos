<?php
namespace Controller\Trait\Categoria;
require_once('vendor/autoload.php'); //Composer
use FPDF;
use Controller\PDF;//Header y Footer

trait pdfCategoria{
    
    public function pdfCategorias(){
        $categoriasAllDB = $this->mostrar();
        $pdf = new PDF();
        $pdf->title="Categoria";
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);
        foreach($categoriasAllDB as $categoria){
            $pdf->Cell(0,10,$categoria["id"]." ".$categoria["categoria"],0,1);
        }
        ob_end_clean();//Limpiar las etiquetas del header
        $pdf->Output();
    }
}