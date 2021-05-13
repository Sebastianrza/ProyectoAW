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

    public function borraPodcast(){
   
    }
    public function añadePodcast($idPodcast){
       
    }
    public function buscaPodcast(){

    }
    public function muestraPlaylist(){
        $usuario = "root";
        $contrasena = "";
        $servidor = "localhost";
        $database = "wavecast";
        
        $conexion = mysqli_connect($servidor, $usuario, $contrasena, $database) or die("No se ha podido conectar con el servidor");
        $sql = "SELECT * from playlist WHERE idPlaylist = 1";
        //Aqui obtengo la info de la playlist
        $datos = mysqli_query($conexion, $sql);
        while($mostrar=mysqli_fetch_array($datos)){
            echo "<div class= \"contenedorTitulo\">";
            echo "$mostrar[Titulo]  &nbsp &nbsp";
            //esto es un enlace para llegar al perfil del usuario propietario de la playlist
            echo "Esta playlist pertenece a :<a href= \"/perfil.php\" >  $mostrar[idPropietario]  </a> &nbsp &nbsp";
            echo "</div>";
            echo "$mostrar[Descripcion] &nbsp &nbsp";
        }
        //Aqui obtengo la información de los podcast que pertenecen a la playlist
        $sql= "SELECT * FROM podcast JOIN listapodcast ON podcast.idPodcast = listapodcast.idPodcast WHERE listapodcast.idLista = 1";
        $datos = mysqli_query($conexion, $sql);
        //CONTENEDOR EXTERNO PARA TODA LA PLAYLIST
        echo "<div class= \"contenedorPlaylist\">";
        while($mostrar=mysqli_fetch_array($datos)){
            //CONTENEDOR INDIVIDUAL PARA LA COLUMNAS INDIVIDUALES
            echo "<div class= \"infoPlaylist\">";                               /*!!aqui debería ser la imagen de la playlist que es única */
            echo "<a  href=/reproductor.php?idPodcast=$mostrar[idPodcast] > <img src=img/pruebas/$mostrar[idPodcast].jpg /> </a> &nbsp &nbsp";
            echo "<a  href=/reproductor.php?idPodcast=$mostrar[idPodcast] > <h3> $mostrar[nombrePodcast] </h3> </a> &nbsp &nbsp";
            echo "<a  <h5> $mostrar[Descripción] </h5> </a> &nbsp &nbsp";
            echo "</div>";
        }
        echo "</div>";
    }                                                                                               

}


$playlist = new Playlist(null, null, null, null);
$playlist = $playlist->muestraPlaylist();
$contenidoPrincipal = <<<EOS
<h1>Todas las playlist</h1>
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';