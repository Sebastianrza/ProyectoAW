<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';

$tituloPagina = "Actualizar registros";
$nombreU = $_GET['id'];
$usuario = Usuario::VerDatos($nombreU);
$contenidoPrincipal = <<<EOS
        $usuario
EOS;

require __DIR__.'/includes/plantillas/plantillaAdmin.php';


?>