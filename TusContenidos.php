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
	
	<?php	
	
		//*********** Inicia funcion cargarIntereses ***********//		
		function cargarIntereses(){
			
			$cookie_name='Login';//Nombre de la cookie
			
			//Valida cookie
			if(!isset($_COOKIE[$cookie_name])) {
				
				echo '<script> window.top.location.href = "iGrowp.php" </script>'; //Redirecciona a la página principal.
								
			}//End if valida cookie
			else{
				
				//Conexión MySQL
				$cnx = mysqli_connect('localhost', 'root', '')
				or die('No se pudo conectar: ' . mysqli_error($cnx));
				mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');
				
				$query = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
				$row = $result->fetch_assoc();
				$email=$_COOKIE[$cookie_name];
				$idUsuario=$row["idUsuario"];	
				
				//Consulta de todos los intereses del usuario.
				$query = 'SELECT nombreInteres FROM interes inner join usuario
				ON interes.idInteres=usuario.idInteresUno or interes.idInteres=usuario.idInteresDos
				or interes.idInteres=usuario.idInteresTres or  interes.idInteres=usuario.idInteresCuatro
				or interes.idInteres=usuario.idInteresCinco or interes.idInteres=usuario.idInteresSeis or interes.idInteres=usuario.idInteresSiete
				or interes.idInteres=usuario.idInteresOcho or interes.idInteres=usuario.idInteresNueve or interes.idInteres=usuario.idInteresDiez
				WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
				
				//Query MySQL 
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));				
					
				$i=1; //Contador para numeración en HTML
				
				//Imprime resultados MySQL	
				while($row = $result->fetch_assoc()) {	
					//Variable codificada para mostrar acentos.	
					$interes=utf8_encode($row["nombreInteres"]);
					if($i==1){
						$Int=$interes;
					}
					//Imprime resultados MySQL
						if(mysqli_num_rows($result)>1){
						echo('
								<button align="right" value="'.$interes.'" type="button" class="btn btn-default btn-default-intC col-xs-9" onClick="obtenerContenido(this.value, this.id )">
									'.$i.'.- '.$interes.'.</button>
								<div class="form-group">
									<input value="'.$interes.'" name="interes'.$i.'" type="hidden">
									<button type="button" class="btn btn-default col-xs-3" data-toggle="modal" data-target="#ModificarContenido"
									onClick="eliminarInteres('.$i.')">
										<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
									</button>
								</div>
							');
						}						
						else{
							echo ('<button align="right" value="'.$interes.'"  id="'.$_COOKIE[$cookie_name].'" type="button" class="btn btn-default btn-default-int col-xs-12" onClick="obtenerContenido(this.value, this.id )">'.$i.'.- '.$interes.'.</button>');
						}	
					$i++;
				}//End while	
				echo('</form>');
				for($j=1;$j<$i;$j++){					
					echo('<br><br>');
				}
					if(mysqli_num_rows($result)<10){
					echo ('
							<form action="ModificarInteres.php" method="POST">
								<input value="'.$i.'" name="idInteresAgregar" type="hidden">
								<input value="'.$_COOKIE[$cookie_name].'" name="emailUsuario" type="hidden">
								<input type="text" name="nombreInteres" class="form-control form-control-sm" id="inputInteresesli" placeholder="¡Agrega un interés!" required>
								<button name="idUsuario" value="'.$idUsuario.'" type="submit" class="btn btn-default col-xs-12">
								Agregar <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
							</form>
					');	}
						
					echo ('								
							<div class="panel-heading">.</div>
					');

				mysqli_close($cnx);	//Cierra conexión MySQL		
					
			}//End else valida cookie
		}//End function cargarIntereses
		
		
		
		//*********** Inicia funcion cargarContenidos ***********//		
		function cargarContenidos(){
			
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
				$query = 'call consulta_contenido ("'.$interes.'");';
				
				//Query MySQL
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));	
				
				//Valida campos
				if(mysqli_num_rows($result) <= 0) {
					echo ('<br><br><br><br><br><br><br><br><br><br><br><br>
							No hay contenidos disponibles de tu primer interés "'.utf8_encode($interes).'"
							<br><br><br><br><br><br><br><br><br><br><br><br>'); 
					mysqli_close($cnx);
				}//End if valida campos
				else {
					$i=0;//Contador para HTML
					$limite=mysqli_num_rows($result);//Variable para HTML
										
					//Imprime resultados MySQL
					while($row = $result->fetch_assoc()) {
												
						//Validación para imprimir renglón en HTML
						$renglon=$i%3;//Variable para imprimir renglones
						if($i==0 or $renglon==0){
							echo('	<!-- /Row '.$i.' contenidos -->				
									<div class="row">
								');
						}//Enf if valdación para imprimir renglón en HTML
						
						//Variables codificadas para mostrar acentos
						$idContenido=utf8_encode($row["idContenido"]);	
						$nombreUsuario=utf8_encode($row["nombreUsuario"]);									
						$nombreInteres=utf8_encode($row["nombreInteres"]);
						$imagenContenido=utf8_encode($row["imagenContenido"]);
						$tituloContenido=utf8_encode($row["tituloContenido"]);
						$contenido=utf8_encode($row["contenido"]);
						
						//Obtiene un substring para limitar los caracteres del contenido
						$subStringContenido = substr($contenido, 0, 200);
						
						$fecha=utf8_encode($row["fecha"]);								
						$hora = date( 'H:i ', strtotime($fecha));
						$fecha = date( 'd/m/y', strtotime($fecha));
						$fecha= "Fecha: ".$fecha." a las ".$hora;
						
						if($imagenContenido==""){
							$imagenContenido="Imagenes/ImagenIndex.png";
						}						
						//Imprimime columna de contenido en HTML
						echo('
						<!-- /Col '.$i.' contenidos -->
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail thumbnail-cont">
								<h5>'.$nombreUsuario.'</h5>
								<h6>'.$nombreInteres.'</h6>
								<img src="'.$imagenContenido.'" alt="...">
								<div class="container">
									<h4>'.$tituloContenido.'</h4>
									<h6 align="justify">'.$subStringContenido.'...</h6>
								</div>		
								<form>													
									<button type="button" onClick="verContenido(this.value)" value="'.$idContenido.'" class="btn btn-default btn-default-custom" data-toggle="modal" data-target="#contenido">
										Ver </button>
								</form>	
								<div class="caption">
									<h6 align="right">'.$fecha.'</h6>
								</div>
							</div>							
						</div><!-- /End col '.$i.' contenidos -->
						');	
						
						//Validación para cerrar renglón en HTML
						$cerrarRenglon=$i-2;							
						if($cerrarRenglon%3==0 or $i+1==$limite){
							$finRow=$i-2;
							echo('
							</div><!-- /End row '.$finRow.' contenidos -->
								');	
						}//End if validación para cerrar renglón en HTML
						
						$i++;//Incrementa el contador;
						
					}//End while	
							
				mysqli_close($cnx);//Cierra conexión MySQL		
				
			}//End else valida campos
		}//End else valida cookie
	}//End function cargarContenidos
		
	?>
	
	<script src="js/form/jquery-1.11.3.js"></script>
	
	<script>
		function obtenerContenido(value){
			$.post('RespuestasPHP/CargaContenidos.php', {interes: value},
				function(output){
					$('#divContenido').html(output).show();
				});
		}//End function obtenerCotenido
		
		function  verContenido(idContenido){
			$.post('RespuestasPHP/VerContenido.php', {id: idContenido},
				function(output){
					$('#modalVerContenido').html(output).show();
				});
		}//End function verContenido
		
		function eliminarInteres(idU){
			$.post('RespuestasPHP/ValidaEliminarInteres.php', {idInteres: idU},
			function(output){
				$('#modalVerModificar').html(output).show();
			});
		}//End function verContenido
		
		function obtenerInteresEliminar(id){	
			$('#idInteresEliminar').attr('value', id);
			$('#formularioIntereses').submit();
		}//End function obtenerInteresEliminar
		
	</script>
	
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
			
			}
		});
 
	});//End function autocomplete
	
	
	$(document).ready(function() {
 
		$('#inputInteresesli').autocomplete({
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
				$("#inputInteresesli").val('');
				$("#inputInteresesli").attr('placeholder', '¡Elige un interés de la lista.');
				$("#inputInteresesli").focus();
				}
			}
		});
 
	});//End function autocomplete
	
	$('html').bind('keypress', function(e){
	   if(e.keyCode == 13)
	   {
		  return false;
	   }
	});
		
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
				<li><a href="VerBiografias.php">Autobiografías</a></li>
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
    

    <!-- Formulario busqueda de contenidos-->
    <div class="row row-gris">
		<div class="col-md-12">
			<form name="formularioContenido" class="navbar-form navbar-right">
				<div class="form-group">
				  <input type="text" id="inputIntereses" name="inputContenido" placeholder="Busca contenidos..." class="form-control" required>
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
    
	
	<!-- Body -->	
	<div class="row row-gradient">
		
		<div class="col-md-1"></div><!-- /Col vacía -->
		
		<!-- /Col contenidos -->
		<div class="col-md-8" align="center">
			<div class="jumbotron jumbotron-default-contenido">
				<div id="divContenido" class="container">	
					<?php 
						//Llama función cargarContenidos() 
						cargarContenidos();	
					?>					
				</div><!-- /Row container-->				
			</div><!-- /Row jumbotron -->			
		</div><!-- /End col contenidos -->
		
		<!-- /Col intereses -->	
		<div class="col-md-2">
			<div class="list-group">
				<div  class="panel panel-default panel-default-grey">					
					<div class="panel-heading">
						Mis intereses
					</div>		
					<div id="divIntereses">
						<form id="formularioIntereses" action="EliminarInteres.php" method="POST">
							<input id="idInteresEliminar" name="idInteresEliminar" type="hidden">
							<?php
								//Llama función cargarIntereses() 
								cargarIntereses() 
							?>	
					</div>							
				</div>
			</div>
		</div>
		<!-- /End col intereses -->	
		
		<div class="col-md-1" align="center"></div><!-- /Col vacía-->
				
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
	
		
	<!-- Modal ModificarContenido flotante-->
	<div class="modal fade" id="ModificarContenido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div  id="modalVerModificar" class="modal-content">
		  
		</div>
	  </div>
	</div>
	<!-- End modal ModificarContenido flotante-->
	
	
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
