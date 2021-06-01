<?php
namespace es\ucm\fdi\aw;

class FormularioForo extends Form
{
    public function __construct() {
        parent::__construct('formForo');
    }
    
    protected function generaCamposFormulario($datos, $errores = array())
    {   
        if(isset($_GET["respuestas"]))
        $respuestas = $_GET['respuestas'];
        else
        $respuestas = 0;
        if(isset($_GET["identificador"]))
        $identificador = $_GET['identificador'];
        else if(isset($_GET["id"]))
        $identificador = $_GET["id"];
        else
        $identificador = 0;

        echo $identificador;


        $html = <<<EOF
        <table>
        <form name="form" action="agregar.php" method="post">
            <input type="hidden" name="identificador" value="<?php echo $identificador;?>">
            <input type="hidden" name="respuestas" value="<?php echo $respuestas;?>">
            <tr>
                <td>Autor </td>
                <td><input type="text" name="autor"></td>
            </tr>
            <tr>
              <td>Titulo</td>
              <td><input type="text" name="titulo"></td>
            </tr>
            <tr>
              <td>Mensaje</td>
              <td><textarea name="mensaje" cols="50" rows="5" required="required"></textarea></td>
            </tr>
            <tr>
              <td><input type="submit" id="submit" name="submit" value="Enviar Mensaje"></td>
            </tr>
          </form>
        </table>
        EOF;
        return $html;
    }

    protected function procesaFormulario($datos){   
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();

        if(isset($_POST["submit"])){
            if(!empty($_POST['mensaje'])){
                $autor=$_POST['autor'];
                $titulo=$_POST['titulo'];
                $mensaje=$_POST['mensaje'];
                $respuestas=$_POST['respuestas'];
                $identificador=$_POST['identificador'];
                $fecha = date("d-m-y");
                
                
                //Evitamos que el usuario ingrese HTML
                $mensaje = htmlentities($mensaje);
                echo "identificador:";
                echo $identificador;
                
                //Grabamos el mensaje en la base de datos.
                $query = "INSERT INTO foro (autor, titulo, mensaje, identificador, fecha, ult_respuesta) VALUES ('$autor', '$titulo', '$mensaje', '$identificador','$fecha','$fecha')";
                
                echo $query;
                echo "identificador:";
                echo $identificador;
                
                $result = $conn->query($query);
                
                /* si es un mensaje en respuesta a otro actualizamos los datos */
                if ($identificador != 0)
                {
                    $query2 = "UPDATE foro SET respuestas=respuestas+1 WHERE ID='$identificador'";
                    $result2 = $conn->query($query2);
                    echo $query2;
                    Header("Location: foro.php?id=$identificador");
                    exit();
                }
                //Header("Location: index.php");
            }
        }
    }
}