<?php
// Iniciar sesión (asegúrate de haber llamado a session_start() al comienzo del archivo)
session_start();
include "../config/conexion.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="../CSS/styles.css">
    <link rel="stylesheet" href="../usuario/perfil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
 
</head>

<body>

   <!-- navbar -->
   
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="#" id="fell" >
      <img src="../img/fell3-removebg-preview.png" alt="" height="60" width="130">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../indexA.php">INICIO</a>
          </li>
          <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Poblacion
                  </a>
                  <ul class="dropdown-menu">
                      <!-- <li><a class="dropdown-item" href="../Vimagenes.html">Ver Imagenes</a></li>
                      <li><a class="dropdown-item" href="../ESTRELLAS1/estrellas.html">Añadir Imagen</a></li>
                      <li><hr class="dropdown-divider"></li> -->
                      <li><a class="dropdown-item" href="../lugar/lugar.html">Agrega un lugar</a></li>
                  </ul>
              </li>
          </ul>
        </ul>

        <div class="navbar-nav">
          <?php
          if (isset($_SESSION['id_usuario']) && !isset($_SESSION['es_admin'])) {
          ?>
            <li class="nav-item dropdown" >
              <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-fill" ></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="usuario/perfil.php">Mi perfil</a></li>
                <li><a class="dropdown-item" href="../validacion/salir.php">Cerrar sesión</a></li>
              </ul>
            </li>
          <?php } elseif (isset($_SESSION['es_admin'])) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="ADMIN/perfil_ad.php">Mi perfil de admin</a></li>
                <li><a class="dropdown-item" href="./validacion/salir.php">Cerrar sesión de admin</a></li>
              </ul>
            </li>
          <?php }elseif (isset($_SESSION['id_anfitrion'])) { ?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="bi bi-person-fill"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="perfil_anf.php">Mi perfil de anfitrión</a></li>
            <li><a class="dropdown-item" href="../validacion/salir.php">Cerrar sesión</a></li>
        </ul>
    </li>
<?php }  ?>
          

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
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <style>
              body{
    color: #6F8BA4;
    margin-top:20px;
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
/* About Me 
---------------------*/
.about-text h3 {
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
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
.about-list label {
  color: #20247b;
  font-weight: 600;
  width: 88px;
  margin: 0;
  position: relative;
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
.dark-color {
    color: #20247b;
}


            </style>
    </head>
    
    <body>
      <?php
include_once 'config/conexion.php';

if (isset($_SESSION['id_anfitrion'])) {
  $id_anfitrion_ingresado = $_SESSION['id_anfitrion'];

  $query = "SELECT * FROM anfitrion WHERE anfitrion_id = $id_anfitrion_ingresado";
  $execute = mysqli_query($conn, $query) or die(mysqli_error($conn));

  if (mysqli_num_rows($execute) > 0) {
    $fila = mysqli_fetch_array($execute);
    $nombreAnf = $fila['nombre_anf'];
    $apellidoAnf = $fila['apellido_anf'];
    $identificacionAnf = $fila['identificacion_anf'];
    $correoAnf = $fila['correo_anf'];
    $telAnf= $fila['celular_anf'];
    $paisAnf=$fila['pais_anf'];
    $ciudadAnf=$fila['ciudad_anf'];
    // ...
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
       <form method="POST" action="#modalRegistrar" >
    <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color">
                            <h3 class="theme-color lead">ANFITRION</h3>
                            <h4 class="dark-color"><?php echo $nombreAnf; ?></h4>
                            <h4 class="dark-color"><?php echo $apellidoAnf; ?></h4>
                            </h3>
                            <!-- <h6 class="theme-color lead">A Lead UX &amp; UI designer based in Canada</h6>
                            <p>I <mark>design and develop</mark> services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores. My passion is to design digital user experiences through the bold interface and meaningful interactions.</p> -->
                            <div class="row about-list">
                                <div class="col-md-6">
                                    
                                    
                                    <div class="media">
                                        <label>País</label>
                                        <p><?php echo $paisAnf; ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Ciudad</label>
                                        <p><?php echo $ciudadAnf; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <label>Correo</label>
                                        <p><?php echo $correoAnf; ?></p>
                                    </div>
                                    <div class="media">
                                        <label>Contacto</label>
                                        <p><?php echo $telAnf; ?></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" title="" alt="">
                        </div>
                    </div>
                </div>
                <div class="counter">
                    <div class="row">
                        <h3 class="dark-color">MIS PROPIEDADES</h3>
                        </div>
                        
                    </div>
                   
                    
                </div>
                
            </div>
            
        </section>
       </form>
       

      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
    </html>
<!-- fin perfil -->
           
<!-- muro -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>