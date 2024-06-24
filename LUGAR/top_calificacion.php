<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="califi.css">
<!-- menu -->
<style>
body {
    font-family: Georgia, 'Times New Roman', Times, serif;
    background-color: #f3f4f6;  /* Adding a light background for better contrast */
}

#menu {
    width: 326px;
    background: linear-gradient(to bottom, #ffffff, #f6f6f6);  /* Light gradient background */
    box-shadow: 3px 0 10px rgba(0, 0, 0, 0.1);  /* Soft shadow for depth */
    height: 100vh;
    padding: 25px 0;
    font-size: 18px;
    position: fixed;
    transition: all 0.3s;  /* Smooth transition for all properties */
}

#menu a {
    text-decoration: none;
    color: #333;
    display: flex;
    align-items: center;  /* Vertically centers icon and text */
    padding: 10px 25px;  /* Increased left-right padding */
    transition: color 0.3s, background 0.3s;
    border-radius: 5px;  /* Rounded corners for hover effect */
}

#menu a:hover {
    color: #555;
    background-color: #e8e8e8;  /* Light background on hover */
}

#menu i {
    color: #333;
    font-size: 24px;
    margin-right: 10px;
    transition: transform 0.3s;  /* Transition for icon animations */
}

#menu a:hover i {
    transform: rotate(5deg);  /* Small rotation on hover for a playful effect */
}

.dashboard-title img {
    max-width: 60%;  /* Increased size slightly */
    height: auto;
    display: block;
    margin: 20px auto 30px auto;  /* Adjusted margin for better spacing */
    transition: transform 0.3s;  /* Smooth transition for image interactions */
}

.dashboard-title img:hover {
    transform: scale(1.05);  /* Slight zoom on hover */
}

@media (max-width: 768px) {
    #menu {
        width: 100%;
        height: auto;
        position: relative;
        box-shadow: none;
    }
    .content-container {
        margin-left: 0;
        padding: 10px;
        border-right: none;
    }
}

/* estilos del boton TOP ------------------------------------------------- */
.top-menu {
    position: relative;
}

.top-dropdown {
    display: none; /* Starts off hidden */
    position: absolute;
    left: 0;
    top: 100%;
    z-index: 1;
    background-color: #f9f9f9;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

</style>

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
            <a href="../USUARIO/perfil.php"><i class='bx bx-user-circle' ></i> perfil</a>
        </div>

        
    </div>
        <!-- ----------------------------------------------- -->
        </div>
     </div>

        <!-- Contenedor principal (70% de la pantalla) -->
        <div class="col-sm-9" style="background-color: #e6e6e6;">
        <title>Top 10 Imágenes</title>
    <style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f7fa; /* Fondo azul claro pastel */
    color: #333;
}

.top-container {
    background-color: #e9eef5; /* Azul pastel ligeramente más oscuro para el contenedor */
    padding: 40px;
    border-radius: 15px;
    width: 85%;
    max-width: 1200px;
    margin: 50px auto;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
}

.top-container h3 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 2.5em;
    color: #6a7dab; /* Color azul medio para el encabezado */
}

.image-entry {
    display: flex;
    align-items: center;
    margin-bottom: 25px;
    transition: transform 0.2s, box-shadow 0.2s;
}

.image-entry:hover {
    transform: scale(1.02); /* Efecto de aumento suave al pasar el ratón */
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

.image-entry img {
    width: 300px;
    margin-right: 40px;
    border-radius: 12px;
    transition: transform 0.2s;
}

.image-entry img:hover {
    transform: scale(1.05); /* Efecto de aumento suave para la imagen al pasar el ratón */
}

.image-entry span {
    font-size: 34px;
    margin-right: 30px;
    color: black; /* Color amarillo pastel para el número de posición */
    font-weight: bold;
}

.image-entry div {
    flex-grow: 1; /* Permite que el div ocupe todo el espacio restante */
}

    </style>
</head>
<body>
<div class="top-container">
    <h3>TOP 10</h3>
    <?php 
    // Conexión a la base de datos MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "feel_melo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta SQL
    $sql = "SELECT 
                calificaciones.lug_id, 
                lugares.foto_url, 
                AVG(calificaciones.calificacion) AS promedio_calificacion
            FROM 
                calificaciones 
            JOIN 
                lugares ON calificaciones.lug_id = lugares.lugar_id
            GROUP BY 
                calificaciones.lug_id, lugares.foto_url 
            ORDER BY 
                promedio_calificacion DESC 
            LIMIT 10";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {  
        $count = 1; // Contador para el número de posición
       while ($row = $result->fetch_assoc()) {
    $lug_id = $row["lug_id"];
    $promedio_calificacion = number_format($row["promedio_calificacion"], 1); 
    $foto_url = str_replace("LUGAR/", "", $row["foto_url"]);  // Reemplazamos "LUGAR/" por nada, esencialmente eliminándolo
    
    echo '<div class="image-entry">';
    echo '<span>' . $count . '.</span>';
    echo '<img src="' . $foto_url . '" alt="Imagen para el Lugar ID ' . $lug_id . '">';
    echo '<div> Calificación Promedio: ' . $promedio_calificacion . '</div>';
    echo '</div>';
    
    $count++;
}

    } else {
        echo '<p>No se encontraron resultados.</p>';
    }

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
