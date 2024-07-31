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

include("../config/conexion.php");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} 

if (!isset($_SESSION['id_usuario'])) {
    die("Usuario no identificado");
}

$idUsuario = $_SESSION['id_usuario'];

$rutaImagen = "";

$sql = "SELECT img_perfil FROM perfil WHERE usuario_id = ? ORDER BY id_perfil DESC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $idUsuario);
$stmt->execute();
$stmt->bind_result($rutaImagen);
$stmt->fetch();
$stmt->close();

$message = '';

if (isset($_FILES['imagenPerfil']) && $_FILES['imagenPerfil']['size'] > 0) {
    $imagenTempName = $_FILES['imagenPerfil']['tmp_name'];
    $imagenName = $_FILES['imagenPerfil']['name'];

    $target_directory = "imagenes/";
    $target_file = $target_directory . basename($imagenName);

    if (move_uploaded_file($imagenTempName, $target_file)) {
        $stmt = $conn->prepare("INSERT INTO perfil (img_perfil, usuario_id) VALUES (?, ?)");
        $stmt->bind_param('ss', $target_file, $idUsuario);

        if ($stmt->execute()) {
            $message = "Cambios realizados correctamente";
        } else {
            $message = "Error al guardar en la base de datos: " . $stmt->error;
        }
        $stmt->close();

    } else {
        $message = "Error al subir la imagen.";
    }
}

$conn->close();

if ($message) {
    echo "<script>
        Swal.fire({
            title: 'Resultado',
            text: 'OK',
            icon: 'success',
            confirmButtonColor: '#2174bd',
            confirmButtonText: 'Volver',
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'perfil.php';
            }
        });
    </script>";
}
