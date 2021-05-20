<?php

use es\ucm\fdi\aw\Playlist;

require_once __DIR__.'/includes/exploraplaylist.php';
require_once __DIR__.'/includes/Aplicacion.php';

$explaylist = new es\ucm\fdi\aw\exploraPlaylist();
//$list = $explaylist->muestralistaPlaylist();

$tituloPagina = 'Explora';
$contenidoPrincipal = <<<EOS
<h1>Todas las playlist</h1>
EOS;
$tituloPagina = 'exploraPlaylist';

$arr = array();

$arr = Playlist::getAll();

$contenidoPrincipal = <<<EOS

    <div class = "Playlist">
    <h1 class="tituloexplora">Todas las playlist</h1>
        <div class = "podcast-list">
            $arr
        </div>
    </div>
    <script src="includes/js/botones.js"></script>

    EOS;                                                                    
    
require __DIR__.'/includes/plantillas/plantilla.php';


?>