<?php
	if(isset($_GET['a'])){
		//Conexión MySQL
			$cnx = mysqli_connect('localhost', 'root', '')
			or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
		 
		$institucion = utf8_decode($_GET['i']);
		$nivel = utf8_decode($_GET['a']);
		if(strcmp ($nivel , "Actual" )==0){
			$query ="SELECT nombreInstitucion FROM institucion WHERE nombreInstitucion LIKE '".$institucion."%' ORDER BY nombreInstitucion;";
		}
		else{
			$query ="SELECT nombreInstitucion FROM institucion WHERE nombreInstitucion LIKE '".$institucion."%' and nivelEducativo='".$nivel."' ORDER BY nombreInstitucion;";
		}
		//Query MySQL	
		$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));	
		 
		$instituciones = array();
		 
		while ($row=$result->fetch_assoc()){
		 
			$instituciones[] = utf8_encode($row['nombreInstitucion']);
		}
		 
		echo json_encode($instituciones);
	}//End if validar método post	
		else{
			echo '<script> window.top.location.href = "Error.html" </script>';
	}//End else validar método post
?>
