<?php
session_start();

if (isset($_SESSION['id_usuario'])) {
    // Cerrar sesión de usuario normal
    unset($_SESSION['id_usuario']);
    session_destroy();
    header("Location: ../index.php"); // Redirigir a la página de cierre de sesión
    exit();
} elseif (isset($_SESSION['es_admin'])) {
    // Cerrar sesión de administrador
    unset($_SESSION['es_admin']);
    session_destroy();
    header("Location: ../index.php"); // Redirigir a la página de cierre de sesión
    exit();
}elseif (isset($_SESSION['id_anfitrion'])) {
    // Cerrar sesión de anfitrion
    unset($_SESSION['id_anfitrion']);
    session_destroy();
    header("Location: ../index.php"); // Redirigir a la página de cierre de sesión
    exit();
}
?>

