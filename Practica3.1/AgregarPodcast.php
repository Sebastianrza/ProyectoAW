<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';

//COMPROBAR QUE LA PLAYLIST EXISTE
if(isset($_GET["idPodcast"])){
    $playlist = $_GET["idPodcast"];
}


//$_SESSION['Titulo'] = $_GET['Titulo'];
//$playlist = $_SESSION['Titulo'];
$lista = Playlist::muestraPlaylistUser($_SESSION['nombre'], $playlist);

$arr = array();

$tituloPagina = 'Agregar Podcast a Playlist';
$contenidoPrincipal = <<<EOS
    $lista
EOS;
require __DIR__.'/includes/plantillas/plantilla.php';
?>
