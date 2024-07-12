<?php
// Iniciar sesión si es necesario
session_start();
include("config/conexion.php");

// Verificar si el usuario está autenticado y obtener su ID de usuario
if (!isset($_SESSION['id_usuario'])) {
    // Si no está autenticado, redirigir a la página de inicio de sesión u otra página
    header('Location: index.php');
    exit;
}

// Incluir archivo de conexión a la base de datos
require_once 'conexion.php'; // Asegúrate de tener tus credenciales y configuración de conexión

// Obtener el ID de usuario de la sesión
$id_usuario = $_SESSION['id_usuario'];

// Consulta SQL para eliminar la cuenta del usuario
$sql = "DELETE FROM usuarios WHERE id_usuario = $id_usuario";

// Ejecutar la consulta
if ($conexion->query($sql) === TRUE) {
    // Eliminación exitosa
    session_destroy(); // Opcionalmente puedes destruir la sesión aquí
    $_SESSION['mensaje'] = "¡Tu cuenta ha sido eliminada correctamente!";
    header('Location: index.php'); // Redirigir a la página principal o a otra página adecuada
    exit;
} else {
    // Error al eliminar la cuenta
    $_SESSION['error'] = "Error al intentar eliminar la cuenta: " . $conexion->error;
    header('Location: perfil.php'); // Redirigir de vuelta al perfil u otra página adecuada
    exit;
}

// Cerrar la conexión a la base de datos si es necesario
$conexion->close();
