<?php

if(!isset($_SESSION["login"])){
    echo" <img src='./img/logo_transparent.png' width='175'/>";
    echo" <input type='search' placeholder='Search...'>";
    echo' <button class="btn-login" type="button" onclick="openForm()">Login</button>';
    echo' <button id="btn-register" type="button" onclick="openFormRegister()">Register</button>';
}else{
    $username = $_SESSION["nombre"];
    echo" <img src='./img/logo_transparent.png' width='175'/>";
    echo" <input type='search' placeholder='Search...'>";
    echo'Bienvenido, '. $username . '.';
    echo'<button onclick="location.href="index.php";">Logout</button>';
}
?>