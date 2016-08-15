<?php

	if(isset($_POST["contenido"])){
		$cookie_name='Login';
		
		$titulo = utf8_decode($_POST["txtTitulo"]);
		$contenido = utf8_decode($_POST["contenido"]);
		$interes = utf8_decode($_POST["txtInteres"]);
		$fecha = $_POST["date"];
		
		$cnx = mysqli_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'igrowp') or die('No se pudo seleccionar la base de datos');
		
		if(isset($_FILES['InputFile']['name'])){
					$image_name = $_FILES ['InputFile'] ['name'];
					$image_type = $_FILES ['InputFile'] ['type'];
					$image_size = $_FILES ['InputFile'] ['size'];
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
			$path="ImagenesContenidos/";
			$newImage = time().$image_name;
			$newPath=$path.$newImage.".jpg";
			move_uploaded_file($image_tmp_name, utf8_encode($newPath));
		}
		
		$titulo = str_replace(array("\"",),"''",$titulo);	
		$contenido = str_replace(array("\"",),"''",$contenido);	
		
		//Consulta el id del interés
		$query='SELECT idInteres FROM interes WHERE nombreInteres like"'.$interes.'";';		
		$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
		$row=$result->fetch_array(MYSQLI_ASSOC);	
		$idInteres=$row["idInteres"];
		
		//Consulta el id del usuario
		$queryidUsuario = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
		$result = mysqli_query($cnx, $queryidUsuario) or die('Consulta fallida: ' . mysqli_error($cnx));
		$row = $result->fetch_array(MYSQLI_ASSOC);				
		$idUsuario  = $row["idUsuario"];	
		
		$query = 'INSERT INTO contenido (idUsuario, idInteres, tituloContenido, contenido, imagenContenido, fecha) 
				  VALUES ("'.$idUsuario.'", "'.$idInteres.'", "'.$titulo.'", "'.$contenido.'", "'.$newPath.'", "'.$fecha.'");';
		mysqli_query($cnx, $query)or die('Error en la insercion: ' . mysqli_error($cnx));


		mysqli_close($cnx);
		echo '<script> window.top.location.href = "Perfil.php" </script>';
	}//End if valida post
	else{
		echo '<script> window.top.location.href = "Error.html" </script>';	
	}
?>
