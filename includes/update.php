<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/config.php';

$app = Aplicacion::getSingleton();
$conn = $app->conexionBd();

$username=$_POST['username'];
$rol=$_POST['rol'];

$sql="UPDATE usuario SET rol='$rol' WHERE username='$username'";
$query=mysqli_query($conn,$sql);

    if($query){
        Header("Location: ../admin.php");
    }
?>