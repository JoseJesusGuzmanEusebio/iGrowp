<?php

	$cookie_name = 'Login';	
	if(!isset($_COOKIE[$cookie_name])) {
		
		echo '<script> window.top.location.href = "Error.html" </script>'; //Redirecciona a la página de error.
						
	}//End if valida cookie
	else{
		$image_name = $_FILES ['InputFile'] ['name'];
		$image_tmp_name = $_FILES ['InputFile'] ['tmp_name'];
		
		$cnx = mysqli_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'igrowp') or die('No se pudo seleccionar la base de datos');
		
		$querySelect = 'SELECT idUsuario, imagenPerfilUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
		$result = mysqli_query($cnx, $querySelect) or die('Consulta fallida: ' . mysqli_error($cnx));
		$row = $result->fetch_assoc();
		$idUsuario = $row["idUsuario"];
		
		if($image_name==""){			
			$newPath=$row["imagenPerfilUsuario"];
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
			$newPath="ImagenesUsuario/".$idUsuario.time().$image_name.".jpg";
			move_uploaded_file($image_tmp_name, utf8_encode($newPath));
			
			if (file_exists($row["imagenPerfilUsuario"]) and $row["imagenPerfilUsuario"]!="Imagenes/ImagenIndex.png") {
				unlink($row["imagenPerfilUsuario"]);
			} 
		}
		
		$queryUpdate = 'UPDATE usuario SET imagenPerfilUsuario="'.$newPath.'" WHERE idUsuario="'.$idUsuario.'";';
		mysqli_query($cnx, $queryUpdate) or die('Consulta fallida: ' . mysqli_error($cnx));
		
		echo '<script> window.top.location.href = "Perfil.php" </script>';
		
		mysqli_close($cnx);	//Cierra conexión MySQL	
	}
?>
