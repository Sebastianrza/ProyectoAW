<?php 
namespace es\ucm\fdi\aw;

class Podcast{

    private $idPodcast;
    private $descripcion;
    private $nombrePodcast;
    private $userPodcast;
    private $genero;
    private $fecha;

    //private $tag; Tiene tag??

    protected function __construct($idPodcast, $nombrePodcast,$userPodcast, $descripcion, $genero,$fecha)
    {
        $this->idPodcast= $idPodcast;
        $this->descripcion = $descripcion;
        $this->userPodcast = $userPodcast;
        $this->nombrePodcast = $nombrePodcast;
        $this->genero = $genero;
        $this->fecha = $fecha;
        //$this->tag = $tag;
    }

    public static function subirPodcast($nombrePodcast, $userPodcast, $descripcion,$genero, $fecha){
        $app = Aplicacion::getSingleton();
        $conexion = $app->conexionBd();
        $sql = sprintf('insert into Podcast  ');
    }

    public static function eliminarPodcast($nombrePodcast){
        $app = Aplicacion::getSingleton();
        $conexion = $app->conexionBd();
        $sql = sprintf('DELETE FROM Podcast 
                        WHERE Podcast.nombrePodcast = "%s"', $conexion->real_escape_string($nombrePodcast));
    }

    public static function consultarPodcast($nombrePodcast, $userPodcast){
        $app = Aplicacion::getSingleton();
        $conexion = $app->conexionBd();
        $sql = sprintf('select * from Podcast P where P.nombrePodcast = "%s"', $conexion->real_escape_string($nombrePodcast), 
        "and P.userPodcast = '%s'", $conexion->real_escape_string($userPodcast));//dejarla así y probarla 
        $rs = $conn->query($sql);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                 $fila = $rs->fetch_assoc();
                 $podcast = new Podcast($fila['nombrePodcast'], $fila['userPodcast'], $fila['Descripción'],  $fila['Fecha']);
                 $podcast->idPodcast = $fila['idPodcast'];
                 $result = $podcast;
             }
             $rs->free();
         } else {
             echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
             exit();
         }
         return $result;
    }


}

?>