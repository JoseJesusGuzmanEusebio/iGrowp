<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta content="text/html; charset=windows-1252" http-equiv="content-type">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link href="css/formEstilo.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="js/jquery-ui-1.11.4/jquery-ui.css">
	<!-- Estilo propio-->
	<link rel="stylesheet" href="css/Estilos.css">
	
    <title>Formulario</title>
	
	<script src="js/form/jquery-1.11.3.js"></script>		
	<script src="js/jquery-ui-1.11.4/jquery-ui.js"></script> 
	<script type="text/javascript">
		
	$(document).ready(function() {
 
		$('#inputIntereses').autocomplete({
			source: function(request, response){
				$.ajax({
					url:"RespuestasPHP/BuscarIntereses.php",
					dataType:"json",
					data:{i:request.term},
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
	
    </script>
	
	<script>
		function mostrarIntereses(nomInteres){
			$.post('RespuestasPHP/CargaInsertaInteres.php', {interes: nomInteres},
				function(output){
					$('#divContenido').html(output).show();
				});
			document.msform.inputIntereses.value = "";	
		}//End function mostrarIntereses

		function infoEscolarActual(escolaridadActual){
			$.post('RespuestasPHP/CargaEscuelas.php', {nivel: escolaridadActual},
				function(output){
					$('#escuelas').html(output).show();
				});
		}//End function infoEscolarActual

		function validarSiNumero(numero){
			if (!/^([0-9])*$/.test(numero)){
				alert("Solo se permiten numeros en este campo");
				document.msform.edad.value = "";
			}
			if (numero < 12 || numero > 100){
				alert("La edad debe de estar entre 12 y 100 años");
				document.msform.edad.value = "";
			}
		}

		$('html').bind('keypress', function(e){
			if(e.keyCode == 13){
				return false;
			}
		});
		
		function validacionCaracteres(e){
		   key = e.keyCode || e.which;
		   tecla = String.fromCharCode(key).toLowerCase();
		   letras = " áéíóúabcdefghijklmnñopqrstuvwxyz0123456789.#";
		   especiales = "8-37-39-46";

		   tecla_especial = false
		   for(var i in especiales){
				if(key == especiales[i]){
					tecla_especial = true;
					break;
				}
			}
			if(letras.indexOf(tecla)==-1 && !tecla_especial){
				alert("Este simbolo no es acaptado en el campo.");
				return false;
			}
		}
		
		function espaciosInnecesarios(value){
			String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };
			document.getElementById("txtNombre").value = value.trim();
			//alert("Sin espacios: '" + value.trim() + "'");
		}
	</script>
	
  </head>
  
  <body>
	  <div>
		<!-- multistep form -->
		<form id="msform" name="msform" enctype="multipart/form-data" action="ModificarUsuario.php" method="POST">
		  <!-- progressbar -->
		  <ul id="progressbar" name="progressbar">
			<li class="active">Información Personal</li>
			<li>Nivel Escolar</li>
			<li>Intereses</li>
			<li>Biografía</li>
		  </ul>
		  
		  <!-- fieldsets -->		  
		  
		  <fieldset>
			<h2 class="fs-title">¡Cuentanos sobre ti!</h2>
			<h3 class="fs-subtitle">Paso 1. Información Personal</h3>
			<center>
			  <table border="1">
				<tbody>
				  <tr>
					<td>
						<div id="divImagen" height="50px" width="90px">
							<img src="Imagenes/ImagenIndex.png" height="122px" width="122px">
						</div>
					</td>
				  </tr>
				</tbody>
			  </table>
			  <input id="foto" name="foto" type="file" >
			</center>
			<input name="edad" id="edad" placeholder="Edad" type="text" onchange="validarSiNumero(this.value);">
			<select name="nivel" id="nivel" onclick="infoEscolarActual(this.value)">
				<option value="0">Nivel escolar actual...</option>
				<option value="1">Secundaria</option>
				<option value="2">Media Superior</option>
				<option value="3">Superior</option>
				<option value="4">Maestria</option>
				<option value="5">Doctorado</option>
			</select>
			<br>
			<input id="Next" name="Next" class="next action-button" value="Siguiente" type="button">
		  </fieldset>
		  
		  <!-- fieldsets -->		  
		  
		  <fieldset>
			<h2 class="fs-title">Llena tu información</h2>
			<h3 class="fs-subtitle">Paso 2. ¿En dónde has estudiado?</h3>
			<div id="escuelas">
				<h3 class="fs-subtitle">No has seleccionado tu escolaridad actual, puedes saltar este paso</h3>			
			</div>
			<input class="previous action-button" value="Anterior" type="button"> 
			<input class="next action-button" value="Siguiente" type="button"> 
		  </fieldset>
		  
		  <!-- fieldsets -->
		  		  
		  <fieldset>
			<h2 class="fs-title">Llena tu información</h2>
			<h3 class="fs-subtitle">Paso 3. Intereses</h3>
			<h4 class="fs-subtitle">Elige algo que te interese. </h4>
			<h3 class="fs-subtitle">Puedes escoger entre una gran lista de intereses como: </h3>
			<h3 class="fs-subtitle">Música, Pintura, Danza, Escultura, 
			Literatura, Informática, Química, Programación... ¡Y más!</h3>
			<div class="row row-gris">
				<div class="col-md-12">
					<div class="form-group">
					  <input type="text" id="inputIntereses" name="inputIntereses" placeholder="Busca intereses..." class="form-control"><!--Pendiente-->
					</div>
					<input value="Agregar" type="button" class="button action-button" onClick="mostrarIntereses(msform.inputIntereses.value)">
				</div>
			</div>
			
			<div class="col-md-8" align="center">
				<div>
					<div id="divContenido" class="container">	
								
					</div>			
				</div>		
			</div>
			
			<br><br>
			<input name="previous" class="previous action-button" value="Anterior" type="button">
			<input name="next" class="next action-button" value="Siguiente" type="button">
			
		  </fieldset>
		  
		  <!-- fieldsets -->		  
		  
		  <fieldset>
			<h2 class="fs-title">Llena tu información</h2>
			<h3 class="fs-subtitle">Paso 4. ¿Dirías más de ti?.</h3><br>
			
			<h3 class="fs-subtitle">Comparte tu historia con nosotros y ayuda a los usuarios de iGrowp, 
			inspirándolos a seguir sus sueños y a tomar las mejores decisiones para su vida.</h3>
			<input id="bio" name="bio" type="checkbox" value="1"><br><br>
			<h3 class="fs-subtitle">Da click en el recuadro para llenar autobiografía</h3>
			
			<h3 class="fs-subtitle"></h3>
			
			<input name="previous" class="previous action-button" value="Anterior" type="button">
			<input id="btnSubmit" name="btnSubmit" value="Enviar" type="submit" class="button action-button">
		  </fieldset>
		  
		  
		  
		  
		</form>
	</div>
	<!-- +++++++++++++++ JQUERY +++++++++++++++ -->
	<script src='js/form/jquery.js'></script>
	
	 <script>
		var current_fs, next_fs, previous_fs;
		var left, opacity, scale;
		var animating;
		$('.next').click(function () {
			if (animating)
				return false;
			animating = true;
			current_fs = $(this).parent();
			next_fs = $(this).parent().next();
			$('#progressbar li').eq($('fieldset').index(next_fs)).addClass('active');
			next_fs.show();
			current_fs.animate({ opacity: 0 }, {
				step: function (now, mx) {
					scale = 1 - (1 - now) * 0.2;
					left = now * 50 + '%';
					opacity = 1 - now;
					current_fs.css({ 'transform': 'scale(' + scale + ')' });
					next_fs.css({
						'left': left,
						'opacity': opacity
					});
				},
				duration: 800,
				complete: function () {
					current_fs.hide();
					animating = false;
				},
				easing: 'easeInOutBack'
			});
		});
		$('.previous').click(function () {
			if (animating)
				return false;
			animating = true;
			current_fs = $(this).parent();
			previous_fs = $(this).parent().prev();
			$('#progressbar li').eq($('fieldset').index(current_fs)).removeClass('active');
			previous_fs.show();
			current_fs.animate({ opacity: 0 }, {
				step: function (now, mx) {
					scale = 0.8 + (1 - now) * 0.2;
					left = (1 - now) * 50 + '%';
					opacity = 1 - now;
					current_fs.css({ 'left': left });
					previous_fs.css({
						'transform': 'scale(' + scale + ')',
						'opacity': opacity
					});
				},
				duration: 800,
				complete: function () {
					current_fs.hide();
					animating = false;
				},
				easing: 'easeInOutBack'
			});
		});
		$('.submit').click(function () {
			return false;
		});
			  //@ sourceURL=pen.js
			</script>

			
			<script>
		  if (document.location.search.match(/type=embed/gi)) {
			window.parent.postMessage("resize", "*");
		  }
	</script>
	
  </body>
</html>
