<!-- PHP valida cookie -->
<?php 
	$cookie_name='Login';
	if(!isset($_COOKIE[$cookie_name])) {
		echo '<script> window.top.location.href = "iGrowp.php" </script>';
	}//End if
?>
<!-- End valida cookie -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Biografías</title>
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
	
	<?php
	
		//*********** Inicia funcion verBiografias ***********//		
		function verBiografias(){
			
			$cookie_name='Login'; //Nombre de la cookie
			
			//Valida cookie
			if(!isset($_COOKIE[$cookie_name])) {
				
				echo '<script> window.top.location.href = "iGrowp.php" </script>'; //Redirecciona a la página principal.
				
			}//End if valida cookie
			else{
			
			//Conexión MySQL
				$cnx = mysqli_connect('localhost', 'root', '')
				or die('No se pudo conectar: ' . mysqli_error($cnx));
				mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
				
				//Consulta el interesUno del usuario
				$query = 'SELECT nombreInteres FROM interes inner join usuario
				ON interes.idInteres=usuario.idInteresUno
				where emailUsuario="'.$_COOKIE[$cookie_name].'";';		
					
				//Query MySQL	
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
				
				//Almacena el interesUno			
				$row = $result->fetch_array(MYSQLI_ASSOC);				
				$interes  = $row["nombreInteres"];
				
				//Llama procedimiento consulta_contenido MySQL con el interesUno obtenido
				$query = 'call consulta_biografia ("'.$interes.'");';
				
				//Query MySQL
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
				//Valida campos
				if(mysqli_num_rows($result) <= 0) {
					echo ('<br><br><br><br><br><br><br><br><br><br><br><br>
							No hay biografías disponibles de tu primer interés "'.utf8_encode($interes).'"
							<br><br><br><br><br><br><br><br><br><br><br><br>'); 
					mysqli_close($cnx);
				}//End if valida campos
				else {
								
					//Imprime resultados MySQL
					while($row = $result->fetch_assoc()) {					
							
						//Variables codificadas para mostrar acentos
						$idUsuario=utf8_encode($row["idUsuario"]);	
						$nombreUsuario=utf8_encode($row["nombreUsuario"]);
						$tipoUsuario=utf8_encode($row["tipoUsuario"]);	
						$tituloBiografia=utf8_encode($row["tituloBiografia"]);						
						$nombreInteres=utf8_encode($row["nombreInteres"]);
						$imagenBiografia=utf8_encode($row["imagenBiografia"]);
						
						$biografia=utf8_encode($row["biografia"]);
						//Obtiene un substring para limitar los caracteres del contenido
						$subStringBiografia = substr($biografia, 0, 200);
						
						//Imprimime columna de contenido en HTML
						echo('
							<div class="thumbnail thumbnail-custom">
								<form method="POST" action="Biografia.php">
									<input type="hidden" name="idUsuario" value="'.$idUsuario.'" />				
									<!-- /Row 1 biografia -->				
									<div class="row">	
										<div class="col-md-1" align="center"></div>	
														
										<!-- /Col 1 biografia -->	
										<div class="col-md-7" align="center">
											
											<h3>'.$nombreUsuario.'</h3>
											<span class="label label-primary">'.$tipoUsuario.'</span>
											<h4>'.$tituloBiografia.'</h4>
											<h5 align="justify">'.$subStringBiografia.'...</h5>
											
										</div><!-- /End Col 1 biografia -->
										
										<!-- /Col 2 biografia -->
										<div class="col-md-3" align="center">
											<h5 class="bold">'.$nombreInteres.'</h5>
											<div class="thumbnail">
												<img src="'.$imagenBiografia.'" alt="Nada por aquí...">
											</div>
										</div> <!-- /End Col 2 biografia -->
												
									</div> <!-- /End Row 1 biografia -->	
								<button type="submit" class="btn btn-default btn-default-custom">
									Ver biografía	
								</buton>
							</form>														
						</div>	<!-- /End thumbnail -->	<br>

						');	
						
					}//End while
					mysqli_close($cnx);	
				}//End else valida resultados			
				}//End else valida cookie
			}//End function verBiografias
	?>
	
	<!-- Librería JQuery para autocomplete-->
	<script src="js/form/jquery-1.11.3.js"></script> 
	<!-- Librería JQuery User Interfaces para autocomplete-->
	<script src="js/jquery-ui-1.11.4/jquery-ui.js"></script> 
	<script>
		function obtenerContenido(value){
			$.post('RespuestasPHP/CargaBiografias.php', {interes: value},
				function(output){
					$('#divBiografia').html(output).show();
				});
		}//End function obtenerCotenido
	</script>
	
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
			
			}
		});
 
	});//End function autocomplete
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
				<li><form class="navbar-form navbar-left" role="search" method="POST" action="VerPerfiles.php">
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
				<li><a href="CerrarSesion.php">Cerrar sesión</a></li>
			</ul>
        </div><!-- /End .navbar-collapse -->
      </div><!-- /End .container-fluid -->      
    </nav>
    <!-- End Header -->
    
    
    <!-- Row espacio top-->
    <div class="row row-claro">
		<div class="col-md-12"><br><br><br></div>
    </div>
    <!-- End Row espacio top-->    
    
    <!-- Formulario busqueda de biografias-->
    <div class="row row-gris">
		<div class="col-md-12">
			<form name="formularioContenido" class="navbar-form navbar-right">
				<div class="form-group">
				  <input type="text" id="inputIntereses" name="inputContenido" placeholder="Busca biografías..." class="form-control" required>
				</div>
				<button id="btnBuscar" name="btnBuscar" value="Buscar" type="button" class="btn btn-default" onClick="obtenerContenido(formularioContenido.inputContenido.value)">
					<span aria-hidden="true"><img alt="iGrowp" src="Imagenes/search.png" ></span> Buscar 
				</button>
			</form>	
		</div>
    </div>
    <!-- End formulario busqueda de contenidos-->

	<!-- Row espacio middle-->
    <div class="row">
		<div class="col-md-12"><br><br></div>
    </div>
    <!-- End Row espacio middle-->

	
	<!-- Row body -->
	<div class="row row-gradient">
		<div class="col-md-2"></div><!-- /Col vacía -->	
		
		<div class="col-md-8" align="center">
			<div class="jumbotron jumbotron-default-contenido">
				<div class="container" id="divBiografia">					
					<?php
						//Llama función verBiografias() 
						verBiografias();	
					?>						
				</div><!-- /Row container-->	
			</div><!-- /Row jumbotron -->
		</div><!-- /End col contenidos -->	
		
		<div class="col-md-2"></div><!-- /Col vacía -->	
		
	</div><!-- End Row body -->
	
	
	
	<!-- /Row espacio bottom-->
	<div class="row row-bottom-color">
		<div class="col-md-12"><br></div>
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
