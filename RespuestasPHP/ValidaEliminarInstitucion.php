<?php
	if(isset($_POST['idInstitucion'])){
		
		$idInstitucion = $_POST["idInstitucion"];
		
		echo('
				<div class="modal-header">
					<center>
						<h5>
							¿Estás seguro de que quieres eliminar tu institucion?						
						</h5>
						<div class="form-group">
							<button id="aceptar" value="'.$idInstitucion.'" onclick="obtenerInstitucionEliminar(this.value)" type="button" class="btn btn-info">Aceptar</button>
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
