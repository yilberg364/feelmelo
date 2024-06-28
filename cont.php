<?php

include_once 'config/conexion.php';

// Define la función para obtener el promedio de calificaciones
//function getAverageRating($conn, $lugar_id) {
//  $query = "SELECT AVG(calificacion) AS average FROM calificaciones WHERE lug_id = ?";
//$stmt = $conn->prepare($query);
//  $stmt->bind_param('i', $lugar_id);
//$stmt->execute();
//$result = $stmt->get_result();

// if ($result && $result->num_rows > 0) {
// $average = $result->fetch_assoc()['average'];
//   return round($average, 1);
//}

// return 0; // No se encontraron calificaciones
//}
function getCalificaciones($conn, $lugar_id)
{
    $query = "SELECT usuario, calificacion, comentario FROM calificaciones WHERE lug_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $lugar_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $calificaciones = array();
    while ($row = $result->fetch_assoc()) {
        $calificaciones[] = $row;
    }

    return $calificaciones;
}

?>

<?php
// Define la función para obtener el promedio de calificaciones
function getAverageRating($conn, $lugar_id)
{
    $query = "SELECT AVG(calificacion) AS average FROM calificaciones WHERE lug_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $lugar_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $average = $result->fetch_assoc()['average'];
        return round($average, 1);
    }

    return 0; // No se encontraron calificaciones
}

// Función para mostrar las estrellas
function displayRatingStars($average_rating)
{
    $fullStars = floor($average_rating);
    $halfStar = ($average_rating - $fullStars) >= 0.5;

    $output = '';

    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $fullStars) {
            $output .= '<i class="fas fa-star"></i>'; // Icono de estrella completa
        } elseif ($i == $fullStars + 1 && $halfStar) {
            $output .= '<i class="fas fa-star-half-alt"></i>'; // Icono de media estrella
        } else {
            $output .= '<i class="far fa-star"></i>'; // Icono de estrella vacía
        }
    }

    return $output;
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Bienvenido</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> -->
    <link rel="stylesheet" href="css/cont.css">
    <link href="https://fonts.googleapis.com/css2?family=Megrim&display=swap" rel="stylesheet">





</head>

