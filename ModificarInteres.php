<?php
	if(isset($_POST["nombreInteres"])){
				
		//Conexión MySQL
		$cnx = mysqli_connect('localhost', 'root', '')or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'igrowp') or die('No se pudo seleccionar la base de datos');
		
		$nombreInteres= utf8_decode($_POST["nombreInteres"]);
		$emailUsuario= $_POST["emailUsuario"];
		$idUsuario= $_POST["idUsuario"];
		$idInteresAgregar= $_POST["idInteresAgregar"];		
		
		$query='SELECT idInteres FROM interes WHERE nombreInteres="'.$nombreInteres.'";';		
		$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
		$row=$result->fetch_array(MYSQLI_ASSOC);			
		$idInteres=utf8_encode($row["idInteres"]);	
		
		$query = 'SELECT nombreInteres FROM interes inner join usuario
				ON interes.idInteres=usuario.idInteresUno or interes.idInteres=usuario.idInteresDos
				or interes.idInteres=usuario.idInteresTres or  interes.idInteres=usuario.idInteresCuatro
				or interes.idInteres=usuario.idInteresCinco or interes.idInteres=usuario.idInteresSeis or interes.idInteres=usuario.idInteresSiete
				or interes.idInteres=usuario.idInteresOcho or interes.idInteres=usuario.idInteresNueve or interes.idInteres=usuario.idInteresDiez
				WHERE idUsuario="'.$idUsuario.'";';	
		$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
		
		$aux=true;
		
		while($row = $result->fetch_assoc()) {
			if(strcmp(utf8_encode($nombreInteres), utf8_encode($row["nombreInteres"]))==0){
				$aux=false;
			}
		}//End while
		
		if($aux==true){	
			$query='call interes_'.$idInteresAgregar.' ("'.$idUsuario.'",'.$idInteres.')';		
			$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));	
			echo '<script> window.top.location.href = "Perfil.php" </script>';	
		}
		else{
			echo '<script> window.top.location.href = "Perfil.php" </script>';	
		}
	}
	else{
		echo '<script> window.top.location.href = "Error.html" </script>';	
	}
?>
