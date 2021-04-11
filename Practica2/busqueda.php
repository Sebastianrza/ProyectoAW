<?php 
require 'database.php';
session_start();

$criterio = $_GET["fname"];
echo "<h2> Resultados con: ". $criterio . "</h2>";

$stmt = $conn->prepare("SELECT DISTINCT usuario.username FROM usuario WHERE usuario.username like concat('%', ?, '%')");
$stmt->bindParam(1, $criterio);
$stmt->execute();
echo "<h2> Usuarios con nombre: ". $criterio . "</h2>";
echo "<h4> Numero de resultados: ". $stmt->rowCount() . "</h4>";

$stmt->setFetchMode(PDO::FETCH_ASSOC);
while ($row = $stmt->fetch()){
    echo "Nombre de usuario: ".$row["username"]. "<br>";
}


$stmt = $conn->prepare("SELECT DISTINCT podcast.nombrePodcast, podcast.userPodcast, podcast.Fecha, podcast.visualizaciones
FROM podcast
WHERE podcast.nombrePodcast like concat('%', ?, '%')");
$stmt->bindParam(1, $criterio);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
echo "<h2> Podcast con nombre: ". $criterio . "</h2>";
echo "<h4> Numero de resultados: ". $stmt->rowCount() . "</h4>";
while ($row = $stmt->fetch()){
    echo "<h4>Podcast: </h4>{$row["nombrePodcast"]} <br>";
    echo "Creador: {$row["userPodcast"]} <br>";
    echo "Fecha de subida: {$row["Fecha"]} <br>";
    echo "Visualizaciones: {$row["visualizaciones"]} <br>";
}

$stmt = $conn->prepare("SELECT DISTINCT podcast.nombrePodcast, podcast.userPodcast, podcast.Fecha, podcast.visualizaciones
FROM podcastag JOIN podcast ON podcastag.podcastID = podcast.idPodcast
WHERE podcastag.tagID like concat('%', ?, '%')");
$stmt->bindParam(1, $criterio);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
echo "<h2> Podcast etiquetados con: ". $criterio . "</h2>";
echo "<h4> Numero de resultados: ". $stmt->rowCount() . "</h4>";
while ($row = $stmt->fetch()){
    echo "<h4>Podcast: </h4>{$row["nombrePodcast"]} <br>";
    echo "Creador: {$row["userPodcast"]} <br>";
    echo "Fecha de subida: {$row["Fecha"]} <br>";
    echo "Visualizaciones: {$row["visualizaciones"]} <br>";
}
?>