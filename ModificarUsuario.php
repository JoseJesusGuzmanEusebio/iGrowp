<?php

	$cookie_name='Login';
	
	//Conectar base de datos
	$cnx = mysqli_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysqli_error($cnx));
	mysqli_select_db($cnx, 'igrowp') or die('No se pudo seleccionar la base de datos');
	
	//Validar imagen
	if(isset($_FILES['foto']['name'])){
			$image_name = $_FILES ['foto'] ['name'];
			$image_tmp_name = $_FILES ['foto'] ['tmp_name'];
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
		$path="ImagenesUsuario/";
		$newImage = time().$image_name;
		$newPath=$path.$newImage.".jpg";
		move_uploaded_file($image_tmp_name, utf8_encode($newPath));
	}
	
	//Insertar imagen
	$queryUpdate = 'UPDATE usuario SET imagenPerfilUsuario="'.$newPath.'" WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
	mysqli_query($cnx, $queryUpdate) or die('Consulta fallida: ' . mysqli_error($cnx));


	if(isset($_POST['edad'])){ $edadUser = utf8_decode($_POST['edad']);	}else{$edadUser="null";}
	
	$query= 'UPDATE usuario SET edadUsuario="'.$edadUser.'";';
	$result = mysqli_query($cnx, $query) or die('Consulta fallida IDUSUARIO: ' . mysqli_error($cnx));
		
	if(isset($_POST['nivA'])){
	
		$nivelActual=$_POST['nivA'];
		for($i=1;$i<=$nivelActual;$i++){
			$j=$i+1;
			if(isset($_POST['esc'.$i]) and $_POST['esc'.$i]!=""){ 
				
				$nombre=$_POST['esc'.$i];
				$nombre=str_replace(array("\"","'"), "", $nombre);	
				$nivel=$_POST['niv'.$i];
				
				if($i==$nivelActual){
					$query = 'SELECT idInstitucion FROM institucion WHERE nombreInstitucion="'.$nombre.'" and nivelEducativo="'.$nivel.'";';
					$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));

					if(mysqli_num_rows($result) <= 0){
						$query = 'call insert_institucion ("'.$nombre.'", "'.$nivel.'")';
						$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));	
						
						$query = 'SELECT idInstitucion FROM institucion WHERE nombreInstitucion="'.$nombre.'" and nivelEducativo="'.$nivel.'";';
						$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));					
					}
					$row = $result->fetch_assoc();
					$idInstitucion = $row['idInstitucion'];
					
					$query = 'call institucion_1 ("'.$_COOKIE[$cookie_name].'", '.$idInstitucion.')';
					$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
				}
								
				$query = 'SELECT idInstitucion FROM institucion WHERE nombreInstitucion="'.$nombre.'" and nivelEducativo="'.$nivel.'";';
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));				
				if(mysqli_num_rows($result) <= 0){
					$query = 'call insert_institucion ("'.$nombre.'", "'.$nivel.'")';
					$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));	
					
					$query = 'SELECT idInstitucion FROM institucion WHERE nombreInstitucion="'.$nombre.'" and nivelEducativo="'.$nivel.'";';
					$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));					
				}
				$row = $result->fetch_assoc();
				$idInstitucion = $row['idInstitucion'];
				
				$query = 'call institucion_'.$j.' ("'.$_COOKIE[$cookie_name].'", '.$idInstitucion.')';
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
			}//End if			
		}//End for
	}//End if
	
	if(isset($_POST['bio'])){$checkbox = utf8_decode($_POST['bio']);}else{$checkbox=0;}
	if($checkbox==1){
		echo '<script> window.top.location.href = "FormBiografia.php" </script>';	
	}
	else{
		echo '<script> window.top.location.href = "Perfil.php" </script>';	
	}
?>
