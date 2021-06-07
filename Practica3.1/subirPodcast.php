<?php

require_once __DIR__.'/includes/config.php';

$form = new es\ucm\fdi\aw\FormularioSubirPodcast();
$htmlFormLogin = $form->gestiona();

$tituloPagina = 'Subida de Podcast';

$contenidoPrincipal = <<<EOS
<h1>Subir Podcast</h1>
$htmlFormLogin
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';