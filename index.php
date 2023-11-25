<?php
 /**
  * A summary informing the user what the associated element does.
  *
  * A *description*, that can span multiple lines, to go _in-depth_ into the details of this element
  * and to provide some background information or textual references.
  *
  * @param string $myArgument With a *description* of this argument, these may also
  *    span multiple lines.
  *
  * @return void
  */
session_start();//Única ejecución, porque index carga a los demás archivos.

$_SESSION['token'] = md5(uniqid(mt_rand(), true));

date_default_timezone_set('America/Guatemala');

require_once('autoload.php');
require_once('Helpers/Helpers.php');
use Controller\PaginaController;

$pagina = new PaginaController;

$pagina->mostrarInicio();


?>