<?php 
namespace es\ucm\fdi\aw;
include_once __DIR__.'/config.php';
Class FormularioSubirFoto extends Form{

    const EXTENSIONES = array('gif','jpg','jpe','jpeg','png');
    public function __construct() {
        $opciones = array('enctype'=>'multipart/form-data');
        parent::__construct('subirFoto');
    }

    protected function generaCamposFormulario($datos, $errores = array())
    {
        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        $errorArchivo = self::createMensajeError($errores,'archivo','span', array('class'=>'error'));
        $html = <<<EOF
            <fieldset>
                $htmlErroresGlobales
                <p><label for="archivo">Archivo:</label><input type="file" name="archivo" id="archivo" accept="image/*" />$errorArchivo</p>
                <button type="submit">Subir Foto</button>
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
        if(isset($_SESSION["login"]) && ($_SESSION["login"]===true)){
        $nombreU = $_SESSION['nombre'];
        }
        $result = array();
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
                if(move_uploaded_file($tmpName, 'includes/ImagenesUser/'.$nombreU.".png")){
                    $result[] = 'Foto de perfil actualizada con éxito.' ;
                }else{
                    $result[] = 'Foto de perfil no ha sido actualizada.' ;
                    
                }
            }else{
                
                $result[] = 'El archivo tiene un nombre o tipo no soportado';
            }
            return $result;
        }     
    }
}
?>