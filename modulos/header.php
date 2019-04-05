<?php
	session_start();
	include 'funciones/funciones.php';
	comprobarPerfil();
	//print_r($_SESSION['perfil']);

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<LINK REL=StyleSheet HREF="style/style.css" TYPE="text/css" MEDIA=screen>
		<LINK REL=StyleSheet HREF="style/bootstrap-social/bootstrap-social.css" TYPE="text/css" MEDIA=screen>
	<!--
		<LINK REL=StyleSheet HREF="style/bootstrap-social\assets\css\bootstrap.css" TYPE="text/css" MEDIA=screen>


		<LINK REL=StyleSheet HREF="style/bootstrap-social\assets\css\font-awesome.css" TYPE="text/css" MEDIA=screen>
		-->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		<title>Biblioteca</title>
	</head>
<body>
	<div id="contenedorImg">
		<img src="img/libro.jpg" alt="" id='imgLeft'/>
		<h1 id="titulo">Biblioteca</h1>
	</div>

	<!--
	<a href="../">atras</a>
		-->
	<div id='izquierda'>
			<form method="post" action=<?php $_SERVER["PHP_SELF"]  ?>>
				<input type="submit" name="cerrarSesion" value="Cerrar Sesion">
			</form>
	</div>
	<?php
		if (isset($_POST['cerrarSesion'])) {
			header("Location:index.php?page=cierraSesion");
		}
		echo "<div  id='derecha'>";
			login();
		echo "</div>";
//print_r($_SESSION['perfil'])
	?>
	<?php
		menu();

		if ($_SESSION['perfil']!='invitado	') {
			secciones();
		}
	?>
		<!--<div style="clear: both"></div>-->


	<hr>
