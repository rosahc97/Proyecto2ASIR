<?php 
require_once 'Conexion.php';
class Valoracion{
	private $dnilector;
	private $codigolibro;
	private $valoracion;
	private $opinion;
	const TABLA = 'VALORACION';

	public function getDniLector(){
		return $this->dnilector;
	}
	public function getCodigoLibro(){
		return $this->codigolibro;
	}
	public function getValoracion(){
		return $this->valoracion;
	}
	public function getOpinion(){
		return $this->opinion;
	}

	public function setCodigoLibro($codigolibro){
		$this->codigolibro = $codigolibro;
	}
	public function setValoracion($valoracion){
		$this->valoracion = $valoracion;
	}
	public function setOpinion($opinion){
		$this->opinion = $opinion;
	}

	public function __construct($dnilector, $codigolibro, $valoracion, $opinion){
		$this->dnilector = $dnilector;
		$this->codigolibro = $codigolibro;
		$this->valoracion = $valoracion;
		$this->opinion = $opinion;
	}

	public function insertar(){
		$conexion = new Conexion();
		$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (DNI_LECTOR, COD_LIBRO, VALORACION, OPINION) VALUES (:dnilector, :codigolibro, :valoracion, :opinion)');
		$consulta->bindParam(':dnilector', $this->dnilector);
		$consulta->bindParam(':codigolibro', $this->codigolibro);
		$consulta->bindParam(':valoracion', $this->valoracion);
		$consulta->bindParam(':opinion', $this->opinion);
		$consulta->execute();
		$conexion = null;
	}

	public function modificar(){
		$conexion = new Conexion();
		$consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET VALORACION = :valoracion, OPINION = :opinion WHERE COD_LIBRO = :codigolibro');
		$consulta->bindParam(':valoracion', $this->valoracion);
		$consulta->bindParam(':opinion', $this->opinion);
		$consulta->bindParam(':codigolibro', $this->codigolibro);
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

}
?>