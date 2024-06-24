<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="califi.css">



</head>
<body>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

<div class="container-fluid">
    <div class="row">
        
        <!-- Menú (30% de la pantalla) -->
     <div class="col-sm-3">
        <div class="container border">
            <!-- inicio de menu -->
        <div class="links" id="menu">
        <h2 class="dashboard-title">
            <img src="../img/fellcortewhite.jpg" style="width: 190px; height:90px">
        </h2>

        <div class="grupos">
            <a href="../galeriaI.php"><i class='bx bx-compass'></i> Explorar</a>
        </div>
        <div class="inicio">
            <a href="../cont.php"><i class='bx bxs-home' ></i> Inicio</a>
        </div>
        <div class="top-menu" onclick="toggleDropdown()">
         <a href="#"><i class='bx bx-star'></i> TOP</a>
            <div class="top-dropdown">
             <a href="#">Vistas</a>
             <a href="../PRO/top_calificacion.php">Calificación</a>
             <a href="#">Comentarios</a>
            </div>
        </div>
        <div class="mensajes">
            <a href="../mensajes.php"><i class='bx bx-message-dots' ></i> Mensajes</a>
        </div>
        <div class="notificaciones">
            <a href="../notificaciones.php"><i class='bx bx-heart'></i> Notificaciones</a>
        </div>
        <div class="ayuda">
            <a href="../LUGAR/zzz.php"><i class='bx bx-image-add'></i>Subir Imagen</a>
        </div>
        <div class="configuracion">
            <a href="../configuracion.php"><i class='bx bx-cog' ></i> Configuracion y privacidad</a>
        </div>
        <div class="ayuda">
            <a href="../ayuda.php"><i class='bx bx-help-circle' ></i> Ayuda y soporte</a>
        </div>
        <div class="perfil">
            <a href="../USUARIO/perfil.php"><i class='bx bx-user-circle' ></i> Perfil</a>
        </div>

        
    </div>
        <!-- ----------------------------------------------- -->
        </div>
     </div>

        <!-- Contenedor principal (70% de la pantalla) -->
        <div class="col-sm-9" style="background-color: #e6e6e6;">
<?php
// Conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u197522469_feelmelo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener las mejores calificaciones y las imágenes correspondientes
$sql = "SELECT calificaciones.lug_id, lugares.foto_url, MAX(calificaciones.calificacion) AS max_calificacion 
        FROM calificaciones 
        JOIN lugares ON calificaciones.lug_id = lugares.lugar_id
        GROUP BY calificaciones.lug_id, lugares.foto_url 
        ORDER BY max_calificacion DESC LIMIT 10";
$result = $conn->query($sql);

// Crear el contenedor principal
echo '<div class="col-sm-9" style="background-color: #e6e6e6;">';
echo '<h3>TOP</h3>';

if ($result->num_rows > 0) {  
    while ($row = $result->fetch_assoc()) {
        $lug_id = $row["lug_id"];
        $max_calificacion = $row["max_calificacion"];
        $foto_url = $row["foto_url"];  // Usamos la ruta directamente sin alteraciones
        
        // Mostrar la imagen y la calificación para cada elemento
        echo '<p><img src="' . $foto_url . '" alt="Imagen para el Lugar ID ' . $lug_id . '"> Lugar ID: ' . $lug_id . ', Calificación: ' . $max_calificacion . '</p>';
    }
} else {
    echo '<p>No se encontraron resultados.</p>';
}

echo '</div>';

// Cerrar la conexión
$conn->close();
?>



</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

<!-- js de el boton TOP y su despliegue TOP,CALIFICACION,VISTAS-->
<script>
function toggleDropdown() {
    var dropdown = document.querySelector('.top-dropdown');
    if (dropdown.style.display === "block") {
        dropdown.style.display = "none";
    } else {
        dropdown.style.display = "block";
    }
}

</script>
</body>
</html>
