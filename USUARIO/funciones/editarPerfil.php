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
include("../../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recibir datos del formulario
    $id_usuario_ingresado = $_POST["id_usuario_ingresado"];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];
    $descripcion = $_POST['descripcion'];
    $contrasena = $_POST['contrasena'];

    // Validación del correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo '<script>
            Swal.fire({
                title: "Error",
                text: "El correo electrónico ingresado no es válido.",
                icon: "error",
                confirmButtonColor: "#2174bd",
                confirmButtonText: "Aceptar",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../perfil.php";
                }
            });
        </script>';
        exit();
    }

    $query_update = "UPDATE usuarios SET
        nombre_us = '$nombre',
        apellido = '$apellido',
        identificacion_us = '$cedula',
        correo = '$correo',
        celular = '$celular',
        pais = '$pais',
        ciudad = '$ciudad',
        descripcion = '$descripcion',
        contraseña_us = '$contrasena'
        WHERE usuario_id = '$id_usuario_ingresado'";

    $execute_update = mysqli_query($conn, $query_update);

    if ($execute_update) {
        echo '<script>
            Swal.fire({
                title: "OK",
                text: "Cambios realizados correctamente",
                icon: "success",
                confirmButtonColor: "#2174bd",
                confirmButtonText: "Volver",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../perfil.php";
                }
            });
        </script>';
    } else {
        echo '<script>
            Swal.fire({
                title: "Algo salió mal",
                text: "Error al actualizar los datos",
                icon: "error",
                confirmButtonColor: "#2174bd",
                confirmButtonText: "Volver",
                allowOutsideClick: false,
                allowEscapeKey: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "../perfil.php";
                }
            });
        </script>';
    }
}
