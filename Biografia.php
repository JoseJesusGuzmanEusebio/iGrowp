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
	<title>Biografía</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.25" />
	<!-- Ícono título -->
	<link href="Imagenes/iGrowp.png" rel="shortcut icon">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Estilo propio-->
	<link rel="stylesheet" href="css/Estilos.css">
	
	<?php
	
		//*********** Inicia funcion verBiografia ***********//		
		function verBiografia($id){
			
			$idUsuario=$id;
			
			//Conexión MySQL
			$cnx = mysqli_connect('localhost', 'root', '')
			or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
			
			//Consulta el interesUno del usuario
			$query = 'call ver_biografia('.$idUsuario.');';		
				
			//Query MySQL	
			$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
			
			//Almacena el idUsuario			
			$row = $result->fetch_array(MYSQLI_ASSOC);				
						
			//Variables codificadas para mostrar acentos
			
			$idBiografia=utf8_encode($row["idBiografia"]);
			$nombreUsuario=utf8_encode($row["nombreUsuario"]);
			$tipoUsuario=utf8_encode($row["tipoUsuario"]);
			$imagenPerfilUsuario=utf8_encode($row["imagenPerfilUsuario"]);	
			$tituloBiografia=utf8_encode($row["tituloBiografia"]);	
			$biografia=utf8_encode($row["biografia"]);	
			$nombreInteres=utf8_encode($row["nombreInteres"]);				
		
			if($row["imagenBiografia"]=="") {
				mysqli_close($cnx);
				$imagenBiografia = "Imagenes/ImagenIndex.png";
			}
			else {				
				$imagenBiografia  = utf8_encode($row["imagenBiografia"]);
			}
			
			$biografia=str_replace(array("\r\n","\r","\n","\\r","\\n","\\r\\n"),"<br>",$biografia);
			
			//Imprimime columna de contenido en HTML
			echo('
			<!-- Row imagen y nombre -->
			<div class="row">
				<div class="row-claro-imagen">
					<div class="col-md-1"></div>
					<div class="col-xs-4 col-md-2 col-sm-4 col-lg-2">
						<a href="#" class="thumbnail">
							<img src="'.$imagenPerfilUsuario.'" alt="...">
						</a>
					</div>
				</div>
				<div class="col-md-6 imgLibreta">
					<form>
						<h2>'.$nombreUsuario.'
						<span class="label label-primary">'.$tipoUsuario.'</span>
						</h2>
					</form>
				</div>
			</div>
			<!-- End Row imagen y nombre-->

			
			<!-- Row body -->
			<div class="row row-gradient">
				<div class="col-md-2"></div><!-- /Col vacía -->	
				
					<div class="col-md-8" align="center">
						<div class="jumbotron jumbotron-default-contenido">
							<div class="container">	
							<div class="container">	
								<!-- /Row 1 biografia -->				
								<div class="row">						
									<!-- /Col 1 biografia -->	
									<div class="col-md-12" align="center">
										<h3>'.$tituloBiografia.'</h3>
									</div><!-- /End Col 1 biografia -->																	
								</div>	<!-- /End Row 1 biografia-->
								
								<!-- Row vacío -->   
									<div class="row">
										<div class="col-md-12"><br><br></div>
									</div>
								<!-- End row vacío -->	
														
								<!-- /Row 2 biografia -->				
								<div class="row">						
									<!-- /Col 1 biografia -->
									<div class="col-md-8" align="left">
										<p align="justify">'.$biografia.'
										</p>
									</div><!-- /End Col 1 biografia -->
									
									<!-- /Col 2 biografia -->
									<div class="col-md-4" align="center">
										<div class="row">
											<h5 class="bold">'.$nombreInteres.'</h5>
											<div class="thumbnail">
												<img class="img-responsive" src="'.$imagenBiografia.'" alt="Nada por aquí...">
											</div>
										</div>
									</div> <!-- /End Col 2 biografia -->																
								</div>	<!-- /End Row 2 biografia -->
				');	
				
				mysqli_close($cnx);
				
				//Conexión MySQL
				$cnx = mysqli_connect('localhost', 'root', '')
				or die('No se pudo conectar: ' . mysqli_error($cnx));
				mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
				
				$cookie_name='Login';
				
				$query = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';						
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));				
				$row = $result->fetch_array(MYSQLI_ASSOC);			
				$idDeUsuario=$row["idUsuario"];	
				
				if($idDeUsuario==$idUsuario){
					echo('				
								<!-- /Row 3 biografia -->				
								<div class="row">						
									<!-- /Col 1 biografia -->	
									<div class="col-md-12" align="right">
										<form  action="FormBiografia.php" method="POST">													 
											<button name="idUsuario" value="'.$idDeUsuario.'" type="submit" class="btn btn-default btn-default-custom">Modificar</button>	
											<button type="button" class="btn btn-default btn-default-custom" data-toggle="modal" data-target="#ModificarContenido"
											onClick="eliminarBiografia('.$idBiografia.')">
												Eliminar<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
											</button>
										<form>	
									</div><!-- /End Col 1 biografia -->																	
								</div>	<!-- /End Row 3 biografia -->
					');
				}			
				echo('									
							</div>
							</div><!-- /Row container-->	
						</div><!-- /Row jumbotron -->
					</div><!-- /End col biografia -->
				</div><!-- End Row body -->
				');
				
			mysqli_close($cnx);
			
		}//End function verBiografia
	
	?>
	
	<script src="js/form/jquery-1.11.3.js"></script>
	
	<script>
			
		function eliminarBiografia(idU){
				$.post('RespuestasPHP/ValidaEliminarBiografia.php', {idBiografia: idU},
					function(output){
						$('#modalModificarBiografia').html(output).show();
					});
		}//End function verContenido
		
		
	</script>	
    
</head>

<body>
	 	  
	<!-- Header -->
	<nav class="navbar navbar-default navbar navbar-default-obscuro navbar-fixed-top">
		<div class="container-fluid">
		<a class="navbar-brand" href="TusContenidos.php">
			<img alt="iGrowp" src="Imagenes/iGrowp.png" width="33px" height="34px">
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
					<form id="formularioBuscaPersona" class="navbar-form navbar-left" role="search" method="POST" action="VerPerfiles.php">
						<div class="form-group">
						  <input type="text" id="buscaPersona" name="buscaPersona" placeholder="Busca personas..." class="form-control" required>
						</div>
						<button id="btnBuscar" name="btnBuscar" value="Buscar" type="submit" class="btn btn-default">
							<span aria-hidden="true"><img alt="iGrowp" src="Imagenes/search.png"></span> Buscar 
						</button>
					</form>	
				</li>				
				<li><a href="Perfil.php">Mi perfil</a></li>
				<li><a href="TusContenidos.php">Contenidos</a></li>
				<li><a href="verBiografias.php">Autobiografías</a></li>
				<li><a href="cerrarSesion.php">Cerrar sesión</a></li>
			</ul>
        </div><!-- /End .navbar-collapse -->
      </div><!-- /End .container-fluid -->
    </nav>
    <!-- /End Header -->
    
    <!-- /Row espacio top-->
	<div class="row row-claro">
		<div class="col-md-12"></div>
	</div>
	<!-- /End Row espacio top-->
    
    <?php
		//Llama función verBiografia() 
		if(isset($_POST["idUsuario"])){
			verBiografia($_POST["idUsuario"]);
		}//End valida método post
		else{
			
			//Conexión MySQL
			$cnx = mysqli_connect('localhost', 'root', '')
			or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
			
			//Consulta el interesUno del usuario
			$query = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
				
			//Query MySQL	
			$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		
			
			//Almacena el idUsuario			
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$id= $row["idUsuario"];
			verBiografia($id);
		}
    ?>
 	
	
	<!-- Modal ModificarContenidoBiografia flotante-->
	<div class="modal fade" id="ModificarContenido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content" id="modalModificarBiografia">
		   
		  
		  
		</div>
	  </div>
	</div>
	<!-- End modal ModificarContenido flotante-->
	
	
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
