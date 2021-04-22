<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	  <style>
    body { background-color: #000000; }
  </style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WaveCast</title>
    <link rel="icon" type="image/png" href="./img/favicon.png" />
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
</head>
<body>
<?php
include ("includes/navbar.php");
require ("includes/header.php");
?>

    <article>
      
    </article>
    <div id="myForm">
        <form method="POST" action="procesa-login.php" class="form-container">
            <h2>Inicia Sesión</h2>
            <h4>Para que puedas acceder a todo el contenido</h4>
            <label for="email"><b>Email</b></label>
            <input id ="email" name="email"  type="text" placeholder="Email o Nombre de usuario" required>

            <label for="psw"><b>Password</b></label>
            <input id="psw" name="psw" type="password" placeholder="Introduce Contraseña"  required>

            <button type="submit" class="btn">Login</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            <button type="button" class="btn register" onclick="openFormRegister()">Registro</button>
        </form>
    </div>
    <div id="RegisterUser">
        <form method="POST" action="registro.php" onSubmit="return validarPasswd() " class="form-container1"  >
            <h2>Registrate</h2>
            <h4>Para que puedas acceder a todo el contenido</h4>
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Introduce Email" id="email" name="email" required>

            <label for="user1"><b>Nombre</b></label>
            <input type="user1" placeholder="Nombre" id="nombre" name="nombre" required>

            <label for="user2"><b>Apellido</b></label>
            <input type="user2" placeholder="Apellido" id="apellido" name="apellido" required>

            <label for="username"><b>Nombre de Usuario</b></label>
            <input type="username" placeholder="Nombre de Usuario" id="username" name="username" required>
            <label for="psw"><b>Contraseña</b></label>
            <input id="psw" type="password" placeholder="Introduce Contraseña"  name="psw" size="30" required>

            <label for="psw1"><b>Repite la Contraseña</b></label>
            <input id="psw1" type="password" placeholder="Repite la Contraseña" size="30" required>

    
            <button type="submit" class="btn">Registrarse</button>
            <button type="button" class="btn cancel" onclick="closeFormRegister()">Close</button>
        </form>
    </div>
    <script>
        function openForm() {
              closeFormRegister()
              document.getElementById("myForm").style.display = "block";
            }
        function closeForm() {
              document.getElementById("myForm").style.display = "none";
          }
        function openFormRegister() {
              closeForm();
              document.getElementById("RegisterUser").style.display = "block";
          }
        function closeFormRegister() {
              document.getElementById("RegisterUser").style.display = "none";
          }
        function validarPasswd () {
   
                var p1 = document.getElementById("passwd").value;
                var p2 = document.getElementById("passwd2").value;
                var espacios = false;
                var cont = 0;
                
                // Este bucle recorre la cadena para comprobar
                // que no todo son espacios
                    while (!espacios && (cont < p1.length)) {
                        if (p1.charAt(cont) == " ")
                            espacios = true;
                        cont++;
                    }
                    
                if (espacios) {
                    alert ("La contraseña no puede contener espacios en blanco");
                    return false;
                }
                    
                if (p1.length == 0 || p2.length == 0) {
                    alert("Los campos de la password no pueden quedar vacios");
                    return false;
                }
                    
                if (p1 != p2) {
                    alert("Las passwords deben de coincidir");
                    return false;
                } else {
                    alert("Todo esta correcto");
                    return true; 
                }
                }
       
    </script>
</body>
</html>
