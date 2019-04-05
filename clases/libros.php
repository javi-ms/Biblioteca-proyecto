<?php
	class Libros {
		private $dbh;
		private static $instancia;
		

		function __construct(){	

			try {
	            $this->dbh = new PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');
	            $this->dbh->exec("SET CHARACTER SET utf8");
	        } catch (PDOException $e) {
	            print "Error!: " . $e->getMessage();
	            die();
	        }
		}
			public static function singleton(){
		        if (!isset(self::$instancia)) {
		            $miclase = __CLASS__ ;
		            self::$instancia = new $miclase;
		        }
		        return self::$instancia;
		    }

		//cuando pulso el boton en el formulario, llamo a comprobarlogin pasando $_POST[].
		public function get_libros(){
			try {
				$query = $this->dbh->prepare('select Nombres, Autores, IdTipos, ISBN, IDGeneros, AnoPublicacion, Ediciones, Editorial, NombreOriginal from libros order by IdLibros desc limit 5');
				//$query = $this->dbh->prepare('select * from libros where usuario="'.$user.'" and password="'.$pass.'"');
//$query = $this->dbh->prepare("SELECT * FROM usuarios WHERE usuario=".$user. "AND password=".$pass);

		        $query->execute();

		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
		       		
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
	   	}
	   	public function get_All_Libros(){
			try {
				$query = $this->dbh->prepare('select * from libros where IdTipos="1"');
		        $query->execute();
		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);	
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
	   	}
	   	public function getBook($idBook){
			try {
				$query = $this->dbh->prepare('SELECT * FROM libros where IdLibros="'.$idBook.'"');
		        $query->execute();
		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);	       		
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
		}
	   	public function get_new_books(){
	   		try {
				$query = $this->dbh->prepare('SELECT lb.Nombres, lb.Autores ,gen.NombreGeneros FROM libros AS lb join genero AS gen WHERE lb.IdGeneros=gen.IdGeneros AND lb.IdTipos="1" ORDER BY IDLibros desc limit 5');
		        $query->execute();
		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);		
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
	   	}
	   	public function get_new_mangas(){
	   		try {
				$query = $this->dbh->prepare('SELECT lb.Nombres, lb.Autores ,gen.NombreGeneros FROM libros AS lb join genero AS gen WHERE lb.IdGeneros=gen.IdGeneros AND lb.IdTipos="2" ORDER BY IDLibros desc limit 5');
		        $query->execute();
		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);		
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
	   	}
	   	public function get_new_comics(){
	   		try {
				$query = $this->dbh->prepare('SELECT lb.Nombres, lb.Autores ,gen.NombreGeneros FROM libros AS lb join genero AS gen WHERE lb.IdGeneros=gen.IdGeneros AND lb.IdTipos="3" ORDER BY IDLibros desc limit 5');
		        $query->execute();
		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);		
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
	   	}

	  	public function insert_Book($name,$auth,$tipos,$isbn,$gene,$publication,$edition,$editorial,$originalName,$sinopsis,$valoration,$image,$download){
			try {
				$query = $this->dbh->prepare("INSERT INTO `libros`(`Nombres`, `Autores`, `IdTipos`, `ISBN`, `IdGeneros`, `AnoPublicacion`, `Ediciones`, `Editorial`, `NombreOriginal`, `Sinopsis`, `Valoraciones`, `Imagenes`, `Descargas`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
				//VALUES ("asd","asd","asd","asd","asd","asd","asd","asd","asd","asd","asd","asd","asd")');
				$query->bindParam(1, $name);
				$query->bindParam(2, $auth);
				$query->bindParam(3, $tipos);
				$query->bindParam(4, $isbn);
				$query->bindParam(5, $gene);
				$query->bindParam(6, $publication);
				$query->bindParam(7, $edition);
				$query->bindParam(8, $editorial);
				$query->bindParam(9, $originalName);
				$query->bindParam(10, $sinopsis);
				$query->bindParam(11, $valoration);
				$query->bindParam(12, $image);
				$query->bindParam(13, $download);
				/*
				/*
				*/

				$query->execute();
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
		}

	   	public function showType(){
	   		try {
				$query = $this->dbh->prepare('select Nombres from tipolibro');

		        $query->execute();

		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
		       		
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
	   	}

	   	/*public function idTypeANombre($idType){
			try {
				$query = $this->dbh->prepare('SELECT Nombres FROM tipoLibro where IdGeneros="'.$IdTipos.'"');

		        $query->execute();

		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
		       		
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
	   	}*/
	   	public function idANombreGeneroBook($idGenero){
			try {
				$query = $this->dbh->prepare('SELECT NombreGeneros FROM genero where IdGeneros="'.$idGenero.'"');

		        $query->execute();

		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
		       		
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
	   	}
	   	public function idANombreEditorialBook($idEditorial){
			try {
				$query = $this->dbh->prepare('SELECT nombreEditorial FROM editorial where idEditorial="'.$idEditorial.'"');

		        $query->execute();

		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
		       		
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
	   	}
	   /*	public function changeANameType($nombreTipo){
	   		try {
	   			$nombresTipo='Mangas';
				$query = $this->dbh->prepare("SELECT `IdTipos` FROM `tipolibro` WHERE `Nombres`=".$nombresTipo);
		        $query->execute();
		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
	   	}*/

	   	public function showGender(){
	   		try {
				$query = $this->dbh->prepare('select NombreGeneros from genero');

		        $query->execute();

		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
		       		
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
	   	}
	   	public function showEditiorial(){
	   		try {
				$query = $this->dbh->prepare('select nombreEditorial from editorial');

		        $query->execute();

		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
		       		
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
	   	}
	   	public function actualizarBook($nombres,$autor,$tipo,$isbn,$genero,$anoPublicacion,$edicion,$editorial,$nombreOriginal,$sinopsis,$valoracion,$imagen,$descarga){
			try {
				$query = $this->dbh->prepare('UPDATE `libros`
												SET
													`Nombres`="'.$nombres.'",
													`Autores`="'.$autor.'",
													`IdTipos`="'.$tipo.'",
													`ISBN`="'.$isbn.'",
													`IdGeneros`="'.$genero.'",
													`AnoPublicacion`="'.$anoPublicacion.'",
													`Ediciones`="'.$edicion.'",
													`Editorial`="'.$editorial.'",
													`NombreOriginal`="'.$nombreOriginal.'",
													`Sinopsis`="'.$sinopsis.'",
													`Valoraciones`="'.$valoracion.'",
													`Imagenes`="'.$imagen.'",
													`Descargas`="'.$descarga.'", 
														WHERE `IdUsuarios`='.$idUser);					
		        $query->execute();
		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);	       		
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
			
		}
	}
?>