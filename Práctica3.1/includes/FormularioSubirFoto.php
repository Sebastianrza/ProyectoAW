<?php 

Class FormularioSubirFoto extends Form{

    public function __construct() {
        parent::__construct('formSubirFoto');
    }

    protected function generaCamposFormulario($datos, $errores = array())
    {
        $nombreUsuario = $datos['nombreUsuario'] ?? '';
        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        $html = <<<EOF
            <fieldset>
                $htmlErroresGlobales
                <label class = 'btn-upload' for="file-upload">Seleccionar imagen de perfil</label>
                <input name='file-upload'id='file-upload' class='file-upload' style ='display:none'type='file' accept="image/*"/>
                <input type="submit" value="Guardar" name="guardar_imagen" class="form-control">
            </fieldset>
        EOF;
        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $result = array();
        $imagen = $datos['file-upload'] ?? null;
        if(isset($imagen) && !empty($_FILES['file-upload']['tmp_name'])) {
            $directorio ="./includes/ImagenesUser/";
            $carpeta_objetivo = $directorio.basename($_FILES['file-upload']['name']);
            $subida_correcta = 1;
            
            $comprobacion = getimagesize($_FILES['file-upload']['tmp_name']);
            if($comprobacion !== false) {
                $subida_correcta = 1;
            } else {
                $subida_correcta = 0;
            }
            if ($_FILES['file-upload']['size'] > 500000) {
                echo "El archivo no puede ocupar más de 500kb";
                $subida_correcta = 0;
            }        
            if ($subida_correcta == 0) {
                echo "Tu archivo no puede subirse";
            } else {
                if (move_uploaded_file($_FILES['file-upload']['tmp_name'],
                "./includes/ImagenesUser/".$usuario->NombreUsuario())) {
                    echo "El archivo ".basename($_FILES['file-upload']['name'])." ha sido subido.";
                } else {
                    echo "Ha ocurrido un error.";
                }
            }
        }
    }

}
?>