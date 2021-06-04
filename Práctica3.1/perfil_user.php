<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';
$tituloPagina = 'Perfil del Usuario';
if(isset($_GET['username'])){
    $nombreU = $_GET['username'];
    $usuario = Usuario::buscaUsuario($nombreU);
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
                <a href = "#" onclick="openInformacion();">Información del perfil</a>
            </li>	
            <li class = "list-user1">
                <a href = "#" onclick="openPodSub();return false;">Podcast Subidos</a>
            </li>		
            <li class = "list-user1">
                <a href ="#" onclick="openPodFav();return false;">Podcast Favoritos</a>
            </li>	
          
        </ul>
    </div>
    <div id='User-Data' class='User-Data'>
            <h4> Foto de Perfil </h4>
            <img class='imagen-user'src=$img>
            <a class='btn-prueba' href='$foto'>Cambiar Imagen</a>
            <h4> Nombre de usuario: </h4>
            <h4> $nombreUsuario </h4>
            <h4> Nombre Completo: </h4>
            <h4>Correo Electrónico: $email</h4>
            <h4> Rol Activo: $rol </h4> 
    </div>
    <div id='User-bio'class='User-bio'>
        <h2> Biografía</h2>
        $bio
    </div>
    <div id='subir-podc'class='subir-podc'>
    $lista
    </div>
    <div id='podc-fav'class='podc-fav'>
    <div id='edit-perfil' class='edit-perfil'>
    
   
   esto
    
    </div>
EOS;

require __DIR__.'/includes/plantillas/plantillaPerfil.php';