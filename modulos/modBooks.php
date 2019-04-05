<?php 

if (isset($_POST['modBook'])) {
	
	$_SESSION['idBook']=$_POST['idBook'];
	echo $_SESSION['idBook'];
	
	//print_r(showBook($_SESSION['idBook']));
	modificarBook();
}
 ?>