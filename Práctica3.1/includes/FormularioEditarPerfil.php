<?php
namespace es\ucm\fdi\aw;

class FormularioEditarPerfil extends Form
{
    public function __construct() {
        parent::__construct('formRegistro');
    }
    
    protected function generaCamposFormulario($datos, $errores = array())
    {
        
        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        $errorNombreUsuario = self::createMensajeError($errores, 'nombreUsuario', 'span', array('class' => 'error'));
        $errorNombre = self::createMensajeError($errores, 'nombre', 'span', array('class' => 'error'));
        $errorPassword = self::createMensajeError($errores, 'password', 'span', array('class' => 'error'));
        $errorPassword2 = self::createMensajeError($errores, 'password2', 'span', array('class' => 'error'));
        $errorEmail = self::createMensajeError($errores, 'email', 'span', array('class'=>'error'));
        $errorbio = self::createMensajeError($errores, 'bio', 'span', array('class'=>'error'));
        $nombreUsuario =  $_SESSION['nombre'];
        $bio = $_SESSION['bio'];
        $email = $_SESSION['email'];
        $name = $_SESSION['name'];
        $html = <<<EOF
            <fieldset>
                $htmlErroresGlobales
               
                <div class="grupo-control">
                    <label>Nombre de usuario:</label> <input class="control" type="text" name="nombreUsuario" value="$nombreUsuario" readonly/>$errorNombreUsuario
                </div>
                <div class="grupo-control">
                    <label>Nombre completo:</label> <input class="control" type="text" name="nombre" value="$name" />$errorNombre
                </div>
                <div class="grupo-control">
                <label>Correo</label> <input class="control" type="text" name="Correo" value="$email" readonly/>$errorEmail
                </div>
                <div class="grupo-control2">
                <label>Biografía</label> <textarea class="control2" type="text" name="bio">$bio</textarea>$errorbio
                </div>
                <div class="grupo-control"><button type="submit" name="registro">Actualizar</button></div>
            </fieldset>
        EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();
        $nombreUs = $datos['nombreUsuario'] ?? null;
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
        if (count($result) === 1) {
            $user = Usuario::actualiza($nombreUs, $bio, $nombre);
            $result = 'perfil.php';
            }
            return $result;
        }
       
}
