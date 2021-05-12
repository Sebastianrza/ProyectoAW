<?php

namespace es\ucm\fdi\aw;

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Podcast.php';


$tituloPagina = 'Reproductor';


class reproductor extends Podcast {   
    private $genero;
    public $sql;

    public function __construct($idPodcast, $descripcion,$nombrePodcast, $userPodcast, $genero, $fecha)
    {   
        parent::__construct($idPodcast, $descripcion,$nombrePodcast, $userPodcast, $genero, $fecha);
    }

    private function cargaListaPodcast(){
        lista::crearLista(); 
    }

    public function gestionaReproductor(){
        $idPodcast = $_GET["idPodcast"];
        $rutaPodcast = "archivos/pruebas/".$idPodcast.".mp3";
        
        $html = <<<EOF

        <audio id = "audio">
        <source src="$rutaPodcast" type="audio/mp3">
        </audio>

        <input type="button" value="Play" onclick="play();">
        &nbsp;
        &nbsp;
        <input type="button" value="Pause" onclick="pause();">
        &nbsp;
        &nbsp;
        <input type="button" value="+" onclick="volumeUp();">
        &nbsp;
        &nbsp;
        <input type="button" value="-" onclick="volumeDown();">
        &nbsp;
        &nbsp;
        <input type="button" value="&laquo" onclick="back();">
        &nbsp;
        &nbsp;
        <input type="button" value="&raquo" onclick="advance();">
        <br><br><br>

        
        <script src="includes/js/botones.js"></script>
        EOF;
        return $html;
    }

    public function muestraPodcast(){
        
        $usuario = "root";
        $contrasena = "";
        $servidor = "localhost";
        $database = "wavecast";
        
        $conexion = mysqli_connect($servidor, $usuario, $contrasena, $database) or die("No se ha podido conectar con el servidor");

        $sql= "SELECT * from podcast";
        $datos = mysqli_query($conexion, $sql);

        while($mostrar=mysqli_fetch_array($datos)){
            echo "<a href=?idPodcast=$mostrar[idPodcast] ><img src=img/pruebas/$mostrar[idPodcast].jpg /> </a> &nbsp &nbsp";
            echo "<a  href=?idPodcast=$mostrar[idPodcast] > <h3> $mostrar[nombrePodcast] </h3></a> &nbsp &nbsp";
        }

    }

}


$reproductor = new reproductor(null, null, null, null, null, null);
$rep = $reproductor->gestionaReproductor();
$lista = $reproductor->muestraPodcast();
$contenidoPrincipal = <<<EOS
<h1>Reproductor</h1>
$lista.$rep
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';