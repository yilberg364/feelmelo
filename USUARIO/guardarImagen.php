<?php
session_start();

// Conexión a la base de datos
$host = "localhost";
$user = "root";
$pass = "";
$db = "feel_melo";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Suponemos que el ID de usuario se guarda en $_SESSION['usuario_id'] cuando un usuario inicia sesión
if(!isset($_SESSION['id_usuario'])) {
    die("Usuario no identificado");
}

$idUsuario = $_SESSION['id_usuario'];

// Obtener nombre_us basado en id_usuario
$query = "SELECT nombre_us FROM usuarios WHERE usuario_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $idUsuario);
$stmt->execute();
$result = $stmt->get_result();

if(!$result->num_rows) {
    die("No se encontró el usuario en la base de datos.");
}

$row = $result->fetch_assoc();
$nombreUsuario = $row['nombre_us'];
$stmt->close();

// Ahora, verifica si $nombreUsuario tiene algún valor
if(empty($nombreUsuario)) {
    die("El nombre de usuario está vacío");
}

// Verificando si se subió un archivo
if(isset($_FILES['imagenPerfil'])) {
    $nombreArchivo = basename($_FILES['imagenPerfil']['name']);
    $rutaTemporal = $_FILES['imagenPerfil']['tmp_name'];
    $rutaDestino = "C:/xampp/htdocs/fase22/usuario/imagenes/" . $nombreArchivo;

    $tipoArchivo = strtolower(pathinfo($rutaDestino,PATHINFO_EXTENSION));

    // Verificando si el archivo es una imagen
    $check = getimagesize($rutaTemporal);
    if($check !== false) {
        // Verificar si el archivo ya existe
        if(!file_exists($rutaDestino)) {
            // Validación de extensiones permitidas
            if($tipoArchivo == "jpg" || $tipoArchivo == "png" || $tipoArchivo == "jpeg" || $tipoArchivo == "gif") {
                // Mover el archivo a la ruta destino
                if(move_uploaded_file($rutaTemporal, $rutaDestino)) {
                    // Insertar la ruta de la imagen, usuario_id y nombre_us en la base de datos en la tabla 'perfil'
                    $stmt = $conn->prepare("INSERT INTO perfil (usuario_id, img_perfil, nombre_us) VALUES (?, ?, ?)");
                    $stmt->bind_param("iss", $idUsuario, $rutaDestino, $nombreUsuario);

                    if($stmt->execute()) {
                        echo "Imagen y nombre de usuario subidos y guardados en la base de datos.";
                    } else {
                        echo "Error al guardar en la base de datos.";
                    }
                    $stmt->close();
                } else {
                    echo "Error al subir la imagen.";
                }
            } else {
                echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
            }
        } else {
            echo "El archivo ya existe.";
        }
    } else {
        echo "El archivo no es una imagen.";
    }
}

$conn->close();
?>



