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
    $contraseña_actual = $_POST['current_password'];
    $contraseña_nueva = $_POST['new_password'];

    // Verificar si la contraseña actual es correcta
    $query_verificar_contrasena = "SELECT contraseña_us FROM usuarios WHERE usuario_id = '$id_usuario_ingresado'";
    $result = mysqli_query($conn, $query_verificar_contrasena);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $contrasena_hash = $row['contraseña_us'];

        if (password_verify($contraseña_actual, $contrasena_hash)) {
            // La contraseña actual es correcta, proceder con el cambio de datos y contraseña nueva
            $contrasena_nueva_hash = password_hash($contraseña_nueva, PASSWORD_DEFAULT);

            $query_update = "UPDATE usuarios SET
                nombre_us = '$nombre',
                apellido = '$apellido',
                identificacion_us = '$cedula',
                correo = '$correo',
                celular = '$celular',
                pais = '$pais',
                ciudad = '$ciudad',
                descripcion = '$descripcion',
                contraseña_us = '$contrasena_nueva_hash'
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
        } else {
            echo '<script>
                Swal.fire({
                    title: "Error de autenticación",
                    text: "La contraseña actual no es correcta",
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
    } else {
        echo '<script>
            Swal.fire({
                title: "Algo salió mal",
                text: "Error al verificar la contraseña",
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
