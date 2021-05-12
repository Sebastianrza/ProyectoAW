<?php
<<<<<<< Updated upstream

use es\ucm\fdi\aw\Aplicacion;

=======
namespace es\ucm\fdi\aw;
>>>>>>> Stashed changes
class ExploraPlaylist{
	private $result;

	public function muestraExploraPlaylist($output){
		$html = <<<EOF
		<link rel="stylesheet" type="text/css" href="foro.css">
		</head>
		<body>
			<?php
				include('includes/navbar.php');	
				include('includes/header.php')
			?>	
			<h2> EXPLORAR PLAYLIST </h2>
			<div class = "container">
			<h2> "HOLA" </h2>
			<h2> "$output" </h2>
			</div>
			<script src = "js/exploraplaylist.js"></script>
		</body>
		</html>
		EOF;
		return $html;
	}
<<<<<<< Updated upstream
	public function daoPlaylist(){
		require_once __DIR__. '/includes/Aplicacion.php';
		$app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
		$stmt = $conn->prepare("SELECT * FROM playlist");
=======
	private function daoPlaylist(){
		
		session_start();
		$stmt = $conn->prepare("SELECT * FROM playlist WHERE Titulo NOT LIKE \"Anunciantes\"");
>>>>>>> Stashed changes
		$stmt->execute();
		$primerRegistro = true;
		$output = 2;
		return $this->muestraExploraPlaylist($output);
	}
}

$ExploraPlaylist = new ExploraPlaylist();
$for = $ExploraPlaylist->daoPlaylist();

$contenidoPrincipal = <<<EOS
<h1>EXPLORAR</h1>
$for
EOS;
require __DIR__.'/includes/plantillas/plantilla.php';