
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
include ("config/conexion.php"); // Asegúrate de que este archivo esté en la misma ubicación que config.php

// Asumo que el usuario está registrado y tienes su ID en una variable de sesión
session_start();
$id_usuario = $_SESSION['id_usuario']; // Ajusta esto según cómo manejes las sesiones

$alertType = ''; // Variable para almacenar el tipo de alerta
$alertMessage = ''; // Variable para almacenar el mensaje de la alerta

if (
    $_POST['name'] == '' ||
    $_POST['email'] == '' ||
    $_POST['message'] == ''
) {
    $alertType = 'error';
    $alertMessage = 'Debes completar todos los campos';
} else {
    $nombre = $_POST['name'];
    $correo = $_POST['email'];
    $mensaje = $_POST['message'];
    
    // Ejecutar la consulta de inserción
    $query_INSERT = "INSERT INTO d_ayuda (id_usuario, nombre, correo, mensaje) VALUES ('$id_usuario', '$nombre', '$correo', '$mensaje')";
    $execute_INSERT = mysqli_query($conn, $query_INSERT);

    if ($execute_INSERT) {
        $alertType = 'success';
        $alertMessage = 'AYUDA ENVIADA';
    } else {
        $alertType = 'error';
        $alertMessage = 'Lo siento, algo salió mal';
    }
}

echo "<script>
    Swal.fire({
        icon: '$alertType',
        title: '$alertMessage',
        confirmButtonText: 'Aceptar'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'ayuda.php';
        }
    });
</script>";
?>
