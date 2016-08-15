<?php
	if(isset($_POST['idBiografia'])){
		
		$cookie_name='Login';
		$idBiografia = $_POST["idBiografia"];

		$cnx = mysqli_connect('localhost', 'root', '')
			or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	

		$query ='call modificar_usuario ('.$idBiografia.')';				
		mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
		
		$query='SELECT imagenBiografia FROM biografia WHERE idBiografia="'.$idBiografia.'";';			
		$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));			
		$row=$result->fetch_array(MYSQLI_ASSOC);
		
		if (file_exists($row["imagenBiografia"]) and $row["imagenBiografia"]!="Imagenes/ImagenIndex.png") {
				unlink($row["imagenBiografia"]);
		} 
		
		$query ='call eliminar_biografia ('.$idBiografia.')';		
		mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
		
		mysqli_close($cnx);	//Cierra conexión MySQL
		echo '<script> window.top.location.href = "Perfil.php" </script>';
	}
	else{
		$mensaje=utf8_decode("¡Upis! Parece que llegaste aquí desde el lugar equivocado.");	
		echo '<h1>'.$mensaje.'</h1>';
	}
?>
