<!-- PHP valida cookie -->
<?php 
	$cookie_name='Login';
	if(!isset($_COOKIE[$cookie_name])) {
		echo '<script> window.top.location.href = "iGrowp.php" </script>';
	}//End if
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Perfil</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Ícono título -->
	<link href="Imagenes/iGrowp.png" rel="shortcut icon">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Estilo propio-->
	<link rel="stylesheet" href="css/Estilos.css">
	<link rel="stylesheet" href="js/jquery-ui-1.11.4/jquery-ui.css">
	
	<?php
	
		//*********** Inicia funcion cargarFoto ***********//		
		function cargarFoto(){
			$cookie_name='Login';
			$cnx = mysqli_connect('localhost', 'root', '')
				or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
			
			$query = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
			$row = $result->fetch_assoc();
			$idUsuarioActual=$row["idUsuario"];
			$idUsuarioPerfil=$row["idUsuario"];
			
			if(isset($_POST["idUsuario"])){
				$idUsuarioPerfil=$_POST["idUsuario"];
			}
			
			if($idUsuarioPerfil==$idUsuarioActual) {	
				$query = 'SELECT imagenPerfilUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';		
				$metodo = "verCargarNueva()";
			}
			else{
				$query = 'SELECT imagenPerfilUsuario FROM usuario WHERE idUsuario="'.$_POST["idUsuario"].'";';	
				$metodo = "verImagenPerfil(".$idUsuarioPerfil.")";			
			}
			$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
			$row = $result->fetch_array(MYSQLI_ASSOC);
			if($row["imagenPerfilUsuario"]=="") {
				mysqli_close($cnx);
				$imagenDireccion = "Imagenes/ImagenIndex.png";
			}
			else {				
				$imagenDireccion  = utf8_encode($row["imagenPerfilUsuario"]);
				mysqli_close($cnx);
			}
					
			echo('
				<button type="button" id="verCargar" name="verCargar" onclick="'.$metodo.'" class="thumbnail img-responsive" data-toggle="modal" data-target="#CargarImagen">
					<input type="hidden" name="idUsuario" value="'.$idUsuarioPerfil.'" />
					<img class="img-responsive" src="'.$imagenDireccion.'" alt="...">
				</button>
			');
			
		}//End function cargarFoto
		
		
		//*********** Inicia funcion cargarNombre ***********//		
		function cargarNombre(){
			
			$cookie_name='Login';
			$cnx = mysqli_connect('localhost', 'root', '')
				or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
			
			if(isset($_POST["idUsuario"])){
				$query = 'SELECT nombreUsuario FROM usuario WHERE idUsuario="'.$_POST["idUsuario"].'";';
			}
			else{
				$query = 'SELECT nombreUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			}
			
			$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$nomUsuario  = utf8_encode($row["nombreUsuario"]);
			mysqli_close($cnx);
			echo $nomUsuario;

		}//End function cargarNombre
		
		
		//*********** Inicia funcion cargarTipo***********//		
		function cargarTipo(){
			$cookie_name='Login';
			$cnx = mysqli_connect('localhost', 'root', '')
				or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
			
			if(isset($_POST["idUsuario"])){
				$query = 'SELECT tipoUsuario FROM usuario WHERE idUsuario="'.$_POST["idUsuario"].'";';
			}
			else{
				$query = 'SELECT tipoUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			}
			
			$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
			
			if(mysqli_num_rows($result) <= 0) {
					mysqli_close($cnx);
					echo 'Inserta una foto de perfil.';
			}
			else {
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$tipoUsuario  = utf8_encode($row["tipoUsuario"]);
				mysqli_close($cnx);
				echo $tipoUsuario;
			}
		}//End function cargarTipo
		
		
		//*********** Inicia funcion cargarContenidos ***********//		
		function cargarContenidos() {
			$cookie_name='Login';
	
			//Conexión MySQL
			$cnx = mysqli_connect('localhost', 'root', '')
			or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
			
			if(isset($_POST["idUsuario"])){
				$query = 'SELECT emailUsuario FROM usuario WHERE idUsuario="'.$_POST["idUsuario"].'";';
				//Query MySQL
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));	
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$emailUsuario= utf8_encode($row["emailUsuario"]);
				
				$query = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
				//Query MySQL
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));	
				$row = $result->fetch_array(MYSQLI_ASSOC);
				$idUsuarioActual= utf8_encode($row["idUsuario"]);
				
			}//End if
			else{
				$emailUsuario= $_COOKIE[$cookie_name];
			}//End else
			
			$query = 'SELECT  nombreInteres, idContenido, imagenContenido, tituloContenido, contenido, fecha
					FROM interes inner join contenido
						ON interes.idInteres=contenido.idInteres
								inner join usuario
						ON contenido.idUsuario=usuario.idUsuario
					WHERE emailUsuario = "'.$emailUsuario.'"
					ORDER BY fecha desc;';
			 
			//Query MySQL
			$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));	
			
			//Valida campos
			if(mysqli_num_rows($result) <= 0) {
				if(isset($_POST["idUsuario"])){	
					if($idUsuarioActual==$_POST["idUsuario"]){
					echo '<br><br>No tienes contenidos disponibles.
						<br><br><br><br><br><br><br>
						<br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br>'; 
					}
					else{
						echo '<br><br>Este usuario no tiene contenidos disponibles.
						<br><br><br><br><br><br><br>
						<br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br>';
					}
				}
				else{
					echo '<br><br>No tienes contenidos disponibles.
						<br><br><br><br><br><br><br>
						<br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br><br><br>
						<br><br><br><br><br><br><br>'; 				
				}
				mysqli_close($cnx);
			}//End if valida campos
			else {
				$i=0;//Contador para HTML
				$limite=mysqli_num_rows($result);//Variable para HTML
									
				//Imprime resultados MySQL
				while($row = $result->fetch_assoc()) {
					
					//Variables codificadas para mostrar acentos
					$idContenido=utf8_encode($row["idContenido"]);
					$nombreInteres=utf8_encode($row["nombreInteres"]);
					$imagenContenido=utf8_encode($row["imagenContenido"]);
					$tituloContenido=utf8_encode($row["tituloContenido"]);
					$contenido=utf8_encode($row["contenido"]);
					$fecha=utf8_encode($row["fecha"]);
					
					$hora = date( 'H:i ', strtotime($fecha));
					$fecha = date( 'd/m/y', strtotime($fecha));
					$fecha= "Fecha: ".$fecha." a las ".$hora;
					
					if($imagenContenido==""){
						$imagenContenido="Imagenes/ImagenIndex.png";
					}
					//Validación para imprimir renglón en HTML
						$renglon=$i%3;//Variable para imprimir renglones
						if($i==0 or $renglon==0){
							echo('	<!-- /Row '.$i.' contenidos -->				
									<div class="row">
								');
						}//Enf if valdación para imprimir renglón en HTML

					//Imprimime columna de contenido en HTML
					echo ('
							<!-- /Col '.$i.' contenidos -->
						<div class="col-sm-4 col-md-4">
							<div class="thumbnail">
								<h5>'.$nombreInteres.'</h5>
								<img src="'.$imagenContenido.'" alt="...">
								<div class="caption">
									<h4>'.$tituloContenido.'</h4>
									<h6 align="justify">'.substr($contenido, 0, 250).'</h6>
								</div>
									<form id="formContents" method="POST" action="EliminarContenido.php">
										<button type="button" onclick="verFlotante(this.value)" value="'.$idContenido.'" class="btn btn-default btn-default-custom" data-toggle="modal" data-target="#content">
											Ver </button>');
					if(isset($_POST["idUsuario"])){	
						if($idUsuarioActual==$_POST["idUsuario"]){
							echo('
										<button type="button" id="idCon" name="idCon" onclick="verModificar(this.value)" value="'.$idContenido.'" class="btn btn-default btn-default-custom" data-toggle="modal" data-target="#ModificarContenido">Modificar</button>
										<button type="button" onclick="eliminarContent(this.value)" value="'.$idContenido.'" class="btn btn-default btn-default-custom" data-toggle="modal" data-target="#ModificarContenido">Eliminar 
											<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
										</button>
							');
					
						
						}
					}
					else{		
						echo('
										<button type="button" id="idCon" name="idCon" onclick="verModificar(this.value)" value="'.$idContenido.'" class="btn btn-default btn-default-custom" data-toggle="modal" data-target="#ModificarContenido">Modificar</button>
										<button type="button" onclick="eliminarContent(this.value)" value="'.$idContenido.'" class="btn btn-default btn-default-custom" data-toggle="modal" data-target="#ModificarContenido">Eliminar 
											<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
										</button>
						');
					}
					echo('					
											
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
		}//End function cargarContenidos
		
						
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
				$idUsuarioActual=$row["idUsuario"];
				
				if(isset($_POST["idUsuario"])){	
					$query = 'SELECT emailUsuario FROM usuario WHERE idUsuario="'.$_POST["idUsuario"].'";';
					$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
					$row = $result->fetch_assoc();
					$email=$row["emailUsuario"];
					$idUsuario=$_POST["idUsuario"];
				}
				else{
					$query = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
					$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
					$row = $result->fetch_assoc();
					$email=$_COOKIE[$cookie_name];
					$idUsuario=$row["idUsuario"];

				}
				//Consulta de todos los intereses del usuario.
				$query = 'SELECT nombreInteres FROM interes inner join usuario
				ON interes.idInteres=usuario.idInteresUno or interes.idInteres=usuario.idInteresDos
				or interes.idInteres=usuario.idInteresTres or  interes.idInteres=usuario.idInteresCuatro
				or interes.idInteres=usuario.idInteresCinco or interes.idInteres=usuario.idInteresSeis or interes.idInteres=usuario.idInteresSiete
				or interes.idInteres=usuario.idInteresOcho or interes.idInteres=usuario.idInteresNueve or interes.idInteres=usuario.idInteresDiez
				WHERE emailUsuario="'.$email.'";';
				
				//Query MySQL 
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));				
							
				$i=1; //Contador para numeración en HTML
				while($row = $result->fetch_assoc()) {							
				
					//Variable codificada para mostrar acentos.	
					$interes=utf8_encode($row["nombreInteres"]);
					
					if($idUsuario==$idUsuarioActual){

						//Imprime resultados MySQL
						if(mysqli_num_rows($result)>1){
						echo('
								<button align="right" value="'.$interes.'"  id="'.$email.'" type="button" class="btn btn-default btn-default-int col-xs-10" onClick="obtenerContenido(this.value, this.id )">
									'.$i.'.- '.$interes.'.</button>
								<div class="form-group">
									<input value="'.$interes.'" name="interes'.$i.'" type="hidden">
									<button type="button" class="btn btn-default col-xs-2" data-toggle="modal" data-target="#ModificarContenido"
									onClick="eliminarInteres('.$i.')">
										<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
									</button>
								</div>
							');
						}
						else{
							echo ('<button align="right" value="'.$interes.'"  id="'.$email.'" type="button" class="btn btn-default btn-default-int col-xs-12" onClick="obtenerContenido(this.value, this.id )">'.$i.'.- '.$interes.'.</button>');
						}							
					}
					else{
						echo ('<button align="right" value="'.$interes.'"  id="'.$email.'" type="button" class="btn btn-default btn-default-int col-xs-12" onClick="obtenerContenido(this.value, this.id )">'.$i.'.- '.$interes.'.</button>');
					}
					$i++;
				}//End while	
				echo('</form>');
				for($j=1;$j<$i;$j++){					
					echo('<br><br>');
				}
				if($idUsuario==$idUsuarioActual){
					if(mysqli_num_rows($result)<10)
						echo ('
							<form action="ModificarInteres.php" method="POST">
								<input value="'.$i.'" name="idInteresAgregar" type="hidden">
								<input value="'.$email.'" name="emailUsuario" type="hidden">
								<input type="text" name="nombreInteres" class="form-control form-control-sm" id="inputInteresesli" placeholder="¡Agrega un interés!" required>
								<button name="idUsuario" value="'.$idUsuario.'" type="submit" class="btn btn-default col-xs-12">
								Agregar <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
							</form><br>
						');		
				}				
					echo ('						
							<button value="'.$idUsuario.'" type="button" class="btn btn-default list-group-item" onClick="return obtenerTodo(this.value)">Ver todo
							<span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></button>
					');
				mysqli_close($cnx);	//Cierra conexión MySQL		
					
			}//End else valida cookie
		}//End functionIntereses
				
		//*********** Inicia funcion formContenido ***********//		
		function formContenido(){
			$cookie_name='Login';
			$cnx = mysqli_connect('localhost', 'root', '')
				or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
			
			$query = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
			$row = $result->fetch_assoc();
			$idUsuarioActual=$row["idUsuario"];
			$idUsuarioPerfil=$row["idUsuario"];
			
			if(isset($_POST["idUsuario"])){
				$idUsuarioPerfil=$_POST["idUsuario"];
			}
			
			if($idUsuarioPerfil==$idUsuarioActual) {	
				echo('	
					<div class="jumbotron jumbotron-default-formulario">
						<div class="container">	
							<form id="registro"  enctype="multipart/form-data" action="CrearContenido.php" method="POST">						
								<input type="hidden" id="date" name="date"/>
								<div class="form-group">	
									<input type="text" name="txtTitulo" class="form-control form-control-sm" id="txtTitulo" placeholder="¡Ponle un título a tu contenido!" maxlength="100" onchange="espaciosInnecesariosModal(this.value)">
								</div>
								<div id="divIntereses" class="form-group ">	
									<input type="text" name="txtInteres" class="form-control form-control-sm" id="inputIntereses" placeholder="¡Agrégale un interés!" required>
									<span id="iconoInputIntereses" class=""></span>
								</div>
								<div class="form-group ">
									<textarea name="contenido" id="contenido" cols="30" rows="2" class="form-control noresize" placeholder="Escribe aquí tu contenido..." required></textarea><br>                            
								</div>	
								<div class="form-group col-xs-8" align="left">
									<div class="thumbnail col-md-2" align="left">
										<img src="Imagenes/ImagenIndex.png" alt="Nada por aquí...">
									</div>
									<div class="col-md-7" align="left">
										<label><h5>¡Agrega una imagen al contenido!</h5></label><br>
										<input id="InputFile" name="InputFile" class="button" value="InputFile" type="file">
									</div>
								</div>
								<div class="form-group col-xs-4" align="right">
									<button onClick="obtenerFecha();" id="btnCrearB" name="btnCrearB" type="submit" class="btn btn-info">Crear contendio</button>
								</div>	
							</form><!-- /End formulario -->					
						</div><!-- /End container-->
					</div><!-- /End jumbotron -->
				');
			}
			mysqli_close($cnx);	//Cierra conexión MySQL	
		}//End function formContenido
		
		
		//*********** Inicia funcion formContenido ***********//	
		function validaBiografia(){
			$cookie_name='Login';
			$cnx = mysqli_connect('localhost', 'root', '')
				or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
			if(isset($_POST["idUsuario"])){								
				$query = 'SELECT idBiografia FROM usuario WHERE idUsuario="'.$_POST["idUsuario"].'";';
				$idUsuario=$_POST["idUsuario"];
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
				$row = $result->fetch_assoc();
				$idBiografia=$row["idBiografia"];
			}
			else{
				$query = 'SELECT idBiografia, idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
				$row = $result->fetch_assoc();			
				$idUsuario=$row["idUsuario"];
				$idBiografia=$row["idBiografia"];
			}
			if(isset($idBiografia)){
				echo('<button value="'.$idUsuario.'" name="idUsuario" type="submit" class="label label-success">Biografía</button>');
			}
			else{
				if(isset($_POST["idUsuario"])){
					$query = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
					$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
					$row = $result->fetch_assoc();
					$idUsuarioActual=$row["idUsuario"];
					if($idUsuarioActual==$_POST["idUsuario"]){
						echo('<button value="'.$idUsuario.'" name="idUsuario" type="submit" class="label label-success">Crea tu biografía</button>');
					}
				}
				else{
					echo('<button value="'.$idUsuario.'" name="idUsuario" type="submit" class="label label-success">Crea tu biografía</button>');
				}

			}
		}//End function validabiografia
		
		//*********** Inicia funcion formContenido ***********//	
		function validaFormBiografia(){
			$cookie_name='Login';
			$cnx = mysqli_connect('localhost', 'root', '')
				or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
			if(isset($_POST["idUsuario"])){								
				$query = 'SELECT idBiografia FROM usuario WHERE idUsuario="'.$_POST["idUsuario"].'";';
				$idUsuario=$_POST["idUsuario"];
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
				$row = $result->fetch_assoc();
				$idBiografia=$row["idBiografia"];
			}
			else{
				$query = 'SELECT idBiografia, idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
				$row = $result->fetch_assoc();			
				$idUsuario=$row["idUsuario"];
				$idBiografia=$row["idBiografia"];
			}
			if(isset($idBiografia)){
				echo('<form  method="POST" action="Biografia.php">');
			}
			else{
				
				if(isset($_POST["idUsuario"])){
				
					$query = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
					$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
					$row = $result->fetch_assoc();
					$idUsuarioActual=$row["idUsuario"];
					
					if($idUsuarioActual=$_POST["idUsuario"]){
						echo('<form  method="POST" action="formBiografia.php">');
					}
					else{
						echo('<form">');
					}
				}
				else{
					echo('<form  method="POST" action="formBiografia.php">');
				}
				
			}
			
			mysqli_close($cnx);	//Cierra conexión MySQL	
		}//End function validaFormBiografia
		
		function cargarEscuelas(){
			
			$cookie_name='Login'; //Nombre de la cookie
						
			//Conexión MySQL
			$cnx = mysqli_connect('localhost', 'root', '')
			or die('No se pudo conectar: ' . mysqli_error($cnx));
			mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
			
			$query = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
			$row = $result->fetch_assoc();
			$idUsuarioActual=$row["idUsuario"];
			
			if(isset($_POST["idUsuario"])){	
				$query = 'SELECT emailUsuario FROM usuario WHERE idUsuario="'.$_POST["idUsuario"].'";';
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
				$row = $result->fetch_assoc();
				$email=$row["emailUsuario"];
				$idUsuario=$_POST["idUsuario"];
			}
			else{
				$query = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
				$row = $result->fetch_assoc();
				$email=$_COOKIE[$cookie_name];
				$idUsuario=$row["idUsuario"];
			}
			
			
			if($idUsuario==$idUsuarioActual){
				
				mysqli_close($cnx);	//Cierra conexión MySQL	
				for($i=1;$i<=6;$i++){
					//Conexión MySQL
					$cnx = mysqli_connect('localhost', 'root', '')
					or die('No se pudo conectar: ' . mysqli_error($cnx));
					mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');
					
					$query = 'call consulta_'.$i.' ("'.$email.'")';
					$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
					$row = $result->fetch_assoc();
					$nombreInstitucion=utf8_encode($row["nombreInstitucion"]);
					$nivelEducativo=$row["nivelEducativo"];				
					if(mysqli_num_rows($result)>0){
						if($i==1){
							echo ('
							<div class="container col-sm-12">
							<form id="'.$i.'" action="EliminarInstitucion.php" method="POST">
								<input value="'.$email.'" name="email" type="hidden">
								<input value="'.$nivelEducativo.'" name="nivel" type="hidden">
								<input value="'.$i.'" name="Eliminar" type="hidden">
								<input value="'.$nombreInstitucion.'" name="nombre" type="hidden">
								<button type="button" value="'.$nombreInstitucion.'" 
									class="btn btn-default btn-default-int col-xs-12"> 
									Estudia actualmente el nivel '.$nivelEducativo.' en: <br><b><center>'.$nombreInstitucion.'.</b></center>
								</button>
							</div>
							');
						}	
						else{					
							echo ('
							<form id="'.$i.'" action="EliminarInstitucion.php" method="POST">
							<div class="container col-sm-12">
								<input value="'.$email.'" name="email" type="hidden">
								<input value="'.$nivelEducativo.'" name="nivel" type="hidden">
								<input value="'.$i.'" name="Eliminar" type="hidden">
								<input value="'.$nombreInstitucion.'" name="nombre" type="hidden">
								<button value="'.$nombreInstitucion.'" type="button" 
									class="btn btn-default btn-default-int col-xs-12"> Estudió el nivel '.$nivelEducativo.' en: 
									<br><center><b>'.$nombreInstitucion.'.</b></center>
								</button>
							</div>
							');
						}
						echo('
							<div class="container col-sm-12">
								<button type="button" class="btn btn-default col-xs-12" data-toggle="modal" value="'.$i.'"
								data-target="#ModificarContenido" onclick="eliminarInstitucion(this.value)">
								Eliminar <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
								</button>
							</div>
							</form>
								');
						if($i==1){
							echo('<br><br><br><br><br><br><br>
							<div class="panel-heading">
								¿Dónde he estudiado.?
							</div>');
						}
					}//End if	
					else{
						switch($i){
							case 1: $Escolaridad = "!Agrega el nombre de tu institucion Actual!";
									$nivel="Actual";
									break;
							case 2: $Escolaridad = "!Agrega una institucion de nivel Secundaria!";
									$nivel="Secundaria";
									break;
							case 3: $Escolaridad = "!Agrega una institucion de nivel Medio Superior!";
									$nivel="Medio Superior";
									break;
							case 4: $Escolaridad = "!Agrega una institucion de nivel Superior!";
									$nivel="Superior";
									break;
							case 5: $Escolaridad = "!Agrega una institucion de nivel Maestria!";
									$nivel="Maestria";
									break;
							case 6: $Escolaridad = "!Agrega una institucion de nivel Doctorado!";
									$nivel="Doctorado";
									break;
							default: $Escolaridad = "No especificada";
						}
						echo ('
							<form action="ModificarInstitucion.php" method="POST">						
							<div class="container col-sm-12">
								<input value="'.$i.'" name="Modificar" type="hidden">
								<input value="'.$email.'" name="email" type="hidden">
								<input value="'.$nivel.'" name="nivel" type="hidden" id="nivel'.$i.'">
								<input type="text" name="nombreInstitucion" id="nombreInstitucion" class="form-control form-control-sm col-xs-12" id="input'.$i.'" 
								placeholder="'.$Escolaridad.'" required maxlength="100" onkeypress="return validacionCaracteres(event)" onchange="espaciosInnecesarios(this.value)">
							</div>
						');
						if($i==1){
							echo('
							<div class="container col-sm-12">
								<select class="form-control" name="nivelActual" id="nivel" required>
									<option value="">Elige un nivel educativo</option>
									<option value="Secundaria">Secundaria</option>
									<option value="Medio Superior">Medio Superior</option>
									<option value="Superior">Superior</option>
									<option value="Maestria">Maestria</option>
									<option value="Doctorado">Doctorado</option>
								</select>	
							</div>								
							');						
						}						
						echo('	
							<div class="container col-sm-12">
								<button name="idUsuario" value="'.$idUsuario.'" type="submit" class="btn btn-default col-xs-12">
								Agregar '.$nivel.' <span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
							</div>
							</form>
						');
						if($i==1){
						echo('<br><br>
							<div class="panel-heading">
								¿Dónde he estudiado.?
							</div>
						');
						}						
					}		
				mysqli_close($cnx);	//Cierra conexión MySQL	
			}//End for i
			echo('<div class="panel-heading">.</div>');
		}//End if valida idUsuario
		else{
			for($i=1;$i<=6;$i++){
					//Conexión MySQL
					$cnx = mysqli_connect('localhost', 'root', '')
					or die('No se pudo conectar: ' . mysqli_error($cnx));
					mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');
					
					$query = 'call consulta_'.$i.' ("'.$email.'")';
					$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
					$row = $result->fetch_assoc();
					$nombreInstitucion=utf8_encode($row["nombreInstitucion"]);
					$nivelEducativo=$row["nivelEducativo"];				
					if(mysqli_num_rows($result)>0){
						if($i==1){
							echo ('
								<button align="right" value="'.$nombreInstitucion.'" id="'.$email.'" type="button" 
								class="btn btn-default btn-default-int col-xs-12">
									Estudia actualmente el nivel '.$nivelEducativo.' en: <br><center>'.$nombreInstitucion.'.</center>							
								</button>
								<div class="panel-heading">
									Donde he estudiado.
								</div>
							');
						}	
						else{
							echo ('
								<button align="right" value="'.$nombreInstitucion.'"  id="'.$email.'" type="button" 
								class="btn btn-default btn-default-int col-xs-12"> 
								Estudió el nivel '.$nivelEducativo.' en: <br><center>'.$nombreInstitucion.'.</center>
								</button>
							');
						}
				}//End if
				else{
					if($i==6){
					echo ('
								<button align="right" value="'.$nombreInstitucion.'"  id="'.$email.'" type="button" 
								class="btn btn-default btn-default-int col-xs-12"> 
									No hay más instituciones disponibles.
								</button>
								<div class="panel-heading">.</div>
					');
					}
				}
			}//End for
		}//End else valida idUsuario
	}
		
		
	function imprimirMetodos(){	
		$cookie_name='Login'; //Nombre de la cookie
						
		//Conexión MySQL
		$cnx = mysqli_connect('localhost', 'root', '')
		or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');	
		
		$query = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
		$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
		$row = $result->fetch_assoc();
		$idUsuarioActual=$row["idUsuario"];
		
		if(isset($_POST["idUsuario"])){	
			$query = 'SELECT emailUsuario FROM usuario WHERE idUsuario="'.$_POST["idUsuario"].'";';
			$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
			$row = $result->fetch_assoc();
			$email=$row["emailUsuario"];
			$idUsuario=$_POST["idUsuario"];
		}
		else{
			$query = 'SELECT idUsuario FROM usuario WHERE emailUsuario="'.$_COOKIE[$cookie_name].'";';
			$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
			$row = $result->fetch_assoc();
			$email=$_COOKIE[$cookie_name];
			$idUsuario=$row["idUsuario"];
		}
		
		if($idUsuario==$idUsuarioActual){
	echo('<script>');
			for($i=1;$i<=6;$i++){
				//Conexión MySQL
				$cnx = mysqli_connect('localhost', 'root', '')
				or die('No se pudo conectar: ' . mysqli_error($cnx));
				mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');
				
				$query = 'call consulta_'.$i.' ("'.$email.'")';
				$result = mysqli_query($cnx, $query) or die('Consulta fallida: ' . mysqli_error($cnx));
				$row = $result->fetch_assoc();
				$nombreInstitucion=utf8_encode($row["nombreInstitucion"]);
				$nivelEducativo=$row["nivelEducativo"];				
				if(mysqli_num_rows($result)<=0){
					
					switch($i){
						case 1: $nivel="Actual";
								break;
						case 2: $nivel="Secundaria";
								break;
						case 3: $nivel="Medio Superior";
								break;
						case 4: $nivel="Superior";
								break;
						case 5: $nivel="Maestria";
								break;
						case 6: $nivel="Doctorado";
								break;
						default: $Escolaridad = "No especificada";
					}						
						echo('
		$(document).ready(function() { 
		$("#input'.$i.'").autocomplete({
			source: function(request, response){
				$.ajax({
					url:"RespuestasPHP/BuscarInstituciones.php",
					dataType:"json",
					data:{i:request.term, a: "'.$nivel.'"},
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
					');
				}//End if	
				mysqli_close($cnx);	//Cierra conexión MySQL	
			}//End for i
	echo('</script>');
		}//End if valida idUsuario	
	}
		
	?>
	
	<script src="js/form/jquery-1.11.3.js"></script>
	
	<script>
		
		function verFlotante(idContenido){
			$.post('RespuestasPHP/VerContenido.php', {id: idContenido},
				function(output){
					$('#modalVerContent').html(output).show();
				});			
		}//End function verContenido
		
		function verModificar(idContenido){
			$.post('RespuestasPHP/VerModificarContenido.php', {id: idContenido},
				function(output){
					$('#modalVerModificar').html(output).show();
				});
		}//End function verContenido
		
		function eliminarContent(idCont){
			$.post('RespuestasPHP/ValidaEliminarContenido.php', {idContenido: idCont},
			function(output){
				$('#modalVerModificar').html(output).show();
			});
		}//End function eliminarContent
		
		function verCargarNueva(){
			var idUsuario = "Nada";	
			$.post('RespuestasPHP/VerModificarImagenPerfil.php', {id: idUsuario},
				function(output){
					$('#modalVerCargar').html(output).show();
				});
		}//End function verCargarNueva
		
		function verImagenPerfil(idUsuario){
			$.post('RespuestasPHP/VerImagenPerfil.php', {id: idUsuario},
				function(output){
					$('#modalVerCargar').html(output).show();
				});
		}//End function verImagenPerfil
		
		function obtenerContenido(valueInt, valueId){
			$.post('RespuestasPHP/CargaContenidoEspecifico.php', {interes: valueInt, id: valueId},
				function(output){
					$('#divContenido').html(output).show();
				});
		}//End function obtenerCotenido
		
		function obtenerTodo(valueId){
			$.post('RespuestasPHP/VerTodosContenidos.php', {idUsuario: valueId},
				function(output){$('#divContenido').html(output).show();});
		}//End function obtenerCotenido
		
		function obtenerFecha(){
			document.getElementById("date").value = new Date().toJSON();
		}//End function obtenerFecha
		
		function eliminarInteres(idU){
			$.post('RespuestasPHP/ValidaEliminarInteres.php', {idInteres: idU},
				function(output){
				$('#modalVerModificar').html(output).show();
			});
		}//End function verContenido
		
		function eliminarInstitucion(idU){
			$.post('RespuestasPHP/ValidaEliminarInstitucion.php', {idInstitucion: idU},
				function(output){
				$('#modalVerModificar').html(output).show();
			});
		}//End function verContenido
		
		function obtenerInteresEliminar(id){	
			$('#idInteresEliminar').attr('value', id);
			$('#formularioIntereses').submit();
		}//End function obtenerInteresEliminar
		
		function obtenerInstitucionEliminar(id){	
			$('#'+id).submit();
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
			document.getElementById("nombreInstitucion").value = value.trim();
			//alert("Sin espacios: '" + value.trim() + "'");
		}
		
		function espaciosInnecesariosModal(value){
			String.prototype.trim = function() { return this.replace(/^\s+|\s+$/g, ""); };
			document.getElementById("txtTitulo").value = value.trim();
			//alert("Sin espacios: '" + value.trim() + "'");
		}
		
    </script>
    
    	
	<?php
		imprimirMetodos();
	?>
    
</head>

<body>
	<div id="divfalso"></div>
	 	  
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
		<div class="col-md-12"></div>
    </div>
    <!-- End Row espacio top-->
    
    
    <!-- Row imagen y nombre -->
	<div class="row" >
		<div class="row-claro-imagen">
			<div class="col-md-1"></div>
			<div class="col-xs-4 col-md-2 col-sm-3 col-lg-2"> 
				<center>
					<?php
						cargarFoto();
					?>
				</center>
			</div>
		</div>
		<div class="col-xs-12 col-md-7" align="center">
			<?php validaFormBiografia(); ?>
				<h2>
					<?php cargarNombre(); ?> 			
					<span class="label label-primary">
						<?php cargarTipo(); ?>
					</span>				
					<?php validaBiografia(); ?> 				
				</h2>
			</form>
		</div>
	</div>
	<!-- End Row imagen y nombre-->

	
	<!-- Body -->	
	<div class="row row-gradient">
		<div class="col-md-1"></div><!-- /Col vacía -->
			<!-- /Insertar contenidos-->
			<div class="col-md-7" align="center">
				<?php formContenido(); ?>
				
				<div class="jumbotron jumbotron-default-contenido">
					<div class="container" id="divContenido">
						<?php cargarContenidos(); ?>
					</div>
				</div><!-- /End jumbotron -->
				
			</div><!-- /End col contenidos -->		
		
		<!-- /Col intereses -->	
		<div class="col-md-3">
			
			<div class="row">
				<div class="col-md-12">
					<div class="list-group">
						<div id="divEscuela" class="panel panel-default panel-default-grey">					
							<div class="panel-heading">
								Mi institucion educativa actual
							</div>		
							<?php
								//Llama función cargarIntereses() 
								cargarEscuelas() 
							?>							
						</div>
					</div>	
				</div>	
			</div>
			<br><br><br><br><br>
			<div class="row">
				<div class="col-md-12">
					<div class="list-group">
						<div id="divIntereses" class="panel panel-default panel-default-grey">					
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
			</div>


		</div>
		<!-- /End col intereses -->	
		
		<div class="col-md-1" align="center"></div><!-- /Col vacía-->		
	</div>
	<!-- End body -->
	
	<!-- Modal contenido flotante-->
	<div class="modal fade" id="content" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div id="modalVerContent" class="modal-content">

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
	
	<!-- Modal CargarImagen flotante-->
	<div class="modal fade" id="CargarImagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div  id="modalVerCargar" class="modal-content">
		  
		</div>
	  </div>
	</div>
	<!-- End modal CargarImagen flotante-->
	
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
	
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	 
</body>

</html>
