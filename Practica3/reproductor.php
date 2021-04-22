<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reproductor</title>
    <link rel="icon" type="image/png" href="./img/favicon.png" />
    <link rel="stylesheet" type="text/css" href="css/foro.css">

</head>
<body>
		
	<?php
		include('includes/navbar.php');
		include('includes/header.php')
	?>
		
        <!--aside class="sidebar">
			<nav class="nav">
				<ul>
					<p id ="parrafo">
						<img src="img/logo_transparent.png" alt="logo" style="width:230px;height:230px">
					</p>
					<h3 id="Favoritos">Favoritos</h3>
					<h3 id="Seguir escuchando">Seguir escuchando</h3>
				</ul>
			</nav>
		</aside-->
		<br>
		<br>
		<br>
        <div class="album-img">
			<img id="imgAlbum" src="portadas/pruebas/prueba1.jpg" width="250" height="180">
		</div>
		
		<!--Botones-->
		<div class ="audio-rep">
			<audio id = "miAudio">
				<!--source src="archivos/pruebas/prueba1.mp3" type="audio/mp3">
				<li><source src="archivos/pruebas/prueba2.mp3" type="audio/mp3"></li-->
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
			<div class = "rep-list">
				<ul>
					<li><a href ="#archivos/pruebas/prueba1.mp3">Song 1</li>
					<li><a href ="#archivos/pruebas/prueba2.mp3" id = "song2">Song 2</li>
					<li><a href ="#">Song 3</li>
					<li><a href ="#">Song 4</li>
				</ul>
			</div>

		</div>		 
		<script src="js/botones.js"></script>
		<script src="js/foro.js"></script>
		<br><br>
		

		<div class="subida-podcast">
			<form action="subir.php" method="post" enctype="multipart/form-data">
			<input type="file" name="archivo">
			<br><br>
			<button>Subir</button>
			</form>                           
		</div>

		
</body>
</html>
