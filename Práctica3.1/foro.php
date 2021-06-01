<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';

$form = new FormularioForo();
$htmlFormForo = $form->gestiona();

$muestraForo = Podcast::muestraForo();

$tituloPagina = 'Foro';

$contenidoPrincipal = <<<EOS
$htmlFormForo
$muestraForo
EOS;
require __DIR__.'/includes/plantillas/plantillaForo.php';