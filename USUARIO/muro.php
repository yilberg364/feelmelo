<?php
// Datos de conexión a la base de datos (modifica con tus credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u197522469_feelmelo";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario de subida de imágenes
if (isset($_POST['submit'])) {
    $imageTitle = $_POST['imageTitle'];
    $imageDescription = $_POST['imageDescription'];
    $imageName = $_FILES['image']['name'];
    $imageType = $_FILES['image']['type'];
    $imageSize = $_FILES['image']['size'];
    $imageTmp = $_FILES['image']['tmp_name'];

    // Leer el contenido binario de la imagen
    $imageBinary = file_get_contents($imageTmp);

    // Preparar y ejecutar la consulta de inserción
    $stmt = $conn->prepare("INSERT INTO imagenes (nombre, tipo, tamano, imagen, ID_USER) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssibs", $imageName, $imageType, $imageSize, $imageBinary, $userId);

    // Reemplaza $userId por el identificador del usuario que sube la imagen
    // Puedes obtener este valor dependiendo de cómo manejes la autenticación del usuario

    $userId = 1; // Ejemplo: se asume que el ID del usuario es 1

    if ($stmt->execute()) {
        echo "Imagen subida correctamente.";
    } else {
        echo "Error al subir la imagen: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>