<?php

namespace es\ucm\fdi\aw;

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Podcast.php';


$tituloPagina = 'Playlist';

class Playlist {   
    private $genero, $sql, $nombre, $descripcion, $propietario, $imagen;
  

    public function __construct($nombre, $descripcion, $propietario, $imagen)
    {   
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->propietario = $propietario;
        $this->imagen = $imagen;
        $this->listaPocast = [];
    }

    public function borraPodcast($idPodcast){
        Podcast::eliminarPodcast($idPodcast);
    }
    public static function añadePodcast($idPodcast, $idPlaylist){
       $sql = "INSERT idPodcast INTO ";
    }
    public function muestraPlaylist($idPlaylist){
        
        $conexion = mysqli_connect(BD_HOST, BD_USER, BD_PASS, BD_NAME) or die("No se ha podido conectar con el servidor");
        $sql = "SELECT * from playlist WHERE idPlaylist = $idPlaylist";
        //Aqui obtengo la info de la playlist
        $datos = mysqli_query($conexion, $sql);
        while($mostrar=mysqli_fetch_array($datos)){
            echo "<div class= \"contenedorTitulo\">";
            echo "$mostrar[Titulo] ";
            //esto es un enlace para llegar al perfil del usuario propietario de la playlist
            echo "Esta playlist pertenece a :<a href= \"/perfil.php\" >  $mostrar[idPropietario]  </a> ";
            echo "</div>";
            echo "$mostrar[Descripcion] ";
        }
        //Aqui obtengo la información de los podcast que pertenecen a la playlist
        $sql= "SELECT * FROM podcast JOIN listapodcast ON podcast.idPodcast = listapodcast.idPodcast WHERE listapodcast.idLista = $idPlaylist";
        $datos = mysqli_query($conexion, $sql);
        //CONTENEDOR EXTERNO PARA TODA LA PLAYLIST
        echo "<div class= \"contenedorPlaylist\">";
        while($mostrar=mysqli_fetch_array($datos)){
            //CONTENEDOR INDIVIDUAL PARA LA COLUMNAS INDIVIDUALES
            echo "<div class= \"infoPlaylist\">";                               /*!!aqui debería ser la imagen de la playlist que es única */
            echo "<a  href=reproductor.php?idPodcast=$mostrar[idPodcast] > <img src=img/pruebas/$mostrar[idPodcast].jpg /> </a>";
            echo "<a  href=reproductor.php?idPodcast=$mostrar[idPodcast] > <h3> $mostrar[nombrePodcast] </h3> </a> ";
            echo "<a  <h5> $mostrar[Descripción] </h5> </a> ";
            echo "</div>";
        }
        echo "</div>";
    }                                                                                               
    
}


$playlist = new Playlist(null, null, null, null);
$playlist = $playlist->muestraPlaylist($_GET["idPlaylist"]);
$contenidoPrincipal = <<<EOS
<h1>Todas las playlist</h1>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';