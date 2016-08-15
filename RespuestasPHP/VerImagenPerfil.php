<?php
	$cookie_name='Login';//Nombre de la cookie
	if(!isset($_COOKIE[$cookie_name])) {
		
		echo '<script> window.top.location.href = "iGrowp.php" </script>'; //Redirecciona a la página principal.
						
	}//End if valida cookie
	else{
		if(isset($_POST["id"])){
			//Conexión MySQL
			$cnx = mysqli_connect('localhost', 'root', '')
			or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
			
			//Consulta de un contenido de usuario específico del usuario.
			$query = 'SELECT imagenPerfilUsuario FROM usuario WHERE emailUsuario="'.$_POST["id"].'";';
			
			//Query MySQL 
			$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
			
			$row = $result->fetch_assoc();
			
			$imagenDireccion = $row["imagenPerfilUsuario"];
			
			if($imagenDireccion == ""){
				$imagenDireccion = "Imagenes/ImagenIndex.png";
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
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
			';
			mysqli_close($cnx);	//Cierra conexión MySQ		
		}
		else{
			echo '<script> window.top.location.href = "Error.html" </script>';
		}		
	}
?>


