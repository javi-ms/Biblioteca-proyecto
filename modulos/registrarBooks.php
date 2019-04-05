
<?php 

insertBooks();
	if (isset($_POST['bookRegister'])) {
		print_r($_POST);
		

		$tipo=$_POST['tipo'];
		
		$nameTipo="";
		foreach ($tipo as $key => $value) {
			//echo $nameTipo=$value;
			$nameTipo=($value)+1;
		}
		//echo $nameTipo+1;
		//cambiarIdaNombreTipo($nameTipo);
		//echo cambiarIdaNombreTipo($nameTipo);
		//$nombreTipo=cambiarIdaNombreTipo($nameTipo);
		//echo $nombreTipo;
		//echo $nameTipo."<br/>";

		$nameBook=$_POST['nameBook'];
		//echo $nameBook."<br/>";

		$nameAuth=$_POST['nameAuth'];
		//echo $nameAuth."<br/>";

		
		$ISBNBook=$_POST['ISBNBook'];
		echo $ISBNBook."<br/>";

		$generoBook=$_POST['generoBook']+1;
		//echo $generoBook."<br/>";

		$datePublish=$_POST['datePublish'];
		//echo $datePublish."<br/>";

		$editionsBook=$_POST['editionsBook'];
		//echo $editionsBook."<br/>";

		$editorialBook=$_POST['editorialBook']+1;
		//echo $editorialBook."<br/>";

		$originalName=$_POST['originalName'];
		//echo $originalName."<br/>";

		$sinopsisBook=$_POST['sinopsisBook'];
		//echo $sinopsisBook."<br/>";

		$imageBook=$_POST['imageBook'];
		//echo $imageBook."<br/>";

		$download=$_POST['download'];
		//echo $download."<br/>";

		$valoracion=$_POST['valoracion'];
		insBook($nameBook,$nameAuth,$nameTipo,$ISBNBook,$generoBook,$datePublish,$editionsBook,$editorialBook,$originalName,$sinopsisBook,$valoracion,$imageBook,$download);
		//echo $valoracion."<br/>";
		
	}
 ?>
