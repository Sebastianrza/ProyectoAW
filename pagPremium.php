<?php 

require_once __DIR__.'/includes/config.php';

$premium = new es\ucm\fdi\aw\premium();
$prem = $premium->gestionaPremium();

$tituloPagina = 'Hazte Premium';
$contenidoPrincipal = <<<EOS
<h1>HAZTE PREMIUM USER</h1>
$prem
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';