<?php
namespace es\ucm\fdi\aw;

class FormularioSubirPodcast extends Form
{
    public function __construct() {
        parent::__construct('formPodcast');
    }
    
    protected function generaCamposFormulario($datos, $errores = array())
    {
        $nombreUsuario = $datos['nombreUsuario'] ?? '';
        $nombre = $datos['nombre'] ?? '';

        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        $errorNombrePodcast = self::createMensajeError($errores, 'nombrePodcast', 'span', array('class' => 'error'));
        $errorDescripcion = self::createMensajeError($errores, 'Descripcion', 'span', array('class' => 'error'));
        

        $html = <<<EOF
            <fieldset>
                $htmlErroresGlobales
                <div class="grupo-control">
                    <label>Nombre Podcast:</label> <input class="control" type="text" name="nombreUsuario" /> $errorNombrePodcast
                </div>
                <div class="grupo-control">
                    <label>Descripción del podcast</label> <textarea class="control" type="text" name="Descripcion"></textarea>  $errorDescripcion
                </div>
                <div class="grupo-control">
                    <label>Genero del Podcast</label> 
                    <select name ="genero">
                        <option selected value="0"> Elige una opción </option> 
                        <option value="1">Informativo</option> 
                        <option value="2">Formación</option> 
                        <option value="3">Entretenimiento</option>
                        <option value="4">Persuación</option> 
                        <option value="5">Otro</option> 
                    </select>$errorNombrePodcast
                </div>
                <div class="grupo-control"><button type="submit" name="subirPodcast">Subir Podcast</button></div>
            </fieldset>
        EOF;
        return $html;
    }
    

    protected function procesaFormulario($datos)
    {
        $result = array();
        //Necesito el nombre de usuario de la sesion Verificar si está bién
        $nombreUsuario = Usuario::nombreUsuario();
    
        $nombrePodcast = $datos['nombrePodcast'] ?? null;
        if ( empty($nombrePodcast) || mb_strlen($nombrePodcast) < 5 ) {
            $result['nombrePodcast'] = "El nombre de Podcast tiene que tener una longitud de al menos 5 caracteres.";
        }
        
        $Descripcion = $datos['Descripcion'] ?? null;
        if ( empty($Descripcion) || mb_strlen($Descripcion) < 12 ) {
            $result['Descripcion'] = "La descripcion tiene que tener una longitud de al menos 12 caracteres.";
        }

        $genero = $datos['genero'] ?? null;
        if(empty($genero)){
            $result['genero'] = "Debe de colocar el género del podcast";
        }
        if (count($result) === 0) {
            $fecha = date("F j, Y, g:i a");  
            $podcast = Podcast::subirPodcast($nombrePodcast,$nombreUsuario, $Descripcion, $genero, $fecha);
            if ( ! $podcast ) {
                $result[] = "El podcast ya existe";
            } else {
               //Subir Podcast
            }
        }
        return $result;
    }
}