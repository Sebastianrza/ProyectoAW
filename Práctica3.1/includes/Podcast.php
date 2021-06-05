<?php

namespace es\ucm\fdi\aw;

class Podcast
{

    private $idPodcast;
    private $descripcion;
    private $nombrePodcast;
    private $userPodcast;
    private $genero;
    private $fecha;
    private $ruta;

    //private $tag; Tiene tag??

    protected function __construct($nombrePodcast, $userPodcast, $descripcion, $genero, $fecha, $ruta)
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

    public function idPodcast()
    {
        return $this->idPodcast;
    }
    public function descripcion()
    {
        return $this->descripcion;
    }
    public function userPodcast()
    {
        return $this->userPodcast;
    }
    public function nombrePodcast()
    {
        return $this->nombrePodcast;
    }
    public function genero()
    {
        return $this->genero;
    }
    public function fecha()
    {
        return $this->fecha;
    }
    public function ruta()
    {
        return $this->ruta;
    }
    public static function creaPodcast($nombrePodcast, $userPodcast, $descripcion, $genero, $fecha, $ruta)
    {
        $podcast = self::consultarPodcast($nombrePodcast, $userPodcast);
        if ($podcast) {
            return false;
        }
        $podcast = new Podcast($nombrePodcast, $userPodcast, $descripcion, $genero, $fecha, $ruta);
        return self::subirPodcast($podcast);
    }

