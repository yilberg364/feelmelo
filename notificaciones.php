<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="css/cont.css">

<style>
/* Estilo de la ventana contenedora de notificaciones */
.notificaciones-lista {
    position: absolute;
    z-index: 1000;
    background-color: #fff;
    border: 1px solid #e6e6e6;
    padding: 10px;
    width: 400px; /* Ajusté el ancho a 400px como en tu primer bloque */
    top: 1px; /* Ajusta la posición vertical */
    right: 15px; /* Ajusta la posición horizontal */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    max-height: 710px; /* Ajusté la altura máxima a 610px como en tu primer bloque */
    overflow-y: scroll; /* Esto permitirá desplazarse si las notificaciones exceden la altura máxima */
    left: 348px;
    height: 500px;
}

/* Estilo de cada notificación individual */
.notificacion {
    display: flex;
    align-items: center;
    padding: 8px 0;
    border-bottom: 1px solid #e6e6e6;
}

.avatar img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.mensaje strong {
    color: #000;
}

.mensaje {
    flex-grow: 1;
}



/* ------------------------------ */

</style>

</head>
<body>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

<div class="row">
    <div class="col-sm-3">
        <div class="container border">
            <!-- inicio de menu -->
        <div class="links" id="menu">
        <h2 class="dashboard-title">
            <img src="img/fellcortewhite.jpg" alt="Dashboard">
        </h2>
        <div class="grupos">
            <a href="galeriaI.php"><i class='bx bx-compass'></i> Explorar</a>
        </div>
        <div class="inicio">
            <a href="cont.php"><i class='bx bxs-home' ></i> Inicio</a>
        </div>
        <div class="mensajes">
            <a href="mensajes.php"><i class='bx bx-message-dots' ></i> Mensajes</a>
        </div>
        <!-- notificaciones------------------------ -->
        <div class="notificaciones">
    <a href="javascript:void(0);" onclick="toggleNotificaciones()">
        <i class='bx bx-bell'></i> Notificaciones
    </a>
