<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/config.php';
$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();
$username=$_POST['nombre'];

$sql="SELECT email, nombre, username, rol from usuario where username = '$username'";
$sql="UPDATE usuario SET  rol='$rol' WHERE username='$username'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: alumno.php");
    }