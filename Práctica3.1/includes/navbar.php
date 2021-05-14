<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro</title>
    <link rel="icon" type="image/png" href="./img/favicon.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">
</head>
<body>
	<header>
		<div class = "navbar">
			<nav class = "navigation hide" id = "navigation">
					<span class = "close-icon" onclick = "showIconBar()"><i class = "fa fa-close"></i></span>
				<ul class = "navlist">
					<li class = "nav-item">
						<a href = "exploraplaylist.php">Index</a>
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
		</div>
	</header>	
	<script src = "includes/js/navbar.js"></script>
</body>
</html>
