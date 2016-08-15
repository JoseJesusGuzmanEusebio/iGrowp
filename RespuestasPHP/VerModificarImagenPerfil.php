<?php
	$cookie_name='Login';//Nombre de la cookie
	if(!isset($_COOKIE[$cookie_name])) {
		
		echo '<script> window.top.location.href = "Error.html" </script>'; //Redirecciona a la página de error.
						
	}//End if valida cookie
	else{
		//Conexión MySQL
		$cnx = mysqli_connect('localhost', 'root', '')
		or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
		
		//Consulta de un contenido de usuario específico del usuario.
		$query = 'SELECT imagenPerfilUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
		
		//Query MySQL 
		$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
		
		$row = $result->fetch_assoc();
		
		$imagenDireccion  = $row["imagenPerfilUsuario"];
		if($imagenDireccion == "" || $imagenDireccion == "NULL" || $imagenDireccion == " "){
			$imagenDireccion = "Imagenes/predeterminada.jpg";
		}
		
		echo '
				<div  class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;
						</span>
					</button><br><br>
					<div class="thumbnail col-md-12" align="right">
							<img src="'.$imagenDireccion.'" alt="Nada por aquí...">
					</div>				
				</div>
				<!-- /Cuerpo ModificarContenido flotante-->
				<div class="modal-body">
				<div class="row">
					<div class="col-md-12" align="center">
						<h4 align="center" class="modal-title-" id="myModalLabel">¡Sube una nueva foto de perfil!</h4>
					</div>
					<div class="col-md-12" align="center">
						<form id="registro" action="ModificarImagenPerfil.php" method="POST" enctype="multipart/form-data">
							<div class="form-group col-xs-12" align="center">
								<div class="thumbnail col-md-2" align="center">
									<img src="'.$imagenDireccion.'" alt="Nada por aquí...">
								</div>
								<div class="col-md-7" align="left">
									<br>
									<label><h5>¡Elige una imagen!</h5></label><br>
									<input id="InputFile" name="InputFile" class="button" value="InputFile" type="file">
								</div>
							</div>
							<div class="form-group col-xs-12" align="center">
								<button type="submit" class="btn btn-info">Cambiar imagen</button>
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
	}

?>
