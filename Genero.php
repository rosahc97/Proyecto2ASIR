<?php

require_once 'Conexion.php';
class Genero{
	private $id;
	private $tipo;
	const TABLA = 'GENERO';

	public function getId(){
		return $this->id;
	}
	public function getTipo(){
		return $this->tipo;
	}

	public function __construct($id, $tipo){
		$this->id = $id;
		$this->tipo = $tipo;
	}

	public static function ObtenerResultados(){
		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA);
		$consulta->execute();
		$registros = $consulta->fetchAll();
		$conexion = null;
		return $registros;
	}
	public static function ObtenerColumna(){
		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT ID_GENERO FROM ' . self::TABLA);
		$consulta->execute();
		$registros = $consulta->fetchAll();
		$conexion = null;
		return $registros;
	}


}

?>