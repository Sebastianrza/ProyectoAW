<?php
namespace es\ucm\fdi\aw;

class FormularioCrearPlaylist extends Form
{    const EXTENSIONES = array('gif','jpg','jpe','jpeg','png');
    public function __construct() {
        parent::__construct('formCrearPlaylist');
    }

    protected function generaCamposFormulario($datos, $errores = array())
    {
        // Se reutiliza el nombre de usuario introducido previamente o se deja en blanco
        
        
        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        $errorNombrePlaylist = self::createMensajeError($errores, 'nombreUsuario', 'span', array('class' => 'error'));
        $errorDescripcion = self::createMensajeError($errores, 'password', 'span', array('class' => 'error'));
        $errorArchivo = self::createMensajeError($errores,'archivo','span', array('class'=>'error'));
        // Se genera el HTML asociado a los campos del formulario y los mensajes de error.
        $html = <<<EOF
        <fieldset>
            <legend>Usuario y contraseña</legend>
            $htmlErroresGlobales
            <p><label>Nombre de Playlist:</label> <input type="text" name="nombrePlaylist" placeholder='Introduce el nombre de la Playlist'/>$errorNombrePlaylist</p>
            <p><label>Descripcion:</label> <input type="text" name="descripcion" placeholder='Introduce la Descripción' />$errorDescripcion</p>
            <p><label for="archivo">Archivo:</label><input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png" />$errorArchivo</p>
            <button type="submit" name="crear">Crear</button>
        </fieldset>
        EOF;
        return $html;
    }

    private function check_file_uploaded_name ($filename) {
        return (bool) ((mb_ereg_match('/^[0-9A-Z-_\.]+$/i',$filename) === 1) ? true : false );
    }
    private function check_file_uploaded_length ($filename) {
        return (bool) ((mb_strlen($filename,'UTF-8') < 250) ? true : false);
    }

    

    protected function procesaFormulario($datos)
    {
        $result = array();
        $nombreU = $_SESSION['nombre'];
        $nombrePlaylist = $datos['nombrePlaylist'];
        if ( empty($nombrePlaylist) ) {
            $result['nombrePlaylist'] = "El nombre de Playlist no puede estar vacío";
        }
        
        $descripcion = $datos['descripcion'] ?? null;
        if ( empty($descripcion) ) {
            $result['descripcion'] = "La descripción no puede estar vacía.";
        }
        $imagen = count($_FILES) == 1;
        if($imagen) {
            $archivo = $_FILES['archivo'];
            $nombre = $_FILES['archivo']['name'];
            $imagen = $this->check_file_uploaded_name($nombre) && $this->check_file_uploaded_length($nombre);
            $imagen = $imagen && in_array(pathinfo($nombre, PATHINFO_EXTENSION), self::EXTENSIONES);
            $finfo = new \finfo(FILEINFO_MIME_TYPE);
            $mimeType = $finfo->file($_FILES['archivo']['tmp_name']);
            $imagen = preg_match('/image\/*./' , $mimeType);

            if($imagen){
                
                $tmpName = $_FILES['archivo']['tmp_name']; 
                if(move_uploaded_file($tmpName, './img/pruebas/'.$nombrePlaylist.".png")){
                    $nombreImg = $nombrePlaylist.".png";
                }
            }else{ 
                $result[] = 'El archivo tiene un nombre o tipo no soportado';
            }
        }
            $user = Playlist::creaPlaylist($nombrePlaylist, $descripcion, $nombreImg, $nombreU);
            $result[] = 'Playlist Creada con Éxito';

        return $result;
    }
}