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

include_once 'config/conexion.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

/* $response = [];  */// Respuesta por defecto
/* 
$host = "localhost";
$dbname = "u197522469_feelmelo";
$username = "root";
$password = "";
$conn = new mysqli($host, $username, $password, $dbname); */

// Verifica la conexión
if ($conn->connect_error) {
    $response = [
        'success' => false,
        'error' => "Conexión falló: " . $conn->connect_error
    ];
    echo json_encode($response);
    exit;
}

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    $response = [
        'success' => false,
        'error' => "Debes iniciar sesión para calificar"
    ];
    echo json_encode($response);
    exit;
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener los datos del formulario
    $calificacion = 0; // Estableces que la calificación es 0 por defecto
    $comentario = $_POST['comentario'] ?? '';
    $nombre_us = $_POST['nombre_us'] ?? '';
    $lug_id = $_POST['lug_id'] ?? '';
    $user_id = $_SESSION['id_usuario'] ?? '';

    // Prepare the query
    $stmt = $conn->prepare("INSERT INTO calificaciones (calificacion, comentario, user_id, lug_id) VALUES(?, ?, ?, ?)");
    $stmt->bind_param("isii", $calificacion, $comentario, $user_id, $lug_id);

    if ($stmt->execute()) {
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
                window.location.href = "galeriaI.php";
            }
        });
    </script>';

}   else {  echo '<script>
Swal.fire({
    title: "ERROR",
    text: "ERROR AL ENVIAR COMENTARIO",
    icon: "error",
    confirmButtonColor: "#2174bd",
    confirmButtonText: "Volver",
    allowOutsideClick: false,
    allowEscapeKey: false
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = " galeriaI.php";
    }
});
</script>';
   }

    $stmt->close();
}

$conn->close();

// // Enviamos la respuesta
// echo json_encode($response);

