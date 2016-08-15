<?php 
	$cookie_name='Login';
	if(isset($_COOKIE[$cookie_name])) {
		echo '<script> window.top.location.href = "TusContenidos.php" </script>';
	}//End if
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Login</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!-- Ícono título -->
	<link href="Imagenes/iGrowp.png" rel="shortcut icon">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Estilo propio-->
	<link rel="stylesheet" href="css/Estilos.css">	

</head>

<body>
	
		<?php
		$Usuario =  utf8_decode($_POST["txtUsuario"]);
		$JPass=md5(utf8_decode($_POST["txtPass"]));
		$cnx = mysqli_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
		
		// Realizar una consulta MySQL
		$query = 'SELECT passwordUsuario FROM usuario WHERE emailUsuario = "'.$Usuario.'";'
			or die('Error en la consulta: ' . mysqli_error());
			
		$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
		$row = $result->fetch_array(MYSQLI_ASSOC);
		if(mysqli_num_rows($result)>0 and $row["passwordUsuario"] == $JPass){
			$cookie_name = 'Login';	
			setcookie($cookie_name , $Usuario, time()+86400*15, "/");							
			mysqli_close($cnx);					
			echo '<script> window.top.location.href = "TusContenidos.php" </script>';
		}
		else {
			echo '<!-- Header -->
					<nav class="navbar navbar-default navbar-fixed-top">
						<a class="navbar-brand" href="#">
							<img alt="iGrowp" src="Imagenes/iGrowp.png" width="33px" height="34px">
						</a>
						<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Menu</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div><!-- /End .navbar-header -->
						
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<form class="navbar-form navbar-right" action="Login.php" method="POST">								
								<div class="form-group has-error has-feedback">
									<input type="text" id="txtUsuario" name="txtUsuario" class="form-control" placeholder="Correo electrónico" required>
									<span class="glyphicon glyphicon-remove form-control-feedback"></span>
								</div>
								<div class="form-group has-error has-feedback">	
									<input type="password" id="txtPass" name="txtPass" class="form-control" placeholder="Contraseña" required>
									<span class="glyphicon glyphicon-remove form-control-feedback"></span>
								</div>		
								<button type="submit" onClick="return enviarLogin()" class="btn btn-default navbar-btn">Acceder</button>
								<A HREF="cambiarContraForm.php" TARGET="_BLANK"><p>He olvidado mi contraseña.</p></a>
							</form>
							<div class="alert alert-danger fade in navbar-right" role="alert">							
									<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
									<strong>Tu usuario o contraseña son incorrectos</strong>										
							</div>						
								
						</div><!-- /End .navbar-collapse -->
					  </div><!-- /End .container-fluid -->
					</nav>
			<!-- End header -->';	
			mysqli_close($cnx);				
		}
