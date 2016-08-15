<?php
	
	$cookie_name='Login';

	//Conexión MySQL
	$cnx = mysqli_connect('localhost', 'root', '')
	or die('No se pudo conectar: ' . mysqli_error($cnx));
	mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	

	if(isset($_POST["idUsuario"])){
		$query = 'SELECT emailUsuario FROM usuario WHERE idUsuario="'.$_POST["idUsuario"].'";';
		//Query MySQL
		$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));	
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$emailUsuario= utf8_encode($row["emailUsuario"]);
		
		$query = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
		//Query MySQL
		$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));	
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$idUsuarioActual= utf8_encode($row["idUsuario"]);
		
	}//End if
	else{
		$emailUsuario= $_COOKIE[$cookie_name];
	}//End else

	$query = 'SELECT  nombreInteres, idContenido, imagenContenido, tituloContenido, contenido, fecha
			FROM interes inner join contenido
				ON interes.idInteres=contenido.idInteres
						inner join usuario
				ON contenido.idUsuario=usuario.idUsuario
			WHERE emailUsuario = "'.$emailUsuario.'"
			ORDER BY fecha desc;';
	 
	//Query MySQL
	$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));	

	//Valida campos
	if(mysqli_num_rows($result) <= 0) {
		echo '<br><br><br><br>
		<br><br><br><br><br><br><br>
		No hay contenidos disponibles
		<br><br><br><br><br><br><br>
		<br><br><br><br>'; 
		mysqli_close($cnx);
	}//End if valida campos
	else {
		$i=0;//Contador para HTML
		$limite=mysqli_num_rows($result);//Variable para HTML
							
		//Imprime resultados MySQL
		while($row = $result->fetch_assoc()) {
			
			//Variables codificadas para mostrar acentos
			$idContenido=utf8_encode($row["idContenido"]);
			$nombreInteres=utf8_encode($row["nombreInteres"]);
			$imagenContenido=utf8_encode($row["imagenContenido"]);
			$tituloContenido=utf8_encode($row["tituloContenido"]);
			$contenido=utf8_encode($row["contenido"]);
			$fecha=utf8_encode($row["fecha"]);
			if($imagenContenido==""){
				$imagenContenido="Imagenes/ImagenIndex.png";
			}
			//Validación para imprimir renglón en HTML
				$renglon=$i%3;//Variable para imprimir renglones
				if($i==0 or $renglon==0){
					echo('	<!-- /Row '.$i.' contenidos -->				
							<div class="row">
						');
				}//Enf if valdación para imprimir renglón en HTML

			//Imprimime columna de contenido en HTML
			echo ('
					<!-- /Col '.$i.' contenidos -->
				<div class="col-sm-4 col-md-4">
					<div class="thumbnail">
						<h5>'.$nombreInteres.'</h5>
						<img src="'.$imagenContenido.'" alt="...">
						<div class="caption">
							<h4>'.$tituloContenido.'</h4>
							<h6 align="justify">'.substr($contenido, 0, 250).'</h6>
						</div>
							<form id="formContents" method="POST" action="eliminarContenido.php">
								<button type="button" onclick="verFlotante(this.value)" value="'.$idContenido.'" class="btn btn-default btn-default-custom" data-toggle="modal" data-target="#content">
									Ver </button>');
			if(isset($_POST["idUsuario"])){	
				if($idUsuarioActual==$_POST["idUsuario"]){
					echo('
								<button type="button" id="idCon" name="idCon" onclick="verModificar(this.value)" value="'.$idContenido.'" class="btn btn-default btn-default-custom" data-toggle="modal" data-target="#ModificarContenido">Modificar</button>
								<button type="button" onclick="eliminarContent(this.value)" value="'.$idContenido.'" class="btn btn-default btn-default-custom" id="btnEliminar" name="btnEliminar">Eliminar 
								<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
								</button>
					');
			
				
				}
			}
			else{		
				echo('
								<button type="button" id="idCon" name="idCon" onclick="verModificar(this.value)" value="'.$idContenido.'" class="btn btn-default btn-default-custom" data-toggle="modal" data-target="#ModificarContenido">Modificar</button>
								<button type="button" onclick="eliminarContent(this.value)" value="'.$idContenido.'" class="btn btn-default btn-default-custom" id="btnEliminar" name="btnEliminar">Eliminar 
								<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
								</button>
				');
			}
			echo('					
									
							</form>
						<div class="caption">
							<h6 align="right">'.$fecha.'</h6>
						</div>
					</div>							
				</div><!-- /End col '.$i.' contenidos -->
			');
			//Validación para cerrar renglón en HTML
				$cerrarRenglon=$i-2;							
				if($cerrarRenglon%3==0 or $i+1==$limite){
					$finRow=$i-2;
					echo('
					</div><!-- /End row '.$finRow.' contenidos -->
						');	
				}//End if validación para cerrar renglón en HTML
				
				$i++;//Incrementa el contador;
			
		}//End while	
				
	mysqli_close($cnx);//Cierra conexión MySQL		
				
	}//End else valida campos


?>
