<?php

	if(isset($_POST['Eliminar'])){
		
		$nombre=utf8_decode($_POST['nombre']);
		$email=utf8_decode($_POST['email']);
		$nivel=utf8_decode($_POST['nivel']);
		
		//Conexión MySQL
		$cnx = mysqli_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');

		$query = 'call institucion_'.$_POST['Eliminar'].' ("'.$email.'", null)';
		$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
		
		echo '<script> window.top.location.href = "Perfil.php" </script>';		

	}//End if
	else{
		echo '<script> window.top.location.href = "Error.html" </script>';		
	}

?>
