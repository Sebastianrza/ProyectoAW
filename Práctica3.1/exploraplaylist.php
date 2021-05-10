<?php
class ExploraPlaylist{
	private $result;
	public function muestraExploraPlaylist(){
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
			<?php
				while($this->result){
			?>
				<div class = "playlist">
					<img src = "<?php "/img/".$result["imagen"]."/" ?>">
				</div>
			<?php
				}
			?>
			</div>
			<script src = "js/exploraplaylist.js"></script>
		</body>
		</html>
		EOF;
		return $html;
	}
	private function daoPlaylist(){
		require_once __DIR__.'/APP/BD/database.php';
		session_start();
		$stmt = $conn->prepare("SELECT * FROM playlist WHERE Titulo NOT LIKE \"Anunciantes\"");
		$stmt->execute();
		$primerRegistro= true;
		$result = $stmt->fetch();
		
	}
}

$forExploraPlaylisto = new ExploraPlaylist();
$for = $ExploraPlaylist->muestraExploraPlaylist();

$contenidoPrincipal = <<<EOS
<h1>Reproductor</h1>
$for
EOS;
require __DIR__.'/includes/plantillas/plantilla.php';