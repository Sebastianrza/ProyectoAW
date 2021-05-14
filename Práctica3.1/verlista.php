<?php

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Lista.php';

$lista = new es\ucm\fdi\aw\Lista();
$list = $lista->mostrarListas();

$tituloPagina = 'Lista';
$contenidoPrincipal = <<<EOS
<h1>HAZTE PREMIUM USER</h1>
$list
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>