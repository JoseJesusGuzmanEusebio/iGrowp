<?php

	if(isset($_POST['nivel'])){
		$nivel=$_POST['nivel'];
		$email=$_POST['email'];
		
		$query = 'UPDATE usuario SET nivelEducativoCompletado="'.$Escolaridad.'" WHERE emailUsuario="'.$email.'";';

		mysqli_query($cnx, $query) or die('Consulta fallida UPDATEUSER: ' . mysqli_error($cnx) . '<br><br><br>' . $queryUpdateUser);
		mysqli_close($cnx);	//Cierra conexión MySQL


?>
