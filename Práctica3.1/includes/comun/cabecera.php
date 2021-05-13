<?php
function mostrarSaludo() {
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
		echo "Bienvenido, <a href ='perfil.php'>" . $_SESSION['nombre'] . "</a>.<a href='logout.php'> salir </a>";
		
	} else {
		echo "Usuario desconocido. <a href='login.php'>Login</a> <a href='registro.php'>Registro</a>";
	}
}
?>
<header>
	<div class = "navbar">
		<nav class = "navigation hide" id = "navigation">
					<span class = "close-icon" onclick = "showIconBar()"><i class = "fa fa-close"></i></span>
			<ul class = "navlist">
				<li class = "nav-item">
					<a href = "index.php">Index</a>
				</li>		
				<li class = "nav-item">
					<a href = "reproductor.php">Reproductor</a>
				</li>	
				<li class = "nav-item">
					<a href = "foro.php">Foro</a>
				</li>
				<li class = "nav-item">
					<a href = "playlist.php">Explora Playlist</a>
				</li>		
				<li class = "nav-item">
					<a href = "perfil.php">Perfil</a>
				</li>
						
			</ul>
		</nav>
		<a href = "#" class = "bar-icon" id = "iconBar" onclick = "hideIconBar()"><i class="fa fa-bars"></i></a>
		<h1 class = "WaveCast-logo"> WaveCast </h1>
		<h1></h1>
		<div class="saludo">
			<?php
				mostrarSaludo();
			?>
		</div>
	</div>
	
</header>