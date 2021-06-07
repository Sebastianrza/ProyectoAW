<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';

//COMPROBAR QUE LA PLAYLIST EXISTE
if(isset($_GET["idPodcast"]) and $_SESSION['login']){
    $playlist = $_GET["idPodcast"];
}else{
    header("Location: login.php");
}


//$_SESSION['Titulo'] = $_GET['Titulo'];
//$playlist = $_SESSION['Titulo'];
$lista = Playlist::muestraPlaylistUser($_SESSION['nombre'], $playlist);

$arr = array();
$play='subirPlaylist.php';
$tituloPagina = 'Agregar Podcast a Playlist';
$contenidoPrincipal = <<<EOS
    $lista
    <a class='btn-prueba' href='$play'>Crea Playlist</a>
EOS;
require __DIR__.'/includes/plantillas/plantilla.php';
?>
