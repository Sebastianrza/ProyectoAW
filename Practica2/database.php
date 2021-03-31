<?php 

    $server = '127.0.0.1';
    $username = ''; // introducir su usuario creada
    $password = ''; // contraseña si tiene
    $database = 'WaveCast'; //Nombre de base de Datos

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
      } catch (PDOException $e) {
        die('Connection Failed: ' . $e->getMessage());
      }
      

?>