<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();
$tituloPagina = "Lista del Usuario";
$idPodcast=$_GET['idPodcast'];
$idLista=$_GET['idPlaylist'];

$comprobacion=Playlist::compruebaPodcast($idPodcast, $idLista);
if($comprobacion==false){
    Playlist::añadePodcast($idPodcast, $idLista);
}

$lista = Playlist::muestraPlaylist($idLista);

$contenidoPrincipal = <<<EOS
$lista
EOS;
require __DIR__.'/includes/plantillas/plantilla.php';
?>