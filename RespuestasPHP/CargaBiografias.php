<?php
	if(isset($_POST['interes'])){
		$cookie_name='Login'; //Nombre de la cookie
		
		//Valida cookie
		if(!isset($_COOKIE[$cookie_name])) {
			
			echo '<script> window.top.location.href = "iGrowp.php" </script>'; //Redirecciona a la página principal.
			
		}//End if valida cookie
		else{
			$interes= utf8_decode($_POST['interes']);
			//Conexión MySQL
			$cnx = mysqli_connect('localhost', 'root', '')
			or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	

			//Llama procedimiento consulta_contenido MySQL con el interesUno obtenido
			$query = 'call consulta_biografia ("'.$interes.'");';
			
			//Query MySQL
			$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
			if(mysqli_num_rows($result) <= 0) {
				echo ('<br><br><br><br><br><br><br><br><br><br><br><br>
						No hay biografías disponibles para"'.utf8_encode($interes).'"
						<br><br><br><br><br><br><br><br><br><br><br><br>'); 
				mysqli_close($cnx);
			}//End if valida campos
			else {			
			//Imprime resultados MySQL
			while($row = $result->fetch_assoc()) {
				
					
				//Variables codificadas para mostrar acentos
				$idUsuario=utf8_encode($row["idUsuario"]);	
				$nombreUsuario=utf8_encode($row["nombreUsuario"]);
				$tipoUsuario=utf8_encode($row["tipoUsuario"]);	
				$tituloBiografia=utf8_encode($row["tituloBiografia"]);						
				$nombreInteres=utf8_encode($row["nombreInteres"]);
				$imagenBiografia=utf8_encode($row["imagenBiografia"]);
				
				$biografia=utf8_encode($row["biografia"]);
				//Obtiene un substring para limitar los caracteres del contenido
				$subStringBiografia = substr($biografia, 0, 201);
				
				//Imprimime columna de contenido en HTML
				echo('
					<div class="thumbnail thumbnail-custom">
						<form method="POST" action="Biografia.php">
							<input type="hidden" name="idUsuario" value="'.$idUsuario.'" />				
							<!-- /Row 1 biografia -->				
							<div class="row">	
								<div class="col-md-1" align="center"></div>	
												
								<!-- /Col 1 biografia -->	
								<div class="col-md-7" align="center">
									
									<h3>'.$nombreUsuario.'</h3>
									<span class="label label-primary">'.$tipoUsuario.'</span>
									<h4>'.$tituloBiografia.'</h4>
									<h5 align="justify">'.$subStringBiografia.'...</h5>
									
								</div><!-- /End Col 1 biografia -->
								
								<!-- /Col 2 biografia -->
								<div class="col-md-3" align="center">
									<h5 class="bold">'.$nombreInteres.'</h5>
									<div class="thumbnail">
										<img src="'.$imagenBiografia.'" alt="Nada por aquí...">
									</div>
								</div> <!-- /End Col 2 biografia -->
										
							</div> <!-- /End Row 1 biografia -->	
						<button type="submit" class="btn btn-default btn-default-custom">
							Ver biografía	
						</buton>
					</form>														
					</div>	<!-- /End thumbnail -->	<br>
				');	
				
			}//End while
			mysqli_close($cnx);
		}//End else valida resultados
		}//End else valida cookie
	}//End if validar método post	
		else{
			echo '<script> window.top.location.href = "Error.html" </script>';
	}//End else validar método post
?>
