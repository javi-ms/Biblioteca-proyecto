<?php
//session_start();
//if (isset($_POST['cerrarSesion'])) {
	# code...
	session_unset();
	session_destroy();
	header("Location:index.php?page=index");
	//header("Location:https://www.google.es");
	
//}
?>