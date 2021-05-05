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
	<h1></h1>
	<div class="saludo">
	<?php
		mostrarSaludo();
	?>
	</div>
</header>