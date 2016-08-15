<?php
	if(isset($_POST["idInteresEliminar"])){
		
		$cookie_name='Login';
		
		//Conexión MySQL
		$cnx = mysqli_connect('localhost', 'root', '')or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'igrowp') or die('No se pudo seleccionar la base de datos');
		
		$query = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
		$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));	
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$idUsuario= utf8_encode($row["idUsuario"]);
		
		$idInteresEliminar=utf8_decode($_POST["idInteresEliminar"]);
		$i=10;
		
		for($i=10;$i>0;$i--){
			if(isset($_POST["interes".$i])){
				for($j=0;$j<$i;$j++){
					$m=$j+1;
					if($m!=$idInteresEliminar){
						
						$query='SELECT idInteres FROM interes WHERE nombreInteres="'.utf8_decode($_POST["interes".$m]).'";';		
						$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
						$row=$result->fetch_array(MYSQLI_ASSOC);
									
						$array[$j]=utf8_encode($row["idInteres"]);											
					}//End if			
				}//End for j
				$i=1;
			}//End if 
		}//End for i
		
		$aux=1;
		
		foreach ($array as $valor) {
			$query='call interes_'.$aux.' ("'.$idUsuario.'","'.$valor.'")';		
			$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
			$aux++;
		}
		
		$inicio=(sizeof($array))+1;
		
		for($i=$inicio;$i<=10;$i++){
			$query='call interes_'.$i.' ("'.$idUsuario.'",null)';		
			$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
		}
		
		echo '<script> window.top.location.href = "Perfil.php" </script>';	
	}
	else{
		echo '<script> window.top.location.href = "Error.html" </script>';	
	}
	

				
?>

			
 
		
