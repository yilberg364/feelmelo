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
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <!-- 1. owl carousel Min.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css " integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- 2. owl carousel teheme Min.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <style>
      @import url('https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap');

      *{
        font-family:Arial, Helvetica, sans-serif;
      }

      .item img {
        height: 280px;
      }

  /* carousel 3 ----------------------------------------------------*/
      .carta-img-top {
       height: 200px;
       object-fit: cover;
      }

      .items .carta {
       max-width: 350px;
      }
      /* flechas */
      .mi-carousel {
    position: relative;  /* Establece el contenedor del carrusel como referencia para las flechas */
}

.mi-carousel .owl-nav .owl-prev,
.mi-carousel .owl-nav .owl-prev,
.mi-carousel .owl-nav .owl-next {
    position: absolute;
    z-index: 200;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5); /* Color de fondo oscuro */
    color: white; /* Color de flecha */
    padding: 15px; /* Espacio alrededor de las flechas */
    border-radius: 50%; /* Hace las flechas circulares */
    font-size: 2rem; /* Tamaño de las flechas */
    width: 50px; /* Ancho del botón */
    height: 50px; /* Altura del botón */
    display: flex; /* Centrar el icono de flecha en el botón */
    justify-content: center; /* Centrar el icono de flecha horizontalmente */
    align-items: center; /* Centrar el icono de flecha verticalmente */
}

.mi-carousel .owl-nav .owl-prev {
    left: -25px;
}

.mi-carousel .owl-nav .owl-next {
    right: -25px;
}

.mi-carousel .owl-nav .owl-prev:hover,
.mi-carousel .owl-nav .owl-next:hover {
    background-color: rgba(0, 0, 0, 0.7); /* Cambia el color de fondo cuando se pasa el mouse sobre las flechas */
}

.mi-carousel .owl-nav .owl-prev::after,
.mi-carousel .owl-nav .owl-next::after {
    content: '';
    border-style: solid;
    border-color: white;
    border-width: 3px;
}

.mi-carousel .owl-nav .owl-prev::after {
    border-width: 0 3px 3px 0;
    transform: rotate(135deg);
    width: 10px;
    height: 10px;
}

.mi-carousel .owl-nav .owl-next::after {
    border-width: 3px 0 0 3px;
    transform: rotate(135deg);
    width: 10px;
    height: 10px;
}


.mi-carousel .owl-nav .owl-prev {
    left: -60px;  /* Ajusta este valor para mover la flecha hacia la izquierda */
}

.mi-carousel .owl-nav .owl-next {
    right: -60px;  /* Ajusta este valor para mover la flecha hacia la derecha */
}



      
    </style>

</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
      <a class="navbar-brand" href="#" id="fell" >
      <img src="img/fell3-removebg-preview.png" alt="" height="60" width="130">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="indexA.php" id="">INICIO</a>
          </li>
          <li class="nav-item dropdown" >
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Poblacion
                  </a>
                  <ul class="dropdown-menu"  >
                      <!-- <li><a class="dropdown-item" href="Vimagenes.html">Ver Imagenes</a></li>
                      <li><a class="dropdown-item" href="ESTRELLAS1/estrellas.html">Añadir Imagen</a></li>
                      <li><hr class="dropdown-divider" style="color:rgb(163, 194, 255); border:rgb(163, 194, 255);"></li> -->
                      <li><a class="dropdown-item" href="LUGAR/lugar.html">Agrega un lugar</a></li>
                  </ul>
              </li>
          </ul>
        </ul>
        <form role="search" id="search" style="display: flex; justify-content: center; align-items: center; gap: 10px; padding: 20px; border: 1px solid #ccc; border-radius: 10px;">
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
            <li><a class="dropdown-item" href="./VALIDACION/salir.php">Cerrar sesión</a></li>
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
            <li><a class="dropdown-item" href="./VALIDACION/salir.php">Cerrar sesión de admin</a></li>
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
            <li><a class="dropdown-item" href="./VALIDACION/salir.php">Cerrar sesión</a></li>
        </ul>
    </li>
<?php } ?>

