<?php 

class Conexion extends PDO{
	private $strDSN = 'mysql:host=localhost;dbname=BDROSA';
	private $strUser = 'root';
	private $strPassword = '';

	public function __construct(){
		try{
			parent::__construct($this->strDSN, $this->strUser, $this->strPassword);
		}catch(PDOException $e){
			echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
			exit;
		}
	}
}

?>