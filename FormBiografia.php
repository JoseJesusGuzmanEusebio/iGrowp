<!-- PHP valida cookie -->
<?php 
	function verFormBiografia(){
		
		$cookie_name='Login';
		if(!isset($_COOKIE[$cookie_name])) {
			echo '<script> window.top.location.href = "iGrowp.php" </script>';
		}//End if
	
		//Conexión MySQL
		$cnx = mysqli_connect('localhost', 'root', '')or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'igrowp') or die('No se pudo seleccionar la base de datos');
		
		//Validar método post	
		if(isset($_POST["idUsuario"])){
			
			$query='SELECT idBiografia FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';		
			$result=mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
			$row=$result->fetch_array(MYSQLI_ASSOC);	
			$idBiografia=$row["idBiografia"];
			
			//Validar id biografía
			if($idBiografia!=""){
			
				$idUsuario = $_POST["idUsuario"];
						
				//Conexión MySQL
				$cnx = mysqli_connect('localhost', 'root', '')
				or die('No se pudo conectar: ' . mysqli_error($cnx));
				mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
				
				//Consulta el interesUno del usuario
				$query = 'call form_biografia('.$idUsuario.');';		
					
				//Query MySQL	
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
				
				//Almacena el idUsuario			
				$row = $result->fetch_array(MYSQLI_ASSOC);				
							
				//Variables codificadas para mostrar acentos
				
				$idBiografia=$row["idBiografia"];
				$tituloBiografia=utf8_encode($row["tituloBiografia"]);	
				$biografia=utf8_encode($row["biografia"]);	
				$nombreInteres=utf8_encode($row["nombreinteres"]);				
				$imagenBiografia=utf8_encode($row["imagenBiografia"]);

				echo('
	<!-- Body -->	
	<div class="row row-gradient">
		
		<div class="col-md-3"></div><!-- /Col vacía -->
		
		<!-- /Col contenidos -->
		<div class="col-md-6 col-custom">
			<div class="container container-default-biografia">
				<div align="center">
						<h2>¡Crea tu autobiografía!</h2>
				</div><!-- /End título -->
			</div><!-- /End container título -->
			<div class="jumbotron jumbotron-default">
				<div class="container">
					<form id="registro" action="ModificarBiografia.php" method="POST" onsubmit="" enctype="multipart/form-data">
						<div class="form-group">	
							<input value="'.$tituloBiografia.'" type="text" name="txtTitulo"  class="form-control" id="txtTitulo" placeholder="¡Ponle un título a tu biografía!" maxlength="100">
						</div>
						<div id="divIntereses" class="form-group ">	
							<input  value="'.$nombreInteres.'" type="text" name="txtInteres" class="form-control form-control-sm" id="inputIntereses" placeholder="¡Agrégale un interés!" required>
							<span id="iconoInputIntereses" class=""></span>
						</div>
						<div class="form-group">
						 <textarea name="biografia" id="contenido" cols="30" rows="5" class="form-control noresize" placeholder="Acerca de ti..." required>'.$biografia.'</textarea><br>                            
						</div>
						<div class="thumbnail col-md-2" align="left">
							<img src="'.$imagenBiografia.'" alt="Nada por aquí...">
						</div>
						<div class="col-md-7" align="left">
							<label><h5>¡Agrega una imagen al contenido!</h5></label><br>
							<input id="InputFile" name="InputFile" class="button" value="InputFile" type="file">
						</div>
						<br><br>				
						<div class="form-group" align="right">
							<button value="'.$idBiografia.'" id="btnModificar" name="btnModificar" type="submit" class="btn btn-info">Modificar biografía</button>
						</div>					
					</form><!-- /End formulario -->
				</div><!-- /End container formulario -->
			</div><!-- /End jumbotron -->
		</div><!-- End formulario registro -->					
	
		<div class="col-md-1" align="center"></div><!-- /Col vacía-->
				
	</div>
	<!-- End body -->
				');	
					mysqli_close($cnx);
				
				}//End if validar método post	
				else{
				
		echo('
	<!-- Body -->	
	<div class="row row-gradient">
		
		<div class="col-md-3"></div><!-- /Col vacía -->
		
		<!-- /Col contenidos -->
		<div class="col-md-6 col-custom">
			<div class="container container-default-biografia">
				<div align="center">
						<h2>¡Crea tu autobiografía!</h2>
				</div><!-- /End título -->
			</div><!-- /End container título -->
			<div class="jumbotron jumbotron-default">
				<div class="container">
					<form id="registro" action="CrearBiografia.php" method="POST" onsubmit="" enctype="multipart/form-data">
						<div class="form-group">	
							<input type="text" name="txtTitulo"  class="form-control" id="txtTitulo" placeholder="¡Ponle un título a tu biografía!" maxlength="100">
						</div>
						<div id="divIntereses" class="form-group ">	
							<input type="text" name="txtInteres" class="form-control form-control-sm" id="inputIntereses" placeholder="¡Agrégale un interés!" required>
							<span id="iconoInputIntereses" class=""></span>
						</div>
						<div class="form-group">
						 <textarea name="biografia" id="contenido" cols="30" rows="5" class="form-control noresize" placeholder="Acerca de ti..." required></textarea><br>                            
						</div>
						<div class="thumbnail col-md-2" align="left">
							<img src="Imagenes/ImagenIndex.png" alt="Nada por aquí...">
						</div>
						<div class="col-md-7" align="left">
							<label><h5>¡Agrega una imagen al contenido!</h5></label><br>
							<input id="InputFile" name="InputFile" class="button" value="InputFile" type="file">
						</div>
						
						<br><br>				
						<div class="form-group" align="right">
							<button id="btnModificar" name="btnModificar" type="submit" class="btn btn-info">Crear biografía</button>
						</div>					
					</form><!-- /End formulario -->
				</div><!-- /End container formulario -->
			</div><!-- /End jumbotron -->
		</div><!-- End formulario registro -->					
	
		<div class="col-md-1" align="center"></div><!-- /Col vacía-->
				
	</div>
	<!-- End body -->
		');
				}//End else validar método post	
		}//End if idBiografia
		else{
				echo('
	<!-- Body -->	
	<div class="row row-gradient">
		
		<div class="col-md-3"></div><!-- /Col vacía -->
		
		<!-- /Col contenidos -->
		<div class="col-md-6 col-custom">
			<div class="container container-default-biografia">
				<div align="center">
						<h2>¡Crea tu autobiografía!</h2>
				</div><!-- /End título -->
			</div><!-- /End container título -->
			<div class="jumbotron jumbotron-default">
				<div class="container">
					<form id="registro" action="CrearBiografia.php" method="POST" onsubmit="" enctype="multipart/form-data">
						<div class="form-group">	
							<input type="text" name="txtTitulo"  class="form-control" id="txtTitulo" placeholder="¡Ponle un título a tu biografía!" maxlength="100" onchange="espaciosInnecesarios(this.value)">
						</div>
						<div id="divIntereses" class="form-group ">	
							<input type="text" name="txtInteres" class="form-control form-control-sm" id="inputIntereses" placeholder="¡Agrégale un interés!" required>
							<span id="iconoInputIntereses" class=""></span>
						</div>
						<div class="form-group">
						 <textarea name="biografia" id="contenido" cols="30" rows="5" class="form-control noresize" placeholder="Acerca de ti..." required></textarea><br>                            
						</div>
						<div class="thumbnail col-md-2" align="left">
							<img src="Imagenes/ImagenIndex.png" alt="Nada por aquí...">
						</div>
						<div class="col-md-7" align="left">
							<label><h5>¡Agrega una imagen al contenido!</h5></label><br>
							<input id="InputFile" name="InputFile" class="button" value="InputFile" type="file">
						</div>
						
						<br><br>				
						<div class="form-group" align="right">
							<button id="btnModificar" name="btnModificar" type="submit" class="btn btn-info">Crear biografía</button>
						</div>					
					</form><!-- /End formulario -->
				</div><!-- /End container formulario -->
			</div><!-- /End jumbotron -->
		</div><!-- End formulario registro -->					
	
		<div class="col-md-1" align="center"></div><!-- /Col vacía-->
				
	</div>
	<!-- End body -->
				');		
		}
	}//End function verFormBiografia
?>
<!-- End valida cookie -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Contenidos</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.25" />
	<!-- Ícono título -->
	<link href="Imagenes/iGrowp.png" rel="shortcut icon">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Estilo propio-->
	<link rel="stylesheet" href="css/Estilos.css">
	<!-- Estilo jQuery-->
	<link rel="stylesheet" href="js/jquery-ui-1.11.4/jquery-ui.css">	
	
	<!-- Librería JQuery para autocomplete-->
	<script src="js/form/jquery-1.11.3.js"></script> 
	<!-- Librería JQuery User Interfaces para autocomplete-->
	<script src="js/jquery-ui-1.11.4/jquery-ui.js"></script> 
	
	<!-- Función para autocomplete con JQuery-ui y AJAX -->
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
			
			},
			change:function(event,ui){
			if (ui.item==null){
				$("#inputIntereses").val('');
				$("#divIntereses").attr('class', 'form-group has-error has-feedback');
				$("#iconoInputIntereses").attr('class', 'glyphicon glyphicon-remove form-control-feedback');
				$("#inputIntereses").attr('placeholder', '¡Inténtalo de nuevo! Elige un interés de la lista desplegable.');
				$("#inputIntereses").focus();
				}
			}
		});
 
	});//End function autocomplete
	
	$('html').bind('keypress', function(e){
			if(e.keyCode == 13){
				return false;
			}
	});
	
	function espaciosInnecesarios(value){
			String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };
			document.getElementById("txtTitulo").value = value.trim();
			//alert("Sin espacios: '" + value.trim() + "'");
		}
	
    </script>

