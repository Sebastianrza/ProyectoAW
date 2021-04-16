<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id ="estilo" type="text/css" href="./css/styles.css" rel="stylesheet">
    <title>Mi Perfil</title>
</head>
<body>
    <img src="./img/logo.png" alt="Logo WaveCast" width = "300">
    <input type='search' placeholder='Search...'>
    <div class="Perfil">
        <button class= "b-perfil" type = "button"> 
            Perfil
        </button>
    </div>
    <nav>
        <ul>
          <li><a href="#Podcast">Podcast</a></li>
          <li><a href="#Siguiendo">Siguiendo</a></li>
          <li><a href="#Guardados">Guardados</a></li>
          <li><a href="#Comentario">Comentarios</a></li>
        </ul>
    </nav>

    <section>
        <div id="Podcast"></div>
    </section>
</body>
</html>