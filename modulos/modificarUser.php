<?php 
$idUsuario="";
if (isset($_POST['modificarUser'])) {
	$_SESSION['idUsuario']=$_POST['idUsuario'];
	print_r($_SESSION['idUsuario']);
//	print_r($_POST);
	$usuario= showUser($_POST['idUsuario']);

	//echo $_POST['idUsuario'];
	//print_r($usuario);
}
	divUser();
if (isset($_POST['guardarModificar'])) {
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$email=$_POST['mail'];
	$type=$_POST['typeUser']+1;
	print_r($_SESSION['idUsuario']);
	//echo $idUser;

	//$idUser=$_POST['idUsuario'];
	modUser($name,$pass,$email,$type,$_SESSION['idUsuario']);
	print_r($_POST);
	//unset($_SESSION["idUsuario"]);
}

?>