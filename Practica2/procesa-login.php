<?php 
if (isset($_SESSION['nombre'])) {
  header('Location: index.php');
}
require_once __DIR__.'/APP/BD/database.php';
$email = htmlentities(addslashes($_POST['email']));
$pass = htmlentities(addslashes($_POST['psw']));
if (!empty($_POST['email']) && !empty($_POST['psw'])) {
  $sql = 'SELECT * FROM usuario WHERE email = :email';
  $records = $conn->prepare($sql);
  $records->bindValue(':email', $_POST['email']);
  $records->execute();
  $num_reg = $records->rowCount();
  if($num_reg != 0){
    while($results = $records->fetch(PDO::FETCH_ASSOC)){
      if(password_verify($_POST['psw'], $results['pass'])){
        session_start();
        $_SESSION['nombre'] = $_POST['email'];
        $_SESSION['login'] = true;
        header("Location: index.php");
        exit();
      }else{
        
        header('location: index.php');
      }
  }
  $records->close(); $conn ->close();
  }else{
    echo '<h2>Disculpe, el usuario No está registrado</h2>';
    echo '<button onclick="index.php"> Regresar</button>';
  }
}


?>