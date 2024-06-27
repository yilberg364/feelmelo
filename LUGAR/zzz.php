<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Formulario de Contacto</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/zzz.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">



</head>

<body>

	<section class="container">
		<div class="row">
			<h4 class="center-align">AÑADIR LUGAR</h4>
			<article class="col s6 offset-s3">
				<form method="post" action="guardar_lugar.php" enctype="multipart/form-data">
					<div class="input-group">
						<i class="material-icons prefix">rate_review</i>
						<label for="nombre">Nombre del Lugar:</label>
						<input type="text" name="nombre" id="nombre" class="form-control" required>
					</div>

					<div class="input-group">
						<i class="material-icons prefix">language</i>
						<label for="pais">Pais</label>
						<input type="text" name="pais" id="pais" required>
					</div>

					<div class="input-group">
						<i class="material-icons prefix">location_city</i>
						<label for="ciudad">Ciudad</label>
						<input type="text" name="ciudad" id="ciudad" required>
					</div>

					<div class="input-group">
						<i class="material-icons prefix">location_on</i>
						<label for="ubicacion">Ubicacion</label>
						<input type="text" name="ubicacion" id="ubicacion" required>
					</div>

					<div class="input-group">
						<i class="material-icons prefix">description</i>
						<label for="descripcion">descripcion</label>
						<input type="text" name="descripcion" id="descripcion" required>
					</div>

					<div class="input-group">
						<i class="material-icons prefix">rounded_corner</i>
						<label for="categoria"></label>
						<select name="categoria" id="categoria" class="form-control" required>
							<option value="" disabled selected>Categoria:</option>
							<option value="hotel">Hotel</option>
							<option value="restaurante">Restaurante</option>
							<option value="atraccion">Atracción Turística</option>
							<option value="deportivo">Deportivo</option>
							<option value="otro">Otro</option>
							<!-- Agregar más opciones según las categorías necesarias -->
						</select>
					</div>

					<div class="input-group">
						<label for="imagen">Imagen:</label>
						<input type="file" name="imagen" id="imagen" class="form-control-file" required>
					</div>

					<p class="center-align">
						<button type="submit" class="btn btn-primary">Guardar Lugar</button>
					</p>




				</form>

			</article>
			<div class="image-section">
				<img src="../img/form7.webp" alt="Descripción de la imagen">
			</div>
		</div>

	</section>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			var elems = document.querySelectorAll('select');
			var instances = M.FormSelect.init(elems);
		});
	</script>

	<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>