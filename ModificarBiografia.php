<?php
	if(isset($_POST["btnModificar"])){
		
		$id = $_POST["btnModificar"];
		$tituloBiografia = utf8_decode($_POST["txtTitulo"]);
		$biografia = utf8_decode($_POST["biografia"]);
		$nombreInteres = utf8_decode($_POST["txtInteres"]);	
		
		$tituloBiografia = str_replace(array("\"",),"",$tituloBiografia);	
		$biografia  = str_replace(array("\"",),"",$biografia );		
		
		$image_name = $_FILES ['InputFile'] ['name'];
		$image_tmp_name = $_FILES ['InputFile'] ['tmp_name'];
		
		//Conexión MySQL
		$cnx = mysqli_connect('localhost', 'root', '')or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'igrowp') or die('No se pudo seleccionar la base de datos');
		
		//Consulta el la imagen anterior
		$query='SELECT imagenBiografia FROM biografia WHERE idBiografia="'.$id.'";';			
		$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));			
		$row=$result->fetch_array(MYSQLI_ASSOC);
		
		if($image_name==""){				
			$newPath=$row["imagenBiografia"];
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
			$newPath="ImagenesBiografias/".$id.time().$image_name.".jpg";
			move_uploaded_file($image_tmp_name, utf8_encode($newPath));
			
			if (file_exists($row["imagenBiografia"]) and $row["imagenBiografia"]!="Imagenes/ImagenIndex.png") {
				unlink($row["imagenBiografia"]);
			} 
		}
		
		//Consulta el Id del interés
		$query='SELECT idInteres FROM interes WHERE nombreInteres="'.$nombreInteres.'";';		
		$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
		$row=$result->fetch_array(MYSQLI_ASSOC);			
		$idInteres=$row["idInteres"];

		$query = 'call modificar_biografia ('.$id.', "'.$tituloBiografia.'", "'.$biografia.'", "'.$newPath.'", '.$idInteres.');';
				
		mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
		echo '<script> window.top.location.href = "Biografia.php" </script>';
				
		mysqli_close($cnx);	//Cierra conexión MySQL	
			
 	}//End if valida post
	else{
		echo '<script> window.top.location.href = "Error.html" </script>';		
	}


?>
