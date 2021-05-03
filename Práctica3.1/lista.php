<?php
	
	require_once __DIR__.'/includes/config.php';
	require_once __DIR__.'/reproductor.php';

	class lista extends reproductor {
		var $numPodcast;
		var $activa;

		public function getNombre(){ return $this->genero; }
		public function setNombre($genero){ $this->genero = $genero; }

		public function __construct($idPodcast, $nombrePodcast,$userPodcast, $descripcion, $genero, $fecha, $numPodcast)
		{	
			$this->genero=$genero;			 			
			$this->numPodcast=$numPodcast;		
		}
		public function crearLista($genero) {
			$con = new Conexion();
			$con->Conectar();
			$activa="true";

			$this->genero=$genero;		
			$this->activa=$activa;
			 
			$query="INSERT INTO LISTA VALUES(NULL, :genero, :activa)";
	    	$consulta=$con->conexion->prepare($query);
	        $consulta->bindValue(':genero', $this->genero);	
	        $consulta->bindValue(':activa', $this->activa);	
	        $consulta->execute();	      
	  	   return true; 
		}

		public static function mostrarListas() {
			$conexion = new Conexion();
		 	$conexion->Conectar();
			$true="true";
		    $consulta = $conexion->conexion->prepare("SELECT * FROM Lista WHERE lis_activa='$true'");
		 	$consulta->execute();	

			$rows = $consulta->fetchAll(\PDO::FETCH_OBJ);
			echo json_encode($rows);
			
			$html = <<<EOF
			<div class="jumbotron">
			<div class="alert alert-danger" id="LISTAACTUAL">LISTA:  </div>    
			<div class="form-group  form-inline">
			<center><h2><b>CANCIONES</b></h2></center>
			</div>
			<hr/>     
			<div class="row LISTAS">
			 <table class="table table-hover">
			   <thead>
				<th> <b>NOMBRE CANCION</b></th>
				<th><center>TAMAÑO CANCION </center></th>
				<th><center> OPCIONES </center></th>
			   </thead>
			   <tbody class="tbody1">     
				
			   </tbody>    
			 </table>
			</div>
			</div>
			EOF;
			return $html;
		}
	}	

	$lista = new lista(null, null);
	$list = new lista->crearLista();