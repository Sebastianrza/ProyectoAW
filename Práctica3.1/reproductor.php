<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';

$tituloPagina = 'Reproductor';

$arr = array();

$idPodcast = $_GET["idPodcast"];
$rutaPodcast = "archivos/pruebas/".$idPodcast.".mp3";

$arr = Podcast::buscaId();


$contenidoPrincipal = <<<EOS

    <audio id = "audio">
    <source src="$rutaPodcast" type="audio/mp3">
    </audio>

    <div class = "reproductor">
        <div class = "podcast-list">
            $arr
        </div>
        <div class = "audio_buttons">
            <a class='btn-audio' href = "#edit-perfil" onclick = "back()">&laquo</a>
            <a class='btn-audio' href = "#edit-perfil" onclick = "play()">Play</a>
            <a class='btn-audio' href = "#edit-perfil" onclick = "pause()">Pause</a>
            <a class='btn-audio' href = "#edit-perfil" onclick = "advance()">&raquo</a>
            <a class='btn-audio' href = "#edit-perfil" onclick = "volumeUp()">+</a>
            <a class='btn-audio' href = "#edit-perfil" onclick = "volumeDown()">-</a>
            <a class='btn-audio' href = "#edit-perfil" onclick = "muted()">Mute</a>
        </div> 
    </div>

            <div class = "progress-bar">
                <div class = "progressed" id = "progressed"></div>
            </div>


    <script src="includes/js/botones.js"></script>

    EOS;

require __DIR__.'/includes/plantillas/plantilla.php';