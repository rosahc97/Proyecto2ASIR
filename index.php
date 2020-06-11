<html>
	<head>
		<meta charset="UTF-8" />
	</head>
	<body>
		<h1>Página de valoración de libros</h1>
		<h2>Registro lector</h2>

		<?php
		require_once 'Conexion.php';
		$conexion = new Conexion();

			if(isset($_POST['Registrar'])){
				session_start();
				$_SESSION['Nombre']=$_POST['Nombre'];
				$_SESSION['Apellido']=$_POST['Apellido'];
				$_SESSION['DNI']=$_POST['DNI'];
				$nombre=$_SESSION['Nombre'];
				$apellido=$_SESSION['Apellido'];
				$dni=$_SESSION['DNI'];
				require_once 'Lector.php';
				$lector = new Lector($dni,$nombre,$apellido);
				$lector->comprobar();
				?>
				<a href="opciones.php">Continuar</a>
				<?php
			}

			elseif(isset($_POST['Eliminar'])){
				$nombre=(isset($_POST['Nombre']))?($_POST['Nombre']):'';
				$apellido=(isset($_POST['Apellido']))?($_POST['Apellido']):'';
				$dni=(isset($_POST['DNI']))?($_POST['DNI']):'';
				require_once 'Lector.php';
				$lector = new Lector($dni,$nombre,$apellido);
				$lector->eliminar();
				?>
				<a href="index.php">Continuar</a>
				<?php
			}
			else { ?>
				<form action="" method="post">
					Nombre: <input type="text" name="Nombre" /></br></br>
					Apellido: <input type="text" name="Apellido" /></br></br>
					DNI: <input type="text" name="DNI" required /></br></br>
					<input type="submit" value="Registrar" name="Registrar" />
					<input type="submit" value="Eliminar" name="Eliminar" />
				</form>
	  <?php } ?>
	</body>
</html>
