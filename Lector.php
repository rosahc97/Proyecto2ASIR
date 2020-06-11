<?php

require_once 'Conexion.php';
class Lector{
	private $nombre;
	private $apellido;
	private $dni;
	const TABLA = 'LECTOR';

	public function getNombre(){
		return $this->nombre;
	}
	public function getApellido(){
		return $this->apellido;
	}
	public function getDni(){
		return $this->dni;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setApellido($apellido){
		$this->apellido = $apellido;
	}
	public function setDni($dni){
		$this->dni = $dni;
	}

	public function __construct($dni,$nombre,$apellido){
		$this->dni = $dni;
		$this->nombre = $nombre;
		$this->apellido = $apellido;
	}

	

	public function eliminar(){
		$conexion = new Conexion();
		$consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE DNI = :dni');
		$consulta->bindParam(':dni', $this->dni);
		$consulta->execute();
		$conexion = null;
	}

	public function comprobar(){
		$conexion = new Conexion();
		$consulta = $conexion->prepare('SELECT * FROM ' .self::TABLA . ' WHERE DNI = :dni');
		$consulta->bindParam(':dni', $this->dni);
		$consulta->execute();
		$registros = $consulta->fetchAll();
		$conexion = null;
		if ($registros == false){
				$conexion = new Conexion();
				$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (DNI, NOMBRE_LECTOR, APELLIDO_LECTOR) VALUES(:dni, :nombre, :apellido)');
				$consulta->bindParam(':dni', $this->dni);
				$consulta->bindParam(':nombre', $this->nombre);
				$consulta->bindParam(':apellido', $this->apellido);
				$consulta->execute();
				$conexion = null;
				echo "Usuario nuevo registrado";
		}
		else{
			echo "Este usuario ya estaba registrado";
		}
	}

}

 ?>