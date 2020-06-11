<?php 
require_once 'Conexion.php';
class Libro{
	private $codigo;
	private $nombre;
	private $genero;
	private $autor;
	private $editorial;
	const TABLA = 'LIBRO';

	public function getCodigo(){
		return $this->codigo;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function getGenero(){
		return $this->genero;
	}
	public function getAutor(){
		return $this->autor;
	}
	public function getEditorial(){
		return $this->editorial;
	}

	public function __construct($codigo, $nombre, $genero, $autor, $editorial){
		$this->codigo = $codigo;
		$this->nombre = $nombre;
		$this->genero = $genero;
		$this->autor = $autor;
		$this->editorial = $editorial;
	}

	public function insertar(){
		$conexion = new Conexion();
		$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (CODIGO_LIBRO, NOMBRE_LIBRO, GENERO, AUTOR, EDITORIAL) VALUES (:codigo, :nombre, :genero, :autor, :editorial)');
		$consulta->bindParam(':codigo', $this->codigo);
		$consulta->bindParam(':nombre', $this->nombre);
		$consulta->bindParam(':genero', $this->genero);
		$consulta->bindParam(':autor', $this->autor);
		$consulta->bindParam(':editorial', $this->editorial);
		$consulta->execute();
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
		$consulta = $conexion->prepare('SELECT CODIGO_LIBRO FROM ' . self::TABLA);
		$consulta->execute();
		$registros = $consulta->fetchAll();
		$conexion = null;
		return $registros;
	}


}
?>