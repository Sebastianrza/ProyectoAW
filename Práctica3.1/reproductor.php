<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';


//COMPROBAR QUE LA PLAYLIST EXISTE
if(isset($_GET['idPlaylist'])){
    $playlist = $_GET['idPlaylist'];
}

$arr = array();


$idPodcast = $_GET["idPodcast"];
$idPlaylist = $_GET["idPlaylist"];
$rutaPodcast = "archivos/pruebas/".$idPodcast.".mp3";
$listaPodcast = Podcast::muestraListaPodcast($idPlaylist, $idPodcast);

$arr = Podcast::buscaId($idPodcast);
$nombre = Podcast::buscaNombre($idPodcast);



$tituloPagina = 'Lista';
$contenidoPrincipal = <<<EOS


    <audio id = "audio">
    <source src="$rutaPodcast" type="audio/mp3">
    </audio>

    <div class = "reproductor">
        <div class = "podcast-list">
            $arr
        </div>
        <div class = "podcast-list">
            $listaPodcast
        </div>
        <div class ="audio-control">
            $nombre
            <div class = "audio_buttons">
                <button class='btn-audio' onclick = "back()">&laquo</a>
                <button class='btn-audio' onclick = "play()">Play</a>
                <button class='btn-audio' onclick = "pause()">Pause</a>
                <button class='btn-audio' onclick = "advance()">&raquo</a>
                <button class='btn-audio' onclick = "volumeUp()">+</a>
                <button class='btn-audio' onclick = "volumeDown()">-</a>
                <button class='btn-audio' onclick = "muted()">Mute</a>
            </div>
            <div class = "progress-bar">
                <div class = "progressed" id = "progressed"></div>
            </div>
        </div> 
    </div>




    <script src="includes/js/botones.js"></script>

EOS;
require __DIR__.'/includes/plantillas/plantilla.php';
?>