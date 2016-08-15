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
	<title>Personas</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.26" />
	<!-- Ícono título -->
	<link href="Imagenes/iGrowp.png" rel="shortcut icon">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Estilo propio-->
	<link rel="stylesheet" href="css/Estilos.css">
	<!-- Estilo jQuery-->
	<link rel="stylesheet" href="js/jquery-ui-1.11.4/jquery-ui.css">
	
	<!-- Script -->

	<!-- End Script -->
	
</head>

<?php
	function verUsuarios(){
		if(isset($_POST["buscaPersona"])){
			$Usuario =  utf8_decode($_POST["buscaPersona"]);
			
			//Inicia conexión con MySQL
			$cnx = mysqli_connect('localhost', 'root', '')
			or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');
			
			$Usuario = str_replace(array("'",),"´",$Usuario);	
			
			// Realizar una consulta MySQL
			$query = "SELECT idUsuario, nombreUsuario, tipoUsuario, imagenPerfilUsuario FROM usuario WHERE nombreUsuario LIKE '".$Usuario."%';";
			
			// Guarda el resultado de la consulta
			$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));		

			if(mysqli_num_rows($result)<=0) {		
				echo ('<br><br><br><br><br><br><br>
				No se encontraron resultados de personas llamadas: "'.$Usuario.'".
				<br><br><br><br><br><br><br><br>');
			}//End if	
			else{
				
				while ($row=$result->fetch_assoc()){
				
					$idUsuario=utf8_encode($row["idUsuario"]);	
					$nombreUsuario=utf8_encode($row["nombreUsuario"]);	
					$tipoUsuario=utf8_encode($row["tipoUsuario"]);	
					$imagenPerfilUsuario=utf8_encode($row["imagenPerfilUsuario"]);
					if($imagenPerfilUsuario==""){
						$imagenPerfilUsuario="Imagenes/ImagenIndex.png";
					}
					echo('
							<!-- /Col perfil 1-->
							<div class="col-sm-3 col-md-3">
								<div class="thumbnail">
									<h5>'.$nombreUsuario.'</h5>
									<img src="'.$imagenPerfilUsuario.'" alt="...">								
									<h6>'.$tipoUsuario.'</h6>								
									<form  method="POST" action="Perfil.php">	
										<input type="hidden" name="idUsuario" value="'.$idUsuario.'" />												
										<button type="submit" class="btn btn-default btn-default-custom">
											Ver perfil </button>
									</form>	
								</div>							
							</div>	
							<!-- /Col perfil 1 -->			
					');		
				}//End while			
			}//End else		
			mysqli_close($cnx);	//Cierra la conexión con MySQL
		}//End if validar método post	
		else{
			echo ('<br><br><br><br><br><br><br>
				<h3>Parece que llegaste aquí desde el lugar equivocado.</h3>
				<br><br><br><br><br><br><br><br>');
		}//End else validar método post
	}//End function ver Usuarios
		
?>


<body>
		<!-- Header -->
	<nav class="navbar navbar-default navbar navbar-default-obscuro navbar-fixed-top">
		<div class="container-fluid">
			<a href="iGrowp.php" class="navbar-brand">
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
    
    
	<!-- Row espacio middle-->
    <div class="row">
		<div class="col-md-12"><br><br></div>
    </div>
    <!-- End Row espacio middle-->
    
	
	<!-- Body -->	
	<div class="row row-gradient">
		
		<div class="col-md-2"></div><!-- /Col vacía -->
		
		<!-- /Col contenidos -->
		<div class="col-md-8" align="center">
			<div class="jumbotron jumbotron-default-contenido">
				<div id="divContenido" class="container">
					<!-- /Row perfil 1 -->	
					<div class="row">
						<?php
							verUsuarios();
						?>			
					</div>					
			</div><!-- /Row container-->				
			</div><!-- /Row jumbotron -->			
		</div><!-- /End col contenidos -->
		
		<div class="col-md-2" align="center"></div><!-- /Col vacía-->
				
	</div>
	<!-- End body -->
	
	
	<!-- Modal contenido flotante-->
	<div class="modal fade" id="contenido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div id="modalVerContenido" class="modal-content">

		</div>
	  </div>
	</div>
	<!-- End modal contenido flotante-->
	
	
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
</body>

</html>
