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
					<a href = "perfil.php">Perfil</a>
				</li>	
				<li class = "nav-item">
					<a href = "index.php">Inicio</a>
				</li>	
				<li class ="nav-item">
					<a href = "admin.php">Administrar</a>
				</li>
				<li class ="nav-item">
					<a href = "pagPremium.php">Hazte Premium</a>
				</li>
			</ul>
		</nav>
		<a href = "#" class = "bar-icon" id = "iconBar" onclick = "hideIconBar()"><i class="fa fa-bars"></i></a>
		<h1 class = "WaveCast-logo"><a href = "index.php">WaveCast</a></h1>
		<h1></h1>
	</div>
	<div class="saludo">
		<?php
			mostrarSaludo();
		?>
	</div>
</header>