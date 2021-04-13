<?php

  require_once __DIR__.'/includes/BD/database.php';
  session_start();
  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['psw'] && !empty($_POST['nombre']) 
  && !empty($_POST['apellido']) && !empty($_POST['username']) )) {

    $sql = "INSERT INTO `usuario` (email, nombre, apellido, username, pass ) VALUES (:email,:nombre, :apellido, :username, :pass)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':apellido', $_POST['apellido']);
    $stmt->bindParam(':username', $_POST['username']);
    $password = password_hash($_POST['psw'], PASSWORD_BCRYPT);
    $stmt->bindParam(':pass', $password);
    
    if ($stmt->execute()) {
      $message = 'Se ha creado el usuario correctamente.';
      $stmt ->close(); $conn ->close();
      header("location: index.php");
    } else {
      $stmt ->close(); $conn ->close();
      $message = 'Disculpe la cuenta ya está creada.';
    }

  
  }
?>