?>
	<script language="javascript">
		function enviarForm(){
			
			document.getElementById("divNombre").className="form-group has-success has-feedback";
			document.getElementById("iconoNombre").className="glyphicon glyphicon-ok form-control-feedback";
			
			if(validarCorreo(document.getElementById("txtCorreo").id, document.getElementById("divCorreo").id, 
			document.getElementById("iconoCorreo").id) && longitudMinima(document.getElementById("txtNombre").value)){
				var contra = document.getElementById("txtContra").value;
				var conf = document.getElementById("txtConfirmacion").value;
				if(contra != conf){
					document.getElementById("divContra").className="form-group has-error has-feedback";
					document.getElementById("iconoContra").className="glyphicon glyphicon-remove form-control-feedback";
					document.getElementById("divConf").className="form-group has-error has-feedback";
					document.getElementById("iconoConf").className="glyphicon glyphicon-remove form-control-feedback";
					document.getElementById("txtConfirmacion").value="";
					document.getElementById("txtConfirmacion").placeholder="Las contraseñas no coinciden";
					return false;
				}
				else {
					document.getElementById("divContra").className="form-group has-success has-feedback";
					document.getElementById("iconoContra").className="glyphicon glyphicon-ok form-control-feedback";
					document.getElementById("divConf").className="form-group has-success has-feedback";
					document.getElementById("iconoConf").className="glyphicon glyphicon-ok form-control-feedback";
					return true;
				}//End else validarContraseña				
			}
			else{
				return false;
			}//End else validarCorreo
		}//End function enviarForm		
		
		function enviarLogin() {
				if(validarCorreo(document.getElementById("txtUsuario").id, document.getElementById("divCorreoLogin").id,
				document.getElementById("iconoCorreoLogin").id)){					
					return true;	
				}
				else{
					return false;
				}//End else validarCorreo
		}//End function enviarLogin
		
		//Función para validar una dirección de correo
		function validarCorreo(elemento, div, icono){
			//Creamos un objeto 
			var object=document.getElementById(elemento);
			var valueForm=object.value;
	 
			//Patron para el correo
			var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
			if(valueForm.search(patron)==0){
				//Mail correcto
				document.getElementById(div).className="form-group has-success has-feedback";
				document.getElementById(icono).className="glyphicon glyphicon-ok form-control-feedback";
				return true;
			}//End if
			else{
				//Mail incorrecto
				document.getElementById(div).className="form-group has-error has-feedback";
				document.getElementById(icono).className="glyphicon glyphicon-remove form-control-feedback";
				valueForm="";
				object.placeholder="Correo inválido";
				return false;
			}//End else
		}//End function validaMail
	
	function longitudMinima(value){
			if(value.length < 5){
				alert("El campo de nombre debe tener entre 5 y 50 caracteres");
				document.getElementById("txtNombre").value = "";
				return false;
			}
			else{
				return true;
			}
		}
		
		function soloLetras(e){
		   key = e.keyCode || e.which;
		   tecla = String.fromCharCode(key).toLowerCase();
		   letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
		   especiales = "8-37-39-46";

		   tecla_especial = false
		   for(var i in especiales){
				if(key == especiales[i]){
					tecla_especial = true;
					break;
				}
			}
			if(letras.indexOf(tecla)==-1 && !tecla_especial){
				alert("Solo se aceptan letras en este campo");
				return false;
			}
		}
		
		function noEspacios(value){
			if (/\s+/.test(value)){
				alert("No se permiten espacios en la contraseña");
				document.getElementById("txtContra").value = "";
				document.getElementById("txtConfirmacion").value = "";
				return false;
			}
		}
		
		function espaciosInnecesarios(value){
			String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };
			document.getElementById("txtNombre").value = value.trim();
			//alert("Sin espacios: '" + value.trim() + "'");
		}
		
	</script>
	<!-- End Script -->
	
     
    <!-- Row vacío -->   
    <div class="row">
		<div class="col-md-12"><br><br><br><br><br></div>
    </div>
    <!-- End row vacío -->
    
    
    <!-- Body -->
	<div class="row row-gradient-blue">
		
		<div class="col-md-1"></div><!-- Col vacía -->
		
		<!-- Texto -->
		<div class="col-md-3 col-custom" align="center">
			<br><h3>Estudia lo que quieres.</h3><br>
			<p align="justify">iGrowp no es un curso o una escuela, es una plataforma que te orientará en el camino de la educación para que puedas 
				aprovecharla al máximo.</p><br><br>
				
			<h3>Estúdialo como quieres.</h3><br>
			<p align="justify">iGrowp no tiene horarios, calificaciones, solo información relevante según tus gustos. ¡Aprovecha la oportunidad de 
				la educación y descubre el tesoro que hay en ella!</p><br><br>		
		</div>
		<!-- End Texto -->
		
		<!-- Formulario registro -->
		<div class="col-md-4 col-custom">
			<div class="container container-default">
				<div align="center">
						<h2><img class="imgLibreta" width=45px heigh=45px src="Imagenes/libreta.png"> ¡Crea una cuenta!</h2>
				</div><!-- /End título -->
			</div><!-- /End container título -->
			<div class="jumbotron jumbotron-default">
				<div class="container">
					<form id="registro" method="POST" onsubmit="return enviarForm()" action="FrameFormularioRegistro.php">
						<div class="form-group">	
							<input type="text" name="txtNombre" class="form-control" id="txtNombre" placeholder="Nombre completo" required onkeypress="return soloLetras(event)" maxlength="100" onchange="espaciosInnecesarios(this.value)">
						</div>
						<div class="form-group">
							<input class="form-control" id="txtCorreo" name="txtCorreo" placeholder="Correo electrónico" type="text" required />
						</div>
						<div class="form-group">
							<input  class="form-control" id="txtContra" name="txtContra" placeholder="Ingresar Contraseña" type="password" required onchange="noEspacios(this.value)" />
						</div>
						<div class="form-group">
							<input class="form-control" id="txtConfirmacion" name="txtConfirmacion" placeholder="Confirmar contraseña" type="password" required onchange="noEspacios(this.value)"/>
						</div>
						<div class="form-group">
							<select name="tipoUsuario" >
								  <option value="Educando">Educando</option>
								  <option value="Educador">Educador</option>
							 </select>
							</div>
						<div class="form-group" align="center">
							<button id="btnRegistrar" name="btnRegistrar" type="submit" class="btn btn-custom">Registrar</button>
						</div>
												
					</form><!-- /End formulario -->
				</div><!-- /End container formulario -->
			</div><!-- /End jumbotron -->
		</div>
		<!-- End formulario registro -->
		
		<!-- Imagen -->
		<div class="col-md-4" align="center">
			<br>
			<br>
			<br>
			<img class="img-responsive img-custom" src="Imagenes/ImagenIndex.png">
		</div>
		<!-- End imagen -->
		
	</div>
	<!-- End body -->
	
	
	<!-- Row vacío -->  
	<div class="row row-bottom-color-blue">
		<div class="col-md-12"><br></div>
	</div>
	<!-- End row vacío -->  
		
		
	<!-- Footer -->
	<div class="panel panel-default">
		<div class="panel-footer-default">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-6"><br>
					<li>iGrowp.</li>
					<li> Copyright 2015.</li>
					<li>Todos los Derechos Reservados.</li><br>
				</div>
				<div class="col-md-5"><br>		
					<li>Guzmán Eusebio José Jesús.</li>
					<li>López Martínez Tania Michelle.</li>
					<li>Pacheco García Victor Uriel</li>
				</div>
			</div>
		</div>
	</div>
	<!-- End footer -->	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>
