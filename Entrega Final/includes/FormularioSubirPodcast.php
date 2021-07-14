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
        $errorArchivo = self::createMensajeError($errores,'archivo','span', array('class'=>'error'));
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
                    <option selected value="Elige una opcion"> Elige una opcion </option> 
                    <option value="Informativo">Informativo</option> 
                    <option value="Formacion">Formacion</option> 
                    <option value="Entretenimiento">Entretenimiento</option>
                    <option value="Misterio">Misterio</option> 
                    <option value="Deportivo">Deportivo</option> 
                    <option value="Cocina">Cocina</option>  
                    <option value="Otro">Otro</option> 
                    </select>$errorNombrePodcast
                </div>
                
                <div class="grupo-control">
                    <label>Subir Podcast</label>
                    <input name="userfile" type="file" accept="audio/*">
                    <p><label for="archivo">Imagen del Podcast:</label>
                    <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png" />$errorArchivo</p>
                </div>
                
                <div class="grupo-control"><button type="submit" name="subirPodcast">Subir Podcast</button></div>
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
        //Necesito el nombre de usuario de la sesion Verificar si est� bi�n
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
            $result['genero'] = "Debe de colocar el g�nero del podcast";
        }
        $fecha = date("Y-m-d");
        $ruta = '/archivos';
        
        if (count($result) === 0) {
            $podcast = Podcast::creaPodcast($nombrePodcast,$nombreU,$Descripcion, $genero,$fecha, $ruta);
            if (!$podcast ) {
                $result[] = "El podcast ya existe";
            } else {
                $nombre=$podcast->idPodcast().".mp3";
	        $nombrePod=$podcast->idPodcast();
		Podcast::actualizarfilename($nombre, $podcast->idPodcast());
                $guardado=$_FILES['userfile']['tmp_name'];
                $imagen = count($_FILES) == 2;
                if($imagen) {
                    $archivo = $_FILES['archivo'];
                    $nombreIma = $_FILES['archivo']['name'];
                    $imagen = $this->check_file_uploaded_name($nombreIma) && $this->check_file_uploaded_length($nombreIma);
                    $imagen = $imagen && in_array(pathinfo($nombreIma, PATHINFO_EXTENSION), self::EXTENSIONES);
                    $finfo = new \finfo(FILEINFO_MIME_TYPE);
                    $mimeType = $finfo->file($_FILES['archivo']['tmp_name']);
                    $imagen = preg_match('/image\/*./' , $mimeType);
        
                    if($imagen){
                        
                        $tmpName = $_FILES['archivo']['tmp_name']; 
                        if(move_uploaded_file($tmpName, './img/pruebas/'.str_replace(' ','',$nombrePod).".jpg")){
                            $nombreImg = str_replace(' ','',$nombrePod).".jpg";
                        }
                    }else{ 
                        $result[] = 'El archivo tiene un nombre o tipo no soportado';
                    }
                }
                //Verifica que carpeta donde se guarda existe
                if(!file_exists('archivos')){
                    mkdir('archivos', 0777, true);
                        if(file_exists('archivos')){
                            if(move_uploaded_file($guardado, 'archivos/pruebas/'.$nombre)){
                                $result[]= "Podcast subido con �xito";
                            } else{
                                $result[]= "Error al subir el podcast";
                            }
                        }
                } else{
                        if(move_uploaded_file($guardado, 'archivos/pruebas/'.$nombre)){
                                $result[]= "Podcast subido con �xito";
                            } else{
                                $result[]= "Error al subir el podcast";
                            }
                }
            }
        }
        return $result;
    }
}

