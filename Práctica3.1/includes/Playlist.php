<?php

namespace es\ucm\fdi\aw;
require_once __DIR__.'/config.php';

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
    public static function getAll(){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT * from playlist";
        $datos = mysqli_query($conn, $sql);
        $html = "";
        $html .=  "<div class= \"contenedor\">";
        while($mostrar=mysqli_fetch_array($datos)){
            $html .= <<<EOF
            <span class = "caja"><a href=Playlist.php?idPlaylist=$mostrar[idPlaylist] ><img class ="img-podcast" src=img/pruebas/$mostrar[imagen]  width="400" height= "175"     /></a></span> 
            <span"><a href=Playlist.php?idPlaylist=$mostrar[idPlaylist]> <h3> $mostrar[Titulo]</h3></a></span> 
             <h3> $mostrar[Descripcion]</h3>
            EOF;
        }
        $html .=   "</div>";
        return $html;
    }
    public static function getAllPodcast(){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT * from playlist";
        $datos = mysqli_query($conn, $sql);
        $html = "";
        $html .=  "<div class= \"contenedor\">";
        while($mostrar=mysqli_fetch_array($datos)){
            $html .= <<<EOF
            <span class = "caja"><a href=playlist.php?idPlaylist=$mostrar[idPlaylist] ><img class ="img-podcast" src=img/pruebas/$mostrar[imagen]  width="400" height= "175"     /></a></span> 
            <span"><a href=playlist.php?idPlaylist=$mostrar[idPlaylist]> <h3> $mostrar[Titulo]</h3></a></span> 
             <h3> $mostrar[Descripcion]</h3>
            EOF;
            echo "<div class= \"infoPlaylist\">";                         
            echo "<a  href=/includes/Playlist.php?idPlaylist=$mostrar[idPlaylist] > <h3> $mostrar[Titulo] </h3> </a> ";
            echo "<a  href=playlist.php?idPlaylist=$mostrar[idPlaylist] > <img src=img/pruebas/$mostrar[imagen]> </a> "; 
        }
        $html .=   "</div>";
        return $html;
    }

    public function borraPodcast($idPodcast){
        Podcast::eliminarPodcast($idPodcast);
    }
    public static function añadePodcast($idPodcast, $idPlaylist){
       $sql = "INSERT idPodcast INTO ";
    }
    public function muestraPlaylist($idPlaylist){
        
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT * from playlist WHERE idPlaylist = $idPlaylist";
        //Aqui obtengo la info de la playlist
        $datos = mysqli_query($conn, $sql);
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
        $datos = mysqli_query($conn, $sql);
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

