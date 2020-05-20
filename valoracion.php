<html>
	<head>
		<meta charset="UTF-8" />
	</head>
	<body>
		<h1>Dar valoración</h1>
		<?php 
			require_once 'Conexion.php';
			$conexion = new Conexion();
				if(isset($_POST['Valorar'])){
					session_start();
					$dnilector=$_SESSION['DNI'];
					$codigolibro=(isset($_POST['CodigoLibro']))?($_POST['CodigoLibro']):'';
					$valoracion=(isset($_POST['Valoracion']))?($_POST['Valoracion']):'';
					$opinion=(isset($_POST['Opinion']))?($_POST['Opinion']):'';
					require_once 'Valoraciones.php';
					$valoracion = new Valoracion($dnilector, $codigolibro, $valoracion, $opinion);
					$valoracion->insertar();
					header('Location:./valoracion.php');
				}
				elseif(isset($_POST['Modificar'])){
					session_start();
					$dnilector=$_SESSION['DNI'];
					$codigolibro=(isset($_POST['CodigoLibro']))?($_POST['CodigoLibro']):'';
					$valor=(isset($_POST['Valoracion']))?($_POST['Valoracion']):'';
					$opinion=(isset($_POST['Opinion']))?($_POST['Opinion']):'';
					require_once 'Valoraciones.php';
					$valoracion = new Valoracion($dnilector, $codigolibro, $valor, $opinion);
					$valoracion->setValoracion($valor);
					$valoracion->setOpinion($opinion);
					$valoracion->modificar();
					header('Location:./valoracion.php');
				}
				elseif(isset($_POST['VerValoraciones'])){
					echo 'Dni lector - Código libro - Valoración - Opinión';
					require_once 'Valoraciones.php';
					$valoraciones = Valoracion::ObtenerResultados();
					?>
					<ul>
						<?php foreach($valoraciones as $item): ?>
							<li> <?php echo $item['DNI_LECTOR'] . ' - ' . $item['COD_LIBRO'] . ' - ' . $item['VALORACION'] . ' - ' . $item['OPINION']; ?> </li>
						<?php endforeach; ?>
					</ul>
		  <?php }
		  		elseif(isset($_POST['Atras'])){
		  			header('Location:./opciones.php');
		  		}
		  		else { ?>
					<form action="" method="post">
						Código libro: <input type="text" name="CodigoLibro" /></br></br>
						Valoración:
						<select name="Valoracion">
							<?php
							require_once 'Genero.php';
							$genero = Genero::ObtenerColumna();
							foreach($genero as $item): ?>
								<option><?php echo $item['ID_GENERO']; ?></option>
							<?php endforeach; ?>
						</select></br></br>
						Opinión personal: <textarea name="Opinion"></textarea></br></br>
						<input type="submit" value="Valorar" name="Valorar" />
						<input type="submit" value="Modificar valoración" name="Modificar" />
						<input type="submit" value="Ver valoraciones" name="VerValoraciones" />
						<input type="submit" value="Volver" name="Atras" />
			 		</form> 
		  <?php } ?>
	</body>
</html>