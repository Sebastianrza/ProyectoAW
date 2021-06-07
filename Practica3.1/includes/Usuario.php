<?php
namespace es\ucm\fdi\aw;

class Usuario//Que puede pasar?
{

    public static function login($nombreUsuario, $password)
    {
        $user = self::buscaUsuario($nombreUsuario);
        if ($user && $user->compruebaPassword($password)) {
            return $user;
        }
        return false;
    }

    public static function buscaUsuario($nombreUsuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM usuario U WHERE U.username = '%s'", $conn->real_escape_string($nombreUsuario));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $user = new Usuario($fila['username'], $fila['nombre'], $fila['email'],$fila['biografia'] ,$fila['pass'], $fila['rol']);
                //$user->id = $fila['id'];
                $result = $user;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }

    public static function compruebaUsuario($nombreUsuario, $email){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM usuario U WHERE U.username = '%s' or U.email = '%s'"
                    ,$conn->real_escape_string($nombreUsuario)
                    ,$conn->real_escape_string($email));
        $rs = $conn->query($query);
        if ($rs->num_rows == 1) {
            return true;
            $rs->free();
        }else {
            return false;
            $rs->free();
        }
    }
    
    public static function crea($nombreUsuario, $nombre, $email, $bio, $password, $rol)
    {
        $user = self::buscaUsuario($nombreUsuario);
        if ($user) {
            return false;
        }
        $user = new Usuario($nombreUsuario, $nombre, $email, $bio,  self::hashPassword($password), $rol);
        return self::guarda($user);
    }
    public static function actualiza($usuario, $biografia, $nombreApe){
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("Update usuario set nombre='%s', biografia='%s' where username ='$usuario'"
            ,$conn->real_escape_string($nombreApe)
            ,$conn->real_escape_string($biografia));
        if ( $conn->query($query) ) {
            
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $usuario;
    }
    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
    
    public static function guarda($usuario)
    {
        if ($usuario->id !== null) {
            return self::actualiza($usuario);
        }
        return self::inserta($usuario);
    }
    
    private static function inserta($usuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO usuario (email, nombre, username, pass, biografia, rol) VALUES('%s', '%s', '%s', '%s', '%s','%s')"
            , $conn->real_escape_string($usuario->email) 
            , $conn->real_escape_string($usuario->nombre)
            , $conn->real_escape_string($usuario->nombreUsuario)
            , $conn->real_escape_string($usuario->password)
            ,$conn->real_escape_string($usuario->bio)
            , $conn->real_escape_string($usuario->rol));
        if ( $conn->query($query) ) {
            $usuario->id = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $usuario;
    } 
    public static function VerDatos($nombreUser)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $sql="SELECT * FROM usuario WHERE username='$nombreUser'";
        $query=mysqli_query($conn,$sql);
        $html = "";
        $row=mysqli_fetch_array($query);

        $html .= <<<EOS
        <h1>Actualizar Rol del usuario: $row[username] <h1> 
        <div >
            <form class="act-admin" action="./includes/update.php" method="POST">
                <input class='input-admin' type="text"  name="email" readonly value=$row[email]>
                <input class='input-admin' type="text"  name="username" readonly value=$row[username]>
                <input class='input-admin' type="text"  name="nombre" readonly value=$row[nombre]>
                <select class='select-admin' id ='select-admin'name="rol">
                    <option value="user" selected>$row[rol]</option>
                    <option value="admin"> admin</option>
                    <option value="user"> user</option>
                    <option value="empresa"> empresa</option>
                </select>
                <input type="submit" class="btn-admin" value="Actualizar">
            </form>
        </div>

        EOS;



        return $html;
       
    } 
    private $id;

    private $nombreUsuario;

    private $nombre;

    private $email; 

    private $password;

    private $bio;

    private $rol;

    private function __construct($nombreUsuario, $nombre, $email, $bio,$password, $rol)
    {
        $this->nombreUsuario= $nombreUsuario;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->bio = $bio;
        $this->password = $password;
        $this->rol = $rol;
    }
    public function nombre(){
        return $this->nombre;
    }
    public function email(){
        return $this->email;
    }
    public function bio(){
        return $this->bio;
    }
    public function id()
    {
        return $this->id;
    }

    public function rol()
    {
        return $this->rol;
    }

    public function nombreUsuario()
    {
        return $this->nombreUsuario;
    }

    public function compruebaPassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function cambiaPassword($nuevoPassword)
    {
        $this->password = self::hashPassword($nuevoPassword);
    }
}
