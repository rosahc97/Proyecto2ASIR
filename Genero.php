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

	public static function Ver(){
		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA);
		$consulta->execute();
		$consulta->setFetchMode(PDO::FETCH_CLASS, 'Genero');
		while ($res = $consulta->fetch()){
			echo 'El id ' .$res->ID_GENERO. ' es un libro de ' .$res->TIPO."<br />";
			echo '-------------------------------------- <br />';
		}
		
		$conexion = null;
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