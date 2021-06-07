<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';

$ID = $_GET['ID'];
$idPlaylist = $_GET['idPlaylist'];

$muestraRespuestas = Podcast::respuestasForo($ID, $idPlaylist);
$form = new FormularioForo();
$htmlFormForo = $form->gestiona();

$tituloPagina = 'Foro';

$contenidoPrincipal = <<<EOS
$htmlFormForo
$muestraRespuestas
EOS;
require __DIR__.'/includes/plantillas/plantilla.php';