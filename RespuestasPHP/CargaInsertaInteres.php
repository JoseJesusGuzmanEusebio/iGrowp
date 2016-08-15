<?php
		$cookie_name='Login';//Nombre de la cookie
		$interes = $_POST['interes'];
		
		if($interes == ""){
			echo 'Introduzca un interes';
		}
		else
		{
			//Valida cookie
			if(!isset($_COOKIE[$cookie_name])) {
				
				echo '<script> window.top.location.href = "iGrowp.php" </script>'; //Redirecciona a la página principal.
								
			}//End if valida cookie
			else{
				
				//Conexión MySQL
				$cnx = mysqli_connect('localhost', 'root', '')
				or die('No se pudo conectar: ' . mysqli_error($cnx));
				mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
				
				if(!validaInteres($cnx, $interes, $cookie_name)){
					$querySELECT = 'SELECT * FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
					$queryUPDATE = agregarInteres($cnx, $querySELECT, $interes, $cookie_name);
					if($queryUPDATE == 'El limite son 10 intereses <br>'){
						echo '<br>';
					}
					else {
						mysqli_query($cnx, $queryUPDATE) or die('Error al introducir interes <br><br>');
					}
					//Consulta de todos los intereses del usuario.
					$query = 'SELECT nombreInteres FROM interes left join usuario
					ON interes.idInteres=usuario.idInteresUno or interes.idInteres=usuario.idInteresUno or interes.idInteres=usuario.idInteresDos
					or interes.idInteres=usuario.idInteresTres or interes.idInteres=usuario.idInteresCuatro or interes.idInteres=usuario.idInteresCuatro
					or interes.idInteres=usuario.idInteresCinco or interes.idInteres=usuario.idInteresSeis or interes.idInteres=usuario.idInteresSiete
					or interes.idInteres=usuario.idInteresOcho or interes.idInteres=usuario.idInteresNueve or interes.idInteres=usuario.idInteresDiez
					WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
					
					//Query MySQL 
					$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));				
						
					$i=1; //Contador para numeración en HTML
					
					//Imprime resultados MySQL	
					while($row = $result->fetch_assoc()) {	
						
						//Variable codificada para mostrar acentos.	
						$interes=utf8_encode($row["nombreInteres"]);
						
						//Imprime botón en HTML					
						echo ('
						<h6>'.$i.'.- '.$interes.' </h6>
						');
						
						$i++;//Incrementa el contador
					}//End while					
					
					mysqli_close($cnx);	//Cierra conexión MySQL		
					
				}
				else {
					mysqli_close($cnx);	//Cierra conexión MySQL	
				}
				
					
			}//End else valida cookie
		}
			
	
	function agregarInteres($cnx, $querySELECT, $interes, $cookie_name) {
		$querySELECT1 = 'SELECT idInteres FROM interes WHERE nombreInteres="'.utf8_decode($interes).'";';	
		$result1 = mysqli_query($cnx, $querySELECT1) or die('Consulta fallida SELECT1: ' . mysqli_error($cnx));
		$row1 = $result1->fetch_assoc();
		$idInt = $row1["idInteres"];
		$result = mysqli_query($cnx, $querySELECT) or die('Consulta fallida SELECT: ' . mysqli_error($cnx));
		$row = $result->fetch_assoc();
		if($row["idInteresUno"] == ""){
			$query = 'UPDATE usuario SET idInteresUno="'.$idInt.'" WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			return $query;
		}
		if(($row["idInteresUno"] != "") && ($row["idInteresDos"] == "")){
			$query = 'UPDATE usuario SET idInteresDos="'.$idInt.'" WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			return $query;
		}
		if(($row["idInteresUno"] != "") && ($row["idInteresDos"] != "") && ($row["idInteresTres"] == "")){
			$query = 'UPDATE usuario SET idInteresTres="'.$idInt.'" WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			return $query;
		}
		if(($row["idInteresUno"] != "") && ($row["idInteresDos"] != "") && ($row["idInteresTres"] != "") && ($row["idInteresCuatro"] == "")){
			$query = 'UPDATE usuario SET idInteresCuatro="'.$idInt.'" WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			return $query;
		}
		if(($row["idInteresUno"] != "") && ($row["idInteresDos"] != "") && ($row["idInteresTres"] != "") && ($row["idInteresCuatro"] != "") && ($row["idInteresCinco"] == "")){
			$query = 'UPDATE usuario SET idInteresCinco="'.$idInt.'" WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			return $query;
		}
		if(($row["idInteresUno"] != "") && ($row["idInteresDos"] != "") && ($row["idInteresTres"] != "") && ($row["idInteresCuatro"] != "") && ($row["idInteresCinco"] != "") && ($row["idInteresSeis"] == "")){
			$query = 'UPDATE usuario SET idInteresSeis="'.$idInt.'" WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			return $query;
		}
		if(($row["idInteresUno"] != "") && ($row["idInteresDos"] != "") && ($row["idInteresTres"] != "") && ($row["idInteresCuatro"] != "") && ($row["idInteresCinco"] != "") && ($row["idInteresSeis"] != "") && ($row["idInteresSiete"] == "")){
			$query = 'UPDATE usuario SET idInteresSiete="'.$idInt.'" WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			return $query;
		}
		if(($row["idInteresUno"] != "") && ($row["idInteresDos"] != "") && ($row["idInteresTres"] != "") && ($row["idInteresCuatro"] != "") && ($row["idInteresCinco"] != "") && ($row["idInteresSeis"] != "") && ($row["idInteresSiete"] != "") && ($row["idInteresOcho"] == "")){
			$query = 'UPDATE usuario SET idInteresOcho="'.$idInt.'" WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			return $query;
		}
		if(($row["idInteresUno"] != "") && ($row["idInteresDos"] != "") && ($row["idInteresTres"] != "") && ($row["idInteresCuatro"] != "") && ($row["idInteresCinco"] != "") && ($row["idInteresSeis"] != "") && ($row["idInteresSiete"] != "") && ($row["idInteresOcho"] != "") && ($row["idInteresNueve"] == "")){
			$query = 'UPDATE usuario SET idInteresNueve="'.$idInt.'" WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			return $query;
		}
		if(($row["idInteresUno"] != "") && ($row["idInteresDos"] != "") && ($row["idInteresTres"] != "") && ($row["idInteresCuatro"] != "") && ($row["idInteresCinco"] != "") && ($row["idInteresSeis"] != "") && ($row["idInteresSiete"] != "") && ($row["idInteresOcho"] != "") && ($row["idInteresNueve"] != "") && ($row["idInteresDiez"] == "")){
			$query = 'UPDATE usuario SET idInteresDiez="'.$idInt.'" WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			return $query;
		}
		if(($row["idInteresUno"] != "") && ($row["idInteresDos"] != "") && ($row["idInteresTres"] != "") && ($row["idInteresCuatro"] != "") && ($row["idInteresCinco"] != "") && ($row["idInteresSeis"] != "") && ($row["idInteresSiete"] != "") && ($row["idInteresOcho"] != "") && ($row["idInteresNueve"] != "") && ($row["idInteresDiez"] != "")){
			$query = 'El limite son 10 intereses <br>';
			echo $query;
			return $query;
			
		}
	}
	
	function validaInteres($cnx, $interes, $cookie_name){
		$querySELECTInt = 'SELECT idInteres FROM interes WHERE nombreInteres="'.utf8_decode($interes).'";';
		$result2 = mysqli_query($cnx, $querySELECTInt) or die('Consulta fallida SELECT1: ' . mysqli_error($cnx));
		$row2 = $result2->fetch_assoc();
		$idInt2 = $row2["idInteres"];
		$querySELECTVal = 'SELECT idUsuario FROM usuario 
							WHERE emailUsuario="'.$_COOKIE[$cookie_name].'" and
									(idInteresUno="'.$idInt2.'" or
									idInteresDos="'.$idInt2.'" or
									idInteresTres="'.$idInt2.'" or
									idInteresCuatro="'.$idInt2.'" or
									idInteresCinco="'.$idInt2.'" or
									idInteresSeis="'.$idInt2.'" or
									idInteresSiete="'.$idInt2.'" or
									idInteresOcho="'.$idInt2.'" or
									idInteresNueve="'.$idInt2.'" or
									idInteresDiez="'.$idInt2.'");';
		$resultVal = mysqli_query($cnx, $querySELECTVal) or die('Consulta fallida SELECT1: ' . mysqli_error($cnx));
		$rowVal = $resultVal->fetch_assoc();
		if(mysqli_num_rows($resultVal) <= 0) { //Si no encuentra nada
			return false;
		}
		else{//si encuentra repetidos
			echo ('El interes "'.$interes.'" ya lo has usado, prueba con otro ');
			return true;//Si encontro intereses repetitos
		}
	}
	
?>
