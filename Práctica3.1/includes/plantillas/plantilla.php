<!DOCTYPE html>
<html>
<head>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/Playlist.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/estilo.css" />
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" href="./img/favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?= $tituloPagina ?></title>
</head>
<body>
<div id="contenedor">
<?php
	require("includes/comun/cabecera.php");
?>
	<main>
		<article>
		<form action ="busqueda.php" method= "get" class = "form_search">
		<input type="text" placeholder="Buscar" id="fname" name="fname">
		<input type= "submit" value="BUSCAR" class= "btn_search">
        </form>
			<?= $contenidoPrincipal ?>
		</article>
	</main>
<?php
	require("includes/comun/pie.php");
?>
</div>
<script src = "includes/js/navbar.js"></script>

</body>
</html>