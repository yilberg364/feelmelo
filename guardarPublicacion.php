<?php
include_once 'config/conexion.php';

session_start(); // Inicia la sesión para acceder a las variables de sesión

// Verifica si la sesión tiene el id_usuario
if (!isset($_SESSION['id_usuario'])) {
    echo '<script>
        alert("Sesión no iniciada. Por favor, inicie sesión.");
        location.href = ("login.php");        
    </script>';
    
}

$id_usuario = $_SESSION['id_usuario'];

// Verifica si todos los campos requeridos están presentes
if (
    (!empty($_POST['pais'])) ||
    (!empty($_POST['ubicacion'])) ||
    (!empty($_POST['descripcion'])) ||
    (!empty($_POST['categoria']))
) {
    // Sanitiza las entradas del usuario
    $pais = mysqli_real_escape_string($conn, $_POST['pais']);
    $ubicacion = mysqli_real_escape_string($conn, $_POST['ubicacion']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);

    // Prepara la consulta de inserción
    $query_INSERT = "INSERT INTO lugares (user_id, pais, ubicacion, descripcion, categoria) VALUES (?, ?, ?, ?, ?)";
    
    // Prepara la sentencia
    if ($stmt = mysqli_prepare($conn, $query_INSERT)) {
        // Vincula los parámetros
        mysqli_stmt_bind_param($stmt, 'issss', $id_usuario, $pais, $ubicacion, $descripcion, $categoria);
        
        // Ejecuta la sentencia
        if (mysqli_stmt_execute($stmt)) {
            echo '<script>
                alert("PUBLICADO CON ÉXITO");
                location.href = ("cont.php");        
            </script>';
        } else {
            echo '<script>
                alert("Error al publicar: ' . mysqli_stmt_error($stmt) . '");
                location.href = ("cont.php");        
            </script>';
        }

        // Cierra la sentencia
        mysqli_stmt_close($stmt);
    } else {
        echo '<script>
            alert("Error al preparar la consulta: ' . mysqli_error($conn) . '");
            location.href = ("cont.php");        
        </script>';
    }
} else {
    echo '<script>
        alert("Debes completar todos los campos");      
        location.href = ("cont.php");        
    </script>';
}

// Cierra la conexión
mysqli_close($conn);