<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';

$id = $_GET['id'];

$muestraRespuestas = Podcast::respuestasForo();
$form = new FormularioForo();
$htmlFormForo = $form->gestiona();

$tituloPagina = 'Foro';

$contenidoPrincipal = <<<EOS
$htmlFormForo
$muestraRespuestas

EOS;
require __DIR__.'/includes/plantillas/plantillaForo.php';