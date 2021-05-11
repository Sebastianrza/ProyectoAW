<?php

namespace es\ucm\fdi\aw;

require_once __DIR__.'/includes/config.php';
require_once __DIR__.'/includes/Podcast.php';

$tituloPagina = 'Premium';


class premium {   
    
    public function gestionaPremium(){

        $html = <<<EOF
        <img src = «misfotos/construccion.jpg» />
        EOF;
        return $html;
       
    }
}

$premium = new premium();
$prem = $premium->gestionaPremium();

$contenidoPrincipal = <<<EOS
<h1>HAZTE PREMIUM USER</h1>
$prem
EOS;

require __DIR__.'/includes/plantillas/plantilla.php';