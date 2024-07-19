<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Red Social</title>
    <link rel="stylesheet" href="CSS/indeUsu.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>



    </style>
</head>

<body>
    <?php
    require_once('conexion.php'); // Asegúrate de incluir la conexión a la base de datos

    if (isset($_GET['q'])) {
        $query = $_GET['q'];
        $search_query = mysqli_real_escape_string($conn, $query);

        $search_sql = "SELECT * FROM lugares WHERE nombre_lugar LIKE '%$search_query%' OR pais LIKE '%$search_query%'";
        $search_result = mysqli_query($conn, $search_sql) or die(mysqli_error($conn));
    }
    ?>

    <!-- Mostrar resultados de búsqueda -->
    <div class="search-results">
        <?php
        if (isset($search_result)) {
            while ($fila = mysqli_fetch_array($search_result)) {
                // Aquí puedes mostrar los resultados de búsqueda como lo haces con las tarjetas
        ?>
                <div class="card">
                    <img class="card-img-top" src="<?php echo $fila['foto_url']; ?>" alt="Imagen de <?php echo $fila['nombre_lugar']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $fila['nombre_lugar']; ?></h5>
                        <p class="card-text">
                            <strong>Pais:</strong> <?php echo $fila['pais'] ?><br />
                            <strong>Ciudad:</strong> <?php echo $fila['ciudad'] ?><br />
                            <strong>Ubicación:</strong> <?php echo $fila['ubicacion'] ?><br />
                            <strong>Descripción:</strong> <?php echo $fila['descripcion'] ?><br />
                            <strong>Categoría:</strong> <?php echo $fila['categoria'] ?><br />
                            <strong>Usuario ID:</strong> <?php echo $fila['user_id'] ?>
                        </p>
                        <!-- Botón para calificar la imagen -->
                        <button type="submit" class="btn btn-primary" onclick="showRatingSection('<?php echo $fila['lugar_id']; ?>')">Calificar esta imagen</button>

                        <!-- Sección oculta para calificar y comentar -->
                        <form class="calificacion" action="calificaciones.php" method="post" enctype="multipart/form-data" required>
                            <div id="ratingSection_<?php echo $fila['lugar_id']; ?>" class="rating-section" style="display:none;" required>
                                <div class="starability-fade" required>
                                    <!--  -->

                                    <!-- Campo oculto para el lugar_id -->
                                    <input type="hidden" name="lugar_id" value="<?php echo $fila['lugar_id']; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $fila['user_id']; ?>">

                                    <input type="radio" id="rate5_<?php echo $fila['lugar_id']; ?>" name="calificacion" value="5" class="input-no-display" onclick="setRating('<?php echo $fila['lugar_id']; ?>', this.value)">
                                    <label for="rate5_<?php echo $fila['lugar_id']; ?>">&#9734</label>

                                    <input type="radio" id="rate4_<?php echo $fila['lugar_id']; ?>" name="calificacion" value="4" class="input-no-display" onclick="setRating('<?php echo $fila['lugar_id']; ?>', this.value)">
                                    <label for="rate4_<?php echo $fila['lugar_id']; ?>">&#9734</label>

                                    <input type="radio" id="rate3_<?php echo $fila['lugar_id']; ?>" name="calificacion" value="3" class="input-no-display" onclick="setRating('<?php echo $fila['lugar_id']; ?>', this.value)">
                                    <label for="rate3_<?php echo $fila['lugar_id']; ?>">&#9734</label>

                                    <input type="radio" id="rate2_<?php echo $fila['lugar_id']; ?>" name="calificacion" value="2" class="input-no-display" onclick="setRating('<?php echo $fila['lugar_id']; ?>', this.value)">
                                    <label for="rate2_<?php echo $fila['lugar_id']; ?>">&#9734</label>

                                    <input required type="radio" id="rate1_<?php echo $fila['lugar_id']; ?>" name="calificacion" value="1" class="input-no-display" onclick="setRating('<?php echo $fila['lugar_id']; ?>', this.value)">
                                    <label for="rate1_<?php echo $fila['lugar_id']; ?>">&#9734</label>

                                    <textarea required name="comentario" id="comentario<?php echo $fila['lugar_id']; ?>" class="comentario" placeholder="Escribe tu comentario aquí..."></textarea>
                                    <button type="submit" class="btn btn-success" onclick="return validateForm()">Enviar Calificación</button>


                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            <?php
            }
            ?>
    </div>
<?php
        }

?>


</body>

</html>