<?php 

Class FormularioSubirFoto extends Form{

    public function __construct() {
        parent::__construct('formSubirFoto');
    }

    protected function generaCamposFormulario($datos, $errores = array())
    {
        $nombreUsuario = $datos['nombreUsuario'] ?? '';
        $nombre = $datos['nombre'] ?? '';

        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        
        $html = <<<EOF
            <fieldset>
                $htmlErroresGlobales
                <input type="file" name="imagen1" />
                <input type="submit" name="subir-imagen" value="Enviar imagen" />
            </fieldset>
        EOF;
        return $html;
    }

}
?>