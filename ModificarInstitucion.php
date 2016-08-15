<?php

	if(isset($_POST['Modificar'])){
		
		$i=$_POST['Modificar'];
		$nombre=utf8_decode($_POST['nombreInstitucion']);
		
		$nombre = str_replace(array("\""), "''", $nombre);
		
		$email=utf8_decode($_POST['email']);
		$nivel=utf8_decode($_POST['nivel']);
		
		//Conexión MySQL
		$cnx = mysqli_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');
		if(strcmp ($nivel , "Actual" )==0){
			$nivel=$_POST['nivelActual'];
			
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
		
		$query = 'call institucion_'.$i.' ("'.$email.'", '.$idInstitucion.')';
		$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));

		
		echo '<script> window.top.location.href = "Perfil.php" </script>';		

	}//End if
	else{
		echo '<script> window.top.location.href = "Error.html" </script>';		
	}
?>
