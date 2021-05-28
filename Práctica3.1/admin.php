<?php 
/* */
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/MostrarDatos.php';
$ayuda = mostrarDatos();
$tituloPagina = 'Administrar Datos';
if(isset($_SESSION["login"]) && ($_SESSION["login"]===true) && ($_SESSION['esAdmin'] === true)){
    $nombreU = $_SESSION['nombre']; 
}else{
    header('Location: index.php');
}
$contenidoPrincipal = <<<EOS

<div class="container-home">    
    <h2 class='h2-caption'>Administrar roles de Usuarios Registrados</h2>      
    <table id="table-data" class="data_table" rules=all>
        <thead class='table-admin'>
            <tr class='encabezado'>
                <th>Email</th>
                <th>Nombre</th>
                <th>Username</th>
                <th>Rol</th>   
            </tr>
        </thead>
            $ayuda
    </table>    
</div>

EOS;


require __DIR__.'/includes/plantillas/plantillaAdmin.php';