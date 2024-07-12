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
    (!empty($_POST['categoria'])) ||
    (!empty($_FILES['foto_url']))

) {
    // Sanitiza las entradas del usuario
    $pais = mysqli_real_escape_string($conn, $_POST['pais']);
    $ubicacion = mysqli_real_escape_string($conn, $_POST['ubicacion']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);
    //$foto_url = mysqli_real_escape_string($conn, $_FILES['foto_url']);
// Procesa la imagen subida
    $foto_nombre = $_FILES['foto_url']['name'];
    $foto_temp = $_FILES['foto_url']['tmp_name'];
    $foto_tipo = $_FILES['foto_url']['type'];
    $foto_tamano = $_FILES['foto_url']['size'];

     // Ruta donde se guardará la imagen (puedes ajustar según tu configuración)
     $ruta = 'images/'.$foto_nombre;
    // Prepara la consulta de inserción
    
    
    if(move_uploaded_file($foto_temp, $ruta)) {
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
                    text: "PUBLICACION GUARDADA ",
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
                    text: "ERROR AL PUBLICAR ",
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
                location.href = ("cont.php");        
            </script>';
        }
    } else {
        echo '<script>
            alert("Debes completar todos los campos");      
            location.href = ("cont.php");        
        </script>';
    }
}

// Cierra la conexión
mysqli_close($conn);