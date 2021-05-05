<?php
class Foro{

	public function muestraForo(){
		$html = <<<EOF
		<link rel="stylesheet" type="text/css" href="foro.css">
		</head>
		<body>
			<?php
				include('includes/navbar.php');	
				include('includes/header.php')
			?>	
			<div class = "container">
				<div class = "subforum-title">
					<h1>Información general</h1>
				</div>
				<div class = "subforum-row">
					<div class = "subforum-icon subforum-column center">
						<i class = "fa fa-podcast"></i>
					</div>
					<div class = "subforum-description subforum-column">
						<h1><a href = "">Título descripción:</a></h1>
						<p>Descripción: Esto es un ejemplo para hacer parecer que estoy escribiendo algo relevante cuando en realidad no lo es</p>
					</div>
					<div class = "subforum-stats subforum-column center">
						<span>24 posts | 15 topics</span>
					</div>
					<div class = "subrofum-info subforum-column">
						<b><a href="">Last post</a></b> by <a href = "">JustAUser</a> 
						<br>
						on <small>22 Dec 2021</small>
					</div>
				</div>
			</div>
			<script src = "js/foro.js"></script>
		</body>
		</html>
		EOF;
		return $html;
	}
}

$foro = new foro();
$for = $foro->muestraForo();

$contenidoPrincipal = <<<EOS
<h1>Reproductor</h1>
$for
EOS;
require __DIR__.'/includes/plantillas/plantilla.php';