    public static function subirPodcast($podcast)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = sprintf(
            "insert into Podcast(userPodcast, nombrePodcast, Descripcion, genero, fecha, rutaPod)
        Values('%s', '%s','%s', '%s','%s','%s')",
            $conn->real_escape_string($podcast->userPodcast),
            $conn->real_escape_string($podcast->nombrePodcast),
            $conn->real_escape_string($podcast->descripcion),
            $conn->real_escape_string($podcast->genero),
            $conn->real_escape_string($podcast->fecha),
            $conn->real_escape_string($podcast->ruta)
        );
        if ($conn->query($sql)) {
            $podcast->idPodcast = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $podcast;
    }
    public static function eliminarPodcast($nombrePodcast)
    {
        $app = Aplicacion::getSingleton();
        $conexion = $app->conexionBd();
        $sql = sprintf('DELETE FROM Podcast 
                        WHERE Podcast.nombrePodcast = "%s"', $conexion->real_escape_string($nombrePodcast));
    }

    public static function consultarPodcast($nombrePodcast, $userPodcast)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = sprintf(
            'select * from podcast P where P.nombrePodcast = "%s"',
            $conn->real_escape_string($nombrePodcast),
            "and P.userPodcast = '%s'",
            $conn->real_escape_string($userPodcast)
        ); //dejarla así y probarla 
        $rs = $conn->query($sql);
        $result = false;
        if ($rs) {
            if ($rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $podcast = new Podcast($fila['nombrePodcast'], $fila['userPodcast'], $fila['Descripcion'], $fila['genero'], $fila['Fecha'], $fila['rutaPod']);
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
    public static function buscaId($idPodcast, $idPlaylist)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

        $sql = "SELECT * from podcast p JOIN listapodcast l ON p.idPodcast=l.idPodcast WHERE idLista = $idPlaylist";
        $datos = mysqli_query($conn, $sql);
        $html = "";

        while ($mostrar = mysqli_fetch_array($datos)) {
            if($mostrar["idPodcast"] == $idPodcast){
                $html .= <<<EOF
                <div id="audioreproduciendo" >
                <!-- <a href="archivos/pruebas/$mostrar[filename]"> -->
                    <span class = "caja">
                        <span class ="info">$mostrar[Descripción]</span> 
                        <img class ="img-pod" src=img/pruebas/$mostrar[idPodcast].JPG  width="175" height= "175" />
                    </span> 
                </a>
                </div>
                EOF;
            }
            else{
                $html .= <<<EOF
                <div id="audioreproduciendo" >
                <!-- <a href="archivos/pruebas/$mostrar[filename]"> -->
                    <span class = "caja" style="display:none;">
                        <span class ="info">$mostrar[Descripción]</span> 
                        <img class ="img-pod" src=img/pruebas/$mostrar[idPodcast].JPG  width="175" height= "175" />
                    </span> 
                </a>
                </div>
                EOF;
            }
            
        }
        return $html;
    }

    public static function muestraForo($idPlaylist){
    $app = Aplicacion::getSingleton();
    $conn = $app->conexionBd();
	$query = "SELECT * FROM  foro WHERE identificador = 0 AND idPlaylist = $idPlaylist ORDER BY fecha DESC";
	$result = $conn->query($query);

    $html ="";

	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$id = $row['ID'];
		$titulo = $row['titulo'];
		$fecha = $row['fecha'];
		$respuestas = $row['respuestas'];
        $comentario = $row['mensaje'];
        $autor = $row['autor'];
        
        $html .= <<<EOF

        <div class = "foro">
            <div class = "subforum-title">
                <h2>$titulo</h2>
            </div>
            <div class = "subforum-row">
                <div class = "subforum-icon subforum-column center">
                    <i class = "fa fa-podcast"></i>
                </div>
                <div class = "subforum-description subforum-column">
                    <p>$comentario</p>
                </div>
                <div class = "subforum-stats subforum-column center">
                    <span><a href='respuestasForo.php?ID=$row[ID]&idPlaylist=$idPlaylist'>Ver $respuestas respuestas</a></span>
                </div>
                <div class = "subrofum-info subforum-column">
                    <b>Posted by $autor</b> 
                    <br>
                    on <small>$fecha</small>
                </div>
            </div>
        </div>
        EOF;
        
	}
    $html .= "</table>";

    return $html;
    }


    public static function respuestasForo($ID, $idPlaylist){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = "SELECT * FROM  foro WHERE identificador = '$ID' ORDER BY fecha DESC";
        $result = $conn->query($query);
        
        $html = "";
    
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $id = $row['ID'];
            $titulo = $row['titulo'];
            $autor = $row['autor'];
            $mensaje = $row['mensaje'];
            $fecha = $row['fecha'];
            $comentario = $row['mensaje'];
            $respuestas = $row['respuestas'];
            
            $html .= <<<EOF
    
            <div class = "foro">
                <div class = "subforum-title">
                    <h2>$titulo</h2>
                </div>
                <div class = "subforum-row">
                    <div class = "subforum-icon subforum-column center">
                        <i class = "fa fa-podcast"></i>
                    </div>
                    <div class = "subforum-description subforum-column">
                        <p>$comentario</p>
                    </div>
                    <div class = "subforum-stats subforum-column center">
                        <span><a href='respuestasForo.php?ID=$row[ID]&idPlaylist=$idPlaylist'>Ver $respuestas respuestas</a></span>
                    </div>
                    <div class = "subrofum-info subforum-column">
                        <b>Posted by $autor</b> 
                        <br>
                        on <small>$fecha</small>
                    </div>
                </div>
            </div>
            EOF;
           
        }
        return $html;
    }

    public static function buscaNombre($idPlaylist, $idPodcast)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

        $sql = "SELECT p.nombrePodcast, p.idPodcast, p.userPodcast from podcast P JOIN listapodcast ON listapodcast.idPodcast = p.idPodcast WHERE listapodcast.idLista = $idPlaylist";
        $datos = mysqli_query($conn, $sql);
        $html = "";
        $mostrar = "";

