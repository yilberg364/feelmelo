<?php
include_once 'config/conexion.php';
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
  <!-- Estilos de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

  <!-- Íconos de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <style>
    /* Importación de fuente desde Google Fonts */
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap');

    /* Estilos base para el formulario de búsqueda */
    #search {
      display: flex;
      gap: 20px;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }

    #buscar {
      width: 250px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .btn {
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      background-color: #333;
      color: #fff;
      cursor: pointer;
      outline: none;
    }

    /* Estilos para los ítems del navbar */
    .navbar-nav .nav-item:not(:last-child) {
      margin-right: 50px;
    }

    /* Estilos para el navbar */
    .navbar {
      display: flex;
      justify-content: flex-start;
      border-bottom: 1px solid #d9d0d0;
      width: 100%;
      /* Ajusta esto según qué tan ancho desees que sea el navbar */
      margin: 0 auto;
      /* Esto centrará el navbar en la página */
      border-bottom: 1px solid #d9d0d0;
    }

    /* Estilos base para resetear algunos estilos por defecto de los navegadores */
    body,
    h1,
    h2,
    h3,
    p {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      /* Ajustable según preferencias */
    }

    /* Estilo del contenedor principal */
    .container {
      max-width: 1200px;
      /* Ancho máximo del contenedor */
      margin: 0 auto;
      /* Centra el contenedor horizontalmente */
      padding: 20px;
      /* Relleno alrededor del contenido */
      background-color: #ffffff;
      /* Color de fondo del contenedor */
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      /* Sombra suave alrededor del contenedor */
      display: flex;
      /* Usamos Flexbox para el diseño */
      flex-direction: column;
      /* Asegura que los elementos fluyan verticalmente */
      align-items: center;
      /* Centra los elementos hijos horizontalmente */
    }

    /* Estilo de texto "explore" */
    @font-face {
      font-family: 'Retrochips';
      src: url('CSS/font/Retrochips.otf') format('truetype');
    }

    @font-face {
      font-family: 'Romania';
      src: url('CSS/font/Romania.otf') format('truetype');
    }

    #explore-text {
      font-size: 40px;
      color: #1E88E5;
      font-family: 'Retrochips', sans-serif;
      text-shadow: 2px 1px 2px #333;
      font-weight: 800;
      border-bottom: 2px solid #e0e0e0;
      padding: 8px;
      margin: 0 auto;
      /* Centrar horizontalmente */
      text-align: center;
      /* Centrar texto */
      text-transform: uppercase;
      letter-spacing: 1.5px;
      max-width: 95%;
      /* Evitar que el texto toque los bordes */
    }

    /* letras repoonsive carru */
    .h2_de_carru {
      font-family: 'Romania', sans-serif;
      text-shadow: 0.1em 0.1em 0.05em #333;
      text-align: center;
      width: 100%;
      overflow-wrap: break-word;
      font-size: clamp(1.8em, 3.5vw, 1.9em);
      margin: 0;
      /* Remove margin to ensure it fits well within its container */
      background-color: rgba(0, 0, 0, 0.1);
      padding: 10px;
      box-sizing: border-box;
      /* Ensures padding is included in the width/height */
    }

    .carousel-caption {
      display: flex;
      /* Use flex to center content both vertically and horizontally */
      align-items: center;
      /* Vertical centering */
      justify-content: center;
      /* Horizontal centering */
      width: 400px;
      height: 100px;
      margin: auto;
      overflow: hidden;
      /* In case the content somehow still overflows, hide it */
    }

    .h6_de_mierda {
      color: white;
    }


    /* Estilos para el carrusel de imágenes 2 */
    #carru {
      display: flex;
      justify-content: center;
    }

    /* Estilos para el carrusel grande-----------------*/
    .carousel-item {
      height: 650px;
      width: 1170px;
    }

    /* ---------------------------------------- */
    /* Aumentar el tamaño de las tarjetas */
    .card {
      max-width: 1600px;
      /* Ajusta según lo necesites */
    }


    /* Asumiendo que el contenedor del carrusel ya tiene "position: relative;" */
    .owl-carousel {
      position: relative;
      overflow: visible;
      /* Asegurarse de que los elementos que sobresalen sean visibles */
    }

    .owl-carousel .item img {
      position: relative;
      width: 200px;
      max-height: 250px;
      /* Ajusta según lo necesites */
      object-fit: cover;
      height: 200px;

    }

    /* Estilos para el carrusel 2 mini-------------------k------- */
    /* estilos ta,bien de deplazamiento barra */
    .card-body {
      min-height: 100px;
      max-height: 200px;
      overflow-y: auto;
    }

    /* Estilos para la barra de desplazamiento */
    .card-body::-webkit-scrollbar {
      width: 3px;
      /* Ancho de la barra vertical de desplazamiento */
    }

    .card-body::-webkit-scrollbar-track {
      background: #f1f1f1;
      /* Color de fondo de la pista/barra */
    }

    .card-body::-webkit-scrollbar-thumb {
      background: #888;
      /* Color de la barra de desplazamiento */
    }

    .card-body::-webkit-scrollbar-thumb:hover {
      background: #555;
      /* Color de la barra de desplazamiento cuando se pasa el mouse por encima */
    }

    /* ------------------------------------- */

    /* Establecer el ancho del contenedor del carousel */
    #dynamic-carousel {
      max-width: 1170px;
      /* Ajusta según lo necesites */
      margin: 0 auto;
      /* Centrar el carousel */
    }

    /* responsive carrusel mm --------------------------------- */


    /* estilos para la letra la informacion de las cartas */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    .card-body {
      font-family: 'Poppins', sans-serif;
      padding: 10px;
      line-height: 1.6;
      color: #333;
      background-color: #f8f9fa;
      /* Un fondo suave */
      border-radius: 10px;
      /* Bordes suavemente redondeados */
      /* borde blanco cartas */
      border: 5px solid white;
      /* Borde blanco alrededor de la tarjeta */
      box-shadow: 0 14px 25px rgba(0, 0, 0, 0.2);
      /* Sombra sutil para darle profundidad y destacar el borde */
    }

    .card-title {
      font-size: 23px;
      margin-bottom: 5px;
      font-weight: 600;
      color: #2C3E50;
      /* Un azul oscuro para el título */
    }

    .card-text {
      font-size: 18px;
      margin-bottom: 20px;
    }

    .card-text h6 {
      margin: 7px 0;
      font-weight: 500;
      font-size: 18px;
      color: #7f8c8d;
      /* Un color gris azulado */
    }

    .card-text strong {
      font-weight: 600;
      margin-right: 10px;
      color: #e74c3c;
      /* Un rojo moderado para las etiquetas */
    }

    /* Si decides usar íconos */

    /* ----------------------------------m------ */
    /* diseño de las flechas 2 carrusel--------------- */
    /* diseño de las flechas del carrusel */
    .owl-prev,
    .owl-next {
      width: 50px;
      height: 50px;
      background-color: rgba(255, 255, 255, 0.8);
      /* Fondo blanco con 80% de opacidad */
      border: 1px solid #000;
      /* Borde delgado y negro */
      display: flex;
      /* Centrará el ícono en el botón */
      align-items: center;
      /* Centrado vertical */
      justify-content: center;
      /* Centrado horizontal */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Sombra suave */
      transition: all 0.3s ease;
      /* Transición suave */
      position: absolute;
      /* Posición absoluta */
      top: 50%;
      /* Centrado vertical */
      transform: translateY(-50%);
      /* Ajuste para un centrado vertical perfecto */
      z-index: 10;
      /* Asegurarse de que las flechas estén por encima de otros elementos */
    }

    .owl-prev {
      left: -45px;
      /* Mueve la flecha hacia afuera en el lado izquierdo */
    }

    .owl-next {
      right: -45px;
      /* Mueve la flecha hacia afuera en el lado derecho */
    }

    /* Ajustamos el tamaño del ícono (flecha) */
    .owl-prev i,
    .owl-next i {
      font-size: 2.5em;
    }

    /* Efecto de hover para las flechas */
    .owl-prev:hover,
    .owl-next:hover {
      background-color: rgba(255, 255, 255, 0.9);
      /* Fondo más opaco en hover */
      border-color: #333;
      /* Borde ligeramente más claro en hover */
    }

    .owl-prev:active,
    .owl-next:active {
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      /* Sombra más corta cuando se presiona el botón */
    }

    /* Cambio de color en hover para los íconos */
    .owl-prev:hover i,
    .owl-next:hover i {
      color: #555;
      /* Un gris oscuro para el hover del ícono */
    }


    /* -------------------------------------------------- */
  </style>

