<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


</body>
</html>

<?php
include_once 'config/conexion.php';

session_start(); // Inicia la sesión para acceder a las variables de sesión

// Verifica si la sesión tiene el id_usuario
if (!isset($_SESSION['id_usuario'])) {
    echo '<script>
        alert("Sesión no iniciada. Por favor, inicie sesión.");
        location.href = "login.php";
    </script>';
    exit; // Sale del script después de redireccionar
}

$id_usuario = $_SESSION['id_usuario'];

// Verifica si todos los campos requeridos están presentes
if (
    isset($_POST['pais']) &&
    isset($_POST['ubicacion']) &&
    isset($_POST['descripcion']) &&
    isset($_POST['categoria']) &&
    isset($_FILES['foto_url']) &&  // Asegúrate de que el nombre del campo coincida con el formulario
    $_FILES['foto_url']['error'] === UPLOAD_ERR_OK  // Verifica que no haya errores en la carga del archivo
) {
    // Sanitiza las entradas del usuario
    $pais = mysqli_real_escape_string($conn, $_POST['pais']);
    $ubicacion = mysqli_real_escape_string($conn, $_POST['ubicacion']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);
    
    // Procesa la imagen subida
    $foto_nombre = $_FILES['foto_url']['name'];
    $foto_temp = $_FILES['foto_url']['tmp_name'];
    $foto_tipo = $_FILES['foto_url']['type'];
    $foto_tamano = $_FILES['foto_url']['size'];

    // Ruta donde se guardará la imagen (puedes ajustar según tu configuración)
    $ruta = 'images/'.$foto_nombre;

    // Mueve el archivo temporal a la ubicación deseada
    if(move_uploaded_file($foto_temp, $ruta)) {
        // Prepara la consulta de inserción
        $query_INSERT = "INSERT INTO lugares (user_id, pais, ubicacion, descripcion, categoria, foto_url) VALUES (?, ?, ?, ?, ?, ?)";
    
        // Prepara la sentencia
        if ($stmt = mysqli_prepare($conn, $query_INSERT)) {
            // Vincula los parámetros
            mysqli_stmt_bind_param($stmt, 'isssss', $id_usuario, $pais, $ubicacion, $descripcion, $categoria, $ruta);
            
            // Ejecuta la sentencia
            if (mysqli_stmt_execute($stmt)) {
                echo '<script>
                    Swal.fire({
                        title: "OK",
                        text: "PUBLICACION GUARDADA",
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
                    Swal.fire({
                        title: "Oops...",
                        text: "ERROR AL PUBLICAR",
                        icon: "error",
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
            }
            // Cierra la sentencia
            mysqli_stmt_close($stmt);
        } else {
            echo '<script>
                alert("Error al preparar la consulta: ' . mysqli_error($conn) . '");
                location.href = "cont.php";
            </script>';
        }
    } else {
        echo '<script>
            Swal.fire({
                title: "Error",
                text: "Error al mover el archivo",
                icon: "error",
                confirmButtonColor: "#2174bd",
                confirmButtonText: "Volver"
            }).then(() => {
                window.location.href = "cont.php";
            });
        </script>';
    }
} else {
    echo '<script>
        Swal.fire({
            title: "Error",
            text: "Debes completar todos los campos",
            icon: "error",
            confirmButtonColor: "#2174bd",
            confirmButtonText: "Volver"
        }).then(() => {
            window.location.href = "cont.php";
        });
    </script>';
}

// Cierra la conexión
mysqli_close($conn);
?>