<?php if (!isset($_SESSION['es_admin']) && !isset($_SESSION['id_usuario']) && !isset($_SESSION['id_anfitrion'])) { ?>
    <a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="registrar"
        data-bs-toggle="modal" data-bs-target="#login" style="background-color: rgb(174,197,242); border:rgb(174,197,242);">
        <h6><n>LOG IN VIAJERO</n></h6>
    </a>
    <a href="index.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" id="registrar"
        data-bs-toggle="modal" data-bs-target="#loginAnfitrion"
        style="background-color: rgb(174,197,242); border:rgb(174,197,242);">
        <h6><n>LOG IN ANFITRION</n></h6>
    </a>
<?php } ?>
        </div>

      </div>
    </div>
  </nav>
  <!-- fin navbar -->
  <br>
  <p2 id="explore-text">EXPLORA!!</p2>
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
        <img src="img/carrusel playa.jpg"  class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>  PLAYA TURISTICA DE COLOMBIA</h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/Paisaje palomino.webp" class="d-block w-100" alt="..." >
        <div class="carousel-caption d-none d-md-block">
          <h5>PAISAJE PALOMINO</h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/madrid carrusel.jpeg" class="d-block w-100" alt="..." >
        <div class="carousel-caption d-none d-md-block">
          <h5>MADRID</h5>
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
<!-- Carousel 2 mini -->

<section>
  <div class="fluido" id="mini">
  <div class="container-fluid my-5" ></div>
  <h1 class="text fw-bold display-3 mb-3 " style="font-size: 40px; margin-right: 500px;">Tus Diseños</h1>
  <div class="row mt-5">

    <div class="owl-carousel owl-theme">
      <div class="item mb-4">
        <div class="card border-0 shadow">
          <img src="img/img2.jpg" alt="image" class="card-img-top">
          <div class="card-body">
            <h4>Rusia</h4>
          </div>
        </div>
      </div>

      <!-- item ends  -->
      <div class="item mb-4">
        <div class="card border-0 shadow">
          <img src="img/img1.jpg" alt="image" class="card-img-top">
          <div class="card-body">
            <h4>Mares</h4>
          </div>
        </div>
      </div>

      <!-- 3 -->
      <div class="item mb-4">
        <div class="card border-0 shadow">
          <img src="img/img3.jpg" alt="image" class="card-img-top">
          <div class="card-body">
            <h4>Paisaje</h4>
          </div>
        </div>
      </div>

      <!-- 4 -->
      <div class="item mb-4">
        <div class="card border-0 shadow">
          <img src="img/img4.jpg" alt="image" class="card-img-top">
          <div class="card-body">
            <h4>Acampar</h4>
          </div>
        </div>
      </div>
      <!-- 5 -->
      <div class="item mb-4">
        <div class="card border-0 shadow">
          <img src="img/img5.jpg" alt="image" class="card-img-top">
          <div class="card-body">
            <h4>Atardecer </h4>
          </div>
        </div>
      </div>

      <!-- 6 -->
      <div class="item mb-4">
        <div class="card border-0 shadow">
          <img src="img/img6.png" alt="image" class="card-img-top">
          <div class="card-body">
            <h4>Platos Tipicos</h4>
          </div>
        </div>
      </div>
  
  </div>
  <div class="button2" style="position: relative; top: -50px; left: 90px; z-index: 10;">
    <a href="Vimagenes.html" id="boton2" style="display: inline-block; padding: 8px; background-color: #798292; color: #ffffff; text-decoration: none; text-align: center; border-radius: 8px;">Ver Mas</a>
</div>

  </div>
  </div>
</section>

    <!-- imagenes recientes  3 carousel slider-->
    <h1 class="text fw-bold display-3 mb-3 " style="font-size: 40px; margin-right: 500px; margin-left:202px;">Imagenes recientes</h1>

    <div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-10" style="flex: 0 0 87.5%; max-width: 87.5%;">
      <div class="owl-carousel owl-theme mi-carousel" id="second-carousel">
        <div class="item">
            <div class="card">
                <img class="card-img-top" src="img/img1.jpg" alt="Imagen 1">
                <div class="card-body">
                    <h5 class="card-title">Titulo de la imagen 1</h5>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card">
                <img class="card-img-top" src="img/img2.jpg" alt="Imagen 2">
                <div class="card-body">
                    <h5 class="card-title">Titulo de la imagen 2</h5>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card">
                <img class="card-img-top" src="img/img3.jpg" alt="Imagen 3">
                <div class="card-body">
                    <h5 class="card-title">Titulo de la imagen 3</h5>
                </div>
            </div>
        </div>
        <div class="item">
            <div class="card">
                <img class="card-img-top" src="img/img4.jpg" alt="Imagen 4">
                <div class="card-body">
                    <h5 class="card-title">Titulo de la imagen 4</h5>
                </div>
            </div>
        </div>
        <!-- Asegúrate de agregar más elementos aquí si lo deseas -->
      </div>
    </div>
  </div>
</div>

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
<!-- js del carousel 3 slider ---------------------------------------- -->
<!-- owllcarousel -->





</body>

</html>