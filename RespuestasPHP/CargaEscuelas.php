<?php
	if(isset($_POST['nivel'])){
		$nivelEscolar = $_POST['nivel'];
		if ($nivelEscolar == 0){
			echo '<h3 class="fs-subtitle">No has seleccionado tu escolaridad actual, puedes saltar este paso</h3>';
		}
		else{		
			for($i=1;$i<=$nivelEscolar;$i++){
				switch($i){
					case 1: $Escolaridad = "Secundaria";
							break;
					case 2: $Escolaridad = "Medio Superior";
							break;
					case 3: $Escolaridad = "Superior";
							break;
					case 4: $Escolaridad = "Maestria";
							break;
					case 5: $Escolaridad = "Doctorado";
							break;
					default: $Escolaridad = "No especificada";
				}			
				if($i==$nivelEscolar){
					echo '<input name="nivA" value="'.$i.'" type="hidden">';		
				}
				echo '<input id="esc'.$i.'" name="esc'.$i.'" placeholder="'.$Escolaridad.'" type="text" maxlength="100" onkeypress="return validacionCaracteres(event)" onchange="espaciosInnecesarios(this.value)">';//RESTRICCION HASTA 100 CARACTERES
				echo '<input name="niv'.$i.'" value="'.$Escolaridad.'" type="hidden">';							

			}//End for
			
			echo('<script type="text/javascript">');
			
			for($i=1;$i<=$nivelEscolar;$i++){
				switch($i){
					case 1: $Escolaridad = "Secundaria";
							break;
					case 2: $Escolaridad = "Medio Superior";
							break;
					case 3: $Escolaridad = "Superior";
							break;
					case 4: $Escolaridad = "Maestria";
							break;
					case 5: $Escolaridad = "Doctorado";
							break;
					default: $Escolaridad = "No especificada";
				}			
				echo('
			
				$(document).ready(function() {
			 
					$("#esc'.$i.'").autocomplete({
						source: function(request, response){
							$.ajax({
								url:"RespuestasPHP/BuscarInstituciones.php",
								dataType:"json",
								data:{i:request.term, a:"'.$Escolaridad.'"},
								//El método success se ejecuta cuando se recibe una respuesta del lado del servidor.
								success: function(data){//La variable data contendrá la información recibida del servidor.
									response(data);/*Se asigna al método response todo lo que se reciba del servidor.
												response despliega una lista con todos los posible términos devueltos por el servidor.*/
								}
			 
							});
						},
						minLength: 1,  //Indica al método autocomplete cada cuántos caracteres se ejecuta el método source.
						//El método select se ejecuta cuando seleccinamos algun elemento de la lista desplegada.	
						select: function(event,ui){	
						
						}
					});
					
				});//End function autocomplete intereses
					');	
			}//End for
			echo('</script>');		
		}//End else
	}
	else{
	
	}
?>
