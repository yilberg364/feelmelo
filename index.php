<?php
include "./VALIDACION/conexion.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FEEL MELO</title>
  <link rel="stylesheet" href="CSS/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="css/index.css">



  <!-- 1. owl carousel Min.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css " integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- 2. owl carousel teheme Min.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


 

</head>

<body>
  <!-- navbar -->
  <div class="container">

  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
      <a class="navbar-brand" href="#" id="fell" >
      <img src="img/fell3.jpg" alt="" height="80" width="185">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
          <li class="nav-item dropdown" >
                  <!-- <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Poblacion
                  </a>
                  <ul class="dropdown-menu"  > -->
                      <!-- <li><a class="dropdown-item" href="./LUGAR/mostrar.php">Ver Lugares</a></li>
                      <li><a class="dropdown-item" href="ESTRELLAS1/estrellas.html">Añadir Imagen</a></li> -->
                      <!-- <li><hr class="dropdown-divider" style="color:rgb(163, 194, 255); border:rgb(163, 194, 255);"></li>
                      <li><a class="dropdown-item" href="LUGAR/lugar.html">Agrega un lugar</a></li> -->
                  </ul>
              </li>
          </ul>
        </ul>
        
        <form  role="search" id="search" style="display: flex; justify-content: center; align-items: center; gap: 10px; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
            <input type="search" id="buscar" name="buscar" placeholder="Buscar..." aria-label="Search" style="width: 70%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; outline: none;">
              <button type="submit" class="btn" style="padding: 10px 20px; border: none; outline: none; border-radius: 5px; background-color: #333; color: #fff; cursor: pointer;">
                Buscar
              </button>
          </form>
          <!-- INGRESOS -->
        <div class="navbar-nav">
        <?php
if (isset($_SESSION['id_usuario']) && !isset($_SESSION['es_admin'])) {
    ?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="bi bi-person-fill"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="USUARIO/perfil.php">Mi perfil</a></li>
            <li><a class="dropdown-item" href="VALIDACION/salir.php">Cerrar sesión</a></li>
        </ul>
    </li>
<?php } elseif (isset($_SESSION['es_admin'])) { ?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="bi bi-person-fill"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="ADMIN/perfil_ad.php">Mi perfil de admin</a></li>
            <li><a class="dropdown-item" href="VALIDACION/salir.php">Cerrar sesión de admin</a></li>
        </ul>
    </li>
<?php } elseif (isset($_SESSION['id_anfitrion'])) { ?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="bi bi-person-fill"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="ANFITRION/perfil_anf.php">Mi perfil de anfitrión</a></li>
            <li><a class="dropdown-item" href="VALIDACION/salir.php">Cerrar sesión</a></li>
        </ul>
    </li>
<?php } ?>

<!-- solo un LOG IN -->
<?php if (!isset($_SESSION['es_admin']) && !isset($_SESSION['id_usuario'])) { ?>
            <a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="registrar" data-bs-toggle="modal" data-bs-target="#login" style="background-color: rgb(105, 155, 255); border:rgb(174,197,242);">
              <h6><n>LOG IN</n></h6>
            </a>
          <?php } ?>


<!-- DOS INGRESOS -->
<!-- Botón principal de LOGIN -->
<!-- <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#loginModal" style="background-color: rgb(174,197,242); border:rgb(174,197,242);">
  LOGIN
</button> -->

<!-- Ventana modal para los botones secundarios -->
<!-- <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content" style="background-color: rgb(174,197,242);">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel" >Elige el tipo de inicio de sesión</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <br>
      <br>
      <br>
      <br>
          <div class="modal-body d-flex justify-content-around">
      <a class="btn btn-primary btn-lg" href="index.php" data-bs-toggle="modal" data-bs-target="#login" style="background-color: white;color:black; border:rgb(174,197,242);">
        <h6><n>SOY VIAJERO</n></h6>
      </a>
      <a class="btn btn-primary btn-lg" href="index.php" data-bs-toggle="modal" data-bs-target="#loginAnfitrion" style="background-color: black; border:rgb(174,197,242);">
        <h6><n>SOY ANFITRION</n></h6>
      </a>
    </div>

    </div>
  </div>
</div> -->

