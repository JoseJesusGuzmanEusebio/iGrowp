<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

  <head> 
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!--Ícono tí­tulo -->
	<link href="Imagenes/iGrowp.png" rel="shortcut icon">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<!-- Estilo propio-->
	<link rel="stylesheet" href="css/Estilos.css">
    <link href="css/Estilos.css" rel="stylesheet" type="text/css">
    <title>Registro</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	
	<?php
		function insertarUser() {
			$Nombre = utf8_decode($_POST["txtNombre"]);
			$Nombre=str_replace(array("\"","'"), "´", $Nombre);	
			$Correo = utf8_decode($_POST["txtCorreo"]);
			$Contra = md5(utf8_decode($_POST["txtContra"]));
			$tipoUsuario = utf8_decode($_POST["tipoUsuario"]);
			
			$cnx = mysqli_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');
			
			//Comprobar si el correo ya existe
			$querySelect = 'SELECT * FROM usuario WHERE emailUsuario = "'.$Correo.'";'
				or die('Error en la consulta: ' . mysqli_error($cnx));
			$result = mysqli_query($cnx, $querySelect) or die('Consulta fallida: ' . mysqli_error($cnx));
				 //Si arroja mayor a 0 significa que si encontro algun registro y el correo ya existe
				if(mysqli_num_rows($result) > 0) {
					mysqli_close($cnx);
					echo '<script language="javascript">alert("El correo ya existe. Intente con otro");</script>'; 
					echo '<script> window.top.location.href = "iGrowp.php" </script>';
				}	
			
			$queryInsert = 'INSERT INTO usuario (nombreUsuario, tipoUsuario, emailUsuario, passwordUsuario)'.
					'VALUES("'.$Nombre.'", "'.$tipoUsuario.'", "'.$Correo.'", "'.$Contra.'");';
					
			mysqli_query($cnx, $queryInsert)
				 or die('Error en la insercion: ' . mysqli_error($cnx));
				
			mysqli_close($cnx);
			
			$cookie_name = 'Login';			
				setcookie($cookie_name , $Correo, time()+86400*15, "/");							
		}
	?>
	
  </head>
  <body>
	
	<!-- Header -->
	<nav class="navbar navbar-default navbar navbar-default-claro navbar-fixed-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="TusContenidos.php">
				<img alt="iGrowp" src="Imagenes/iGrowp.png" width="33px" height="34px">
			</a>
        </div><!-- /End .navbar-collapse -->
    </nav>
    <!-- /End Header -->
    
    <?php
		insertarUser();
	?>
    <!-- /Row espacio top-->
	<div class="row"><br></div>
	<!-- /End Row espacio top-->
    
    <div class="row row-gradient-blue" height="800px">
		<div class="col-md-12">
			  <table height="710px" width="100%">
				  <tr height="100%">
					<td height="100%">  
						<iframe width="100%" height="100%" name="hola" scrolling="auto" src="FormularioRegistro.php" frameborder="0"></iframe>
					</td>
				  </tr>
			  </table>
		</div>
	</div>

	<!-- Row vacÃ­o -->  
	<div class="row row-bottom-color-blue">
		<div class="col-md-12"><br></div>
	</div>
	<!-- End row vacÃ­o -->  
	
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

	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
  </body>
</html>
