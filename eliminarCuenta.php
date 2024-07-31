<?php
// Iniciar sesión si es necesario
session_start();
include("config/conexion.php");

// Verificar si el usuario está autenticado y obtener su ID de usuario
if (!isset($_SESSION['usuario_id'])) {
    // Si no está autenticado, redirigir a la página de inicio de sesión u otra página
    header('Location: index.php');
    exit;
}

// Verificar si se ha enviado el formulario para eliminar la cuenta
if (isset($_POST['eliminarCuenta'])) {
    // Obtener el ID de usuario de la sesión
    $usuario_id = $_SESSION['usuario_id'];
    
    // Verificar que el ID del usuario sea un entero válido
    if (!is_numeric($usuario_id) || $usuario_id <= 0) {
        $_SESSION['error'] = "ID de usuario inválido.";
        header('Location: perfil.php');
        exit;
    }

    // Preparar la consulta SQL para eliminar la cuenta del usuario
    $stmt = $conn->prepare("DELETE FROM usuarios WHERE usuario_id = ?");
    if ($stmt === false) {
        $_SESSION['error'] = "Error en la preparación de la consulta: " . $conn->error;
        header('Location: perfil.php');
        exit;
    }

    $stmt->bind_param("i", $usuario_id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Eliminación exitosa
        session_destroy(); // Opcionalmente puedes destruir la sesión aquí
        $_SESSION['mensaje'] = "¡Tu cuenta ha sido eliminada correctamente!";
        header('Location: index.php'); // Redirigir a la página principal o a otra página adecuada
        exit;
    } else {
        // Error al eliminar la cuenta
        $_SESSION['error'] = "Error al intentar eliminar la cuenta: " . $stmt->error;
        header('Location: perfil.php'); // Redirigir de vuelta al perfil u otra página adecuada
        exit;
    }
}

$stmt->close();
$conn->close();
?>
