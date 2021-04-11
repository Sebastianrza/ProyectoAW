<?php 
require 'database.php';
session_start();

echo "<h2> ESTOS SON LOS AUDIOS DESTACADOS: </h2>";

$stmt = $conn->prepare("SELECT DISTINCT podcast.nombrePodcast, podcast.visualizaciones FROM podcast ORDER BY podcast.visualizaciones DESC");
$stmt->execute();
$primerRegistro= true;
while ($row = $stmt->fetch()){
//     echo "<h4>Podcast: </h4>{$row["nombrePodcast"]} <br>";
//     echo "Numero de reproducciones: {$row["visualizaciones"]} <br>";
// }
    if($primerRegistro){
      echo "<h2>Podcast: </h2> <h2> {$row["nombrePodcast"]}</h2><br>";
      echo "<h2>Numero de reproducciones: {$row["visualizaciones"]}</h2><br>";
      $primerRegistro= false;//Nos aseguramos que solo se ejecute una vez
    }
    else{
        echo "<h4>Podcast: </h4>{$row["nombrePodcast"]} <br>";
        echo "Numero de reproducciones: {$row["visualizaciones"]} <br>";
    }
  }