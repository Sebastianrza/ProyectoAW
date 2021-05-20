<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/config.php';
class exploraPlaylist {   
    private $sql;
  

    public function __construct(){   
    }
/*
    public function borraPlaylist($idPlaylist){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("DELETE FROM playlist WHERE playlist.idPlaylist = '%d'"
        , $conn->$idPlaylist);
        $conn->query($query);
    }
    public function añadePlaylist($playlist){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO playlist (playlist.Titulo, playlist.Descripcion,playlist.imagen, playlist.idPropietario)  VALUES('%s', '%s', '%s', '%s')"
            , $conn->real_escape_string($playlist->nombre) 
            , $conn->real_escape_string($playlist->descripcion)
            , $conn->real_escape_string($playlist->propietario)
            , $conn->real_escape_string($playlist->imagen));
        if ( $conn->query($query) ) {
            $playlist->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $playlist;
    }
    public function buscaPlaylist($nombre){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("SELECT * FROM playlist WHERE playlist.Titulo LIKE '%s'"
        , $conn->real_escape_string($nombre) );
        $datos= $conn->query($query);
        $mostrar=mysqli_fetch_array($datos)
        return $mostrar;
    }*/
    public function muestralistaPlaylist(){
        $app = Aplicacion::getSingleton();
        $conexion = $app->conexionBd();
        $sql = "SELECT * from playlist";
        $datos = $conexion->query($sql);
        //CONTENEDOR EXTERNO PARA TODA LA PLAYLIST
        echo "<div class= \"contenedorplaylist\" style= \"display: flex\">";
        while($mostrar=mysqli_fetch_array($datos)){
            //CONTENEDOR INDIVIDUAL PARA LA COLUMNAS INDIVIDUALES
            echo "<div class= \"infoPlaylist\">";                         
            echo "<a  href=verlista.php?idPlaylist=$mostrar[idPlaylist] > <h3> $mostrar[Titulo] </h3> </a> ";
            echo "<a  href=verlista.php?idPlaylist=$mostrar[idPlaylist] > <img src=img/pruebas/$mostrar[imagen]> </a> ";  
            echo "</div>";
        }
        echo "</div>";
    }   
}                        


