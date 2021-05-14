<?php
require_once __DIR__.'/includes/exploraplaylist.php';
require_once __DIR__.'/includes/Aplicacion.php';

$explaylist = new es\ucm\fdi\aw\exploraPlaylist();
$list = $explaylist->muestralistaPlaylist();

$tituloPagina = 'Explora';
$contenidoPrincipal = <<<EOS
<h1>Todas las playlist</h1>
$list
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';


?>