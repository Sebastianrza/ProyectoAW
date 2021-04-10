<?php 
  
    $server = 'localhost';
    $username = 'root'; // introducir su usuario creada
    $password = ''; // contraseña si tiene
    $database = 'wavecast'; //Nombre de base de Datos

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
        die('Connection Failed: ' . $e->getMessage());
      }
?>