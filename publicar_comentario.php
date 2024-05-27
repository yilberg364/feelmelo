<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$response = []; // Respuesta por defecto

$host = "localhost";
$dbname = "feel_melo";
$username = "root";
$password = "";
$conn = new mysqli($host, $username, $password, $dbname);

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
        $response = [
            'success' => true,
            'comentario' => $comentario,
            'nombre_us' => $nombre_us,
            'user_id' => $_SESSION['id_usuario'] // Asumiendo que el nombre de usuario está en la sesión
        ];
    } else {
        $response = [
            'success' => false,
            'error' => "Error al guardar el comentario: " . $stmt->error
        ];
    }

    $stmt->close();
}

$conn->close();

// Enviamos la respuesta
echo json_encode($response);

?>

