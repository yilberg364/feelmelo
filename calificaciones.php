<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
session_start();
include("config/conexion.php");

// Verificación de sesión
if (!isset($_SESSION['id_usuario'])) {
    echo '<script>
        Swal.fire({
            title: "Error",
            text: "Debes iniciar sesión para calificar",
            icon: "error",
            confirmButtonColor: "#2174bd"
        }).then(() => {
            window.location = "index.php";
        });
    </script>';
    exit;
}

// Sanitización y validación de datos

$calificacion = mysqli_real_escape_string($conn, $_POST['calificacion']);
$comentario = mysqli_real_escape_string($conn, $_POST['comentario']);
$lugar_id = mysqli_real_escape_string($conn, $_POST['lugar_id']);
$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
$foto_url = ''; 

// Validación y manejo de la imagen subida
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['imagen'];
    $file_name = basename($file['name']);
    $file_size = $file['size'];
    $file_tmp = $file['tmp_name'];
    $file_type = $file['type'];

    // Definir extensiones y tipos MIME permitidos
    $allowed_exts = ['jpeg', 'jpg', 'png', 'gif', 'bmp', 'webp', 'svg', 'jfif'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed_mime_types = [
        'image/jpeg', 'image/jpg', 'image/png', 
        'image/gif', 'image/bmp', 'image/webp', 
        'image/svg+xml'
    ];

    // Verificar tipo MIME del archivo
    $file_info = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($file_info, $file_tmp);
    finfo_close($file_info);

    $errors = [];

    if (!in_array($file_ext, $allowed_exts)) {
        $errors[] = "Extensión no permitida. Por favor, elige un archivo de imagen válido.";
    }
    if (!in_array($mime_type, $allowed_mime_types)) {
        $errors[] = "Tipo de archivo no válido. Por favor, sube una imagen válida.";
    }
    if ($file_size > 5 * 1024 * 1024) { // 5 MB
        $errors[] = 'El tamaño del archivo debe ser menor o igual a 5 MB.';
    }

    if (empty($errors)) {
        $target_dir = "images/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . $file_name;
        if (move_uploaded_file($file_tmp, $target_file)) {
            $foto_url = $target_file;
        } else {
            $errors[] = "No se pudo mover el archivo subido.";
        }
    }

    if (!empty($errors)) {
        echo '<script>
            Swal.fire({
                title: "Error",
                text: "' . implode(', ', $errors) . '",
                icon: "error",
                confirmButtonColor: "#2174bd"
            }).then(() => {
                window.location = "cont.php";
            });
        </script>';
        exit;
    }
}

// Uso de declaraciones preparadas para prevenir inyecciones SQL
$query_create = $conn->prepare("INSERT INTO calificaciones (calificacion, comentario, user_id, lug_id, foto_url) 
                                VALUES (?, ?, ?, ?, ?)");
$query_create->bind_param('isiss', $calificacion, $comentario, $user_id, $lugar_id, $foto_url);

if ($query_create->execute()) {
    echo '<script>
        Swal.fire({
            title: "Éxito",
            text: "Comentario publicado.",
            icon: "success",
            confirmButtonColor: "#2174bd",
            confirmButtonText: "Volver"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "cont.php";
            }
        });
    </script>';
} else {
    echo '<script>
        Swal.fire({
            title: "Error",
            text: "Algo salió mal. Intenta nuevamente.",
            icon: "error",
            confirmButtonColor: "#2174bd",
            confirmButtonText: "Volver"
        }).then(() => {
            window.location.href = "cont.php";
        });
    </script>';
}

// Cierre de la conexión
$conn->close();
?>
</body>
</html>
