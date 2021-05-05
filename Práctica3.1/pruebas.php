<?php

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/FormularioSubirPodcast.php';

$form = new es\ucm\fdi\aw\FormularioSubirPodcast();
$htmlFormRegistro = $form->gestiona();

$tituloPagina = 'Registro';

$contenidoPrincipal = <<<EOS
<h1>Registro de usuario</h1>
$htmlFormRegistro
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';