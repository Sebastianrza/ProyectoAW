<?php 
$tituloPagina = 'Administrar Datos';
if(isset($_SESSION["login"]) && ($_SESSION["login"]===true) && ($_SESSION['admin'] === true)){
    $nombreU = $_SESSION['nombre']; 
}else{
    header('Location: index.php');
}
$contenidoPrincipal = <<<EOS



EOS;


require __DIR__.'/includes/plantillas/plantilla.php';