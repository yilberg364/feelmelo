<?php
// Iniciar sesión (asegúrate de haber llamado a session_start() al comienzo del archivo)
session_start();
include_once 'conexion.php';

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

/* ../USUARIO/imagenes/perfil.css */
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mi Perfil</title>
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/perfil.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"> -->
  <style>
    .pp {
      text-align: center;
      font-size: 107px;
      font-family: 'Goffik', sans-serif !important;
      color: #4881FA;
      height: 120px;
    }
  </style>
</head>

<body>

  <!-- navbar -->

  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="../cont.php" id="fell">
        <img src="../img/LOGOAZULOSCURO.png" alt="" height="80" width="180">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">

          </li>
          <!-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Poblacion
                  </a>
                  <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="../LUGAR/mostrar.php">Ver Lugares</a></li>
                      <li><a class="dropdown-item" href="../ESTRELLAS1/estrellas.html">Añadir Imagen</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="../LUGAR/lugar.html">Agrega un lugar</a></li>
                  </ul>
              </li> -->
        </ul>
        </ul>

        <form class="d-flex mx-auto">
          <input class="form-control " type="search" placeholder=" palabra clave" aria-label="Search">
          <input class="form-control me-2" type="search" placeholder="categoría" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>

        <div class="navbar-nav">
          <?php
          if (isset($_SESSION['id_usuario']) && !isset($_SESSION['es_admin'])) {
          ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="../VALIDACION/salir.php">Cerrar sesión</a></li>
              </ul>
            </li>
          <?php } elseif (isset($_SESSION['es_admin'])) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="ADMIN/perfil_ad.php">Mi perfil de admin</a></li>
                <li><a class="dropdown-item" href="../VALIDACION/salir.php">Cerrar sesión de admin</a></li>
              </ul>
            </li>



          <?php } ?>
          <?php if (!isset($_SESSION['es_admin']) && !isset($_SESSION['id_usuario'])) { ?>
            <a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="registrar" data-bs-toggle="modal" data-bs-target="#login">
              <h6>INICIAR SESION</h6>
            </a>
          <?php } ?>

        </div>
      </div>
    </div>
  </nav>
  <!-- fin navbar -->
  <!-- perfil -->
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="categnavbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
      /*--------------- arreglo frontend perfil-------------------------- */
      /* --------------NAVBAR---------------------------------------- */
      .container-fluid {
        background-color: white;
        height: 90px;
      }

      .navbar-expand-lg .navbar-nav .nav-link {
        padding-right: 1.5rem;
        padding-left: 6.5rem;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 28px;
        color: #1763E4;
      }


      /* titulo de viajero o anfitrion--- */
      @font-face {
        font-family: 'Goffik';
        src: url('../CSS/font/Goffik-O.ttf') format('truetype');
      }

      .about-text h3 {
        font-size: 45px;
        font-weight: 700;
        margin: 0 0 6px;
        font-size: 50px;
        font-family: 'Goffik', sans-serif !important;
        color: #1763E4;
      }

      .about-list {
        padding-top: 10px;
      }

      .about-list label {
        color: #1763E4;
        font-weight: 600;
        width: 88px;
        margin: 0;
        position: relative;
      }


      /* Agrega estilos de diseño personalizados aquí */
      .profile-section {
        padding: 30px;
        background-color: #f5f5f5;
      }

      .profile-picture {
        text-align: center;
      }

      .profile-picture input[type="file"] {
        display: none;
      }

      .profile-picture input[type="submit"] {
        background-color: #007BFF;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
      }

      .profile-picture img {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
      }

      .profile-name {
        font-size: 24px;
        font-weight: bold;
        margin-top: 0;
      }

      .profile-location,
      .profile-contact {
        font-size: 16px;
        margin: 5px 0;
      }

      .profile-location i,
      .profile-contact i {
        margin-right: 5px;
      }

      /* ---------------------t------------------------------------------------------------- */

      body {
        color: #6F8BA4;
        margin-top: 10px;
      }

      .section {
        padding: 100px 0;
        position: relative;
      }

      .gray-bg {
        background-color: #f5f5f5;
      }

      img {
        max-width: 100%;
      }

      img {
        vertical-align: middle;
        border-style: none;
      }

      @media (max-width: 767px) {
        .about-text h3 {
          font-size: 35px;
        }
      }

      .about-text h6 {
        font-weight: 600;
        margin-bottom: 15px;
      }

      @media (max-width: 767px) {
        .about-text h6 {
          font-size: 18px;
        }
      }

      .about-text p {
        font-size: 18px;
        max-width: 450px;
      }

      .about-text p mark {
        font-weight: 600;
        color: #20247b;
      }

      .about-list {
        padding-top: 10px;
      }

      .about-list .media {
        padding: 5px 0;
      }

      .about-list label:after {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        right: 11px;
        width: 1px;
        height: 12px;
        background: #20247b;
        -moz-transform: rotate(15deg);
        -o-transform: rotate(15deg);
        -ms-transform: rotate(15deg);
        -webkit-transform: rotate(15deg);
        transform: rotate(15deg);
        margin: auto;
        opacity: 0.5;
      }

      .about-list p {
        margin: 0;
        font-size: 15px;
      }

      @media (max-width: 991px) {
        .about-avatar {
          margin-top: 30px;
        }
      }

      .about-section .counter {
        padding: 22px 20px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
      }

      .about-section .counter .count-data {
        margin-top: 10px;
        margin-bottom: 10px;
      }

      .about-section .counter .count {
        font-weight: 700;
        color: #20247b;
        margin: 0 0 5px;
      }

      .about-section .counter p {
        font-weight: 600;
        margin: 0;
      }

      mark {
        background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
        background-size: 100% 3px;
        background-repeat: no-repeat;
        background-position: 0 bottom;
        background-color: transparent;
        padding: 0;
        color: currentColor;
      }

      .theme-color {
        color: #fc5356;
      }

      /* Estilo de fondo para el formulario */
      /* Estilo del contenedor del perfil */
      .container {
        padding: 10px;
        max-width: 80%;
      }

      /* Estilo para el botón de "Subir imagen" */
      input[type="submit"] {
        background-color: #007BFF;
        color: #fff;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
      }

      /* Estilo para los labels y la información del usuario */
      label {
        font-weight: bold;
      }

      /* Estilo para los títulos y textos principales */
      @font-face {
        font-family: 'SuperRavenPersonalUse';
        src: url('../CSS/font/SuperRavenPersonalUse.ttf') format('truetype');
      }

      .theme-color {
        color: #007BFF;
        margin-bottom: 30px;
        font-family: 'SuperRavenPersonalUse', sans-serif !important;
        font-size: 24px;
        text-transform: capitalize;
      }

      /* Estilo para el contenedor del perfil */
      .profile-section {
        background-color: #f8f8f8;
        padding: 10px 0;
      }

      /* Estilo para el contenedor de detalles del perfil */
      .profile-details {
        padding: 10px;
        border-radius: 5px;
        width: 700px;
      }

      /* Estilo para el contenedor de acciones del perfil */
      .profile-actions {
        margin-top: 540px;
        position: absolute;
        width: 479px;
        border: 2px solid #FFE01E;
      }

      /* nuevo arreglo de perfil diseño melo */
      .contenimg {
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        /* Asegura que el texto esté centrado horizontalmente dentro del contenedor */
        width: 40%;
        height: 410px;
      }

      .col-lg-4 {
        max-width: 120%;
        /* Aumentar el valor para hacer la columna más ancha */
        display: flex;
        justify-content: start;
        height: 540px;
      }

      .col-md-6 {
        max-width: 20%;
      }

      .col-lg-8 {
        width: 41%;
        /* Aumentar el valor para hacer la columna más ancha */
        height: 40%;
        top: 5px;
        margin-left: -25px;
      }

      /* Estilo para la imagen de perfil */
      .profile-image {
        width: 400px;
        height: 400px;
        border: 3px solid #fff;
        border-radius: 50%;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        object-fit: fill;
        /* Ajusta según tus preferencias */
        object-position: center center;
        /* Ajusta según tus preferencias */
      }

      .profile-info {
        padding-left: 5px;
        height: 130px;
      }

      .dark-color {
        color: #1763E4;
        font-size: 60px;
        letter-spacing: 2px;
      }

      .row {
        width: 100%px;
      }

      .row1 {
        width: 1500px;
      }

      .pp {
        text-align: center;
        font-size: 107px;
        font-family: 'Goffik', sans-serif !important;
        color: #FFE01E;
        height: 120px;
      }

      @font-face {
        font-family: 'Goffik';
        src: url('CSS/font/Goffik-O.ttf') format('truetype');
      }

      h3 {
        text-align: center;
      }

      @font-face {
        font-family: 'Residual';
        src: url('../CSS/font/Residual.ttf') format('truetype');
      }

      h4 {
        font-family: 'Residual', sans-serif !important;
      }

      .soy {
        color: black;
      }

      .descripcion {
        font-size: 22px;
        font-family: 'Arial, Helvetica, sans-serif';
      }

      .boton-editar {
        position: absolute;
        margin-top: 440px;
        width: 100px;
        border: 2px solid #1763E4;
        border-radius: 5px;
        font-family: 'SuperRavenPersonalUse', sans-serif !important;
        color: #1763E4;
        font-size: 13px;
        margin-bottom: -50px;
      }

      .cor {
        font-size: 24px;
        color: #7f7f7f;
        font-family: fantasy;
      }

      .cambiar {
        font-family: 'SuperRavenPersonalUse', sans-serif !important;
        font-size: 16px;
      }

      .separador {
        border-bottom: 2px solid #1763E4;
        /* Cambia el grosor y el color según tus preferencias */
        width: 100%;
        background-color: #FFE01E;
      }

      /* DISEÑO DE LAS PUBLICACIONES PERFIL--------- */
      .fotos {
        background-color: black;
        margin-left: 2%;
        width: 50%;
        text-align: center;

      }

      /* CONTAIERN DE LAS PUBLICACIONES PERFIKL -------- */
      .form-control {
        display: block;
        width: 100%;
        height: calc(1.5em + 0.75rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.95rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
      }
    </style>
  </head>

  <body>
    <?php
    require_once('conexion.php');

    if (isset($_SESSION['id_usuario'])) {
      $id_usuario_ingresado = $_SESSION['id_usuario'];

      //consulta para obtener datos de la tabla lugares

      // Consulta para obtener datos de la tabla "usuarios"
      $query_usuario = "SELECT * FROM usuarios WHERE usuario_id = $id_usuario_ingresado";
      $execute_usuario = mysqli_query($conn, $query_usuario) or die(mysqli_error($conn));

      if (mysqli_num_rows($execute_usuario) > 0) {
        $fila_usuario = mysqli_fetch_array($execute_usuario);
        $nombreUsuario = $fila_usuario['nombre_us'];
        $apellidoUsuario = $fila_usuario['apellido'];
        $identificacionUsuario = $fila_usuario['identificacion_us'];
        $correoUsuario = $fila_usuario['correo'];
        $telUsuario = $fila_usuario['celular'];
        $paisUsuario = $fila_usuario['pais'];
        $ciudadUsuario = $fila_usuario['ciudad'];
        $corta = $fila_usuario['corta'];
        $descripcion = $fila_usuario['descripcion'];

        // Consulta para obtener la última imagen de la tabla "perfil"
        $query_perfil = "SELECT img_perfil FROM perfil WHERE usuario_id = $id_usuario_ingresado ORDER BY id_perfil DESC LIMIT 1";
        $execute_perfil = mysqli_query($conn, $query_perfil) or die(mysqli_error($conn));

        if (mysqli_num_rows($execute_perfil) > 0) {
          $fila_perfil = mysqli_fetch_array($execute_perfil);
          $imgPerfil = $fila_perfil['img_perfil'];

          // Ahora $imgPerfil contiene la ruta de la última imagen en la tabla "perfil"
          // Puedes utilizar $imgPerfil en tu código para mostrar la imagen
        } else {
          // Si no se encuentra la imagen en la base de datos, puedes manejar el error o proporcionar una imagen por defecto, por ejemplo:
          // $imgPerfil = 'imagenes/default.jpg';
        }

        // Resto del código...
      } else {
        // Si no se encuentra el usuario en la base de datos, maneja el error o redirige a otra página
        // Por ejemplo, puedes hacer:
        // header('Location: error.php');
        // exit();
      }
    } else {
      // Si no hay una sesión iniciada, maneja el error o redirige a otra página
      // Por ejemplo, puedes hacer:
      // header('Location: error.php');
      // exit();
    }
    ?>
    <form method="POST" action="cambiar_imagen.php" enctype="multipart/form-data">
      <section class="profile-section">
        <div class="container">
          <p class="perfil">Perfil</p>
          <div class="row1">
            <div class="col-lg-4">

              <div class="contenimg">
                <img class="profile-image" src="<?php echo htmlspecialchars($imgPerfil); ?>" alt="Imagen perfil">
                <span id="boton-editar" class="boton-editar">Editar foto</span>
                <button id="editarPerfil" class="editar-perfil" onclick="editarPerfil()" style="position: absolute; top:-30px;left: 260px;">Editar perfil</button>
                <div id="profile-actions" class="profile-actions" style="display: none;">

                  <!-- Formulario para subir la imagen -->
                  <form action="procesar_subida_imagen.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="imagenPerfil">
                    <input class="cambiar" type="submit" value="cambiar imagen">
                  </form>

                </div>
              </div>
              <script></script>
              <script>
                document.getElementById('boton-editar').addEventListener('click', function() {
                  document.getElementById('boton-editar').style.display = 'none';
                  document.getElementById('profile-actions').style.display = 'block';
                });
              </script>


              <div class="profile-info">
                <h3 class="theme-color lead">Viajero</h3>
                <form action="" method="post">
                  <label for="nombre" class="dark-color"><span class="soy">Nombre:</span></label>
                  <input type="text" name="nombre" value="<?php echo htmlspecialchars($id_usuario . ' ' . $apellidoUsuario); ?>">

                  

                  <input type="submit" name="F" value="Actualizar">
                </form>

                <div class="corperson">
                  <p class="cor"><?php echo $corta; ?></p>
                </div>
                <div class="col-lg-8">
                  <div class="profile-details">
                    <p class="descripcion"><?php echo $descripcion; ?></p>
                  </div>

                  <?php
                  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                   
                    $nombreUsuario = $fila_usuario['nombre_us'];
                  

                    

                   $sql = "UPDATE usuarios SET nombre_us = '$nombre_us' WHERE usuario_id = '$id_usuario' " ;
                  
                  
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("si", $nombre_us);
                  }
                  ?>



                  <script>
                    var descripcionElement = document.getElementById("descripcion");
                    var maxLength = 400; // Establece el límite de caracteres
                    var descripcionText = descripcionElement.textContent;

                    if (descripcionText.length > maxLength) {
                      descripcionElement.textContent = descripcionText.substring(0, maxLength) + "...";
                    }
                  </script>

                </div>
              </div>
            </div>

          </div>
      </section>
    </form>
    <div class="separador"></div>
    <!-- LAS PUBLICACIONES -->
    <div class="uuu">
      <p class="fotos">Fotos y videos del usuario</p>
    </div>



    <!-- Scripts de Bootstrap y dependencias -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- fin perfil -->
    <script>
      const fileInput = document.getElementById("fileInput");
      const uploadedImagesDiv = document.getElementById("uploaded-images");
      const uploadForm = document.getElementById("upload-form");

      uploadForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
          const imageSrc = e.target.result;
          const title = document.getElementById("imageTitle").value;
          const description = document.getElementById("imageDescription").value;

          displayImage(imageSrc, title, description);
        };

        reader.readAsDataURL(file);
      });

      function displayImage(src, title, description) {
        const imageCard = document.createElement("div");
        imageCard.classList.add("image-card");

        const image = document.createElement("img");
        image.src = src;
        image.alt = title;

        const imageTitle = document.createElement("h3");
        imageTitle.textContent = title;

        const imageDescription = document.createElement("p");
        imageDescription.textContent = description;

        imageCard.appendChild(image);
        imageCard.appendChild(imageTitle);
        imageCard.appendChild(imageDescription);
        uploadedImagesDiv.appendChild(imageCard);
      }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  </body>

  </html>