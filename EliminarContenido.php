<?php
	if(!isset($_POST["idContenido"])){
		echo '<script> window.top.location.href = "Error.html" </script>';
	}
	else{
		$idContenido = $_POST["idContenido"];

		$cnx = mysqli_connect('localhost', 'root', '')
			or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
		
		$query='SELECT imagenContenido FROM contenido WHERE idContenido="'.$idContenido.'";';			
		$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));			
		$row=$result->fetch_array(MYSQLI_ASSOC);
		
		if (file_exists($row["imagenContenido"]) and $row["imagenContenido"]!="Imagenes/ImagenIndex.png") {
				unlink($row["imagenContenido"]);
		}
			
		$query ='DELETE FROM contenido WHERE idContenido="'.$idContenido.'";';
		
		mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
		
		mysqli_close($cnx);	//Cierra conexión MySQL	
		echo '<script> window.top.location.href = "Perfil.php" </script>';
	}
?>