</head>

<body>
	
	<!-- Header -->
	<nav class="navbar navbar-default navbar navbar-default-obscuro navbar-fixed-top">
		<div class="container-fluid">
			<a href="TusContenidos.php" class="navbar-brand">
				<img alt="iGrowp" src="Imagenes/iGrowp.png"  width="33px" height="34px">
			</a>
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Menu</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div><!-- /.End navbar-header -->		
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<form class="navbar-form navbar-left" role="search" method="POST" action="VerPerfiles.php">
						<div class="form-group">
						  <input type="text" name="buscaPersona" placeholder="Busca personas..." class="form-control" required>
						</div>
						<button id="btnBuscar" name="btnBuscar" value="Buscar" type="submit" class="btn btn-default">
							<span aria-hidden="true"><img alt="iGrowp" src="Imagenes/search.png"></span> Buscar 
						</button>
					</form>	
				</li>					
				<li><a href="Perfil.php">Mi perfil</a></li>
				<li><a href="TusContenidos.php">Contenidos</a></li>
				<li><a href="VerBiografias.php">Autobiografías</a></li>
				<li><a href="CerrarSesion.php">Cerrar sesión</a></li>
			</ul>
        </div><!-- /End .navbar-collapse -->
      </div><!-- /End .container-fluid -->      
    </nav>
    <!-- End Header -->
    
     <!-- /Row espacio top-->
	<div class="row row-claro">
		<div class="col-md-12"><br><br><br><br><br></div>
	</div>
	<!-- /End Row espacio top-->
	
	<?php verFormBiografia(); ?>
		
	<!-- /Row espacio bottom-->
	<div class="row row-bottom-color">
		<div class="col-md-12"><br><br><br></div>
	</div>
	<!-- End Row contenido bottom-->
	
	
	<!-- Footer -->
	<div class="panel panel-default">
		<div class="panel-footer-default">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-6" ng-class-odd="'odd'" ng-class-even="'even'"><br>
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
	<!-- End Footer -->
	
		
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</body>

</html>
