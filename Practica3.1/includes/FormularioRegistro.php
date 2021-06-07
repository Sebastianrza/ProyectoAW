<?php
namespace es\ucm\fdi\aw;

class FormularioRegistro extends Form
{
    public function __construct() {
        parent::__construct('formRegistro');
    }
    
    protected function generaCamposFormulario($datos, $errores = array())
    {
        $nombreUsuario = $datos['nombreUsuario'] ?? '';
        $nombre = $datos['nombre'] ?? '';

        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        $errorNombreUsuario = self::createMensajeError($errores, 'nombreUsuario', 'span', array('class' => 'error'));
        $errorNombre = self::createMensajeError($errores, 'nombre', 'span', array('class' => 'error'));
        $errorPassword = self::createMensajeError($errores, 'password', 'span', array('class' => 'error'));
        $errorPassword2 = self::createMensajeError($errores, 'password2', 'span', array('class' => 'error'));
        $errorEmail = self::createMensajeError($errores, 'email', 'span', array('class'=>'error'));
        $errorbio = self::createMensajeError($errores, 'bio', 'span', array('class'=>'error'));
        $html = <<<EOF
            <fieldset>
                $htmlErroresGlobales
                <div class="grupo-control">
                    <label>Nombre de usuario:</label> <input class="control" type="text" name="nombreUsuario" value="$nombreUsuario" />$errorNombreUsuario
                </div>
                <div class="grupo-control">
                    <label>Nombre completo:</label> <input class="control" type="text" name="nombre" value="$nombre" />$errorNombre
                </div>
                <div class="grupo-control">
                <label>Correo</label> <input class="control" type="text" name="Correo" />$errorEmail
                </div>
                <div class="grupo-control2">
                <label>Biografía</label> <textarea class="control2" type="text" name="bio"></textarea>$errorbio
                </div>
                <div class="grupo-control">
                    <label>Password:</label> <input class="control" type="password" name="password" />$errorPassword
                </div>
                <div class="grupo-control">
                    <label>Vuelve a introducir el Password:</label> <input class="control" type="password" name="password2" />$errorPassword2
                </div>
                <div class="grupo-control"><button type="submit" name="registro">Registrar</button></div>
            </fieldset>
        EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();
        
        $nombreUsuario = $datos['nombreUsuario'] ?? null;
        
        if ( empty($nombreUsuario) || mb_strlen($nombreUsuario) < 5 ) {
            $result['nombreUsuario'] = "El nombre de usuario tiene que tener una longitud de al menos 5 caracteres.";
        }
        
        $nombre = $datos['nombre'] ?? null;
        if ( empty($nombre) || mb_strlen($nombre) < 5 ) {
            $result['nombre'] = "El nombre tiene que tener una longitud de al menos 5 caracteres.";
        }
        $email = $datos['Correo'] ?? null;
        if ( empty($email) ) {
            $result['Correo'] = "El email tiene que tener una longitud de al menos 16 caracteres.";
        }
        $bio = $datos['bio'] ?? null;
        if ( empty($bio) || mb_strlen($bio) < 16 ) {
            $result['bio'] = "la biografía tiene que tener una longitud de al menos 16 caracteres.";
        }
        $password = $datos['password'] ?? null;
        if ( empty($password) || mb_strlen($password) < 5 ) {
            $result['password'] = "El password tiene que tener una longitud de al menos 5 caracteres.";
        }
        $password2 = $datos['password2'] ?? null;
        if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
            $result['password2'] = "Los passwords deben coincidir";
        }
        
        if (count($result) === 0) {
            $prueba = Usuario::compruebaUsuario($nombreUsuario, $email);
            if(!prueba){
                $user = Usuario::crea($nombreUsuario, $nombre, $email, $bio, $password, 'user');
                if ( ! $user ) {
                    $result[] = "El usuario ya existe";
                } else {
                    $_SESSION['login'] = true;
                    $_SESSION['nombre'] = $nombreUsuario;
                    $_SESSION['esAdmin'] = strcmp($usuario->rol(), 'admin') == 0 ? true : false;
                    $_SESSION['empresa'] = strcmp($usuario->rol(), 'empresa') == 0 ? true : false;
                    $_SESSION['nombreUsuario'] = $nombreUsuario;
                    $_SESSION['email'] = $usuario->email();
                    $_SESSION['bio'] = $usuario->bio();
                    $_SESSION['name'] = $usuario->nombre();
                    $result = 'index.php';
                }
            }else{
                $result[] = "El usuario ya existe";
            }
            
        }
        return $result;
    }
}