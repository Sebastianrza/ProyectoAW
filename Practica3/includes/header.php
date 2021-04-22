<?php
    if(!isset($_SESSION["login"])){
    echo" <img src='./img/logo_transparent.png' width='175'/>";
?>
   <div id = "div-header">
        <form id = "form-buscar" action="busqueda.php" method="GET">
            <label for="fname">Buscar:</label>
            <input type="text" id="fname" name="fname">
            <input type="submit" value = "Search">
        </form>

        <form id = "form-explorar" action="explorar.php" method="GET">
            <input type="submit" value = "Explorar">
        </form>
    </div>
<?php
    echo' <button class="btn-login" type="button" onclick="openForm()">Login</button>';
    echo' <button id="btn-register" type="button" onclick="openFormRegister()">Register</button>';
}else{
    $username = $_SESSION["nombre"];
    echo" <img src='./img/logo_transparent.png' width='175'/>";
    ?>
    <div id = "div-header">
        <form id = "form-buscar" action="busqueda.php" method="GET">
            <label for="fname">Buscar:</label>
            <input type="text" id="fname" name="fname">
            <input type="submit" value = "Search">
        </form>

        <form id = "form-explorar" action="explorar.php" method="GET">
            <input type="submit" value = "Explorar">
        </form>
    </div>
    <?php
    echo'<p id ="par-bien">Bienvenido, <a href ="perfil.php">'. $username . '</a></p>';
    echo'<button id ="btn-log"onclick="location.href=\'logout.php\';"> Logout</button>';
}
?>