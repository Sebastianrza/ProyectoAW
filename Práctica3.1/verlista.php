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

$arr = array();

$tituloPagina = 'Lista';
$contenidoPrincipal = <<<EOS
$lista
EOS;
require __DIR__.'/includes/plantillas/plantillaForo.php';
?>