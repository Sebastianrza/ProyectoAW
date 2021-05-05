<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';

$tituloPagina = 'Perfil del Usuario';
if(isset($_SESSION["login"]) && ($_SESSION["login"]===true)){
    $nombre = $_SESSION['nombre'];
    $usuario = Usuario::buscaUsuario($nombre);
}

$nombreUsuario = $usuario->nombreUsuario();
$email = $usuario->email();
$bio = $usuario->bio();
$rol =$usuario->rol();
/*if(isset($_POST['Guardar Imagen'])&& !empty($_FILES['archivo subido']['tmp_name'])){
    $directorio = '/includes/ImagenesUser';
    $carpetaUser;
}*/
$contenidoPrincipal = <<<EOS
    
    <div class='User-Data'>
        <h4> Nombre de usuario: </h4>
        <h4> $nombre </h4>
        <h4> Nombre del Usuario </h4>
        <h4> $email </h4> 
        <h4> Rol Activo </h4>
        <h4> $rol </h4>
    </div>
    <div class='User-bio'>
        <h2> Biografía</h2>
        $bio
    </div>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';