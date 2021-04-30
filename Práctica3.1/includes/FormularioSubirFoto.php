<?php 

Class FormularioSubirFoto extends Form{

    public function __construct() {
        parent::__construct('formSubirFoto');
    }

    protected function generaCamposFormulario($datos, $errores = array())
    {
        
        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        $rutaIndexphp = dirname(realpath('/includes/ImagenesUser'))
        $html = <<<EOF
            <fieldset>
                $htmlErroresGlobales
                <input type="file" name="$nombreUsuario" />
                <input type="submit" name="subir-imagen" value="Enviar imagen" />
            </fieldset>
        EOF;
        return $html;
    }

    protected function procesaFormulario($datos)
    {
        
    }

}
?>