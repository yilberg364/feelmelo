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

$calificacion = $_POST['calificacion'] ?? '';
$comentario = $_POST['comentario'] ?? '';
$lugar_id = $_POST['lugar_id'] ?? '';
$user_id = $_SESSION['id_usuario'] ?? '';
$foto_url = '';

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $file = $_FILES['imagen'];
    $file_name = $file['name'];
    $file_size = $file['size'];
    $file_tmp = $file['tmp_name'];
    $file_type = $file['type'];

    $allowed_exts = ['jpeg', 'jpg', 'png', 'gif', 'bmp', 'webp', 'svg'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed_mime_types = [
        'image/jpeg', 'image/jpg', 'image/png', 
        'image/gif', 'image/bmp', 'image/webp', 
        'image/svg+xml'
    ];

    $file_info = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($file_info, $file_tmp);
    finfo_close($file_info);

    $errors = [];

    if (!in_array($file_ext, $allowed_exts)) {
        $errors[] = "Extension not allowed, please choose a valid image file.";
    }
    if (!in_array($mime_type, $allowed_mime_types)) {
        $errors[] = "Invalid file type, please upload a valid image.";
    }
    if ($file_size > 5 * 1024 * 1024) { // 5 MB
        $errors[] = 'File size must be less than or equal to 5 MB.';
    }

    if (empty($errors)) {
        $target_dir = "images/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($file_name);
        if (move_uploaded_file($file_tmp, $target_file)) {
            $foto_url = $target_file;
        } else {
            $errors[] = "Failed to move uploaded file.";
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

$query_create = "INSERT INTO calificaciones (calificacion, comentario, user_id, lug_id, foto_url) 
                 VALUES ('$calificacion', '$comentario', '$user_id', '$lugar_id', '$foto_url')";

if (mysqli_query($conn, $query_create)) {
    echo '<script>
        Swal.fire({
            title: "Success",
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
?>
</body>
</html>
