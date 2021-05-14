<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';

//$htmlFormLogin = $form->gestiona();
$tituloPagina = 'Perfil del Usuario';

$idPodcast = $_GET["idPodcast"];
$rutaPodcast = "archivos/pruebas/".$idPodcast.".mp3";
$reproductor = reproductor::;

$arr = array();
$arr = reproductor->muestraPodcast();

foreach($arr as $dat){
    $dat['idPodcast'];
}


$contenidoPrincipal = <<<EOS

<audio id = "audio">
            <source src="$rutaPodcast" type="audio/mp3">
        </audio>
        
        <div class = "audio_buttons">
            <input type="button" value="Play" onclick="play();">
            &nbsp;
            &nbsp;
            <input type="button" value="Pause" onclick="pause();">
            &nbsp;
            &nbsp;
            <input type="button" value="+" onclick="volumeUp();">
            &nbsp;
            &nbsp;
            <input type="button" value="-" onclick="volumeDown();">
            &nbsp;
            &nbsp;
            <input type="button" value="&laquo" onclick="back();">
            &nbsp;
            &nbsp;
            <input type="button" value="&raquo" onclick="advance();">
            <br><br><br>
        </div>     
        
        <script src="includes/js/botones.js"></script>

EOS;

require __DIR__.'/includes/plantillas/plantilla.php';

