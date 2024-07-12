<?php

session_start();
// de ahora en adelante cada vez que se vaya a utilizar una conexión apuntamos a este codigo
include_once '../config/conexion.php';


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
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mi Perfil</title>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/perfil.css">

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

  <?php

  if (isset($_SESSION['id_usuario'])) {
    $id_usuario_ingresado = $_SESSION['id_usuario'];

    // Consulta para obtener datos de la tabla "usuarios"
    $query_usuario = "SELECT * FROM usuarios WHERE usuario_id = $id_usuario_ingresado";
    $execute_usuario = mysqli_query($conn, $query_usuario) or die(mysqli_error($conn));

    // obtengo los datos del usuario que ingresó
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
        echo "Lo siento no hay ninguna imagén";
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
        <div class="row">
          <!-- Columna para la imagen de perfil -->
          <div class="col-md-4">
            <div class="contenimg">
              <img class="profile-image" src="<?php echo htmlspecialchars($imgPerfil); ?>" alt="Imagen perfil">
              <span id="boton-editar" class="boton-editar">Editar foto</span>
              <div id="profile-actions" class="profile-actions" style="display: none;">
                <!-- Formulario para subir la imagen -->
                <form action="procesar_subida_imagen.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="imagenPerfil">
                  <input class="cambiar" type="submit" value="Cambiar imagen">
                </form>
              </div>
            </div>
          </div>

          <!-- Columna para el formulario de edición -->
          <div class="col-md-8">
            <form action="funciones/editarPerfil.php" method="POST" id="formularioNuevo">
              <input type="hidden" name="id_usuario_ingresado" value="<?php echo $id_usuario_ingresado ?>">

              <!-- Nombre y Apellido en la misma línea -->
              <div class="mb-3 row">
                <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombreUsuario; ?>">
                </div>
                <label for="apellido" class="col-sm-3 col-form-label">Apellido</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $apellidoUsuario; ?>">
                </div>
              </div>

              <!-- cedula y correo igual -->

              <div class="mb-3 row">
                <label for="cedula" class="col-sm-3 col-form-label">Cédula</label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" id="cedula" name="cedula" value="<?php echo $identificacionUsuario; ?>">
                </div>
                <label for="correo" class="col-sm-3 col-form-label">Correo</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="correo" name="correo" value="<?php echo $correoUsuario; ?>">
                </div>
              </div>

              <!-- celular y pais juntos -->
              <div class="mb-3 row">
                <label for="celular" class="col-sm-3 col-form-label">Celular</label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" id="celular" name="celular" value="<?php echo $telUsuario; ?>">
                </div>
                <label for="pais" class="col-sm-3 col-form-label">País</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="pais" name="pais" value="<?php echo $paisUsuario; ?>">
                </div>
              </div>

              <!--  ciudad y descripcion juntos -->
              <div class="mb-3 row">
                <label for="ciudad" class="col-sm-3 col-form-label">Ciudad</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo $ciudadUsuario; ?>">
                </div>
                <label for="descripcion" class="col-sm-3 col-form-label">Descripción</label>
                <div class="col-sm-3">
                  <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>">
                </div>
              </div>

              <!--  contraseñas juntas -->

              <div class="mb-3 row">
                <label for="cambiarContrasena" class="col-sm-3 col-form-label">Nueva contraseña:</label>
                <div class="col-sm-3">
                  <input type="password" class="form-control" id="cambiarContrasena" name="cambiarContrasena" value="<?php echo $contraseña_us; ?>">
                </div>
                <label for="confirmarContrasena" class="col-sm-3 col-form-label">Confirmar nueva contraseña:</label>
                <div class="col-sm-3">
                  <input type="password" class="form-control" id="confirmarContrasena" name="confirmarContrasena" value="<?php echo $confirmarNuevaContrasena; ?>">
                </div>
              </div>

              <div class="mb-3 row">
                <div class="col-sm-12 text-center">
                  <button type="submit" class="btn btn-success" id="btnEditarPerfilNuevo">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </form>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <!-- Scripts de Bootstrap y dependencias -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <!-- scripts general -->
  <script src="../js/perfilGeneral.js"></script>

</body>

</html>