<!--  -->
        </div>

      </div>
    </div>
  </nav>
  <!-- fin navbar -->
  <br>
  <p2 id="explore-text">EXPLORA!</p2>
<br>
<br>
<!-- carrusel -->
<div class="carrusel" id="carru">
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/carrusel playa.jpg" class="d-block w-100" alt="Playa Turística de Colombia">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="h2_de_carru">Playa Turística de Colombia</h2>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/paisaje palomino.webp" class="d-block w-100" alt="Paisaje Palomino">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="h2_de_carru">Paisaje Palomino</h2>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/madrid carrusel.jpeg" class="d-block w-100" alt="Madrid">
        <div class="carousel-caption d-none d-md-block">
          <h2 class="h2_de_carru">Madrid</h2>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>
<br>
<br>

<!-- Lo mas popular------------------------------- -->

<!-- loginss -->
<!-- ------------------------LOGIN USUARIO----------- -->

<div class="modal fade" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: rgb(174,197,242); border:rgb(174,197,242);">
        <div class="modal-header" style="background-color: rgb(174,197,242); border:rgb(174,197,242);">
          <h1 class="modal-title fs-5" id="exampleModalLabel" >Iniciar sesión como viajero</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="formulario">
            <h2></h2>
            <form action="VALIDACION/valLog.php" method="post">
              <label for="usuario">Identificacion:</label>
              <input type="number" id="usuario" name="identificacion" required class="form-control" id="exampleFormControlInput1" placeholder="Digita la identificacion">
              <label for="contrasena">Contraseña:</label>
              <input type="password" id="contrasena" name="contrasena" required class="form-control" id="exampleFormControlInput1" placeholder="Escribe el contraseña">


          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalRegistrar" style="background-color: black;">REGISTER</button>
          <button type="submit" class="btn btn-primary" style="background-color:  white; color: black; border: black;">LOG IN</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ----------------------------------------REGISTRAR USUARIO------------------------------------------------------ -->
<!--   
  <form method="POST" action="./USUARIO/perfil.php" > -->
  
  <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrarLabel" aria-hidden="true">
    <div class="modal-dialog" >
      <div class="modal-content" style="background-color: rgb(174,197,242); border:rgb(174,197,242);">
        <div class="modal-header" style="background-color: rgb(174,197,242); border:rgb(174,197,242);">
          <h1 class="modal-title fs-5" id="exampleModalLabel" >Registrarse como viajero</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body " >
          <form method="POST" action="VALIDACION/registrarUsuario.php" id="formulario">

            <div class=" mb-3" >
              <label class="text-dark" >Nombre</label>
              <input id="nombre" type="text" name="nombre_us" placeholder="Nombre" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label class="text-dark ">Apellido</label>
              <input id="tel" type="text" name="apellido" placeholder="Apellidos" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label class="text-dark ">Pais</label>
              <input id="pais" type="text" name="pais" placeholder="País" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label class="text-dark ">Ciudad</label>
              <input id="ciudad" type="text" name="ciudad" placeholder="Ciudad" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label class="text-dark ">Identificación</label>
              <input id="iden" type="number" name="identificacion_us" placeholder="Numero de Identificación" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label class="text-dark ">Correo</label>
              <input id="iden" type="email" name="correo" placeholder="Correo Electronico" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label class="text-dark ">Celular</label>
              <input id="correo" type="number" name="celular" placeholder="Celular" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label class="text-dark ">Contraseña</label>
              <input type="password" name="contraseña_us" placeholder="Contraseña" class="form-control" required="">
              <span id="message"></span>
            </div>
            <div class="mb-3">
              <label class="text-dark ">descripcion</label>
              <input type="text" name="descripcion" placeholder="descripcion" class="form-control" required="">
              <span id="message"></span>
            </div>



            <div class="modal-footer">
              <a class="btn btn-secondary" href="#" data-bs-toggle="modal" data-bs-target="#login" style="background-color:  white; color: black; border: black;" >LOG IN</a>
              <button type="submit" class="btn btn-primary"style="background-color: black; border:;" >NEXT</button>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>


  </form>

    

    <!-- REGISTRAR ANFITRION -->
    <div class="modal fade" id="modalRegistrarAnfitrion" tabindex="-1" aria-labelledby="modalRegistrarAnfitrionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: rgb(174,197,242); border:rgb(174,197,242);">
      <div class="modal-header" style="background-color: rgb(174,197,242); border:rgb(174,197,242);">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrarse como anfitrión</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="formulario">
          <h2></h2>
          <form method="POST" action="VALIDACION/registrarAnfitrion.php" id="formularioAnfitrion">
            <div class="mb-3">
              <label class="text-dark">Nombre</label>
              <input id="nombreAnfitrion" type="text" name="nombre_anf" placeholder="Nombre" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label class="text-dark">Apellido</label>
              <input id="apellidoAnfitrion" type="text" name="apellido_anf" placeholder="Apellidos" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label class="text-dark ">Pais</label>
              <input id="pais_anf" type="text" name="pais_anf" placeholder="País" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label class="text-dark ">Ciudad</label>
              <input id="ciudad_anf" type="text" name="ciudad_anf" placeholder="Ciudad" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label class="text-dark">Identificación</label>
              <input id="identificacionAnfitrion" type="number" name="identificacion_anf" placeholder="Numero de Identificación" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label class="text-dark">Correo</label>
              <input id="correoAnfitrion" type="email" name="correo_anf" placeholder="Correo Electronico" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label class="text-dark">Celular</label>
              <input id="celularAnfitrion" type="number" name="celular_anf" placeholder="Celular" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label class="text-dark">Contraseña</label>
              <input type="password" name="contraseña_anf" placeholder="Contraseña" class="form-control" required="">
              <span id="message"></span>
            </div>

            <div class="modal-footer">
              <a class="btn btn-secondary" href="#" data-bs-toggle="modal" data-bs-target="#loginAnfitrion" style="background-color: white; color: black; border: black;">LOG IN</a>
              <button type="submit" class="btn btn-primary" style="background-color: black;">NEXT</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- LOGIN ANFITRION -->
