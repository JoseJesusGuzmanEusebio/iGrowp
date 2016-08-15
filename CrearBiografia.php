<?php
	if(isset($_POST["biografia"])){
		
		$cookie_name='Login';
		
		//Conexión MySQL
		$cnx = mysqli_connect('localhost', 'root', '')or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'igrowp') or die('No se pudo seleccionar la base de datos');
		
		//Consulta el Id de la biografía
		$query='SELECT idBiografia FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';		
		$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
		$row=$result->fetch_array(MYSQLI_ASSOC);	
		$idBiografia=$row["idBiografia"];
		
		if($idBiografia==""){
			$tituloBiografia = utf8_decode($_POST["txtTitulo"]);
			$biografia = utf8_decode($_POST["biografia"]);
			$nombreInteres = utf8_decode($_POST["txtInteres"]);	
				
			if(isset($_FILES['InputFile']['name'])){
				$image_name = $_FILES ['InputFile'] ['name'];
				$image_tmp_name = $_FILES ['InputFile'] ['tmp_name'];
			}
			else{
				$image_name=="";
			}

			
			if($image_name==""){
				$newPath="Imagenes/ImagenIndex.png";
			}
			else{
				$tamaño=sizeof($image_name);
				if($tamaño>=10){
					$image_name = substr($image_name, 0, 10);
				}
				else{
					$image_name = substr($image_name, 0, 3);
				}
				$image_name = str_replace(array(" ","'","\\","/", "."),"",$image_name);
				$path="ImagenesBiografias/";
				$newImage = time().$image_name;
				$newPath=$path.$newImage.".jpg";
				move_uploaded_file($image_tmp_name, utf8_encode($newPath));
			}
			
			//Consulta el id del interés
			$query='SELECT idInteres FROM interes WHERE nombreInteres="'.$nombreInteres.'";';		
			$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
			$row=$result->fetch_array(MYSQLI_ASSOC);	
			$idInteres=$row["idInteres"];
			
			//Consulta el id del usuario
			$query='SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';		
			$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
			$row=$result->fetch_array(MYSQLI_ASSOC);	
			$idUsuario=$row["idUsuario"];
			
			$query = 'call formulario_biografia ("'.$tituloBiografia.'", "'.$biografia.'", "'.$newPath.'", "'.$idInteres.'", "'.$idUsuario.'");';				
			mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
			
			//Consulta el id de la biografía
			$query='SELECT idBiografia FROM biografia WHERE Usuario="'.$idUsuario.'";';		
			$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
			$row=$result->fetch_array(MYSQLI_ASSOC);	
			$idBiografia=$row["idBiografia"];
			
			//Actualiza el id de la biografía el la tabla usuario
			$query = 'UPDATE usuario set idbiografia='.$idBiografia.' WHERE idUsuario='.$idUsuario.';';			
			mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
			echo '<script> window.top.location.href = "Biografia.php" </script>';		
					
			mysqli_close($cnx);	//Cierra conexión MySQL	
		}
		else{		
			echo '<script> window.top.location.href = "Perfil.php" </script>';
		}			
 	}//End if valida post
	else{
		echo '<script> window.top.location.href = "Error.html" </script>';	
	}


?>
