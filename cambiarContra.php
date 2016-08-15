<?php

	require 'sendgrid/vendor/autoload.php';
	$sendgrid = new SendGrid("SENDGRID_APIKEY");
	$email    = new SendGrid\Email();


	$correo = utf8_decode($_POST["txtCorreo"]);
	
	$nuevaContra = '1';
	
	for ($i = 0; $i < 11; $i++){
		$nuevaContra = $nuevaContra.''.rand(1,10);
	}
	
	$email->addTo("josejesus1824@gmail.com")
		->setFrom("jose1824@live.com.mx")
		->setSubject("Correo de prebas")
		->setText("Mari <3 :(");
		
	$sendgrid->send($email);
	
	
	$cnx = mysqli_connect('localhost', 'root', '') or die('No se pudo conectar: ' . mysqli_error($cnx));
		mysqli_select_db($cnx, 'iGrowp') or die('No se pudo seleccionar la base de datos');
		
		
	$query = 'UPDATE usuario SET passwordUsuario="'.md5($nuevaContra).'" WHERE emailUsuario="'.$correo.'";';
	
	mysqli_query($cnx, $query) or die('<script language="javascript">alert("El usuario no existe");
			window.top.location.href = "TusContenidos.php";</script>');
			
			
	
			
	echo('<script language="javascript">alert("Su nuevo password se ha mandado a su direccion de correo electronico")</script>');
	
	echo '<script> window.top.location.href = "iGrowp.php" </script>';

?>