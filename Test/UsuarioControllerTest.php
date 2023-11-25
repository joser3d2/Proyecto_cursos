<?php
namespace Test;

use PHPUnit\Framework\TestCase;
use Controller\UsuarioController;

class UsuarioControllerTest extends TestCase{
    public function testHolaMundo(){
        $usuario = new UsuarioController();
        $this->assertEquals('hola',$usuario->saluda());
    }
}

?>