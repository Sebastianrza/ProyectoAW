<?php
	
	$nombre=$_FILES['archivo']['name'];
	$guardado=$_FILES['archivo']['tmp_name'];
	
	//Verifica que carpeta donde se guarda existe
	if(!file_exists('archivos')){
		mkdir('archivos', 0777, true);
			if(file_exists('archivos')){
				if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
					echo "Podcast subido con éxito";
				} else{
					echo "Error al subir el podcast";
				}
			}
	} else{
			if(move_uploaded_file($guardado, 'archivos/'.$nombre)){
					echo "Podcast subido con éxito";
				} else{
					echo "Error al subir el podcast";
				}
	}
		
?>