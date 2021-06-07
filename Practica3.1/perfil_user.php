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

$foto = 'subirFoto.php';

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
       
        <h3> Foto de Perfil </h4>
        <img class='imagen-user'src=$img>
        <a class='btn-prueba' href='$foto'>Cambiar Imagen</a>
        <h3> Nombre de usuario: </h3>
        <h4> $nombreUsuario </h4>
        <h3> Nombre Completo: </h3>
        <h3>Correo Electrónico: $email</h3>
        <h3> Rol Activo: $rol </h3> 
    </div>
    <div id="User-bio" class="User-bio">
        <h2 class="bio"> Biografía</h2>
        $bio
    </div>

    <div id="subir-podc" class="subir-podc">
    <h2 class="podcast-subidos"> Podcast Subidos por: $nombreUsuario</h2>
        $pod
    </div>
    <div id='playlist-user'class='playlist-user'>
        $listaPlay 
    </div>
EOS;

require __DIR__.'/includes/plantillas/plantillaPerfil.php';