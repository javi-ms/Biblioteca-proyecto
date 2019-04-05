<?php
	class Usuarios {
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
		public function get_usuario($user,$pass){
			try {
				$query = $this->dbh->prepare('SELECT * FROM usuarios where Usuarios="'.$user.'" AND password="'.$pass.'"');
		        $query->execute();
		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);	       		
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
	   	}

		public function get_All_Users(){
			try {
				$query = $this->dbh->prepare('SELECT * FROM `usuarios`');
		        $query->execute();
		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
	   	}
		
		public function insert_User($name,$usuarios, $pass,$email){
			try {
				$query = $this->dbh->prepare("INSERT INTO `usuarios`(`Nombres`, `Usuarios`, `password`, `email`, `IdTipos`) VALUES (?,?,?,?,'3')");
				$query->bindParam(1, $name);
				$query->bindParam(2, $usuarios);
				$query->bindParam(3, $pass);
				$query->bindParam(4, $email);
				/*
				*/
				$query->execute();
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
		}
		public function getUser($idUser){
			try {
				$query = $this->dbh->prepare('SELECT * FROM usuarios where IdUsuarios="'.$idUser.'"');
		        $query->execute();
		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);	       		
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
		}
		public function actualizarUsers($name,$pass,$email,$tipo,$idUser){
			try {
				$query = $this->dbh->prepare('UPDATE `usuarios`
													 		SET `Nombres`="'.$name.'",
													 		`Usuarios`="'.$pass.'",
															`password`="'.$pass.'",
															`email`="'.$email.'",
															`IdTipos`="'.$tipo.'" 
													 			WHERE `IdUsuarios`='.$idUser);					
		        $query->execute();
		        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);	       		
		        return($resultado);
		        $this->dbh = null;
			}catch (PDOException $e) {
		    	$e->getMessage();
			}
			
		}
		public function showTipoUser(){
				try {
				$query = $this->dbh->prepare('SELECT tipo FROM `tipousers`');
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