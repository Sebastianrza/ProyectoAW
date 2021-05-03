<?php
	require_once '../MODELO/conexion.php';
	
	class lista extends reproductor {
		var $genero;
		var $numPodcast;
		var $activa;

		public function getNombre(){ return $this->genero; }
		public function setNombre($genero){ $this->genero = $genero; }

		public function __construct($genero, $numPodcast)
		{	
			$this->genero=$genero;			 			
			$this->numPodcast=$numPodcast< ;		
		}
		public function crearLista($genero)
		{
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