
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>iGrowp</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<!-- Ícono título -->
	<link href="Imagenes/iGrowp.png" rel="shortcut icon">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!-- Estilo propio-->
	<link rel="stylesheet" href="css/Estilos.css">
	
	<script language="javascript">
		function enviarForm(){
				if(validarCorreo(document.getElementById("txtCorreo").id, document.getElementById("divCorreo").id, 
				document.getElementById("iconoCorreo").id)){
					return true;
				}
				else{
					return false;
				}//End else validarCorreo
			}
		}//End function enviarForm		
		
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
	</script>
	
</head>

<body>	

	<!-- Header -->
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
		
		
      </div><!-- /End .container-fluid -->
    </nav>
    <!-- End header -->
       
       
    <!-- Row vacío -->   
    <div class="row">
		<div class="col-md-12"><br><br><br><br><br></div>
    </div>
    <!-- End row vacío -->
    
<center>
    <!-- Body -->
	<div class="row row-gradient-blue" align="center">
		
		<div class="col-md-1"></div><!-- Col vacía -->
		
		
		
		<!-- Formulario registro -->
		<div class="col-md-4 col-custom" align="center">
			<div class="container container-default">
				<div align="center">
						<h2><img class="imgLibreta" width=45px heigh=45px src="Imagenes/libreta.png">Cambiar contraseña</h2>
				</div><!-- /End título -->
			</div><!-- /End container título -->
			<div class="jumbotron jumbotron-default">
				<div class="container">
					<form id="registro" method="POST" onsubmit="return enviarForm()" action="cambiarContra.php">
						
						<div id="divCorreo" class="form-group">
							<input class="form-control" id="txtCorreo" name="txtCorreo" placeholder="Correo electrónico" type="text" required />
							<span id="iconoCorreo" class=""></span>
						</div>
						<div class="form-group" align="center">
							<button id="btnRegistrar" name="btnRegistrar" type="submit" class="btn btn-custom">Aceptar</button>
						</div>					
					</form><!-- /End formulario -->
				</div><!-- /End container formulario -->
			</div><!-- /End jumbotron -->
		</div>
		<!-- End formulario registro -->
		
		
		
	</div>
	<!-- End body -->
</center>
	
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