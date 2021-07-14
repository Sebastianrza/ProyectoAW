<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';
$form = new FormularioEditarPerfil();
$htmlFormLogin = $form->gestiona();
$tituloPagina = 'Perfil del Usuario';
if(isset($_SESSION["login"]) && ($_SESSION["login"]===true)){
    $nombreU = $_SESSION['nombre']; 
    $usuario = Usuario::buscaUsuario($nombreU);
    $listaPlay = Playlist::buscarPlaylistUser($nombreU);
}else{
    header('Location: login.php');
}

$pod = array();
$pod = Podcast::buscaPodUser($nombreU);
$nombreUsuario = $usuario->nombreUsuario();
$nombre = $usuario->nombre();
$bio = $usuario->bio();
$rol =$usuario->rol();
$email = $usuario->email();
$_SESSION['bio'] = $bio;
$_SESSION['name'] = $nombre;
$podcast = 'subirPodcast.php';
$foto = 'subirFoto.php';
$play = 'subirPlaylist.php';
if(file_exists('./includes/ImagenesUser/'. $usuario->nombreUsuario().'.png')){
    $img = "./includes/ImagenesUser/".$nombreUsuario.".png";
}else{
    $img = "./includes/ImagenesUser/user.png";
}
$contenidoPrincipal = <<<EOS
    <div class='podcast-user'>
        <ul class = "list-user">
            <li class = "list-user1">
                <a id="infoperfil" href = "#">Informacion del perfil</a>
            </li>	
            <li class = "list-user1">
                <a id="podcastsubidos" href = "#">Podcast Subidos</a>
            </li>		
            <li class = "list-user1">
                <a id="subirPlaylist" href ="#">Playlist</a>
            </li>	
            <li class = "list-user1">
            <a id = "edita-perfil" href = "#" >Editar Perfil</a>
            </li>
        </ul>
    </div>
    <div id='User-Data' class='User-Data'>
            <h3 class ="info-perfil"> Foto de Perfil </h3>
            <img class='imagen-user'src=$img>
            <a class='btn-prueba-cambiaImagen' href='$foto'>Cambiar Imagen</a>
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
        <div id='boton' class='boton'>
            <a class='btn-prueba' href='$podcast'>Subir Podcast</a>
        </div>
    </div>
    <div id='playlist-user' class='playlist-user'>
        $listaPlay 
        <div id='boton-play' class='boton-play'>
            <a class='btn-prueba' href='$play'>Crea Playlist</a>
        </div>
    </div>
    
    <div id='edit-perfil' class='edit-perfil'>
    <h1>Editar Perfil</h1>
    $htmlFormLogin
    
    </div>
EOS;

require __DIR__.'/includes/plantillas/plantillaPerfil.php';