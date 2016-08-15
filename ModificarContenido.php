<?php
	if(isset($_POST["btnModificarC"])){
		
		$id = $_POST["btnModificarC"];
		$titulo = utf8_decode($_POST["txtTitulo"]);
		$contenido = utf8_decode($_POST["contenido"]);
		$nombreInteres = utf8_decode($_POST["interes"]);
		
		$titulo = str_replace(array("\"",),"''",$titulo);	
		$contenido = str_replace(array("\"",),"''",$contenido);	

		$image_name = $_FILES ['InputFile'] ['name'];
		$image_tmp_name = $_FILES ['InputFile'] ['tmp_name'];
		
		$cnx = mysqli_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'igrowp') or die('No se pudo seleccionar la base de datos');

		//Consulta el Id del interés
		$query='SELECT imagenContenido FROM contenido WHERE idContenido="'.$id.'";';		
		$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
		$row=$result->fetch_array(MYSQLI_ASSOC);		

		if($image_name==""){			
			$newPath=$row["imagenContenido"];
		}
		else{
			$tamaño=sizeof($image_name);
			if($tamaño>=10){
				$image_name = substr($image_name, 0, 10);
			}
			else{
				$image_name = substr($image_name, 0, 3);
			}
			$image_name = str_replace(array(" ","'","\\","/", ".", "í", "ó", "á", "é", "ú"),"",$image_name);
			$newPath="ImagenesContenidos/".$id.time().$image_name.".jpg";
			move_uploaded_file($image_tmp_name, utf8_encode($newPath));
			
			if (file_exists($row["imagenContenido"]) and $row["imagenContenido"]!="Imagenes/ImagenIndex.png") {
				unlink($row["imagenContenido"]);
			} 
		}
		
		//Consulta el Id del interés
		$query='SELECT idInteres FROM interes WHERE nombreInteres="'.$nombreInteres.'";';		
		$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
		$row=$result->fetch_array(MYSQLI_ASSOC);			
		$idInteres=$row["idInteres"];
		
		$query = 'UPDATE contenido SET idInteres="'.$idInteres.'",
					tituloContenido = "'.$titulo.'",
					contenido = "'.$contenido.'",
					imagenContenido = "'.$newPath.'"
				WHERE idContenido = "'.$id.'";';
				
		mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
		echo '<script> window.top.location.href = "Perfil.php" </script>';
				
		mysqli_close($cnx);	//Cierra conexión MySQL	
	}
	else{
		echo '<script> window.top.location.href = "Error.html" </script>';
		
	}

?>
