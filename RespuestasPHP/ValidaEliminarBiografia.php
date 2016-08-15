<?php
	if(isset($_POST['idBiografia'])){
		$idBiografia = $_POST["idBiografia"];
		
		echo('
				<div class="modal-header">
					<center>
						<h5>
							¿Estás seguro de que quieres eliminar tu biografía?						
						</h5>
						<form id="biografia" action="EliminarBiografia.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<button value="'.$idBiografia.'" name="idBiografia" type="submit" class="btn btn-info">Aceptar</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							</div>				
						</form><!-- /End formulario -->
					</center>
				</div>
				<!-- /End cuerpo ModificarContenidoBiografia flotante-->
		');		
	}
	else{
		echo '<script> window.top.location.href = "Error.html" </script>';		
	}
?>
