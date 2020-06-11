<?php 

class Conexion extends PDO{
	private $tipo = 'mysql';
	private $host = '34.207.22.215';
	private $nombre = 'BDROSA';
	private $strUser = 'root';
	private $strPassword = 'Alumno1.';

	public function __construct(){
		try{
			parent::__construct("{$this->tipo}:dbname={$this->nombre};host={$this->host};charset=utf8", $this->strUser, $this->strPassword);
		}catch(PDOException $e){
			echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
			exit;
		}
	}
}

?>