</div>
<!-- ------------------- -->

        <div class="ayuda">
            <a href="LUGAR/zzz.php"><i class='bx bx-image-add'></i>Subir Imagen</a>
        </div>
        <div class="configuracion">
            <a href="configuracion.php"><i class='bx bx-cog' ></i> Configuracion y privacidad</a>
        </div>
        <div class="ayuda">
            <a href="ayuda.php"><i class='bx bx-help-circle' ></i> Ayuda y soporte</a>
        </div>
        <div class="perfil">
            <a href="USUARIO/perfil.php"><i class='bx bx-user-circle' ></i> Perfil</a>
        </div>

        
    </div>
        
        <!-- ----------------------------------------------- -->

        </div>
    </div>
    <!--2 contenedor ---------------------------------  -->
    <div class="col-md-5">
    <div class="containere border">
         
        <?php
            require_once('conexion.php');

            $query = "SELECT * FROM lugares ORDER BY lugar_id DESC";
            $execute = mysqli_query($conn, $query) or die(mysqli_error($conn));
        ?>

        <?php
            while($fila = mysqli_fetch_array($execute)) {
        ?>

    <div class="card">
        <img class="card-img-top" src="<?php echo $fila['foto_url']; ?>" alt="Imagen de <?php echo $fila['nombre_lugar']; ?>">

        <div class="card-body">
            <h5 class="card-title"><?php echo $fila['nombre_lugar']; ?></h5>
            <p class="card-text">
                <strong>Pais:</strong> <?php echo $fila['pais'] ?><br/>
                <strong>Ciudad:</strong> <?php echo $fila['ciudad'] ?><br/>
                <strong>Ubicación:</strong> <?php echo $fila['ubicacion'] ?><br/>
                <strong>Descripción:</strong> <?php echo $fila['descripcion'] ?><br/>
                <strong>Categoría:</strong> <?php echo $fila['categoria'] ?><br/>
                <strong>Usuario ID:</strong> <?php echo $fila['user_id'] ?>
            </p>

            
            <!-- Botón para calificar la imagen -->
            <button type="submit" class="btn btn-primary" onclick="showRatingSection('<?php echo $fila['lugar_id']; ?>')">Calificar esta imagen</button>

            <!-- Sección oculta para calificar y comentar -->
            <form class="calificacion" action="calificaciones.php" method="post" enctype="multipart/form-data" required>
    <div id="ratingSection_<?php echo $fila['lugar_id']; ?>" class="rating-section"  style="display:none;" required>
        <div class="starability-fade" required >

            <!-- Campo oculto para el lugar_id -->
            <input type="hidden" name="lugar_id" value="<?php echo $fila['lugar_id']; ?>">
            

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

<div class="notificaciones-lista" style="display: none;">
    <div class="notificacion">
        <div class="avatar">
            <img src="img/perfil9.jpg" alt="User Avatar">
        </div>
        <div class="mensaje">
            <strong>Andres</strong> ha comenzado a seguirte.
            
        </div>
    </div>
    
    <div class="notificacion">
        <div class="avatar">
            <img src="img/perfil6.jpg" alt="User Avatar">
        </div>
        <div class="mensaje">
            <strong>Melisa</strong> ha comenzado a seguirte.
        </div>
    </div>

    <div class="notificacion">
        <div class="avatar">
            <img src="img/perfil7.jpg" alt="User Avatar">
        </div>
        <div class="mensaje">
            <strong>Pedro</strong> ha comenzado a seguirte.
        </div>
    </div>
    
    <div class="notificacion">
        <div class="avatar">
            <img src="img/perfil2.webp" alt="User Avatar">
        </div>
        <div class="mensaje">
            <strong>Daniela</strong> ha comenzado a seguirte.
        </div>
    </div>

    <div class="notificacion">
        <div class="avatar">
            <img src="img/perfil1.webp" alt="User Avatar">
        </div>
        <div class="mensaje">
            <strong>Antonella</strong> ha comenzado a seguirte.
        </div>
    </div>

    <div class="notificacion">
        <div class="avatar">
            <img src="img/img4.jpg" alt="User Avatar">
        </div>
        <div class="mensaje">
            <strong>Betty</strong> ha comenzado a seguirte.
        </div>
    </div>

    <div class="notificacion">
        <div class="avatar">
            <img src="img/i1.jpg" alt="User Avatar">
        </div>
        <div class="mensaje">
            <strong>Arturo</strong> ha comenzado a seguirte.
        </div>
    </div>

    <div class="notificacion">
        <div class="avatar">
            <img src="img/Reluciente.jpg" alt="User Avatar">
        </div>
        <div class="mensaje">
            <strong>Tatiana</strong> ha comenzado a seguirte.
        </div>
    </div>
    
    <!-- Agregar más notificaciones aquí en el futuro -->
</div>


            
        </div>
    <!-- -------------------------------------------------------------------- -->
    <div class="col-lg-4">
    <div class="containers border">
        <!-- 3 informacion----------------------------------------------------- -->
        
        <div class="profile-card">
            <div class="profile-image">
                <img src="img/perfil7.jpg" alt="Profile Image">
            </div>
            <div class="profile-details">
                <div class="profile-title">Andrea343</div>
          
            </div>
        </div>
<br>

        <div class="profile-description"><h6>Sugerencias para ti</h6></div>
        
        <div class="profile-card">
            <div class="profile-image">
                <img src="img/i1.jpg" alt="Profile Image">
            </div>
            <div class="profile-details">
                <div class="profile-title">Andres mendez</div>
                <div class="profile-description">Sugerencia para ti</div>
            </div>
        </div>

        <div class="profile-card">
            <div class="profile-image">
                <img src="img/img6.png" alt="Profile Image">
            </div>
            <div class="profile-details">
                <div class="profile-title">Chefs</div>
                <div class="profile-description">Nuevo en Fell Melo</div>
            </div>
        </div>

        <div class="profile-card">
            <div class="profile-image">
                <img src="img/img8.jpg" alt="Profile Image">
            </div>
            <div class="profile-details">
                <div class="profile-title">Picadas</div>
                <div class="profile-description">Nuevo en Fell melo</div>
            </div>
        </div>

        <div class="profile-card">
            <div class="profile-image">
                <img src="img/i3.avif" alt="Profile Image">
            </div>
            <div class="profile-details">
                <div class="profile-title">Tatiana Rojas</div>
                <div class="profile-description">Sugerencia Para Ti</div>
            </div>
        </div>

        <div class="profile-card">
            <div class="profile-image">
                <img src="img/i2.jpg" alt="Profile Image">
            </div>
            <div class="profile-details">
                <div class="profile-title">Miguel Fonseca </div>
                <div class="profile-description">Sugerencia Para Ti</div>
            </div>
        </div>
        <br>
        <!-- grupos -->
        <div class="profile-description"><h6>Grupos</h6></div>
        
    </div>
</div>

    <!-- ------------------------------------------------------------------------------ -->
</div>

<!-- calificar y comentar -->
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

</script>
<!-- notificaciones-------------- -->
<script>
function toggleNotificaciones() {
    const listaNotificaciones = document.querySelector('.notificaciones-lista');
    
    // Si no tiene un estilo de 'display' definido o si está en 'none', lo mostramos.
    if (!listaNotificaciones.style.display || listaNotificaciones.style.display === 'none') {
        listaNotificaciones.style.display = 'block';
        
        // Esto esperará un poco para garantizar que el div esté visible y luego desplazará hacia abajo.
        setTimeout(() => {
            listaNotificaciones.scrollTop = listaNotificaciones.scrollHeight;
        }, 10); // Un pequeño retraso, 10 milisegundos, es suficiente.
    } else {
        listaNotificaciones.style.display = 'none';
    }
}

</script>

</body>
</html>