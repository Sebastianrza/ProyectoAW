<?php

namespace es\ucm\fdi\aw;

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Podcast.php';

$tituloPagina = 'Reproductor';


class reproductor extends Podcast {   
    private $genero;
    
    public function __construct($idPodcast, $descripcion,$nombrePodcast, $userPodcast, $genero, $fecha)
    {   
        parent::__construct($idPodcast, $descripcion,$nombrePodcast, $userPodcast, $genero, $fecha);
    }

    static public function ctrUltimoUsuario()
    {
      return "Último usuario";
    }

    private function cargaListaPodcast(){
        lista::crearLista(); 
    }

    public function gestionaReproductor(){

        $html = <<<EOF
        <audio id = "audio">
            <source src="archivos/pruebas/prueba1.mp3" type="audio/mp3">
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

        <script src="includes/js/botones.js"></script>

        EOF;
        return $html;
    }
}

$reproductor = new reproductor(null, null, null, null, null, null);
$rep = $reproductor->gestionaReproductor();

$contenidoPrincipal = <<<EOS
<h1>Reproductor</h1>
$rep
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';