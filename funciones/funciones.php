<?php
require_once "clases/usuarios.php";
require_once "clases/libros.php";

	//funciones a utilizar en tu pagina
	//$idTipo="";

	function comprobarPerfil(){
		if (!isset($_SESSION['perfil'])) {
			$_SESSION['perfil']='invitado';
			$_SESSION['nombreUsuario']='invitado';
			$_SESSION['Usuario']="blanco";
			$_SESSION['idUsuario']="";
			$_SESSION['idBook']="";
		}
		//print_r($_SESSION['perfil']);


	}

	function menu(){
		echo "<div id='contenedorMenu'>";
			echo "<div id='contenidosMenu'>";
				echo "<div id='columna1Menu'><a href='index.php'>Portada</a></div>";
				echo "<div id='columna1Menu'><a href='index.php?page=recomendados'>Recomendados</a></div>";
				echo "<div id='columna1Menu'><a href='index.php?page=contacto'>Contacto<a></div>";
				echo "<div id='columna1Menu'><a href='index.php?page=about'>About</a></div>";
			echo "</div>";
		echo "</div>";
		echo "<div id='contenedorMenu'>";
			echo "<div id='contenidosMenu'>";
				echo "<div id='columna1Menu'></div>";
				echo "<div id='columna1Menu'><a href='index.php?page=libros'>Libros</a></div>";
				echo "<div id='columna1Menu'><a href='index.php?page=mangas'>Mangas<a></div>";
				echo "<div id='columna1Menu'><a href='index.php?page=comic'>Comic</a></div>";
		    echo "</div>";
		echo "</div>";
	}
	function cerrarSession(){
		echo "<form method='post' action=".$_SERVER['PHP_SELF'].">";
			echo"<input type='submit' name='cerrarSesion' value='Cerrar Sesion'>";
		echo "</form>";
	}
	function login(){
		switch ($_SESSION['perfil']) {
			case 'invitado':
			echo "<div id='login'>";
				echo "<form method='post' action=".$_SERVER["PHP_SELF"].">";
				 	echo "<div id='contenidos'>";
						echo "<div id='columna1'>Usuario</div>";
					    echo "<div id='columna2'><input type='text' name='userLogin'></div>";
					echo "</div>";
					echo "<div id='contenidos'>";
						echo "<div id='columna1'>Password</div>";
					    echo "<div id='columna2'><input type='password' name='passLogin'></div>";
					    echo "<div ><input type='submit' name='logear' value='Entrar'></div>";
					echo "</div>";
					echo "<div id='contenidos'>";
						echo "<div id='columna1'></div>";
					    echo "<div id='columna1'><a href='index.php?page=registrar'>Registrarse</a></div>";
					echo "</div>";
						//echo "<div id='columna1'><a class='btn btn-social-icon btn-twitter'><span class='fa fa-twitter'></span> </a></div>";
				echo "</form>";
				echo "<form method='post' action='index.php?page=redes'>";
				 	echo "<div id='contenidos'>";
						//echo "<div id='columna1'></div>";
					    echo "<div id='columna2'><input type='submit' name='twitter' value='twitter'></div>";
					    echo "<div id='columna2'><input type='submit' name='facebook' value='facebook'></div>";
					    echo "<div id='columna2'><input type='submit' name='google' value='google'></div>";
					echo "</div>";
				echo "</form>";
			echo "</div>";

						//echo "<div id='columna1'><a class='btn btn-social-icon btn-twitter'><span class='fa fa-twitter'></span> </a></div>";

			break;
			case 'admin'||'colaborador'||'basico':
				echo "<div id='login'>";
					echo "<div id='contenidos'>";
						echo "<div id='columna1'>FOTO</div>";
					echo "</div>";
					echo "<div id='contenidos'>";
					//print_r($_SESSION['nombreUsuario']);

						echo "<div id='columna2'>".$_SESSION['nombreUsuario']."</div>";

						echo '<form method="post" action='.$_SERVER["PHP_SELF"].'>';
							echo'<input type="submit" name="cerrarSesion" value="Cerrar Sesion">';
						echo'</form>';
					echo "</div>";
				echo "</div>";
				break;
			default:
				echo "AVISAR AL PROGRAMADOR";
				break;
			}
	}
	function secciones(){
		switch ($_SESSION['perfil']) {
			case 'admin':
				echo "<div id='contendorSec'>";
					echo "<div id='contenidosSec'>";
						echo "<div id='columna2'><a href='index.php?page=indexAdmin'>Perfil</a></div>";
						echo "<div id='columna2'>Recomendados</div>";
						echo "<div id='columna3'><a href='index.php?page=registrarBooks'>Registrar</a></div>";
						echo "<div id='columna3'><a href='index.php?page=usersAll'>Usuarios</a></div>";
					echo "</div>";
				echo "</div>";
				break;
			case 'colaborador':
					echo "<div id='contendorSec'>";
					echo "<div id='contenidosSec'>";
						echo "<div id='columna2'><a href='index.php?page=indexAdmin'>Perfil</a></div>";
						echo "<div id='columna2'>Recomendados</div>";
						echo "<div id='columna3'><a href='index.php?page=registrarBooks'>Registrar</a></div>";
					echo "</div>";
				echo "</div>";
				break;
			case 'basico':
					echo "<div id='contendorSec'>";
					echo "<div id='contenidosSec'>";
						echo "<div id='columna2'><a href='index.php?page=indexAdmin'>Perfil</a></div>";
						echo "<div id='columna2'>Recomendados</div>";
					echo "</div>";
				echo "</div>";
				break;
			default:
				# code...
				break;
		}
	}
	function cambioIdaNombrePerfil($idPerfil){
		switch ($idPerfil) {
			case '1':
				$idPerfil="admin";
				echo $idPerfil;
				break;
			case '2':
				$idPerfil="colaborador";
				echo $idPerfil;
				break;
			case '3':
				$idPerfil="basico";
				echo $idPerfil;
				break;
			default:
				echo "Ese perfil no existe";
				break;
		}
		//hay que retornar
		return $idPerfil;
	}
	function cambioIdParaUsers($idPerfil){
		switch ($idPerfil) {
			case '1':
				$idPerfil="admin";
				break;
			case '2':
				$idPerfil="colaborador";
				break;
			case '3':
				$idPerfil="basico";
				break;
			default:
				echo "Ese perfil no existe";
				break;
		}
		//hay que retornar
		return $idPerfil;
	}

	function redireccion($namePerfil){
		switch ($namePerfil) {
			case 'admin':
				$_SESSION['perfil']='admin';

				header("Location:index.php?page=indexAdmin");
				break;
			case 'colaborador':
				$_SESSION['perfil']='colaborador';
				header("Location:index.php?page=indexColaborador");
				break;
			case 'basico':
				$_SESSION['perfil']='basico';
				header("Location:index.php?page=indexBasico");
				break;
			default:
				echo "esto va peor";
				break;
		}
	}
	function getUsers($user,$pass){
		$usua = Usuarios::singleton();
		$usuario = $usua->get_usuario($user,$pass);
		return $usuario;

	}
	function userAll(){
		$users = Usuarios::singleton();
		$user = $users->get_All_Users();
		return $user;
	}

	function loginUser($user,$pass){
		//echo "1";
		$user=getUsers($user,$pass);
		$usuarios=userAll();
		//echo "2";
		//print_r($user);
		//echo "3";
		$idPerfil=$user[0]['IdTipos'];
		$_SESSION['nombreUsuario']=$user[0]['Nombres'];

		$_SESSION['Usuario'] = $usuarios;
		$namePerfil=cambioIdaNombrePerfil($idPerfil);
		//echo $namePerfil;
		redireccion($namePerfil);
	}
	function divAnadir(){
		echo "<div id=''>";
			echo "<form method='post' action=index.php?page=registrar>";
				echo "<div id=''>";
			       echo "<div id=''>Nombre</div>";
					echo "<div id=''><input type='text' name='nameRegis'></div>";
				echo "</div>";
			   	echo "<div id=''>";
				    echo "<div id=''>Usuario</div>";
				    echo "<div id=''><input type='text' name='userRegis'></div>";
				echo "</div>";
				echo "<div id=''>";
				    echo "<div id=''>Password</div>";
				    echo "<div id=''><input type='password' name='passRegis'></div>";
				echo "<div id=''>";
				    echo "<div id=''>Repite Password</div>";
				    echo "<div id=''><input type='password' name='passRegCom'></div>";
				echo "</div>";
				echo "<div id=''>";
				    echo "<div id=''>Email</div>";
				    echo "<div id=''><input type='text' name='emailRegis'></div>";
				echo "</div>";
				    echo "<div ><input type='submit' name='registrar' value='Registrar Usuario'></div>";
			echo "</form>";
		    //echo "<div>atras</div>";
		echo "</div>";
	}
	function anadirUser($name,$usuarios, $pass, $email){
		$userAna = Usuarios::singleton();
		$AnadirUsers = $userAna->insert_User($name,$usuarios, $pass,$email);
	}
	function newLibros(){
		$booksNew = Libros::singleton();
		$bookNew = $booksNew->get_new_books();
		echo'<div id="contenedorLCM">';
    		echo'<div id="contenidosLCM">';
    		   	echo' <div id="columna1LCM">Nombre</div>';
        		echo'<div id="columna2LCM">Autor</div>';
       			//echo'<div id="columna2LCM">Tipo</div>';
       			echo'<div id="columna2LCM">Genero</div>';
       			echo'<div id="columna2LCM">Ver Ficha</div>';
    		echo'</div>';
		foreach ($bookNew as $key => $value) {
   			echo'<div id="contenidosLCM">';
			foreach ($value as $key2 => $value2) {
    		    echo'<div id="columna1LCM">'.$value2.' </div>';
			}
			echo '<div id="columna1LCM"><a href="">Ficha </a></div>';
    		echo'</div>';
		}
		echo '</div>';
	}
	function newComics(){

		$comicsNew = Libros::singleton();
		$comicNew = $comicsNew->get_new_comics();
		echo'<div id="contenedorLCM">';
    		echo'<div id="contenidosLCM">';
    		   	echo' <div id="columna1LCM">Nombre</div>';
        		echo'<div id="columna2LCM">Autor</div>';
       			//echo'<div id="columna2LCM">Tipo</div>';
       			echo'<div id="columna2LCM">Genero</div>';
       			echo'<div id="columna2LCM">Ver Ficha</div>';
    		echo'</div>';
		foreach ($comicNew as $key => $value) {
   			echo'<div id="contenidosLCM">';
			foreach ($value as $key2 => $value2) {
    		    echo'<div id="columna1LCM">'.$value2.' </div>';
			}
			echo '<div id="columna1LCM"><a href="">Ficha </a></div>';
    		echo'</div>';
		}
		echo '</div>';
	}
	function newMangas(){
		$mangasNews = Libros::singleton();
		$mangaNew = $mangasNews->get_new_mangas();
		echo'<div id="contenedorLCM">';
    		echo'<div id="contenidosLCM">';
    		   	echo' <div id="columna1LCM">Nombre</div>';
        		echo'<div id="columna2LCM">Autor</div>';
       			//echo'<div id="columna2LCM">Tipo</div>';
       			echo'<div id="columna2LCM">Genero</div>';
       			echo'<div id="columna2LCM">Ver Ficha</div>';
    		echo'</div>';
		foreach ($mangaNew as $key => $value) {
   			echo'<div id="contenidosLCM">';
			foreach ($value as $key2 => $value2) {
    		    echo'<div id="columna1LCM">'.$value2.' </div>';
			}
			echo '<div id="columna1LCM"><a href="">Ficha </a></div>';
    		echo'</div>';
		}
		echo '</div>';
	}
	function mostrarLibros(){
		$libros = Libros::singleton();
		$libro = $libros->get_Libros();
		//print_r($libro);
		echo'<div id="contenedorLCM">';
    		echo'<div id="contenidosLCM">';
    		   	echo' <div id="columna1LCM">Nombre</div>';
        		echo'<div id="columna2LCM">Autor</div>';
       			echo'<div id="columna2LCM">Tipo</div>';
       			echo'<div id="columna2LCM">ISBN</div>';
       			echo'<div id="columna2LCM">Genero</div>';
       			echo'<div id="columna2LCM">Año Publicacion</div>';
       			echo'<div id="columna2LCM">Edicio</div>';
       			echo'<div id="columna2LCM">Editorial</div>';
       			echo'<div id="columna2LCM">Nombre original</div>';
       			echo'<div id="columna2LCM">Ver ficha</div>';
    		echo'</div>';
		foreach ($libro as $key => $value) {
   			echo'<div id="contenidosLCM">';
			foreach ($value as $key2 => $value2) {
    		    echo'<div id="columna1LCM">'.$value2.' </div>';
			}
			echo '<div id="columna1LCM"><a href="">email </a></div>';
    		echo'</div>';
		}
		echo '</div>';
	}
	function cambiarIdaNombreTipo($nombreTipo){
		$tipos = Libros::singleton();
		$idTipos = $tipos->changeANameType($nombreTipo);
		return $idTipos;
	}

	/*AÑADIR SUBIDA DE IMAGENES*/
	function insertBooks(){
		$tipos= Libros::singleton();
		$type = $tipos->showType();

		$generos= Libros::singleton();
		$gender = $generos->showGender();

		$editorial= Libros::singleton();
		$nameEditorial = $editorial->showEditiorial();
		//print_r($type);
		//print_r($gender);
		echo'<div id="contenedorINS">';
		 	echo '<form multipart/form-data action=index.php?page=registrarBooks method="post" accept-charset="utf-8">';
		    		echo'<div id="contenidosLCM">';
		    		   	echo' <div id="columnaINS">Nombre</div>';
		    		   	echo' <div id="columna2INS"><input type="text" name="nameBook"/></div>';
		    		echo'</div>';

		    		echo'<div id="contenidosINS">';
		    		   	echo' <div id="columnaINS">Autores</div>';
		    		   	echo' <div id="columna2INS"><input type="text" name="nameAuth"/></div>';
		    		echo'</div>';

		    		echo'<div id="contenidosINS">';
		    		   	echo' <div id="columnaINS">IdTipos</div>';
		    		foreach ($type as $key => $value) {
		    			echo "<div>";
		    			foreach ($value as $key2 => $value2) {
							//echo '<input type="checkbox" name='.$value2. 'value="'.$value2.'" id="columna2INS">'.$value2;
							//echo "$key";
							echo '<input type="checkbox" name="tipo[]" value='.$key.'" id="columna2INS"/>'.$value2;
							//echo '<input type="hidden" name="tipo2[]" value="'.$key.'" id="columna2INS">';
						}
		    			echo "</div>";
		    		}
		    		echo'</div>';

		    		echo'<div id="contenidosINS">';
		    		   	echo' <div id="columnaINS">ISBN</div>';
		    		   echo' <div id="columna2INS"><input type="text"  name="ISBNBook"/></div>';
		    		echo'</div>';

		    		echo'<div id="contenidosINS">';
		    		   	echo' <div id="columnaINS">Generos</div>';
		    			echo '<select name="generoBook" id="columna2INS">';
		    				echo '<option value="Opcion">Elige un genero</option>';
		    			foreach ($gender as $key3 => $value3) {
		    				foreach ($value3 as $key4=> $value4) {
		    				echo '<div id="columna2INS"><option value='.$key3.'>'.$value4.'</option></div>';
		    				}
		    			}
		    			echo '</select>';
		    		echo'</div>';

		    		echo'<div id="contenidosINS">';
		    		   	echo' <div id="columnaINS">Año de publicación</div>';
		    		   	echo' <div id="columna2INS"><input type="date"  name="datePublish"/></div>';
		    		echo'</div>';

		    		echo'<div id="contenidosINS">';
		    		   	echo' <div id="columnaINS">Ediciones</div>';
		    		   	echo' <div id="columna2INS"><input type="number" name="editionsBook"/></div>';
		    		echo'</div>';

		    		echo'<div id="contenidosINS">';
		    		   	echo' <div id="columnaINS">Editoral</div>';
		    			echo '<select name="editorialBook" id="columna2INS">';
		    				echo '<option value="Opcion">Elige una editorial</option>';
		    			foreach ($nameEditorial as $key3 => $value3) {
		    				foreach ($value3 as $key4=> $value4) {
		    				echo '<div id="columna2INS"><option value='.$key3.'>'.$value4.'</option></div>';
		    				}
		    			}
		    			echo '</select>';
		    		echo'</div>';

		    		echo'<div id="contenidosINS">';
		    		   	echo' <div id="columnaINS">Nombre Original</div>';
		    		   	echo' <div id="columna2INS"><input type="text" name="originalName"/></div>';
		    		echo'</div>';

		    		echo'<div id="contenidosINS">';
		    		   	echo' <div id="columnaINS">Sinopsis</div>';
		    		   	echo' <div id="columna2INS"><input type="textarea" name="sinopsisBook"/></div>';
		    		echo'</div>';

		    		echo'<div id="contenidosINS">';
		    		   	echo' <div id="columnaINS">Imagenes</div>';
		    		   	//MAX_FILE_SIZE debe preceder al campo de entrada del fichero
   						/*echo '<input type="hidden" name="MAX_FILE_SIZE" value="30000" />';
  						//El nombre del elemento de entrada determina el nombre en el array $_FILES
		    		   	echo' <div id="columna2INS"><input name="fichero_book" type="file" /></div>';*/
		    		   	echo' <div id="columna2INS"><input name="imageBook" type="text" /></div>';
		    		echo'</div>';

		    		echo'<div id="contenidosINS">';
		    		   	echo' <div id="columnaINS">Descargas</div>';
		    		   	echo' <div id="columna2INS"><input type="text" name="download"></div>';
		    		echo'</div>';

		    		echo'<div id="contenidosINS">';
		    		   	echo' <div id="columnaINS">Valoración</div>';
		    		   	echo' <div id="columna2INS"><input type="number" name="valoracion"></div>';
		    		echo'</div>';

		    		echo'<div id="contenidosINS">';
		    		   	echo' <div id="columna2INS"><input type="submit" name="bookRegister" value="Guardar libro"></div>';
		    		echo'</div>';
		    	echo "</div>";
			echo"</form>";
		echo '</div>';
	 }

	function insBook($nameBook,$nameAuth,$nameTipo,$ISBNBook,$generoBook,$datePublish,$editionsBook,$editorialBook,$originalName,$sinopsisBook,$imageBook,$download,$valoration){
		$anadirBook = Libros::singleton();
		$anadirLibro = $anadirBook->insert_Book($nameBook,$nameAuth,$nameTipo,$ISBNBook,$generoBook,$datePublish,$editionsBook,$editorialBook,$originalName,$sinopsisBook,$imageBook,$download,$valoration);
	}
	function bookAll(){
		$libros = Libros::singleton();
		$allLibros = $libros->get_All_Libros();
		return $allLibros;
	}
	function idGeneroName($idGenero){
		$generos = Libros::singleton();
		$genero = $generos->idANombreGeneroBook($idGenero);
		return $genero;
	}
	function idEditorialName($idEditorial){
		$editoriales = Libros::singleton();
		$editorial = $editoriales->idANombreEditorialBook($idEditorial);
		return $editorial;
	}
	function showBooks(){
		$mostrarLibros=bookAll();
		switch ($_SESSION['perfil']) {
			case 'invitado':
				echo "<div id='contenedorMenu'>";
					echo "<div id='contenidosMenu'>";
						echo "<div id='columna1'>Libro</div>";
						echo "<div id='columna1'>Autor</div>";
						//echo "<div id='columna1'>Tipo</div>";
						echo "<div id='columna1'>Genero</div>";
						echo "<div id='columna1'>Año de Publicación</div>";
						echo "<div id='columna1'>Editorial</div>";
						echo "<div id='columna1'>Ediciones</div>";
						echo "<div id='columna1'>Nombre Original</div>";
						//echo "<div id='columna1'>Sinopsis</div>";
						echo "<div id='columna1'>Valoracion</div>";

				/*
					*/
					echo "</div>";
				foreach ($mostrarLibros as $key => $value) {
					$genero = idGeneroName($value['IdGeneros']);
					$editorial = idEditorialName($value['Editorial']);

					echo "<div id='contenidosMenu'>";
						echo "<div id='columna1'>".$value['Nombres']."</div>";
						echo "<div id='columna2'>".$value['Autores']."</div>";
						//echo "<div id='columna2'>".$value['IdTipos']."asdfas</div>";
						echo "<div id='columna2'>";
							foreach ($genero as $llave => $valor) {
								echo $valor['NombreGeneros'];
							}
						echo "</div>";
						echo "<div id='columna2'>".$value['AnoPublicacion']."</div>";

						//echo "<div id='columna2'>".$value['Editorial']."</div>";
						echo "<div id='columna2'>";
							foreach ($editorial as $llave => $valor) {
								echo $valor['nombreEditorial'];
							}
						echo "</div>";
						echo "<div id='columna2'>".$value['Ediciones']."</div>";
						echo "<div id='columna2'>".$value['NombreOriginal']."</div>";
						//echo "<div id='columna2'>".$value['Sinopsis']."</div>";
						echo "<div id='columna2'>".$value['Valoraciones']."</div>";
					echo "</div>";
				}
				echo "</div>";
				break;
			case 'basico':
				echo "<div id='contenedorMenu'>";
				echo "<div id='contenidosMenu'>";
						echo "<div id='columna1'>Libro</div>";
						echo "<div id='columna1'>Autor</div>";
						//echo "<div id='columna1'>Tipo</div>";
						echo "<div id='columna1'>Genero</div>";
						echo "<div id='columna1'>Año de Publicación</div>";
						echo "<div id='columna1'>Editorial</div>";
						echo "<div id='columna1'>Ediciones</div>";
						echo "<div id='columna1'>Nombre Original</div>";
						//echo "<div id='columna1'>Sinopsis</div>";
						echo "<div id='columna1'>Valoracion</div>";

				/*
					*/
					echo "</div>";
				foreach ($mostrarLibros as $key => $value) {
				$genero = idGeneroName($value['IdGeneros']);
				$editorial = idEditorialName($value['Editorial']);
					echo "<div id='contenidosMenu'>";
						echo "<div id='columna1'>".$value['Nombres']."</div>";
						echo "<div id='columna2'>".$value['Autores']."</div>";
						//echo "<div id='columna2'>".$value['IdTipos']."</div>";
						echo "<div id='columna2'>";
							foreach ($genero as $llave => $valor) {
								echo $valor['NombreGeneros'];
							}
						echo "</div>";

						echo "<div id='columna2'>".$value['AnoPublicacion']."</div>";
						echo "<div id='columna2'>";
							foreach ($editorial as $llave => $valor) {
								echo $valor['nombreEditorial'];
							}
						echo "</div>";
						echo "<div id='columna2'>".$value['Ediciones']."</div>";
						echo "<div id='columna2'>".$value['NombreOriginal']."</div>";
						//echo "<div id='columna2'>".$value['Sinopsis']."</div>";
						echo "<div id='columna2'>".$value['Valoraciones']."</div>";
					echo "</div>";
				}
				echo "</div>";
				break;
			case 'admin'||'colaborador':
				echo "<div id='contenedorMenu'>";
					echo "<div id='contenidosMenu'>";
						echo "<div id='columna1'>Libro</div>";
						echo "<div id='columna1'>Autor</div>";
						//echo "<div id='columna1'>Tipo</div>";
						echo "<div id='columna1'>Genero</div>";
						echo "<div id='columna1'>Año de Publicación</div>";
						echo "<div id='columna1'>Editorial</div>";
						echo "<div id='columna1'>Ediciones</div>";
						echo "<div id='columna1'>Nombre Original</div>";
						//echo "<div id='columna1'>Sinopsis</div>";
						echo "<div id='columna1'>Valoracion</div>";
						echo "<div id='columna1'></div>";
				/*
					*/
					echo "</div>";
				foreach ($mostrarLibros as $key => $value) {
						$genero = idGeneroName($value['IdGeneros']);
						$editorial = idEditorialName($value['Editorial']);
					echo "<div id='contenidosMenu'>";
						echo "<div id='columna1'>".$value['Nombres']."</div>";
						echo "<div id='columna2'>".$value['Autores']."</div>";
						//echo "<div id='columna2'>".$value['IdTipos']."</div>";
						echo "<div id='columna2'>";
							foreach ($genero as $llave => $valor) {
								echo $valor['NombreGeneros'];
							}
						echo "</div>";

						echo "<div id='columna2'>".$value['AnoPublicacion']."</div>";
						echo "<div id='columna2'>".$value['Ediciones']."</div>";
						//echo "<div id='columna2'>".$value['Editorial']."</div>";
						echo "<div id='columna2'>";
							foreach ($editorial as $llave => $valor) {
								echo $valor['nombreEditorial'];
							}
						echo "</div>";
						echo "<div id='columna2'>".$value['NombreOriginal']."</div>";
						//echo "<div id='columna2'>".$value['Sinopsis']."</div>";
						echo "<div id='columna2'>".$value['Valoraciones']."</div>";
						echo "<div id='columna2'>";
							echo "<form method='POST' action='index.php?page=modBooks'>";
								echo "<div><input type='submit' name='modBook'></div>";
								echo "<input type='hidden' name='idBook' value=".$value['IdLibros']."> ";
							echo "</form>";

						echo "</div>";
					echo "</div>";
				}
				echo "</div>";
				break;
			default:
				echo "llamar al informatico";
				break;
		}
	}
	function showBook($idBook){
		$books = libros::singleton();
		$book = $books->getBook($idBook);
		//print_r($user);
		return $book;
	}
	function show_perfil(){
		echo "<div>";
			echo "<div>";
				echo "<div>prueba</div>";
			echo "</div>";
		echo "</div>";
	}
	function showAllUsers(){
		$usuarios=userAll();
			echo'<div id="ojala">';
	    		echo'<div id="contenidos">';
	    		   	echo'<div id="columna1">Nombre</div>';
	        		echo'<div id="columna1">Usuario</div>';
	        		echo'<div id="columna1">Password</div>';
	        		echo'<div id="columna1">Email</div>';
	        		echo'<div id="columna1">ROL</div>';
	        		echo'<div id="columna1">Modificar</div>';
	    		echo'</div>';
			foreach ($usuarios as $key => $value) {
	   			echo'<div id="contenidos">';
					echo' <div id="columna1">'.$value["Nombres"]."</div>";
					echo' <div id="columna1">'.$value["Usuarios"]."</div>";
					echo' <div id="columna1">'.$value["password"]."</div>";
					echo' <div id="columna1">'.$value['email']."</div>";
					echo' <div id="columna1">'.cambioIdParaUsers($value["IdTipos"])."</div>";
					echo '<div id="columna1">';
						echo "<form method='post' action='index.php?page=modificarUser'>";
				   			echo "<input type='hidden' name='idUsuario' value=".$value['IdUsuarios']."> ";
							echo' <input type="submit" name="modificarUser" value="Modificar">';
						echo "</form>";
					echo '</div>';
	    		echo'</div>';
			}
		echo '</div>';
	}
	function showUser($idUser){
		$users = Usuarios::singleton();
		$user = $users->getUser($idUser);
		//print_r($user);
		return $user;
	}
	function modUser($name,$pass,$email,$tipo,$idUser){
		$modUsers=Usuarios::singleton();
		$modUsuario=$modUsers->actualizarUsers($name,$pass,$email,$tipo,$idUser);
	}
	function divUser(){
		$tipoUs= Usuarios::singleton();
		$tipoUsuarios = $tipoUs->showTipoUser();
	//	print_r($tipoUsuarios);
		echo "<form method='post' action='index.php?page=modificarUser'>";
			echo'<div>';
	    		echo'<div id="contenidos">';
	    		   	echo'<div id="columna1">Nombre</div>';
					echo'<div id="columna1"><input type="text" name="name"></div>';
	    		echo'</div>';
	   			echo'<div id="contenidos">';
					echo' <div id="columna1">Password</div>';
					echo' <div id="columna1"><input type="password" name="pass"></div>';
	    		echo'</div>';
	   			echo'<div id="contenidos">';
					echo' <div id="columna1">Repite Password</div>';
					echo' <div id="columna1"><input type="password" name="pass2"></div>';
	    		echo'</div>';
	   			echo'<div id="contenidos">';
					echo' <div id="columna1">Email</div>';
					echo' <div id="columna1"><input type="text" name="mail"></div>';
	    		echo'</div>';
	   			echo'<div id="contenidos">';
					echo' <div id="columna1">Elige un tipo de usuario</div>';
					echo' <div id="columna1">';
						echo '<select name="typeUser">';
				    		echo '<option value="Opcion">Elige un tipo de usuario</option>';
				    			foreach ($tipoUsuarios as $key3 => $value3) {
				    				foreach ($value3 as $key4=> $value4) {
				    				echo '<div id="columna2INS"><option value='.$key3.'>'.$value4.'</option></div>';
				    				}
				    			}
				    	echo '</select>';
			    	echo "</div>";
	    		echo'</div>';
	   			echo'<div id="contenidos">';
					echo' <div></div>';
					echo' <div id="columna1"><input type="submit" name="guardarModificar"></div>';
	    		echo'</div>';
			echo '</div>';
		echo "</form>";
	}
	function updateBook($nombres,$autor,$tipo,$isbn,$genero,$anoPublicacion,$edicion,$editorial,$nombreOriginal,$sinopsis,$valoracion,$imagen,$descarga){
		$updateBook=Libros::singleton();
		$actualizarBook=$updateBook->actualizarBook($nombres,$autor,$tipo,$isbn,$genero,$anoPublicacion,$edicion,$editorial,$nombreOriginal,$sinopsis,$valoracion,$imagen,$descarga);
	}
	function modificarBook(){
	print_r(showBook($_SESSION['idBook']));
		$tipos= Libros::singleton();
		$type = $tipos->showType();

		$generos= Libros::singleton();
		$gender = $generos->showGender();

		$editorial= Libros::singleton();
		$nameEditorial = $editorial->showEditiorial();

	
		echo "<div id='contenedorMenu'>";
		foreach (showBook($_SESSION['idBook']) as $key => $value) {
			$genero = idGeneroName($value['IdGeneros']);
			$editorial = idEditorialName($value['Editorial']);
			print_r($value['Nombres']);
			echo "<form enctype='multipart/form-data' method='POST' action='index.php?page=modificacionBook'>";
				echo "<div id='contenidosMenu'>";
					echo "<div id='columna1'>Nombres</div>";
					echo "<div id='columna1'><input type='text' name='nombre' value=".$value['Nombres']."></div>";
				echo "</div>";
				echo "<div id='contenidosMenu'>";
					echo "<div id='columna1'>Autores</div>";

					echo "<div id='columna1'><input type='text' name='autores' value=".$value['Autores']."></div>";
				echo "</div>";
				echo "<div id='contenidosMenu'>";
					echo "<div id='columna1'>Tipos</div>";
					//echo "<div id='columna1'><input type='text' name='tipo' value=".$value['IdTipos']."></div>";
						//foreach ($type as $keyT => $valueT) {
							echo "<div  id='columna2INS'>";
								echo '<select name="generoBook">';
					    			echo '<option value="Opcion">elige</option>';
						    			foreach ($type as $keyT => $valueT) {
						    				foreach ($valueT as $keyT2=> $valueT2) {
						    				echo '<div id="columna2INS"><option value='.$keyT2.'>'.$valueT2.'</option></div>';
						    				}
						    			}
					    //}
				    		echo '</select>';
			    	echo "</div>";
				echo "</div>";
				echo "<div id='contenidosMenu'>";
					echo "<div id='columna1'>ISBN</div>";
						
					echo "<div id='columna1'><input type='text' name='isbn' value=".$value['ISBN']."></div>";
				echo "</div>";
				echo "<div id='contenidosMenu'>";
					echo "<div id='columna1'>Generos</div>";
					foreach ($genero as $keyGen => $valueGen) {
					//	echo "<div id='columna1'><input type='text' name='genero' value=".$valueGen['NombreGeneros']."></div>";
					echo "<div  id='columna2INS'>";
						echo '<select name="generoBook">';
			    			echo '<option value="Opcion">'.$valueGen['NombreGeneros'].'</option>';
				    			foreach ($gender as $keyG => $valueG) {
				    				foreach ($valueG as $keyG2=> $valueG2) {
				    				echo '<div id="columna2INS"><option value='.$keyG2.'>'.$valueG2.'</option></div>';
				    				}
				    			}
			    		echo '</select>';
					}
			    	echo "</div>";
				echo "</div>";
				echo "<div id='contenidosMenu'>";
					echo "<div id='columna1'>Año de publicación</div>";
					//echo "<div id='columna1'><input type='text' name='nombre' value=".$value['AnoPublicacion']."></div>";
					echo "<div id='columna1'><input type='text' name='publicacion' value=".$value['AnoPublicacion']."></div>";
				echo "</div>";
				echo "<div id='contenidosMenu'>";
					echo "<div id='columna1'>Ediciones</div>";
					
//							echo "<div id='columna1'><input type='text' name=''></div>";
					echo "<div id='columna1'><input type='text' name='ediciones' value=".$value['Ediciones']."></div>";
						
				echo "</div>";
				echo "<div id='contenidosMenu'>";
					echo "<div id='columna1'>Editorial</div>";
					foreach ($editorial as $keyEd => $valueEd) {
					//echo "<div id='columna1'><input type='text' name='editorial' value=".$valueEd['nombreEditorial']."></div>";
						echo "<div  id='columna2INS'>";
						echo '<select name="generoBook">';
			    			echo '<option value="Opcion">'.$valueEd['nombreEditorial'].'</option>';
				    			foreach ($nameEditorial as $keyE => $valueE) {
				    				foreach ($valueE as $keyE2=> $valueE2) {
				    				echo '<div id="columna2INS"><option value='.$keyE2.'>'.$valueE2.'</option></div>';
				    				}
				    			}
					}
			    		echo '</select>';
			    	echo "</div>";
				echo "</div>";
				echo "<div id='contenidosMenu'>";
					echo "<div id='columna1'>Nombre Original</div>";
					//echo "<div id='columna1'><input type='text' name=''></div>";
					echo "<div id='columna1'><input type='text' name='nombreO' value=".$value['NombreOriginal']."></div>";
				
				echo "</div>";
				echo "<div id='contenidosMenu'>";
					echo "<div id='columna1'>Sinopsis</div>";
					echo "<div id='columna1'><input type='text' name='sinopsis' value=".$value['Sinopsis']."></div>";
					//echo "<div id='columna1'><input type='text' name=''></div>";

				echo "</div>";
				echo "<div id='contenidosMenu'>";
					echo "<div id='columna1'>valoraciones</div>";
					echo "<div id='columna1'><input type='text' name='valoracion' value=".$value['Valoraciones']."></div>";
				
				echo "</div>";
				echo "<div id='contenidosMenu'>";
					echo "<div id='columna1'>Descargas</div>";
					echo "<div id='columna1'><input type='text' name='descarga' value=".$value['Descargas']."></div>";
				echo "</div>";
				/*echo "<div id='contenidosMenu'>";
					echo "<div id='columna1'>Imagen</div>";
					echo "<div id='columna1'><img src=".$value['Imagenes']."></div>";
				echo "</div>";*/
		}
				echo "<div id='contenidosMenu'>";
					echo "<div id='columna1'></div>";
					echo "<div id='columna1'><input type='submit' name='modBooks' value='Modificar'></div>";
				echo "</div>";

			echo "<form>";
		echo "</div>";
	}
	function modBook($nombres,$autores,$idtipos,$tipo,$isbn,$genero,$publicacion,$ediciones,$editorial,$nombreO,$sinopsis,$valoracion,$imagen){
		$modBooks=Usuarios::singleton();
		$modBook=$modBooks->actualizarBook($nombres,$autores,$idtipos,$tipo,$isbn,$genero,$publicacion,$ediciones,$editorial,$nombreO,$sinopsis,$valoracion,$imagen);
		/*[Nombres] => Harry Potter y la Piedra Folisofal [Autores] => JKROWLING [IdTipos] => 1 [ISBN] => 55555 [IdGeneros] => 1 [AnoPublicacion] => 0000-00-00 [Ediciones] => 1 [Editorial] => 1 [NombreOriginal] => xasADSA [Sinopsis] => ADA [Valoraciones] => 1 [Imagenes] => ..\img\harryPotterYLaPiedraFilosofal.jpg [Descargas] => ) )
		*/
	}

	function anadirImg(){
		// Gets the date
	    $date = new DateTime();
	    // Gets the extension
	    if(isset($_FILES['file']['tmp_name'])){
	      if(!empty($_FILES['file']['tmp_name'])){
	        $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
	        // Attempts to create the rute directory
	        $directory = "../data/files/studies/".$resumeId."/";
	        $path = "../data/files/studies/".$resumeId."/".$date->getTimestamp().".".$ext;
	        // If the file directory exists, moves the file to the dir
	        if(file_exists($directory)){
	          move_uploaded_file( $_FILES['file']['tmp_name'], $path);
	        }else{
	          // Else, creates the directory
	          mkdir($directory, 0777, true);
	          // Then moves the file
	          move_uploaded_file( $_FILES['file']['tmp_name'], $path);
	        }
	      }
	    }else{
	      $path = "noFile";
	    }
	}
?>
