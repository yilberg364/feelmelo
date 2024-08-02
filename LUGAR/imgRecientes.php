<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="img.css">
    <!-- Incluye Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <!-- cdn boostrap -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
   
   <style>

a {
    text-decoration: none;
    padding: 10px 20px;
    font-size: 15px;
    margin: 5px 0 0 20px;
    display: inline-block;
    background: #6773ff;
    color: white;
    width: 95px;
    height: 58px;
    font-family: -webkit-pictograph;
}

.card-bordered {
    border: 10px solid #f2f2f2;
    /* Gris más claro */
    background-color: #f2f2f2;
    /* Fondo gris */
    margin-bottom: 20px;
    /* Espaciado inferior */
}
</style>

</head>
<body>
 <p4>IMAGENES</p4>
 <br>
 <p2>Escoge las fotografías o imágenes que deseas revisar y calificar. Pueden ser de cualquier tipo: paisajes, retratos, arte, animales, etc.</p2>
 <br>
 <p6>La Maestría Del Buen Gusto</p6>
 <div style="border-top: 1px solid #d9d0d0;"></div>
 <div class="container">
    <h1 class="text-center my-4" ></h1>
    <div class="row">
        <?php
       include_once 'config/conexion.php';

        $query="SELECT * FROM lugares ORDER BY lugar_id DESC";
        $execute=mysqli_query($conn, $query) or die (mysqli_error($conn));

        while($fila=mysqli_fetch_array($execute)){
        ?>
    <div class="col-md-4">
    <div class="card card-bordered">
    
        <!-- Output the image source path -->
        <img class="card-img-top" src="<?php echo $fila['foto_url']; ?>" height="300px" alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"><?php echo $fila['lugar_id'] . ' - ' . $fila['nombre_lugar']; ?></h5>
            <p class="card-text">
                <strong>Ubicación:</strong> <?php echo $fila['ubicacion'] ?><br/>
                <strong>Descripción:</strong> <?php echo $fila['descripcion'] ?><br/>
                <strong>Categoría:</strong> <?php echo $fila['categoria'] ?><br/>
                <strong>Usuario ID:</strong> <?php echo $fila['anf_id'] ?>
            </p>
            <!-- Formulario para subir la imagen -->
            <a href="lugar.html" style="margin-left:215px; position:relative; top:-70px">Subir imagen</a>
            <div class="rating">
            <i class="bi bi-star-fill star"></i>
            <i class="bi bi-star-fill star"></i>
            <i class="bi bi-star-fill star"></i>
            <i class="bi bi-star-fill star"></i>
            <i class="bi bi-star-fill star"></i>

         </div>
      </div>
    </div>
 </div>
        <?php
          }
        ?>
    </div>
 </div>

 <!-- Incluye Bootstrap JS -->
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

 <script>
 const stars = document.querySelectorAll('.star');

 stars.forEach(function(star, mostrar){
  star.addEventListener('click', function(){
    for (let i=0; i<=mostrar; i++){
      stars[i].classList.add('checked');
    }
    for (let i=mostrar+1; i<stars.length; i++){
      stars[i].classList.remove('checked');
    }
  })
 })
 </script>


</body>
</html>