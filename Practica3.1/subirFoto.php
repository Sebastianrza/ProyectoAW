<?php

require_once __DIR__.'/includes/config.php';

$form = new es\ucm\fdi\aw\FormularioSubirFoto();
$htmlFormLogin = $form->gestiona();

$tituloPagina = 'Subida de Foto';

$contenidoPrincipal = <<<EOS
<h1>Seleccionar tu Foto de Perfil</h1>
$htmlFormLogin
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';