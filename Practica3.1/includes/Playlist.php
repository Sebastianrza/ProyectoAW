<?php
namespace es\ucm\fdi\aw;

require_once __DIR__.'/config.php';


class Playlist {
    private $genero, $sql, $nombre, $descripcion, $propietario, $imagen, $idPlaylist;
    public function __construct($nombre, $descripcion, $propietario, $imagen)
    {   
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->propietario = $propietario;
        $this->imagen = $imagen;
        $this->listaPocast = [];
    }

    public function getTitulo(){
        return $this->nombre;
    }
    public function getidPropietario(){
        return $this->propietario;
    }
    public function getdescripcion(){
        return $this->descripcion;
    }
    public function getimagen(){
        return $this->imagen;
    }

    public static function creaPlaylist($nombrePlaylist, $descripcion, $nombreImg, $nombre){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO playlist (Titulo, Descripcion, imagen, idPropietario) VALUES('%s', '%s', '%s','%s')"
            , $conn->real_escape_string($nombrePlaylist) 
            ,$conn->real_escape_string($descripcion) 
            , $conn->real_escape_string($nombreImg) 
            , $conn->real_escape_string($nombre));
        if ( $conn->query($query) ) {
        
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $nombrePlaylist;
    }
    public static function buscaPlaylist($idPlaylist)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM playlist P WHERE P.idPlaylist = '%s'", $conn->real_escape_string($idPlaylist));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $user = new Playlist($fila['Titulo'], $fila['Descripcion'], $fila['idPropietario'],$fila['imagen']);
                //$user->id = $fila['id'];
                $result = $user;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
    public static function getAll(){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT * from playlist WHERE playlist.idPlaylist != 3";
        $datos = mysqli_query($conn, $sql);
        $html = "";
        $html .=  "<div class= \"contenedorplaylist\">";
        while($mostrar=mysqli_fetch_array($datos)){
            $html .= <<<EOF
            <a class ="enlacepod" href=verlista.php?idPlaylist=$mostrar[idPlaylist]>
            <span class="cajaplaylist">
                <img class ="img-podcast" src=img/pruebas/$mostrar[imagen]  width="400" height= "175">
                <h3> $mostrar[Titulo]</h3>
                <h5> $mostrar[Descripcion]</h5>
            </span>
            </a> 
            EOF;
        }
        $html .="</div>";
        return $html;
    }
    public static function getAllPodcast($idPlaylist){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT * from playlist WHERE idPlaylist = $idPlaylist";
        $datos = mysqli_query($conn, $sql);
        $html = "";
        $html .=  "<div class= \"contenedor\">";
        while($mostrar=mysqli_fetch_array($datos)){
            $html .= <<<EOF
            <span class = "caja"><a href=playlist.php?idPlaylist=$mostrar[idPlaylist] ><img class ="img-podcast" src=img/pruebas/$mostrar[imagen]  width="400" height= "175"     /></a></span> 
            <span"><a href=playlist.php?idPlaylist=$mostrar[idPlaylist]> <h3> $mostrar[Titulo]</h3></a></span> 
            <h3> $mostrar[Descripcion]</h3>
            EOF;
        }
        $html .=   "</div>";

        $sql= "SELECT * FROM podcast JOIN listapodcast ON podcast.idPodcast = listapodcast.idPodcast WHERE listapodcast.idLista = $idPlaylist";
        $datos = mysqli_query($conn, $sql);
        //CONTENEDOR EXTERNO PARA TODA LA PLAYLIST
        $html = "";
        $html .=  "<div class= \"contenedor\">";
        while($mostrar=mysqli_fetch_array($datos)){
            $html .= <<<EOF
            //CONTENEDOR INDIVIDUAL PARA LA COLUMNAS INDIVIDUALES
            echo "<div class= \"infoPlaylist\">";                               /*!!aqui debería ser la imagen de la playlist que es única */
            echo "<a  href=reproductor.php?idPodcast=$mostrar[idPodcast] > <img src=img/pruebas/$mostrar[idPodcast].jpg /> </a>";
            echo "<a  href=reproductor.php?idPodcast=$mostrar[idPodcast] > <h3> $mostrar[nombrePodcast] </h3> </a> ";
            echo "<a  <h5> $mostrar[Descripcion] </h5> </a> ";
            echo "</div>";
            EOF;
        }
        $html .=   "</div>";
        return $html;
    }

