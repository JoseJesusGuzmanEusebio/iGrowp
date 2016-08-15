<?php
	if(isset($_GET['i'])){
		//Conexión MySQL
			$cnx = mysqli_connect('localhost', 'root', '')
			or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
		 
		$interes = utf8_decode($_GET['i']);

		$query ="SELECT * FROM interes WHERE nombreInteres LIKE '".$interes."%' ORDER BY nombreInteres;";

		//Query MySQL	
		$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));	
		 
		$intereses = array();
		 
		while ($row=$result->fetch_assoc()){
		 
			$intereses[] = utf8_encode($row['nombreInteres']);
		}
		 
		echo json_encode($intereses);
	}//End if validar método post	
		else{
			echo '<script> window.top.location.href = "Error.html" </script>';
	}//End else validar método post
?>
