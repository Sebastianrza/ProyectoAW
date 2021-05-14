<?php 
namespace es\ucm\fdi\aw;

class Podcast{

    private $idPodcast;
    private $descripcion;
    private $nombrePodcast;
    private $userPodcast;
    private $genero;
    private $fecha;
    private $ruta;

    //private $tag; Tiene tag??

    protected function __construct( $nombrePodcast,$userPodcast, $descripcion, $genero,$fecha,$ruta)
    {
        //$this->idPodcast= $idPodcast;
        $this->nombrePodcast = $nombrePodcast;
        $this->userPodcast = $userPodcast;
        $this->descripcion = $descripcion;
        $this->genero = $genero;
        $this->fecha = $fecha;
        $this->ruta = $ruta;
        //$this->tag = $tag;
    }
    
    public function idPodcast(){
        return $this->idPodcast;
    }
    public function descripcion(){
        return $this->descripcion;
    }
    public function userPodcast(){
        return $this->userPodcast;
    }
    public function nombrePodcast(){
        return $this->nombrePodcast;
    }
    public function genero(){
        return $this->genero;
    }
    public function fecha(){
        return $this->fecha;
    }
    public function ruta(){
        return $this->ruta;
    }
    public static function creaPodcast($nombrePodcast,$userPodcast, $descripcion, $genero,$fecha, $ruta)
    {
        $podcast = self::consultarPodcast($nombrePodcast, $userPodcast);
        if ($podcast) {
            return false;
        }
        $podcast = new Podcast($nombrePodcast,$userPodcast, $descripcion, $genero,$fecha,$ruta);
        return self::subirPodcast($podcast);
    }

    public static function subirPodcast($podcast){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = sprintf("insert into Podcast(userPodcast, nombrePodcast, Descripcion, genero, fecha, rutaPod)
        Values('%s', '%s','%s', '%s','%s','%s')" , 
        $conn->real_escape_string($podcast->userPodcast),
        $conn->real_escape_string($podcast->nombrePodcast),
        $conn->real_escape_string($podcast->descripcion),
        $conn->real_escape_string($podcast->genero) ,
        $conn->real_escape_string($podcast->fecha),
        $conn->real_escape_string($podcast->ruta)
        );
        if ( $conn->query($sql) ) {
            $podcast->idPodcast = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $podcast;
    }
    public static function eliminarPodcast($nombrePodcast){
        $app = Aplicacion::getSingleton();
        $conexion = $app->conexionBd();
        $sql = sprintf('DELETE FROM Podcast 
                        WHERE Podcast.nombrePodcast = "%s"', $conexion->real_escape_string($nombrePodcast));
    }

    public static function consultarPodcast($nombrePodcast, $userPodcast){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = sprintf('select * from Podcast P where P.nombrePodcast = "%s"', $conn->real_escape_string($nombrePodcast), 
        "and P.userPodcast = '%s'", $conn->real_escape_string($userPodcast));//dejarla así y probarla 
        $rs = $conn->query($sql);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                 $fila = $rs->fetch_assoc();
                 $podcast = new Podcast($fila['nombrePodcast'], $fila['userPodcast'], $fila['Descripcion'], $fila['genero'],$fila['Fecha'], $fila['rutaPod']);
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
    public static function buscaId(){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

        $sql= "SELECT * from podcast";
        $datos = mysqli_query($conn, $sql);
        $html = "";

        while($mostrar=mysqli_fetch_array($datos)){
            $html .= <<<EOF
                <span class = "caja"><a href=?idPodcast=$mostrar[idPodcast] ><img src=img/pruebas/$mostrar[idPodcast].JPG  width="175" height= "175" alt=Los Tejos /></a></span> 
        EOF;
        }
        return $html;

    }

}

?>