<?php

	if(isset($_POST['idContenido'])){
		
		$idContenido = $_POST["idContenido"];
		
		echo('
				<div class="modal-header">
					<center>
						<h5>
							¿Estás seguro de que quieres eliminar tu contenido?						
						</h5>
						<div class="form-group">
						<form action="EliminarContenido.php" method="POST">
							<button name="idContenido" value="'.$idContenido.'" type="submit" class="btn btn-info">Aceptar</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
						</div>				
					</center>
				</div>
				<!-- /End cuerpo ModificarContenidoBiografia flotante-->
		');	
	}
	else{
		echo '<script> window.top.location.href = "Error.html" </script>';		
	}
	
?>
