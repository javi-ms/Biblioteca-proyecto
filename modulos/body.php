	
			
<?php 


	if (isset($_POST['logear'])) {

		
		//echo $_POST['userLogin'];
		$user=$_POST['userLogin'];
		//echo $_POST['passLogin'];
		$pass=$_POST['passLogin'];
		//print_r(userAll($user, $pass));

		


		//print_r(getUsers($user,$pass));
		loginUser($user,$pass);
		//redireccion(mostrarUsers($user,$pass));
	}
	//mostrarLibros();

	echo "<div id='tablasPortada'>";
		newLibros();
		newMangas();
		newComics();
	echo "</div>";
	
?>	
