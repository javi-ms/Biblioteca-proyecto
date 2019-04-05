<?php 

divAnadir();
//print_r($_SESSION['perfil']);
//print_r($_POST);
	if (isset($_POST['registrar'])) {
		$nameReg = $_POST['nameRegis'];
		$userReg = $_POST['userRegis'];
		$passReg = $_POST['passRegis'];
		$passRegCom = $_POST['passRegCom'];
		$emailReg = $_POST['emailRegis'];

		if ($passReg != $passRegCom) {
			echo "las contraseñas no son correctas";
		}else{
			anadirUser($nameReg, $userReg, $passReg, $emailReg);
			echo "SE HA REGISTRADO EL USUARIO";
		}
	}


 ?>