        while ($mostrar = mysqli_fetch_array($datos)) {
            if($mostrar['idPodcast'] == $idPodcast){
                $html .= <<<EOF
                <div class ="nombre-podcast">$mostrar[nombrePodcast] - $mostrar[userPodcast]</div>
                EOF;
            }
            else{
                $html .= <<<EOF
                <div class ="nombre-podcast" style="display:none;">$mostrar[nombrePodcast] - $mostrar[userPodcast]</div>
                EOF;
            }
        }
        return $html;
    }
    public static function getPodcastName($idPodcast)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT podcast.filename from podcast WHERE idPodcast = $idPodcast";
        $datos = mysqli_query($conn, $sql);
        $name = "";
        while ($mostrar = mysqli_fetch_array($datos)) {
            $name = $mostrar["filename"];
        }
        return $name;
    }
    public static function muestraListaPodcast($idPlaylist, $idPodcast)
    {

        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT * from playlist WHERE idPlaylist = $idPlaylist";
        //Aqui obtengo la info de la playlist
        $datos = mysqli_query($conn, $sql);
        $html = "";
        $html .=  "<div class= \"contenedor\">";
        //Aqui obtengo la información de los podcast que pertenecen a la playlist
        $sql = "SELECT podcast.userPodcast, podcast.nombrePodcast, podcast.idPodcast, podcast.Descripción, podcast.filename FROM `listapodcast` JOIN podcast ON listapodcast.idPodcast = podcast.idPodcast WHERE listapodcast.idLista = $idPlaylist";
        $datos = mysqli_query($conn, $sql);
        //CONTENEDOR EXTERNO PARA TODA LA PLAYLIST  
        $html .=  "<div class= \"contenedorPlaylist\">";
        while ($mostrar = mysqli_fetch_array($datos)) {
            //CONTENEDOR INDIVIDUAL PARA LA COLUMNAS INDIVIDUALES
            if($mostrar['idPodcast'] == $idPodcast){
                $html .= <<<EOF
                <div class="infoPlaylist" style="display:none;">                         
                    <a class="enlacepod"  href=reproductor.php?idPodcast=$mostrar[idPodcast]&idPlaylist=$idPlaylist >  <img class="imagenPlaylistt" src=img/pruebas/$mostrar[idPodcast].jpg />
                    </a> 
                    <a href=reproductor.php?idPodcast=$mostrar[idPodcast]&idPlaylist=$idPlaylist ><h3>$mostrar[nombrePodcast]</h3></a> 
                    <!-- <h5> $mostrar[Descripción] </h5> -->
                </div>
            EOF;
            }
            else{
                $html .= <<<EOF
                <div class="infoPlaylist">                         
                    <a class="enlacepod"  href=reproductor.php?idPodcast=$mostrar[idPodcast]&idPlaylist=$idPlaylist >  <img class="imagenPlaylistt" src=img/pruebas/$mostrar[idPodcast].jpg />
                    </a> 
                    <a href=reproductor.php?idPodcast=$mostrar[idPodcast]&idPlaylist=$idPlaylist ><h3>$mostrar[nombrePodcast]</h3></a> 
                    <!-- <h5> $mostrar[Descripción] </h5> -->
                </div>
            EOF;
            }
            
        }
        $html .=   "</div>";
        return $html;
    }
    public static function getPlaylistPodcastId($idPlaylist)
    {

        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT * from playlist WHERE idPlaylist = $idPlaylist";
        //Aqui obtengo la info de la playlist
        $datos = mysqli_query($conn, $sql);
        //Aqui obtengo la información de los podcast que pertenecen a la playlist
        $sql = "SELECT podcast.idPodcast FROM `listapodcast` JOIN podcast ON listapodcast.idPodcast = podcast.idPodcast WHERE listapodcast.idLista = $idPlaylist";
        $datos = mysqli_query($conn, $sql);
        //CONTENEDOR EXTERNO PARA TODA LA PLAYLIST  
        return mysqli_fetch_array($datos);
    }
    
    public static function getPlaylistArray($idPlaylist)
    {

        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql = "SELECT podcast.filename, podcast.idPodcast FROM podcast JOIN listapodcast ON podcast.idPodcast = listapodcast.idPodcast WHERE listapodcast.idLista = $idPlaylist";
        $datos = mysqli_query($conn, $sql);
        $listaaudios = array();
        while ($mostrar = mysqli_fetch_array($datos)) {
            array_push($listaaudios,$mostrar);
        }
        return $listaaudios;
    }
    public static function buscaPodcast($criterio)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        //$sql = "SELECT * from playlist WHERE idPlaylist = $criterio";
        //Aqui obtengo la info de la playlist
        //$datos = mysqli_query($conn, $sql);
        $html = "";
        $html .=  "<div class= \"contenedor\">";
        //Aqui obtengo la información de los podcast que pertenecen a la playlist
        $sql = "SELECT DISTINCT podcast.idPodcast, podcast.nombrePodcast, podcast.userPodcast, podcast.Fecha, podcast.Descripción, listapodcast.idLista FROM podcast JOIN listapodcast ON podcast.idPodcast = listapodcast.idPodcast WHERE podcast.nombrePodcast like ('%' '$criterio' '%')";
        $datos = mysqli_query($conn, $sql);
        //CONTENEDOR EXTERNO PARA TODA LA PLAYLIST  
        $html .=  "<div class= \"contenedorPlaylist\">";
        $html .= "<h2> Resultados por nombre de Podcast: </h2>";
        while ($mostrar = mysqli_fetch_array($datos)) {
            //CONTENEDOR INDIVIDUAL PARA LA COLUMNAS INDIVIDUALES
            $html .= <<<EOF
            <div class="infoPlaylist">                         
                <a class="enlacepod"  href=reproductor.php?idPodcast=$mostrar[idPodcast]&idPlaylist=$mostrar[idLista] >  <img class="imagenPlaylistt" src=img/pruebas/$mostrar[idPodcast].jpg >
                </a> 
            
            <a  href=reproductor.php?idPodcast=$mostrar[nombrePodcast]&idPlaylist=$criterio >   <h3> $mostrar[nombrePodcast] </h3>      <h5> $mostrar[Descripción] </h5> </a> 
            
            </div>
            EOF;
        }
        $html .=   "</div>";
        return $html;
    }/*
    public static function actualizaNumeroPodcast($userPodcast){
        $app = Aplicacion::getSingleton();
        $conexion = $app->conexionBd();
        $sql ="Update usuario U set numeroPodcast=(SELECT count('$user')+1 from podcast P where
        U.username = P.userPodcast) where U.username='$user'";
        $conexion->query($sql);
    }
   */
    public static function buscaUser($criterio)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        //$sql = "SELECT * from playlist WHERE idPlaylist = $criterio";
        //Aqui obtengo la info de la playlist
        //$datos = mysqli_query($conn, $sql);
        $html = "";
        $html .=  "<div class= \"contenedor\">";
        //Aqui obtengo la información de los podcast que pertenecen a la playlist
        $sql = "SELECT DISTINCT usuario.username FROM usuario WHERE usuario.username like concat('%', '$criterio', '%')";
        $datos = mysqli_query($conn, $sql);
        //CONTENEDOR EXTERNO PARA TODA LA PLAYLIST  
        $html .=  "<div class= \"contenedorPlaylist\">";
        $html .= "<h2> Resultados por nombre de usuario:
        
         </h2>";
        while ($mostrar = mysqli_fetch_array($datos)) {
            //CONTENEDOR INDIVIDUAL PARA LA COLUMNAS INDIVIDUALES
            $html .=  "<div class= \"cajaUser\">";
            $html .= <<<EOF
            
           
            <a class="pod"  href=perfil_user.php?username=$mostrar[username] >  <img class="imagenUser" src=includes/ImagenesUser/$mostrar[username].png > </a>
            <a <h5> $mostrar[username] </h5> </a> 

            </div>
            </div>
            EOF;
        }  
        $html .=   "</div>";
        return $html;
    }
    public static function buscaPodUser($userPodcast){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        
        $sql= "SELECT * FROM podcast P where P.userPodcast = '$userPodcast'";
        $datos = mysqli_query($conn, $sql);
        $html = "";
        $mostrar="";
        if($datos){
            while($mostrar=mysqli_fetch_array($datos)){
                $html .= <<<EOF
                <span class = "caja"><span class ="info">$mostrar[Descripción]</span><a href=?idPodcast=$mostrar[idPodcast]>
                <img class ="img-pod" src=img/pruebas/$mostrar[idPodcast].JPG  width="175" height= "175" alt=Los Tejos /></a></span> 
                <p> $mostrar[Descripción]<p>
                EOF;
                
            }
        }
       
        return $html;
    }
}
