<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';
$nombreU = $_GET['id']; 
$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();
$sql="SELECT * FROM usuario WHERE username='$nombreU'";
$query=mysqli_query($conn,$sql);

$row=mysqli_fetch_array($query);
$tituloPagina = "Actualizar registros";
$contenidoPrincipal = <<<EOS
            <h1>Actualizar Rol del usuario: $row[username] <h1> 
                <div >
                    <form class="act-admin" action="./includes/update.php" method="POST">
                        <input class='input-admin' type="text"  name="email" readonly value=$row[email]>
                        <input class='input-admin' type="text"  name="username" readonly value=$row[username]>
                        <input class='input-admin' type="text"  name="nombre" readonly value=$row[nombre]>
                        <select class='select-admin' id ='select-admin'name="rol">
                            <option value="user" selected>$row[rol]</option>
                            <option value="admin"> admin</option>
                            <option value="user"> user</option>
                            <option value="empresa"> empresa</option>
                        </select>
                        <input type="submit" class="btn-admin" value="Actualizar">
                    </form>
                </div>



EOS;

require __DIR__.'/includes/plantillas/plantillaAdmin.php';


?>