    public function borraPodcast($idPodcast){
        Podcast::eliminarPodcast($idPodcast);
    }
    public static function añadePodcast($idPodcast, $idPlaylist){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query="INSERT INTO listapodcast (idPodcast, idLista) VALUES('$idPodcast', '$idPlaylist')";
        $conn->query($query);
    }
    public static function compruebaPodcast($idPodcast,$idLista){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = "select * from listapodcast where idPodcast = '$idPodcast' and idLista = '$idLista'";
        $rs = $conn->query($query);
        if($rs->num_rows == 1){
            return true;
        }else{
            return false;
        }
    }
    public static function muestraPlaylist($idPlaylist){
        
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT * from playlist WHERE idPlaylist = $idPlaylist";
        //Aqui obtengo la info de la playlist
        $datos = mysqli_query($conn, $sql);
        $html = "";
        $html .=  "<div class= \"contenedor\">";
        while($mostrar=mysqli_fetch_array($datos)){
            
            $html .= <<<EOF
            <div class= "contenedorTitulo">
            <h1> $mostrar[Titulo] </h1>
            <h5 class="pertenece-User">Esta playlist pertenece a: <a class="user-redirecciona" href= perfil_user.php?username=$mostrar[idPropietario]>  $mostrar[idPropietario]  </a> 
            <p class="desc"> $mostrar[Descripcion] </p>
            </div>
            EOF;
        }
        //Aqui obtengo la información de los podcast que pertenecen a la playlist
        $sql= "SELECT * FROM podcast JOIN listapodcast ON podcast.idPodcast = listapodcast.idPodcast WHERE listapodcast.idLista = $idPlaylist";
        $datos = mysqli_query($conn, $sql);
        //CONTENEDOR EXTERNO PARA TODA LA PLAYLIST  
        $html .=  "<div class= \"contenedorPlaylist\">";
        while($mostrar=mysqli_fetch_array($datos)){
            
            //CONTENEDOR INDIVIDUAL PARA LA COLUMNAS INDIVIDUALES
            $html .= <<<EOF
            <span class="infoPlaylist">                         
            <a class="enlacepod" href=reproductor.php?idPodcast=$mostrar[idPodcast]&idPlaylist=$idPlaylist > 
            <img class="imagenPlaylistt" src=img/pruebas/$mostrar[idPodcast].jpg> </a>
            <a href=reproductor.php?idPodcast=$mostrar[idPodcast]&idPlaylist=$idPlaylist ></a>
            <h3> $mostrar[nombrePodcast]</h3>
            <h5> $mostrar[Descripcion] </h5>
            <a href=AgregarPodcast.php?idPodcast=$mostrar[idPodcast] class='btn-agregar'> + </a>
            </span>
            EOF;
        }
        $html .="</div>";
        return $html;
    }             
    //AND playlist.idPlaylist != 3"
    public static function buscarPlaylist($criterio){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT * from playlist WHERE playlist.Titulo like concat('%', '$criterio', '%') "; 
        $datos = mysqli_query($conn, $sql);
        $html = "";
        $html .=  "<div class= \"contenedorplaylist\">";
        $html .= "<h2 class='tipo-busqueda'> Resultados por playlist: </h2>";
        while($mostrar=mysqli_fetch_array($datos)){
            $html .= <<<EOF
            <a class ="enlacepod" href=verlista.php?idPlaylist=$mostrar[idPlaylist]>
            <span class = "cajaplaylist">
            <img class ="img-podcast" src=./img/pruebas/$mostrar[imagen]  width="400" height= "175" />
            <h3> $mostrar[Titulo]</h3>
            <h5> $mostrar[Descripcion]</h5>
            </span> 
            </a>
            EOF;
        }
        $html .="</div>";
        return $html;
    }     
    public static function buscarPlaylistUser($criterio){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT * from playlist JOIN usuario ON playlist.idPropietario = usuario.username WHERE playlist.idPropietario = '$criterio'"; 
        $datos = mysqli_query($conn, $sql);
        $html = "";
        $html .=  "<div class= \"contenedorplaylist\">";
        $html .= "<h2 class='playlist-subida'> Playlist de $criterio:</h2>";
        while($mostrar=mysqli_fetch_array($datos)){
            $html .= <<<EOF
            <div class = "cajaplaylist">
            <a href=verlista.php?idPlaylist=$mostrar[idPlaylist] ><img class ="img-podcast" src=img/pruebas/$mostrar[imagen]  width="400" height= "175" /></a>
            <a href=verlista.php?idPlaylist=$mostrar[idPlaylist]> <h3> $mostrar[Titulo]</h3></a>
            <p class="desc"> $mostrar[Descripcion]</p>
            </div> 
            EOF;
        }
        $html .=   "</div>";
        return $html;
    }    
    public static function muestraPlaylistUser($idPropietario, $idPodcastIntroducir){
        
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql =  "SELECT * from playlist WHERE idPropietario = '$idPropietario'";
        //Aqui obtengo la info de la playlist
        $datos = mysqli_query($conn, $sql);
        $html = "";
        $html .=  "<div class= \"contenedor\">";
        while($mostrar=mysqli_fetch_array($datos)){
            
            $html .= <<<EOF
            <div class= "contenedorTituloAgregar">
                <span"><a href= AgregarPodcast.php?idPodcast=$idPodcastIntroducir&idPlaylist=$mostrar[idPlaylist]> <h3> $mostrar[Titulo]</h3></a></span> 
                <h3> $mostrar[Descripcion]</h3>
                <span class = "caja"><a href= AgregarPodcast.php?idPodcast=$idPodcastIntroducir&idPlaylist=$mostrar[idPlaylist] ><img class ="img-podcast" src=img/pruebas/$mostrar[imagen]  width="400" height= "175"     /></a></span> 
                <div id='boton-play' class='boton-play'>
                    <a class='btn-prueba' href='./agregar.php?idPodcast=$idPodcastIntroducir&idPlaylist=$mostrar[idPlaylist]'>Agregar</a>
                </div>
                </div>
            EOF;
        }       
        $html .=   "</div>";
        return $html;
    }
}

