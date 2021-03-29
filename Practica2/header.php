<?php
$url = 'login.php';
$url1 = 'registro.php';
echo" <img src='./img/logo_transparent.png' width='175'/>";
echo" <input type='search' placeholder='Search...'>";
echo' <button id="btn-login" type="button" onclick =location.href="'. $url .'">Login</button>';
echo' <button id="btn-register" type="button" onclick =location.href="'. $url1 .'">Register</button>';
?>