<?php

require_once __DIR__.'/includes/config.php';

$form = new es\ucm\fdi\aw\FormularioCrearPlaylist();
$htmlFormLogin = $form->gestiona();

$tituloPagina = 'Crear Playlist';

$contenidoPrincipal = <<<EOS
<h1>Crear Playlist</h1>
$htmlFormLogin
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';