<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';

//$htmlFormLogin = $form->gestiona();
$tituloPagina = 'Perfil del Usuario';
if(isset($_SESSION["login"]) && ($_SESSION["login"]===true)){
    $nombreU = $_SESSION['nombre'];
    $usuario = Usuario::buscaUsuario($nombreU);
}

$nombreUsuario = $usuario->nombreUsuario();
$nombre = $usuario->nombre();
$bio = $usuario->bio();
$rol =$usuario->rol();
$email = $usuario->email();
$podcast = 'subirPodcast.php';
/*
if(file_exists('./includes/ImagenesUser/'. $usuario->nombreUsuario().'.jpg')){
    $img = '<img class="imagen-user"src="./includes/ImagenesUser/$nombreUsuario">';
}else{
    $img = '<img class="imagen-user"src="./includes/ImagenesUser/user.png">';
}*/
$contenidoPrincipal = <<<EOS
    <div class='podcast-user'>
        <ul class = "list-user">
            <li class = "list-user1">
                <a href = "#info">Información del perfil</a>
            </li>	
            <li class = "list-user1">
                <a href = "#podc-sub">Podcast Subidos</a>
            </li>		
            <li class = "list-user1">
                <a href = "podc-fav">Podcast Favoritos</a>
            </li>	
            <li class = "list-user1">
                <a href = "#seguidores">Seguidores</a>
            </li>	
            <li class = "list-user1">
            <a href = "#siguiendo">Siguiendo</a>
            </li>
            <li class = "list-user1">
            <a href = "#edit-perfil">Editar Perfil</a>
            </li>
        </ul>
    </div>
    <div class='User-Data'>
        <h4> Foto de Perfil </h4>
        <img class="imagen-user"src="./includes/ImagenesUser/user.png">
        <a class='btn-prueba' href=''>Cambiar Imagen</a>
        <a class='btn-prueba' href='$podcast'>Subir Podcast</a>
        <h4> Nombre de usuario: </h4>
        <h4> $nombreUsuario </h4>
        <h4> Nombre Completo: </h4>
        <h4> $nombre </h4> 
        <h4>Correo Electrónico: $email</h4>
        <h4> Rol Activo: $rol </h4> 
    </div>
    <div class='User-bio'>
        <h2> Biografía</h2>
        $bio
    </div>
    <div class='subir-podc'>
    
   
    
    </div>
    <div class='podc-fav'>
    
   
    
    </div>
    <div class='seguidores'>
    
   
    
    </div>
    <div class='siguiendo'>
    
   
    
    </div>
    <div class='edit-perfil'>
    
   
    
    </div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';