<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$dbname = "u197522469_feelmelo";

$message = "Imagen Cargada Exitosamente"; // Mensaje para mostrar en la alerta

// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Suponemos que el ID de usuario se guarda en $_SESSION['usuario_id'] cuando un usuario inicia sesión
if(!isset($_SESSION['id_usuario'])) {
    die("Usuario no identificado");
}

$idUsuario = $_SESSION['id_usuario'];

// Obtener la imagen más reciente del usuario
$rutaImagen = "";

$sql = "SELECT img_perfil FROM perfil WHERE usuario_id = ? ORDER BY id_perfil DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $idUsuario);
$stmt->execute();
$stmt->bind_result($rutaImagen);
$stmt->fetch();
$stmt->close();

// Verifica si se ha enviado una imagen
if(isset($_FILES['imagenPerfil']) && $_FILES['imagenPerfil']['size'] > 0) {

    $imagenTempName = $_FILES['imagenPerfil']['tmp_name'];
    $imagenName = $_FILES['imagenPerfil']['name'];

    // Define la ruta donde se guardarán las imágenes
    $target_directory = "imagenes/";
    $target_file = $target_directory . basename($imagenName);

    // Intenta mover el archivo a la carpeta
    if(move_uploaded_file($imagenTempName, $target_file)) {
        // Guarda la ruta del archivo en la base de datos
        $stmt = $conn->prepare("INSERT INTO perfil (img_perfil, usuario_id) VALUES (?, ?)");
        $stmt->bind_param('ss', $target_file, $idUsuario);

        // Envía la ruta a la base de datos
        if($stmt->execute()) {
            $message = "Imagen y ruta guardadas exitosamente!";
        } else {
            $message = "Error al guardar en la base de datos: " . $stmt->error;
        }
        $stmt->close();

    } else {
        $message = "Error al subir la imagen.";
    }
}

$conn->close();



// Redirigir con mensaje
echo "<script>alert('$message'); window.location.href='perfil.php';</script>";
?>
<!-- wddedew aja -->
