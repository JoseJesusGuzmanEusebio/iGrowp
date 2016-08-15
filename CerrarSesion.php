<?php
	$cookie_name = 'Login';	
	setcookie($cookie_name , "", time() - 3600, "/");
	
	echo '<script> window.top.location.href = "iGrowp.php" </script>';
?>

