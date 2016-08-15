<?php
	
	//Valida cookie
	if(!isset($_POST['id'])) {		
	
		echo '<script> window.top.location.href = "Error.html" </script>';
						
	}//End if valida cookie
	else{
		$idContenido= $_POST['id'];
		//$idButton=$idContenido;
		$cookie_name='Login';//Nombre de la cookie

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
		$hora = date( 'H:i ', strtotime($fecha));
		$fecha = date( 'd/m/y', strtotime($fecha));
		$fecha= "Fecha: ".$fecha." a las ".$hora;
		
		if($imagenContenido==""){
			$imagenContenido="Imagenes/ImagenIndex.png";
		}
		
		$contenido=str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"<br>",$contenido);
	
			echo('<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h2 align="center" class="modal-title-center" id="myModalLabel">'.$nombreUsuario.'</h2>
			<h4 align="center" class="modal-title-" id="myModalLabel">'.$nombreInteres.'</h4>
		  </div>
		  <!-- /Cuerpo contenido flotante-->
		  <div class="modal-body">
			<div class="row">
				<div class="col-md-2" align="center"></div>
				<div class="col-md-8" align="center">
					<div class="thumbnail">
						<img src="'.$imagenContenido.'" alt="...">
					</div>
				</div>
			</div>
			<h4 align="center" class="modal-title-" id="myModalLabel">'.$tituloContenido.'</h4>
			<h6 align="justify">'.$contenido.'</h6>
			<h6 align="right">'.$fecha.'</h6>
		  </div>
		  <!-- /End cuerpo contenido flotante-->
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  </div>');
		mysqli_close($cnx);	//Cierra conexión MySQL				
	}//End else valida cookie
	
?>
