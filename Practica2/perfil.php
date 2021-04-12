<?php
require 'database.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="estilo" type="text/css" href="./css/styles.css" rel="stylesheet">
    <title>Mi Perfil</title>
</head>

<body>
    <img src="./img/logo.png" alt="Logo WaveCast" width="300">
    <!-- <input type='search' placeholder='Search...'> -->
    <div class="Perfil">
        <button class="b-perfil" type="button">
            Perfil
        </button>
    </div>
    <nav>
        <ul>
            <li><a href="#Podcast">Podcast</a></li>
            <?php
          $criterio = $_GET["fname"];
          echo "<h2> Resultados con: ". $criterio . "</h2>";
          
          $stmt = $conn->prepare("SELECT DISTINCT podcast.nombrePodcast, podcast.visualizaciones FROM podcast WHERE podcast.userPodcast = '?' ");
          $stmt->bindParam(1, $criterio);
          $stmt->execute();
          echo "<h2> Podcast del usuario: ". $criterio . "</h2>";
          echo "<h4> Numero de podcast: ". $stmt->rowCount() . "</h4>";
          
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          
          while ($row = $stmt->fetch()){
          /* ?>
          //     <body> <img src="./img/favicon.png" alt="Logo WaveCast" width = "30"> </body>
           <?php*/
           
              $nomPodacast = $row["nombrePodcast"];
              // echo "Nombre de usuario: ".$nomUser. "<br>";
             
              echo "<h3>" , '<a href="perfil.php?">' . $nomPodcast .'</a>'. "<br>" . "</h3>";
              echo "<h3>" , '<a href="perfil.php?">' . $row["visualizaciones"] .'</a>'. "<br>" . "</h3>";
          }

            ?>
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