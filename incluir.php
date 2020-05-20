<html>
	<head>
		<meta charset="UTF-8" />
	</head>
	<body>
		<h1>Incluir libro</h1>
		<?php
			require_once 'Conexion.php';
			$conexion = new Conexion();
				if(isset($_POST['Incluir'])){
					$codigo=(isset($_POST['Codigo']))?($_POST['Codigo']):'';
					$nombre=(isset($_POST['NombreLibro']))?($_POST['NombreLibro']):'';
					$genero=(isset($_POST['Genero']))?($_POST['Genero']):'';
					$autor=(isset($_POST['Autor']))?($_POST['Autor']):'';
					$ed1=(isset($_POST['Espasa']))?($_POST['Espasa']):'';
					$ed2=(isset($_POST['Booket']))?($_POST['Booket']):'';
					$ed3=(isset($_POST['Edebe']))?($_POST['Edebe']):'';
					$ed4=(isset($_POST['SM']))?($_POST['SM']):'';
					$ed5=(isset($_POST['Debolsillo']))?($_POST['Debolsillo']):'';
					$ed6=(isset($_POST['Planeta']))?($_POST['Planeta']):'';
					$ed7=(isset($_POST['Otra']))?($_POST['Otra']):'';
					$editorial=$ed1.$ed2.$ed3.$ed4.$ed5.$ed6.$ed7;
					require_once 'Libro.php';
					$libro = new Libro($codigo, $nombre, $genero, $autor, $editorial);
					$libro->insertar();
	
				}
				elseif(isset($_POST['Ver'])){
					echo 'Código libro - Nombre libro - Género - Autor - Editorial';
					require_once 'Libro.php';
					$libros = Libro::ObtenerResultados();
					?>
					<ul>
						<?php foreach($libros as $item): ?>
							<li> <?php echo $item['CODIGO_LIBRO'] . ' - ' . $item['NOMBRE_LIBRO'] . ' - ' . $item['GENERO'] . ' - ' . $item['AUTOR'] . ' - ' . $item['EDITORIAL']; ?> </li>
						<?php endforeach; ?>
					</ul>	
		  <?php }
		  		elseif(isset($_POST['Volver'])){
		  			header('Location:./opciones.php');
		  		}
		  		else { ?>
					<form action="" method="post">
						Código libro: <input type="text" name="Codigo" required /></br></br>
						Nombre del libro: <input type="text" name="NombreLibro" required /></br></br>
						Género: </br>
						<?php
							require_once 'Genero.php';
							$genero = Genero::ObtenerResultados();
							foreach($genero as $item): ?>
								<input type="radio" id="<?php echo $item['ID_GENERO']; ?>" name="Genero" value="<?php echo $item['ID_GENERO']; ?>" />
								<label for="<?php echo $item['ID_GENERO']; ?>"><?php echo $item['TIPO']; ?></label>
							<?php endforeach; ?></br></br>
						Autor: <input type="text" name="Autor" /></br></br>
						Editorial: </br>
						<label><input type="checkbox" name="Espasa" value="Espasa" />Espasa</label>
						<label><input type="checkbox" name="Booket" value="Booket" />Booket</label></br>
						<label><input type="checkbox" name="Edebe" value="Edebe" />Edebé</label>
						<label><input type="checkbox" name="SM" value="SM" />SM</label></br>
						<label><input type="checkbox" name="Debolsillo" value="Debolsillo" />Debolsillo</label>
						<label><input type="checkbox" name="Planeta" value="Planeta" />Planeta</label></br>
						<label><input type="checkbox" name="Otra" value="Otra" />Otra</label></br></br>
						<input type="submit" value="Incluir" name="Incluir" />
						<input type="submit" value="Ver libros" name="Ver" />
						<input type="submit" value="Volver" name="Volver" />
					</form>
		  <?php } ?>	
	</body>
</html>