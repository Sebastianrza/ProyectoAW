<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';


//COMPROBAR QUE LA PLAYLIST EXISTE
if(isset($_GET['idPlaylist'])){
    $playlist = $_GET['idPlaylist'];
}

$arr = array();
$nombreAudios = array();
$idPodcast = $_GET["idPodcast"];
$idPlaylist = $_GET["idPlaylist"];
$nombreArchivo = Podcast::getPodcastName($idPodcast);
$audios = Podcast::getPlaylistArray($idPlaylist);

//funcion para conseguir todos los podcast que pertenecen a esta playlist
$listaPodcast = Podcast::muestraListaPodcast($idPlaylist, $idPodcast);
$idVarios = Podcast::getPlaylistPodcastId($idPlaylist);

$arr = Podcast::buscaId($idPodcast,$idPlaylist);
$nombre = Podcast::buscaNombre($idPlaylist, $idPodcast);

/*if(numPodcast == $nombreArchivo){
    $next = 0;
} else{
    $next = $nombreArchivo + 1;
}*/


$html = "";
$html .= "<audio autoplay id = \"audio\" src=\"archivos/pruebas/$nombreArchivo\"> ";
foreach($audios as $a){
    $source = <<<EOS
    <source id="$a[idPodcast]"  src="archivos/pruebas/$a[filename] ">
    EOS;
    $html .= $source;
}


$html .= "</audio>";

$contenido = <<<EOS
    <div class = "reproductor">
        <div class = "podcastreproduciendo-contenedor">
            $arr
        </div>
        <div class = "podcast-list">
            $listaPodcast
        </div>
        <div class ="audio-control">
            $nombre
            <div class = "audio_buttons">
                <button class='btn-audio' id="previous" ">PREVIOUS</a>
                <button class='btn-audio' onclick = "back()">&laquo</a>
                <button class='btn-audio' onclick = "play()">Play</a>
                <button class='btn-audio' onclick = "pause()">Pause</a>
                <button class='btn-audio' onclick = "advance()">&raquo</a>
                <button class='btn-audio' onclick = "volumeUp()">+</a>
                <button class='btn-audio' onclick = "volumeDown()">-</a>
                <button class='btn-audio' onclick = "muted()">Mute</a>
                <button class='btn-audio' id="next">NEXT</a>
            </div>
            <div class = "progress-bar">
                <div class = "progressed" id = "progressed"></div>
            </div>

        </div> 
    </div>
    <script src="includes/js/botones.js"></script>
EOS;

$html .= $contenido;

$tituloPagina = 'Lista';
$contenidoPrincipal = <<<EOS
    $html
EOS;
require __DIR__.'/includes/plantillas/plantilla.php';

?>