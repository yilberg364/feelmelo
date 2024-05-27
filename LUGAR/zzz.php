<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario de Contacto</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
         <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		 <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">


    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	
	<style>
		/* Estilos Generales */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    color: #333;
}


.container {
    display: flex;  
    max-width: 860px;
	max-height: 826px;  
    margin: 45px auto;
    background-color: #fff;
    padding: 10px 90px;
    border-radius: 30px;
    box-shadow: 0 2px 500px rgba(0,0,0,0.3);
}

.form-section {
    flex: 0.3;  /* Que el formulario ocupe el 50% del contenedor principal */
    padding-right: 15px;
    border-right: 1px solid #e0e0e0; 
	position: relative;
	left: -400%; 
	
}

.image-section {
    flex: 1.6;  /* Que la imagen ocupe el 50% del contenedor principal */
    display: flex;
    justify-content: center;
}



.image-section {
    flex: 10;  
    padding-left: 0px; 
    display: flex;
    align-items: center;  /* Centrar verticalmente */
    justify-content: center;  /* Centrar horizontalmente */
    position: relative;  /* Añadido para la propuesta de z-index */
    z-index: 1;  /* Asegurar que la imagen no quede por encima de otros elementos */
}

.image-section img {
    max-width: 470%;  /* Incrementado para hacer la imagen más grande */
    max-height: 210%;  /* Incrementado para hacer la imagen más alta */
    border-radius: 5px;
	height: 450px;
	width: 320px;
	position: relative;
	left: -125px;
    top: 25px;
}

/* Estilos del Formulario */
.input-group {
    position: relative;
	left: -180px;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: 800;
}

.input-group .material-icons.prefix {
    position: absolute;
    left: -24px;
    top: 35px;
    color: #707070;
}

.input-group input,
.input-group select {
    width: 100%;
    padding: 15px 10px 10px 35px;
    border: 3px solid #e0e0e0;
    border-radius: 1px;
    font-size: 16px;
}

.btn {
	background-color: #2196f3;
    color: #fff;
    padding: 15px 30px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    font-size: 18px;
    font-weight: 600;
    display: inline-flex;  /* Cambiado a flex */
    align-items: center;  /* Centra los elementos hijos verticalmente */
    justify-content: center;  /* Centra los elementos hijos horizontalmente */
    line-height: 1;
    transition: transform 0.3s ease, background-color 0.3s ease;
}

.btn:hover {
	background-color: #1976d2;
        transform: scale(1.05);  /* Hace que el botón crezca ligeramente cuando se pasa el mouse por encima */
		
    }

/* Estilos de Imágenes */
.image-section {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
}

.social-image {
    width: 30%;
    height: 200px;
    background-size: cover;
    background-position: center;
    border-radius: 4px;
}

/* estilo h4 */
.center-align {
    text-align: center;
    color: #1E88E5;  /* Un azul más vibrante */
    font-family:'Times New Roman', Times, serif;
    font-weight: 750;  /* Usamos el peso 700 para que sea más audaz */
    border-bottom: 2px solid #e0e0e0;
	padding: 8px;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
}

	</style>

</head>
<body>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

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



</body>
</html>