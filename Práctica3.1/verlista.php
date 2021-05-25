<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';


//COMPROBAR QUE LA PLAYLIST EXISTE
if(isset($_GET['idPlaylist'])){
    $playlist = $_GET['idPlaylist'];
}
//$_SESSION['Titulo'] = $_GET['Titulo'];
//$playlist = $_SESSION['Titulo'];
$lista = Playlist::buscaPlaylist($playlist);

$descripcion = $lista->getdescripcion();
$Titulo = $lista->getTitulo();
$idPropietario = $lista->getidPropietario();
$imagen = $lista->getimagen();
$lista = new Playlist($Titulo, $descripcion, $idPropietario, $imagen);
$lista = $lista->muestraPlaylist($_GET["idPlaylist"]);


$tituloPagina = 'Lista';
$contenidoPrincipal = <<<EOS
$lista

<audio id = "audio">
<source src="" type="audio/mp3">
</audio>

<div class = "reproductor">
    <div class ="audio-control">
        
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