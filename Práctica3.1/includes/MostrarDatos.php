<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/config.php';
function mostrarDatos(){
    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();
    $html="";
    $sql_query = "SELECT email, nombre, username, rol from usuario";
    $resultset = mysqli_query($conn, $sql_query) or die("error base de datos:". mysqli_error($conn));
    while( $datos = mysqli_fetch_array($resultset) ) {
    
    $html .= <<<EOF
    <tr class='datos-admin'> <td>$datos[email]</td>
    <td> $datos[nombre]</td>
    <td> $datos[username] </td>
    <td contenteditable=''true  >$datos[rol]</td>
    <td>$datos[rol]</td>
    <th><a href=actualizar.php?username=$datos[username] class="btn-admin">Editar</a></th>
    </tr>

        EOF;
    }
    return $html;
}
?>