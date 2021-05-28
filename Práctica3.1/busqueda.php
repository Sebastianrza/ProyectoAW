<?php
namespace es\ucm\fdi\aw;
require_once __DIR__.'/includes/config.php';


if(isset($_GET['fname'])){
    $criterio = $_GET['fname'];
}

//$_SESSION['Titulo'] = $_GET['Titulo'];
//$playlist = $_SESSION['Titulo'];
$listaPodcast = Podcast::buscaPodcast($criterio);
$listaUser = Podcast::buscaUser($criterio);
$listaPlaylist = Playlist::buscarPlaylist($criterio);


$arr = array();

$tituloPagina = 'Lista';
$contenidoPrincipal = <<<EOS
$listaPodcast
$listaUser
$listaPlaylist

EOS;
require __DIR__.'/includes/plantillas/plantilla.php';

/*
criterio = $_GET["fname"];
echo "<h2> Resultados con: " . $criterio . "</h2>";

$stmt = $conn->prepare("SELECT DISTINCT usuario.username FROM usuario WHERE usuario.username like concat('%', ?, '%')");
$stmt->bindParam(1, $criterio);
$stmt->execute();
echo "<h2> Usuarios con nombre: " . $criterio . "</h2>";
echo "<h4> Numero de resultados: " . $stmt->rowCount() . "</h4>";

$stmt->setFetchMode(PDO::FETCH_ASSOC);

while ($row = $stmt->fetch()) {
    /* ?>
//     <body> <img src="./img/favicon.png" alt="Logo WaveCast" width = "30"> </body>
 <?php

    $nomUser = $row["username"];
    // echo "Nombre de usuario: ".$nomUser. "<br>";

    echo "<h3>", '<a href="perfil.php?">' . $nomUser . '</a>' . "<br>" . "</h3>";
}

$stmt = $conn->prepare("SELECT DISTINCT podcast.nombrePodcast, podcast.userPodcast, podcast.Fecha, podcast.visualizaciones
FROM podcast
WHERE podcast.nombrePodcast like concat('%', ?, '%')");
$stmt->bindParam(1, $criterio);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
echo "<h2> Podcast con nombre: " . $criterio . "</h2>";
echo "<h4> Numero de resultados: " . $stmt->rowCount() . "</h4>";
while ($row = $stmt->fetch()) {
    // echo "<h4>Podcast: </h4>{$row["nombrePodcast"]} <br>";
    echo "<h3>", '<a href="reproductor.php?">' . $row["nombrePodcast"] . '</a>' . "<br>" . "</h3>";
    // echo "Creador: {$row["userPodcast"]} <br>";
    echo "<h4>", '<a href="perfil.php?">' . $row["userPodcast"] . '</a>' . "<br>" . "</h4>";
    echo "Fecha de subida: {$row["Fecha"]} <br>";
    echo "Visualizaciones: {$row["visualizaciones"]} <br>";
}

$stmt = $conn->prepare("SELECT DISTINCT podcast.nombrePodcast, podcast.userPodcast, podcast.Fecha, podcast.visualizaciones
FROM podcastag JOIN podcast ON podcastag.podcastID = podcast.idPodcast
WHERE podcastag.tagID like concat('%', ?, '%')");
$stmt->bindParam(1, $criterio);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
echo "<h2> Podcast etiquetados con: " . $criterio . "</h2>";
echo "<h4> Numero de resultados: " . $stmt->rowCount() . "</h4>";
while ($row = $stmt->fetch()) {
    // echo "<h4>Podcast: </h4>{$row["nombrePodcast"]} <br>";
    echo "<h3>", '<a href="reproductor.php?">' . $row["nombrePodcast"] . '</a>' . "<br>" . "</h3>";
    // echo "Creador: {$row["userPodcast"]} <br>";
    echo "<h4>", '<a href="perfil.php?">' . $row["userPodcast"] . '</a>' . "<br>" . "</h4>";
    echo "Fecha de subida: {$row["Fecha"]} <br>";
    echo "Visualizaciones: {$row["visualizaciones"]} <br>";
}
*/
?>