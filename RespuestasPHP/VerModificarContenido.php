<?php
	if(isset($_POST['id'])){
		
		$idContenido= $_POST['id'];
	
		//Conexión MySQL
		$cnx = mysqli_connect('localhost', 'root', '')
		or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
		
		//Consulta de un contenido de usuario específico del usuario.
		$query = 'call ver_contenido ('.$idContenido.');';
		
		//Query MySQL 
		$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
		
		$row = $result->fetch_assoc();
		
		$nombreUsuario=utf8_encode($row["nombreUsuario"]);
		$nombreInteres=utf8_encode($row["nombreInteres"]);
		$imagenContenido=utf8_encode($row["imagenContenido"]);
		$tituloContenido=utf8_encode($row["tituloContenido"]);
		$contenido=utf8_encode($row["contenido"]);
		$fecha=utf8_encode($row["fecha"]);
				
		if($imagenContenido==""){
			$imagenContenido="Imagenes/ImagenIndex.png";
		}	
		
		echo '
			<div  class="modal-header">
				  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 align="center" class="modal-title-" id="myModalLabel">'.$nombreInteres.'</h4>
			  </div>
			  <!-- /Cuerpo ModificarContenido flotante-->
			  <div class="modal-body">
				<div class="row">
					<div class="col-md-1" align="center"></div>
					<div class="col-md-10" align="center">
						<form id="registro" action="ModificarContenido.php" method="POST" enctype="multipart/form-data">
							<div class="form-group" id="divSelectIntereses" name="divSelectIntereses">
								<input type="hidden" name="interes" class="form-control" value="'.$nombreInteres.'">
							</div>
							<div class="form-group">	
								<input type="text" name="txtTitulo" class="form-control" id="txtTitulo" placeholder="Titulo" value="'.$tituloContenido.'" onchange="espaciosInnecesariosModal(this.value)">
							</div>
							<div class="form-group">
							 <textarea name="contenido" id="contenido" cols="30" rows="5" class="form-control" placeholder="Contenido" required	>'.$contenido.'</textarea><br>                            
							</div>
							<div class="thumbnail col-md-3" align="right">
								<img src="'.$imagenContenido.'" alt="Nada por aquí...">
							</div>
							<div class="form-group" align="left">
								<label for="exampleInputFile" class="file"><h5> ¡Agrega una imagen a tu contenido!</h5>
									<input type="file" class="form-control-file btn btn-default-" id="InputFile" name="InputFile">
								</label>
							</div>						
							<div class="form-group" align="center">
								<button id="btnModificarC" name="btnModificarC" type="submit" value="'.$idContenido.'" class="btn btn-info">Modificar contenido</button>
							</div>					
						</form><!-- /End formulario -->
					</div>	
				</div>
			  </div>
			  <!-- /End cuerpo ModificarContenido flotante-->
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
		';
		mysqli_close($cnx);	//Cierra conexión MySQL	
		
	}//End if valida post
	else{
		echo '<script> window.top.location.href = "Error.html" </script>';		
	}
?>
