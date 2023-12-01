<?php
/** 
 * Generar PDF con DomPdf, etiquetas html
 **/
namespace Controller;
require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Controller\UsuarioController;

class PdfController{
    
    /**
     * @function generate generar el pdf conectandose a la BD
     */
    public function generate(){
        $usuarios = new UsuarioController();
        $listUsuarios = $usuarios->listarUsuarios();
        $dompdf = new Dompdf();
        $headerTable= '
        <style>
            body { background-color: white; }
            p { background-color: white; }
            table, th, td {
                border: 1px solid;
              }
        </style>
        
        <h1>Listado de participantes</h1>
        <br>
        <center><p>Alumnos inscritos</p>
        <center><table style="border: 1px solid black;">
            <tr>Nombres</tr>
            <tr>Apellidos</tr>
            <tr>';

        $footerTable='</table>';

        $bodyTable="";
        foreach($listUsuarios as $usuario){
            $bodyTable = $bodyTable."<tr><td>".$usuario['nombres']."</td>"."<td>".$usuario['apellidos']."</td></tr>";
        }

        $completeTable = $headerTable.$bodyTable.$footerTable;

        $dompdf->loadHtml($completeTable);
        $dompdf->render();
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=documento.pdf");
        
        ob_end_clean();//Limpiar las etiquetas del header
        $dompdf->stream();//Descargar el pdf del navegador
    }
}
?>