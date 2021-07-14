<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';


if(isset($_GET['fname'])){
    $criterio = $_GET['fname'];
}

//$_SESSION['Titulo'] = $_GET['Titulo'];
//$playlist = $_SESSION['Titulo'];
if($criterio != ""){
    $listaPodcast = Podcast::buscaPodcast($criterio);
    $listaUser = Podcast::buscaUser($criterio);
    $listaPlaylist = Playlist::buscarPlaylist($criterio);
    $busca = ' ';

}
else{
    $listaPodcast = " ";
    $listaUser = " ";
    $listaPlaylist = " "; 
    $busca = '<h2> Revisa los criterios de busqueda </h2>';
}

$arr = array();

$tituloPagina = 'Lista';
$contenidoPrincipal = <<<EOS
$busca
$listaPodcast
$listaUser
$listaPlaylist

EOS;
require __DIR__.'/includes/plantillas/plantilla.php';
?>