</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

  <div class="container">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" id="fell">
          <img src="img/fell3.jpg" alt="" height="80" width="185">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          </ul>
          </ul>

          <form role="search" id="search">
            <input type="search" id="buscar" name="buscar" placeholder="Buscar..." aria-label="Search">
            <button type="submit" class="btn">Buscar</button>
          </form>

          <!-- INGRESOS -->
          <div class="navbar-nav">
            <?php
            if (isset($_SESSION['id_usuario']) && !isset($_SESSION['es_admin'])) {
            ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-fill"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="usuario/perfil.php">Mi perfil</a></li>
                  <li><a class="dropdown-item" href="validacion/salir.php">Cerrar sesión</a></li>
                </ul>
              </li>
            <?php } elseif (isset($_SESSION['es_admin'])) { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-fill"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="ADMIN/perfil_ad.php">Mi perfil de admin</a></li>
                  <li><a class="dropdown-item" href="validacion/salir.php">Cerrar sesión de admin</a></li>
                </ul>
              </li>
            <?php } elseif (isset($_SESSION['id_anfitrion'])) { ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-fill"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="ANFITRION/perfil_anf.php">Mi perfil de anfitrión</a></li>
                  <li><a class="dropdown-item" href="validacion/salir.php">Cerrar sesión</a></li>
                </ul>
              </li>
            <?php } ?>

            <!-- solo un LOG IN -->
            <?php if (!isset($_SESSION['es_admin']) && !isset($_SESSION['id_usuario'])) { ?>
              <a href="index.php" class="btn btn-lg active" role="button" aria-pressed="true" id="registrar" data-bs-toggle="modal" data-bs-target="#login" style="background-color: #1E88E5;">
                <h6 class="h6_de_mierda">
                  <n>LOG IN</n>
                </h6>
              </a>
            <?php } ?>

            <!--  -->
          </div>

        </div>
      </div>
    </nav>
    <!-- fin navbar ---------------------------------------->
    <br>
    <!-- explora------------------------------------------------- -->
    <p2 id="explore-text">Explora!</p2>
    <br>
    <!-- ------------------------------------------------------------ -->
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
            <img src="img/Paisaje palomino.webp" class="d-block w-100" alt="Paisaje Palomino">
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
            <h1 class="modal-title fs-5" id="exampleModalLabel">Iniciar sesión como viajero</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="formulario">
              <h2></h2>
              <form action="validacion/valog.php" method="post">
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
      <div class="modal-dialog">
        <div class="modal-content" style="background-color: rgb(174,197,242); border:rgb(174,197,242);">
          <div class="modal-header" style="background-color: rgb(174,197,242); border:rgb(174,197,242);">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Registrarse como viajero</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body ">
            <form method="POST" action="validacion/registrarusuario.php" id="formulario">

              <div class=" mb-3">
                <label class="text-dark">Nombre</label>
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

              <div class="modal-footer">
                <a class="btn btn-secondary" href="#" data-bs-toggle="modal" data-bs-target="#login" style="background-color:  white; color: black; border: black;">LOG IN</a>
                <button type="submit" class="btn btn-primary" style="background-color: black; ">NEXT</button>
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
              <form method="POST" action="validacion/registrarAnfitrion.php" id="formularioAnfitrion">
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
              <form action="validacion/valoganfitrion.php" method="post">
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
    <!-- fin carrusel---------------------------------------------- -->
    <p2 id="explore-text">Imagenes recientes</p2>
    <br>
    <!-- Estilos de Owl Carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- jQuery (requerido para que funcione Owl Carousel) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Script de Owl Carousel -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <?php
    require_once('conexion.php');

    $query = "SELECT * FROM lugares ORDER BY lugar_id DESC";
    $execute = mysqli_query($conn, $query) or die(mysqli_error($conn));
    ?>

    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="owl-carousel owl-theme mi-carousel" id="dynamic-carousel">
          <?php
          while ($fila = mysqli_fetch_array($execute)) {
          ?>
            <div class="item">
              <div class="card">
                <img class="card-img-top" src="<?php echo $fila['foto_url']; ?>" alt="Imagen de <?php echo $fila['nombre_lugar']; ?>">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $fila['nombre_lugar']; ?></h5>
                  <p class="card-text">
                  <h6>
                    <strong>Pais:</strong> <?php echo $fila['pais'] ?><br />
                    <strong>Ciudad:</strong> <?php echo $fila['ciudad'] ?><br />
                    <strong>Ubicación:</strong> <?php echo $fila['ubicación'] ?><br />
                    <strong>Descripción:</strong> <?php echo $fila['descripción'] ?><br />
                    <strong>Categoría:</strong> <?php echo $fila['categoría'] ?><br />
                  </h6>
                  </p>
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



    <script>
      $(document).ready(function() {
        $("#dynamic-carousel").owlCarousel({
          loop: true, // Para que se repita infinitamente
          margin: 10, // Margen entre elementos
          nav: true, // Muestra las flechas de navegación
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 4
          } // Siempre muestra 4 imágenes a la vez
        });
      });
    </script>
    <!-- fin---------------div -->
  </div>






</body>