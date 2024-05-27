<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="mostrar.css">
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
    box-shadow: 0 0 0 0.2px black; /* Añadido borde delgado negro */
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
        require_once('conexion.php');

        $query="SELECT * FROM lugares";
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
            <div class="rating">
            <!-- REVIEWS -->
            <!DOCTYPE html>
<html lang="en">

<head>
    <!-- Your head content here -->
    <title>Document</title>
    <link rel="stylesheet" href="./e.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cdbootstrap/css/cdb.min.css" />
</head>

<body>
    <div class="formu" id="formu">
        <div class="star-rating">
            <form class="estrella" action="guardar.php" method="post" enctype="multipart/form-data">
                <div class="estrellass">

                
                    <input type="radio" id="rating-5" name="rating" value="5" />
                    <label for="rating-5">&#9734;</label>
                    <input type="radio" id="rating-4" name="rating" value="4" />
                    <label for="rating-4">&#9734;</label>
                    <input type="radio" id="rating-3" name="rating" value="3" />
                    <label for="rating-3">&#9734;</label>
                    <input type="radio" id="rating-2" name="rating" value="2" />
                    <label for="rating-2">&#9734;</label>
                    <input type="radio" id="rating-1" name="rating" value="1" />
                    <label for="rating-1">&#9734;</label>
                    
                    
                </div>
        </div>
        <br>
        <div class="review">
            <textarea name="review" placeholder="Escribe un comentario"></textarea>
        </div>
        <br>
        <form action="/ratings" method="post" enctype="multipart/form-data">
            <p>Sube una foto!!</p>
            <input type="file" name="image_url">
            <input type="submit" value="ENVIAR">
        </form>
    </div>

    <!-- Your script and CDN includes here -->
    <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/cdbootstrap/js/cdb.min.js"></script>
</body>

</html>
            <!-- FIN REVIEWS -->
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

