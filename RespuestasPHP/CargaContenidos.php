<?php
	if(isset($_POST['interes'])){
		$interes= utf8_decode($_POST['interes']);
		
		//Conexión MySQL
		$cnx = mysqli_connect('localhost', 'root', '')
		or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
		
		//Llama procedimiento consulta_contenido MySQL con el interesUno obtenido
		$query = 'call consulta_contenido ("'.$interes.'");';
		
		//Query MySQL
		$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));	
		
		//Valida campos
		if(mysqli_num_rows($result) <= 0) {
			echo ('<br><br><br><br><br><br><br><br><br><br><br><br>
			No hay contenidos disponibles para "'.utf8_encode($interes).'"
			<br><br><br><br><br><br><br><br><br><br><br><br>'); 
			mysqli_close($cnx);
		}//End if valida campos
		else {
			$i=0;//Contador para HTML
			$limite=mysqli_num_rows($result);//Variable para HTML
								
			//Imprime resultados MySQL
			while($row = $result->fetch_assoc()) {
										
				//Validación para imprimir renglón en HTML
				$renglon=$i%3;//Variable para imprimir renglones
				if($i==0 or $renglon==0){
					echo('	<!-- /Row '.$i.' contenidos -->				
							<div class="row">
						');
				}//Enf if valdación para imprimir renglón en HTML
				
				//Variables codificadas para mostrar acentos
				$idContenido=utf8_encode($row["idContenido"]);	
				$nombreUsuario=utf8_encode($row["nombreUsuario"]);									
				$nombreUsuario=utf8_encode($row["nombreUsuario"]);
				$nombreInteres=utf8_encode($row["nombreInteres"]);
				$imagenContenido=utf8_encode($row["imagenContenido"]);
				$tituloContenido=utf8_encode($row["tituloContenido"]);
				$contenido=utf8_encode($row["contenido"]);
				//Obtiene un substring para limitar los caracteres del contenido
				$subStringContenido = substr($contenido, 0, 200);
				$fecha=utf8_encode($row["fecha"]);				
				$hora = date( 'H:i ', strtotime($fecha));
				$fecha = date( 'd/m/y', strtotime($fecha));
				$fecha= "Fecha: ".$fecha." a las ".$hora;
				
				if($imagenContenido==""){
					$imagenContenido="Imagenes/ImagenIndex.png";
				}				
				//Imprimime columna de contenido en HTML
				echo('
				<!-- /Col '.$i.' contenidos -->
				<div class="col-sm-4 col-md-4">
					<div class="thumbnail">
						<h5>'.$nombreUsuario.'</h5>
						<h6>'.$nombreInteres.'</h6>
						<img src="'.$imagenContenido.'" alt="...">
						<div class="caption">
							<h4>'.$tituloContenido.'</h4>
							<h6 align="justify">'.$subStringContenido.'...</h6>
						</div>		
						<form>													
							<button type="button" onClick="verContenido(this.value)" value="'.$idContenido.'" class="btn btn-default btn-default-custom" data-toggle="modal" data-target="#contenido">
								Ver </button>
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
	}//End if validar método post	
		else{
			echo '<script> window.top.location.href = "Error.html" </script>';
	}//End else validar método post
?>


