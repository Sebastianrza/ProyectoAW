<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';
$tituloPagina = 'Perfil del Usuario';
if(isset($_GET['username'])){
    $nombreU = $_GET['username'];
    $usuario = Usuario::buscaUsuario($nombreU);
    $listaPlay = Playlist::buscarPlaylistUser($nombreU);
}
$pod = array();
$pod = Podcast::buscaPodUser($nombreU);
$nombreUsuario = $usuario->nombreUsuario();
$nombre = $usuario->nombre();
$bio = $usuario->bio();
$rol =$usuario->rol();
$email = $usuario->email();
$lista = Playlist::buscarPlaylist($nombreU);

if(file_exists('./includes/ImagenesUser/'. $usuario->nombreUsuario().'.png')){
    $img = "./includes/ImagenesUser/".$nombreUsuario.".png";
}else{
    $img = "./includes/ImagenesUser/user.png";
}
$contenidoPrincipal = <<<EOS
    <div class='podcast-user'>
        <ul class = "list-user">
            <li class = "list-user1">
                <a  id="infoperfil" href="#"> Información del perfil</a>
            </li>	
            <li class = "list-user1">
                <a id="podcastsubidos" href="#">Podcast Subidos</a>
            </li>		
            <li class = "list-user1">
            <a id="subirPlaylist" href="#">Playlist Subidas</a>
        </li>	
        </ul>
    </div>
    
    <div id='User-Data' class='User-Data'>
            <h3 class ="info-perfil"> Foto de Perfil </h3>
            <img class='imagen-user'src=$img>
            <h3 class ="info-perfil"> Nombre de usuario : $nombreUsuario</h3>
            <h3 class ="info-perfil"> Nombre Completo : $nombre </h3>
            <h3 class ="info-perfil">Correo Electronico : $email</h3>
            <h3 class ="info-perfil"> Rol Activo : $rol </h3> 
    </div>
    <div id='User-bio'class='User-bio'>
    <h3 class ="info-perfil"> Biografia</h3>
        $bio
    </div>
    <div id='subir-podc'class='subir-podc'>
    <h2 class="podcast-subidos"> Podcast Subidos por: $nombreUsuario</h2>
        $pod
    </div>
    <div id='playlist-user' class='playlist-user'>
        $listaPlay 
    </div>
    EOS;

require __DIR__.'/includes/plantillas/plantillaPerfil.php';