<div class="modal fade" id="loginAnfitrion" tabindex="-1" aria-labelledby="loginAnfitrionLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="background-color: rgb(174,197,242); border:rgb(174,197,242);">
      <div class="modal-header" style="background-color: rgb(174,197,242); border:rgb(174,197,242);">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Iniciar sesión como anfitrión</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="formulario">
          <h2></h2>
          <form action="VALIDACION/valLogAnfitrion.php" method="post">
            <label for="usuarioAnfitrion">Identificacion:</label>
            <input type="number" id="usuarioAnfitrion" name="identificacion_anf" required class="form-control" id="exampleFormControlInput1" placeholder="Digita la identificacion">
            <label for="contrasenaAnfitrion">Contraseña:</label>
            <input type="password" id="contrasenaAnfitrion" name="contraseña_anf" required class="form-control" id="exampleFormControlInput1" placeholder="Escribe el contraseña">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalRegistrarAnfitrion" style="background-color: black;">REGISTER</button>
        <button type="submit" class="btn btn-primary" style="background-color: white; color: black; border: black;">LOG IN</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- fin logins -->

    <!-- imagenes recientes  3 carousel slider-->
    <p2 id="explore-text">Imagenes recientes</p2>
    
    <?php
require_once('conexion.php');

$query = "SELECT * FROM lugares ORDER BY lugar_id DESC";
$execute = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10" style="flex: 0 0 87.5%; max-width: 87.5%;">
      <div class="owl-carousel owl-theme mi-carousel" id="dynamic-carousel">
        <?php
        while($fila = mysqli_fetch_array($execute)) {
          ?>
          <div class="item">
            <div class="card">
              <img class="card-img-top" src="<?php echo $fila['foto_url']; ?>" alt="Imagen de <?php echo $fila['nombre_lugar']; ?>">
              <div class="card-body">
                <h5 class="card-title"><?php echo $fila['nombre_lugar']; ?></h5>
                <p class="card-text">
                  <h6>
                  <strong>Pais:</strong> <?php echo $fila['pais'] ?><br/>
                  <strong>Ciudad:</strong> <?php echo $fila['ciudad'] ?><br/>
                  <strong>Ubicación:</strong> <?php echo $fila['ubicacion'] ?><br/>
                  <strong>Descripción:</strong> <?php echo $fila['descripcion'] ?><br/>
                  <strong>Categoría:</strong> <?php echo $fila['categoria'] ?><br/>
                  </h6>               
                </p>
            
<!-- Sección oculta para calificar y comentar -->
<form class="calificacion" action="calificaciones.php" method="post" enctype="multipart/form-data" required>
<div id="ratingSection_<?php echo $fila['lugar_id']; ?>" class="rating-section"  style="display:none;" required>
<!-- <div class="starability-fade" required > -->
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
    </div>
  </div>
</div>

<!-- Scripts y funciones de inicialización -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
$(document).ready(function(){
  $("#dynamic-carousel").owlCarousel({
    items: 1,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    nav: true,
    navText: ["<div class='nav-btn prev-slide'></div>", "<div class='nav-btn next-slide'></div>"],
    responsive:{
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
  });
  
  // Aquí puedes agregar tus funciones JavaScript adicionales si las tienes
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
});
</script>
<script>
// Funciones de mostrar/calificar
// ...
</script>


<!-- Inicialización de Owl Carousel 2 -->
<script>
$(document).ready(function(){
  $("#second-carousel").owlCarousel({
    items: 1,
    loop: true,
    margin: 10,
    autoplay: true,
    autoplayTimeout: 2000,
    autoplayHoverPause: true,
    nav: true,
    navText: ["<div class='nav-btn prev-slide'></div>", "<div class='nav-btn next-slide'></div>"],
    responsive:{
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
  });
});

</script>





<!-- --------------------------------------------------------------------------- -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!-- 0. Juquery cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- 1. owl carousel Min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Init Owl carousel -->
<script>
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
<!--calificacion estrellas--------------------------------------------------  -->
<script type="text/javascript">(function(d, t, e, m){
    
  // Async Rating-Widget initialization.
  window.RW_Async_Init = function(){
              
      RW.init({
          huid: "492785",
          uid: "bb6f518f4787188c9f788439102e18ee",
          source: "website",
          options: {
              "advanced": {
                  "layout": {
                      "align": {
                          "hor": "center",
                          "ver": "top"
                      }
                  },
                  "font": {
                      "hover": {
                          "color": "#906461"
                      },
                      "italic": true,
                      "color": "#906461",
                      "type": "arial"
                  }
              },
              "size": "medium",
              "label": {
                  "background": "#FFEDA4"
              },
              "lng": "es",
              "style": "oxygen",
              "isDummy": false
          } 
      });
      RW.render();
  };
      // Append Rating-Widget JavaScript library.
  var rw, s = d.getElementsByTagName(e)[0], id = "rw-js",
      l = d.location, ck = "Y" + t.getFullYear() + 
      "M" + t.getMonth() + "D" + t.getDate(), p = l.protocol,
      f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
      a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
  if (d.getElementById(id)) return;              
  rw = d.createElement(e);
  rw.id = id; rw.async = true; rw.type = "text/javascript";
  rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
  s.parentNode.insertBefore(rw, s);
  }(document, new Date(), "script", "rating-widget.com/"));
</script>
<!-- ----------------------------------------------------------------- -->
<br>

<footer>
    <div class="footer-content">
      <div class="footer-section about">
        <h2>Sobre Nosotros</h2>
        <p>
          Somos una red social innovadora que conecta 
          a personas de todo el mundo.
        </p>
      </div>

      <div class="footer-section links">
        <h2>Enlaces Rápidos</h2>
        <ul>
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Sobre nosotros</a></li>
          <li><a href="#">Contacto</a></li>
          <li><a href="#">Blog</a></li>
        </ul>
        <div class="footer-icons">
  <a href="https://www.whatsapp.com" target="_blank" rel="noopener noreferrer" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
  <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer" title="Facebook"><i class="fab fa-facebook-f"></i></a>
  <a href="https://www.twitter.com" target="_blank" rel="noopener noreferrer" title="Twitter"><i class="fab fa-twitter"></i></a>
</div>
      </div>

      <div class="footer-section contact-form">
        <h2>Contacta con nosotros</h2>
        <form>
          <input type="email" name="email" placeholder="Tu Email" required>
          <textarea rows="4" placeholder="Mensaje"></textarea>
          <button type="submit">Enviar</button>
        </form>
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; 2023 Feel Melo. Todos los derechos reservados.</p>
    </div>
  </footer>




</body>

</html>