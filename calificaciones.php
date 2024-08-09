<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<?php
session_start();

include("config/conexion.php");


// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    echo '<script>alert("Debes iniciar sesión para calificar"); window.location = "index.php";</script>';
    exit;
}
// Obtener los datos del formulario
$calificacion = $_POST['calificacion'] ?? '';
$comentario = $_POST['comentario'] ?? '';
$lugar_id = $_POST['lugar_id'] ?? '';
$user_id = $_SESSION['id_usuario'] ?? ''; // Asegúrate de que esta variable esté definida en tu sesión
$foto_url = ''; // Initialize as empty, will be set later if file upload is successful

//Insertar imágenes
if (isset($_FILES['imagen'])) {
    // ... (código para manejar la carga de imágenes, como lo tienes en tu código original)
    $errors = array();
    $file_name = $_FILES['imagen']['name'];
    $file_size = $_FILES['imagen']['size'];
    $file_tmp = $_FILES['imagen']['tmp_name'];
    $file_type = $_FILES['imagen']['type'];
    $temp = explode('.', $_FILES['imagen']['name']);
    $file_ext = strtolower(end($temp));

    // Add more extensions as needed
    $expensions = array("jpeg", "jpg", "png", "gif", "bmp", "webp", "svg");

    // Validate file extension
    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "Extension not allowed, please choose a JPEG, PNG, GIF, BMP, WEBP, or SVG file.";
    }
    // Validate file size
    if ($file_size > 5 * 1024 * 1024) {
        $errors[] = 'File size must be less than or equal to 5 MB';
    }
    // Validate MIME type
    $valid_mime_types = array("image/gif", "image/jpeg", "image/jpg", "image/png", "image/bmp", "image/webp", "image/svg+xml");
    $file_info = finfo_open(FILEINFO_MIME_TYPE);
    $file_path = $_FILES['imagen']['tmp_name'];
    $mime_type = finfo_file($file_info, $file_path);

    if (!in_array($mime_type, $valid_mime_types))
    /*    echo ("calificar" + $mime_type); */ {
        echo ($file_path);
        $errors[] = "File type not allowed, please upload an image.";
    }

    // Move file to target directory and set $foto_url
    if (empty($errors) == true) {
        $target_dir = "images/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($file_name);
        move_uploaded_file($file_tmp, $target_file);

        $foto_url = $target_file; // Here's your file URL you can store in the database
        $foto_url = "" . $foto_url;
    } else {
        print_r($errors);
    }
}


$query_create = "INSERT INTO calificaciones (calificacion, 
                                comentario,
                                user_id,   
                                lug_id,
                                foto_url) 

VALUES( '$calificacion', '$comentario', '$user_id', '$lugar_id', '$foto_url')";

$execute_INSERT  = mysqli_query($conn, $query_create) or die(mysqli_error($conn));

if ($execute_INSERT) {
    echo '<script>
    Swal.fire({
        title: "OK",
        text: "COMENTARIO PUBLICADO ",
        icon: "success",
        confirmButtonColor: "#2174bd",
        confirmButtonText: "Volver",
        allowOutsideClick: false,
        allowEscapeKey: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "cont.php";
        }
    });
</script>';
} else {
    echo '<script>
                alert("algo salio mal");
                location.href = ("cont.php");        
         </script>';
}
