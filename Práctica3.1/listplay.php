<?php
require_once __DIR__.'/includes/config.php';

$listplay = new es\ucm\fdi\aw\Playlist();
$tituloPagina = 'Playlist';
$playlist = $listplay->muestraPlaylist($_GET["idPlaylist"]);
$contenidoPrincipal = <<<EOS
<h1>Todas las playlist</h1>
$playlist
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>