<?php
namespace es\ucm\fdi\aw;

class FormularioSubirPodcast extends Form
{
    public function __construct() {
        parent::__construct('formPodcast');
    }
    
    protected function generaCamposFormulario($datos, $errores = array())
    {
        // Se generan los mensajes de error si existen.
        $htmlErroresGlobales = self::generaListaErroresGlobales($errores);
        $errorNombrePodcast = self::createMensajeError($errores, 'nombrePodcast', 'span', array('class' => 'error'));
        $errorDescripcion = self::createMensajeError($errores, 'Descripcion', 'span', array('class' => 'error'));
       
        $html = <<<EOF
            <fieldset>
                $htmlErroresGlobales
                <div class="grupo-control1">
                    <label>Nombre Podcast:</label> <input class="control" type="text" name="nombrePodcast" /> $errorNombrePodcast
                </div>
                <div class="grupo-control">
                    <label>Descripcion del podcast</label> <textarea class="control" type="text" name="Descripcion"></textarea>  $errorDescripcion
                </div>
                <div class="grupo-control">
                    <label>Genero del Podcast</label> 
                    <select name ="genero">
                        <option selected value="Elige una opcion"> Elige una opción </option> 
                        <option value="Informativo">Informativo</option> 
                        <option value="Formación">Formación</option> 
                        <option value="Entretenimiento">Entretenimiento</option>
                        <option value="Persuación">Persuación</option> 
                        <option value="Otro">Otro</option> 
                    </select>$errorNombrePodcast
                </div>
                
                <div class="grupo-control">
                    <label>Subir Podcast</label>
                    <input name="userfile" type="file" accept="audio/*">
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
        if(isset($_SESSION["login"]) && ($_SESSION["login"]===true)){
            $nombreU = $_SESSION['nombre'];
            $usuario = Usuario::buscaUsuario($nombreU);

        }
    
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
        $fecha = date("Y-m-d");
        $ruta = '/archivos';
        if (count($result) === 0) {
            $podcast = Podcast::creaPodcast($nombrePodcast,$nombreU,$Descripcion, $genero,$fecha, $ruta);
            if (!$podcast ) {
                $result[] = "El podcast ya existe";
            } else {
                $nombre=$podcast->userPodcast().$podcast->idPodcast().".mp3";
                $guardado=$_FILES['userfile']['tmp_name'];
                
                //Verifica que carpeta donde se guarda existe
                if(!file_exists('archivos')){
                    mkdir('archivos', 0777, true);
                        if(file_exists('archivos')){
                            if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
                                $result[]= "Podcast subido con éxito";
                            } else{
                                $result[]= "Error al subir el podcast";
                            }
                        }
                } else{
                        if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
                                $result[]= "Podcast subido con éxito";
                            } else{
                                $result[]= "Error al subir el podcast";
                            }
                }
            }
        }
        return $result;
    }
}

