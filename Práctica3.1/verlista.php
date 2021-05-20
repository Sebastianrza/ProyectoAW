<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/lista.php';

//COMPROBAR QUE LA PLAYLIST EXISTE
if(isset($_GET['idPlaylist'])){
    $playlist = $_GET['idPlaylist'];
}
     //   $_SESSION['Titulo'] = $_GET['Titulo'];
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
<h1>HAZTE PREMIUM USER</h1>1
$lista
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';
?>