<body>

    <div class="prueba">
        <div class="col-sm-3">
            <div class="container border ">
                <!-- inicio de menu -->
                <div class="links" id="menu">
                    <a href="cont.php">
                        <img src="img/meloes.png" alt="Dashboard" style="width: 220px; height:90px">
                    </a>

                    <div class="grupos col">
                        <a class="text-primary" href="galeriaI.php"> Publicaciones</a>
                    </div>
                    <div class="inicio col">
                        <a class="text-primary" href="cont.php"> Inicio</a>
                    </div>
                    <div class="mensajes col">
                        <a class="text-primary" href="mensajes.php"> Mensajes</a>
                    </div>
                    <div class="ayuda col">
                        <a class="text-primary" href="LUGAR/zzz.php">Subir imagen</a>
                    </div>
                    <div class="configuracion col">
                        <a class="text-primary" href="configuracion.php"> Configuracion y privacidad</a>
                    </div>
                    <div class="ayuda col">
                        <a class="text-primary" href="ayuda.php"> Ayuda y soporte</a>
                    </div>
                    <div class="perfil col">
                        <a class="text-primary" href="USUARIO/perfil.php"> Perfil</a>
                    </div>


                </div>

                <!-- ----------------------------------------------- -->

            </div>
        </div>

        <!--     IMAGEN DEL PERFIL QUE SE MUESTRA EN LA PRIMERA PAGINA  DE FEELMELO
 -->
        <div class="container__img__perfil" id="perfil">
            <!-- 3 informacion--------------------PERFIL------------------------ -->

            <div class="profile-image">
                <img src="img/carrusel playa.jpg" alt="Profile Image">
            </div>

            <?php
            /* ESTAS LINEAS DEL CODIGO TIENEN EL FIN DE MOSTRAR EL NOMBRE DEL USUARIO EN EL CONT.PHP */
            /*   $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "u197522469_feelmelo";

                $conn = new mysqli($servername, $username, $password, $dbname); ?>
        <h1 class="text-capitalize fs-2 text"> Hola, <?php ['nombre_usuario']; ?></h1> */
            /*  FIN DE NOMBRE DE USUARIO */
            ?>
            <div>
                <a href="USUARIO/perfil.php" class="editar__perfil">Editar perfil</a>
            </div>
        </div>
    </div>


    <!-- pusse un comentario para probar -->




    <div class="row">
        <div class="col-sm-3 ">

        </div>
        <!--2 contenedor ---------------------------------  -->
        <div class="col-md-5">
            <div class="containere-border">
            

                <!--  ubibacion o buscador pais ciudad,..........---- -->
                <div id="search-box">
                    <i class='bx bxs-location-plus'></i>
                    <input type="text" id="search-input" placeholder="Puedes bucar por: Categoria, Pais, Palabra Clave">
                </div>
                <!-- -----------------------------inicio---------------------t---------------------- -->


                <div class="opinion-container">
                    <label for="opinion">
                        <p class="estilo_opinion">Tú opinión sobre:</p>
                    </label>
                    

                        
					<div class="input-group">
						<label for="pais">Pais</label>
						<input type="text" name="pais" id="pais" required>
					</div><br>

                    <div class="input-group">
						<label for="ubicacion">Ubicacion: </label>
						<input type="text" name="ubicacion" id="ubicacion" required>
					</div><br>

                    <div class="input-group">
						<label for="descripcion">descripcion:</label>
						<input type="text" name="descripcion" id="descripcion" required>
					</div>

                    <div class="input-group">
					
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
					</div><br>

                    <div class="input-group">
						<label for="imagen">Imagen:</label>
						<input type="file" name="imagen" id="imagen" class="form-control-file" required>
					</div>



                    <br><br>
                    <div class="rating">
                        <input type="radio" name="stars" id="star1" value="1"><label for="star1">★</label>
                        <input type="radio" name="stars" id="star2" value="2"><label for="star2">★</label>
                        <input type="radio" name="stars" id="star3" value="3"><label for="star3">★</label>
                        <input type="radio" name="stars" id="star4" value="4"><label for="star4">★</label>
                        <input type="radio" name="stars" id="star5" value="5"><label for="star5">★</label>

                    </div>


                    

                    <script>
                        function mostrarTipoFoto(input) {
                            var tipo = input.files[0].type;
                            document.getElementById('tipo_foto').innerText = 'Tipo de archivo seleccionado: ' + tipo;
                        }
                    </script>



                    <section class="contact-form">
                        <form action="cont.php" method="post">
                            <input type="submit" value="publicar" class="publicar">
                        </form>
                        </section>
                        <?php
                       

                        ?>
                </div>
                
              


                <!-- publicar cont comentario principal -->
                <script>
                    const fileInput = document.getElementById("file");
                    const fileLabel = document.querySelector(".file-label");

                    fileInput.addEventListener("change", function() {
                        if (this.files && this.files.length) {
                            const fileName = this.files[0].name;
                            fileLabel.textContent = "Archivo seleccionado: " + fileName;
                        }
                    });

                    // Aquí deberías agregar el código para enviar la información al servidor (backend)
                    document.querySelector('.submit-btn').addEventListener('click', function() {
                        // Lógica para enviar información a la base de datos.
                        alert("boton presionado")
                    });
                </script>
                <!-- ---------------------------t--------------------------------...------- -->
                <script>
                    // Aquí tendrías que implementar la lógica para buscar en tu base de datos.
                    // Como es un ejemplo, sólo mostraré un alerta con el valor ingresado.
                    document.getElementById('search-input').addEventListener('keyup', function(event) {
                        if (event.key === 'Enter') {
                            alert('buscar: ' + this.value);
                            // Aquí es donde conectas con tu base de datos y obtienes resultados de acuerdo a 'this.value'
                        }

                    });
                </script>
                <!-- ------------------------essss---------------------------------ddd -->
                <?php
                require_once('conexion.php');
                // JOIN PARA BUSCAR EL NOMBRE_US DEACUERDO AL USER_ID DE LUGARES, LUEGO DEACUERDO AL NUMERO EN LA TABLA USUARIOS CON EL USUARIO_ID ME BUSQUE EL NOMBRE DE LA PERSONA ...
                $query = "SELECT lugares.*, usuarios.nombre_us 
                        FROM lugares 
                        LEFT JOIN usuarios ON lugares.user_id = usuarios.usuario_id 
                        ORDER BY lugares.lugar_id DESC";
                $execute = mysqli_query($conn, $query) or die(mysqli_error($conn));

                while ($fila = mysqli_fetch_array($execute)) {
                ?>

                    <div class="card-body">
                        <!-- Sección de calificación con estrellas -->
                        <div style="display: flex; justify-content: space-between; ">
                            <h5 class="card-title" style="margin-right: auto;margin-left:-23px;">
                                <?php echo $fila['nombre_lugar']; ?>
                            </h5>
                            <div class="u">
                                <?php
                                $lugar_id = $fila['lugar_id'];
                                $average_rating = getAverageRating($conn, $lugar_id); // Obtener el promedio
                                echo '<span class="star">' . displayRatingStars($average_rating) . '</span>'; // Mostrar las estrellas
                                ?>
                            </div>
                        </div>

                        <p class="card-text">
                            <p31>
                                <?php echo $fila['nombre_us']; ?>
                            </p31><br>
                            <p30>
                                <?php echo $fila['fecha_creacion'] ?>
                            </p30><br />
                            <span class="description-text">
                                <?php echo $fila['descripcion'] ?>
                            </span><br />
                        </p>

                        <img class="card-img-top" src="<?php echo $fila['foto_url']; ?>" alt="Imagen de <?php echo $fila['nombre_lugar']; ?>">
                        <br>

                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

                        <br>
                        <!-- Botón para calificar la imagen -->
                        <button class="calificar" data-lugar-id="<?php echo $fila['lugar_id']; ?>">Calificar imagen</button>
                        <br>
                        <!-- ver detalles -->
                        <button class="btn btn-primary" onclick="openModal(
                '<?php echo $fila['nombre_lugar']; ?>',
                '<?php echo $fila['descripcion']; ?>',
                '<?php echo $fila['foto_url']; ?>',
                '<?php echo $fila['lugar_id']; ?>'
            )">Ver Comentarios</button>

                        <!-- Sección oculta para calificar y comentar -->
                        <form class="calificacion" action="calificaciones.php" method="post" enctype="multipart/form-data" required>
                            <div id="ratingSection_<?php echo $fila['lugar_id']; ?>" class="rating-section" style="display:none;" required>
                                <div class="starability-fade" required>

                                    <!-- Campo oculto para el lugar_id -->
                                    <input type="hidden" name="lugar_id" value="<?php echo $fila['lugar_id']; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $fila['user_id']; ?>">

                                    <div class="rating-container">
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
                                    </div>

                                    <!-- Campo de carga de imágenes -->
                                    <div class="imagen">
                                        <label for="imagen">Imagen:</label>
                                        <input type="file" name="imagen" id="imagen" class="form-control-file image-upload-input">
                                    </div><br>

                                    <textarea required name="comentario" id="comentario<?php echo $fila['lugar_id']; ?>" class="comentario" placeholder="Escribe tu comentario aquí..."></textarea>
                                    <button type="submit" class="btn btn-success" onclick="return validateForm()">Enviar Calificación
                                    </button>

                                </div>
                            </div>
                        </form>

                    </div>

                <?php
                }
                ?>
            </div>

            <!-- -------------------------------------------------------------------- -->
        </div>
        <!-- ----------------------JS CERRA O ABRIR EL MODAL CON LA X------------------ -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                // 1. Displaying the Rating Section
                function showRatingSection(id) {
                    document.getElementById('ratingSection_' + id).style.display = 'block';
                }
                window.showRatingSection = showRatingSection; // Expose the function to the global scope to be accessed by inline onclick

                // 2. Setting the Rating
                var ratings = {}; // to store ratings by lugar_id
                function setRating(id, value) {
                    ratings[id] = value;
                }
                window.setRating = setRating; // Expose the function to the global scope to be accessed by inline onclick

                // 3. Submitting the Data
            })

            // Función para cerrar el modal
            function closeModal() {
                document.getElementById('modal').style.display = 'none';
            }
        </script>
        <!-- HTML DEL MODAL -------------------------------------------------------------------- -->

        <div class="search-results" id="searchResults">
            <!-- Aquí se mostrarán los resultados de búsqueda -->
        </div>
        <!-- Modal para mostrar detalles de la tarjeta -->
        <?php
        require_once('conexion.php');

        $query = "SELECT * FROM calificaciones ORDER BY id_calificacion DESC ";
        $execute = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $query = "SELECT*FROM usuarios";
        ?>

        <!-- Parte del código para mostrar detalles de la tarjeta -->
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <div class="expanded-content">
                    <div class="expanded-image">
                        <img class="modal-image" src="" alt="Imagen de detalle">
                    </div>
                    <div class="expanded-info">
                        <div class="info-header">
                            <h3 id="modalLugarNombre"></h3>
                        </div>
                        <div class="info-details">
                            <p id="modalLugarDescripcion"></p>
                            <!-- Otros detalles si los necesitas -->
                        </div>
                    </div>
                    <!-- Aquí se mostrarán las calificaciones del lugar -->
                    <div class="calificaciones-container">
                        <?php
                        while ($fila = mysqli_fetch_array($execute)) {
                        ?>

                            <div class="card">
                                <img class="card-img-top" src="<?php echo $fila['foto_url']; ?> ">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $fila['user_id']; ?>
                                    </h5>
                                    <p class="card-text">
                                        <strong>Calificación:</strong>
                                        <?php echo $fila['calificacion'] ?><br />
                                        <strong>Comentario:</strong>
                                        <?php echo $fila['comentario'] ?><br />

                                    </p>

                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>



        <script>
            // Función para abrir el modal con detalles de la tarjeta
            function openModal(nombre, descripcion, imagenUrl, lugar_id) {
                // Mostrar el modal
                const modal = document.getElementById('modal');
                modal.style.display = 'block';

                // Actualizar el contenido detallado del modal
                document.querySelector('.expanded-image img').src = imagenUrl;
                document.querySelector('#modalLugarNombre').textContent = nombre;
                document.querySelector('#modalLugarDescripcion').textContent = descripcion;

                // Consultar la base de datos para obtener las calificaciones del lugar
                fetch('obtener_calificaciones.php?lugar_id=' + lugar_id)
                    .then(response => response.json())
                    .then(data => {
                        const calificacionesContainer = document.querySelector('.calificaciones-container');
                        calificacionesContainer.innerHTML = ''; // Limpiar el contenedor de calificaciones

                        // Iterar a través de las calificaciones y mostrarlas en el modal
                        data.forEach(calificacion => {
                            const calificacionElement = document.createElement('div');
                            calificacionElement.className = 'calificacion';
                            calificacionElement.innerHTML = `
                        <div class="calificacion-header">
                            <img src="${imagenUrl}" alt="Imagen del lugar" style="width:100px;" >
                            <div>
                                <p><strong>Usuario:</strong> ${calificacion.usuario}</p>
                                <p><strong>Calificación:</strong> ${calificacion.calificacion}</p>
                            </div>
                        </div>
                        <p><strong>Comentario:</strong> ${calificacion.comentario}</p>`;

                            calificacionesContainer.appendChild(calificacionElement);
                        });

                        // Mostrar el modal después de cargar las calificaciones
                        modal.style.display = 'block';
                    })
                    .catch(error => {
                        console.error('Error al obtener las calificaciones:', error);
                    });
            }
        </script>

        <!-- ---------------------------------------------------------------------------- -->
        <script>
            $(document).ready(function() {
                $('.calificar').on('click', function(e) {
                    e.preventDefault(); // Evita comportamientos por defecto
                    var lugar_id = $(this).data('lugar-id');

                    // Despliega el formulario de calificación y esconde el botón
                    $('#ratingSection_' + lugar_id).slideDown();
                    $(this).hide();
                });
            });
        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Selecciona todos los contenedores de calificación
                const ratingSections = document.querySelectorAll('.rating-section');

                ratingSections.forEach(section => {
                    // Selecciona todas las entradas de estrellas dentro del contenedor actual
                    const stars = section.querySelectorAll('.rating input[type="radio"]');

                    stars.forEach(star => {
                        star.addEventListener('change', function() {
                            // Lógica cuando se selecciona una estrella. 
                            // Por ejemplo, puedes hacer algo específico aquí si lo necesitas.
                            // Debido a que estamos en el contexto del evento de la estrella actual,
                            // sólo esta estrella y sus hermanas en el mismo contenedor serán afectadas.
                        });
                    });
                });
            });
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>