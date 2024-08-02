<?php
include_once 'config/conexion.php';

session_start();

// Verifica si la sesión tiene el id_usuario
if (!isset($_SESSION['id_usuario'])) {
    echo '<script>
        alert("Sesión no iniciada. Por favor, inicie sesión.");
        location.href = "login.php";        
    </script>';
    exit;
}

$id_usuario = $_SESSION['id_usuario'];

// Verifica si todos los campos requeridos están presentes
if (
    !empty($_POST['id_chat']) &&
    !empty($_POST['nombre']) &&
    !empty($_POST['mensaje']) &&
    !empty($_POST['fecha'])
) {
    // Sanitiza las entradas del usuario
    $id_chat = mysqli_real_escape_string($conn, $_POST['id_chat']);
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $mensaje = mysqli_real_escape_string($conn, $_POST['mensaje']);
    $fecha = mysqli_real_escape_string($conn, $_POST['fecha']);

    // Prepara la consulta de inserción
    $query_INSERT = "INSERT INTO chat (id_chat, nombre, mensaje, fecha) VALUES (?, ?, ?, ?)";
    
    // Prepara la sentencia
    if ($stmt = mysqli_prepare($conn, $query_INSERT)) {
        // Vincula los parámetros
        mysqli_stmt_bind_param($stmt, 'isss', $id_chat, $nombre, $mensaje, $fecha);
        
        // Ejecuta la sentencia
        if (mysqli_stmt_execute($stmt)) {
            echo '<script>
                Swal.fire({
                    title: "OK",
                    text: "MENSAJE ENVIADO",
                    icon: "success",
                    confirmButtonColor: "#2174bd",
                    confirmButtonText: "Volver",
                    allowOutsideClick: false,
                    allowEscapeKey: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "mensajes.php";
                    }
                });
            </script>';
        } else {
            echo '<script>
                Swal.fire({
                    title: "Oops...",
                    text: "EL MENSAJE NO FUE ENVIADO",
                    icon: "error",
                    confirmButtonColor: "#2174bd",
                    confirmButtonText: "Volver",
                    allowOutsideClick: false,
                    allowEscapeKey: false                                                           
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "mensajes.php";
                    }
                });
            </script>';
        }

        // Cierra la sentencia
        mysqli_stmt_close($stmt);
    } else {
        echo '<script>
            alert("No se pudo preparar la consulta: ' . mysqli_error($conn) . '");
            location.href = "mensajes.php";        
        </script>';
    }
} else {
    echo '<script>
        alert("Todos los campos deben estar completos.");
        location.href = "mensajes.php";        
    </script>';
}

// Cierra la conexión
mysqli_close($conn);
