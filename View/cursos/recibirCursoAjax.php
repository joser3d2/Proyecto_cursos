<?php
    use Controller\CursoController;
    $curso = new CursoController();

    
    $mensaje = 'Los datos recibidos son: '.$_POST['campo'].', Aca terminan';
    $data = array('mensaje' => $mensaje);
    ob_clean();
    header_remove();
    header("Content-type: application/json; charset=utf-8");
    echo json_encode($data);
    exit();
    
?>