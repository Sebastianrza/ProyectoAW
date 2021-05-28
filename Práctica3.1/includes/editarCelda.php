<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/config.php';

$input = filter_input_array(INPUT_POST);

if($input['action']=='edit'){
    $update_field = '';
    if(isset($input['rol'])){
        $update_field.= "nombre='".$input['rol']."'";
    }
    if($update_field && $input['username']){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = "update usuario set $update_field where username='".$input['username']."'";
        mysqli_query($conn, $sql);
    }
?>