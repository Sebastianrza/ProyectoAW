<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro</title>
    <link rel="icon" type="image/png" href="./img/favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./css/foro.css">
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
