<?php

if(!isset($_SESSION["login"])){
    echo" <img src='./img/logo_transparent.png' width='175'/>";
    ?>
    <form action="busqueda.php" method="GET">
    <label for="fname">Buscar:</label>
    <input type="text" id="fname" name="fname">
    <input type="submit" value = "Search">
    </form>
    <form action="explorar.php" method="GET">
    <input type="submit" value = "Explorar">
    </form>
    <?php
    echo' <button class="btn-login" type="button" onclick="openForm()">Login</button>';
    echo' <button id="btn-register" type="button" onclick="openFormRegister()">Register</button>';
}else{
    $username = $_SESSION["nombre"];
    echo" <img src='./img/logo_transparent.png' width='175'/>";
    ?>
    <form action="busqueda.php" method="GET">
    <label for="fname">Buscar:</label>
    <input type="text" id="fname" name="fname">
    <input type="submit" value = "Search">
    </form>
    <form action="explorar.php" method="GET">
    <input type="submit" value = "Explorar">
    </form>
    <?php
    echo'Bienvenido, <a href ="perfil.php">'. $username . '</a>';
    echo'<button onclick="location.href=\'logout.php\';"> Logout</button>';
}
?>