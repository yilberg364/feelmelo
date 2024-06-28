<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar perfil</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
<?php
/* incluimos la base de datos */

include("../../config/conexion.php");


/* recibimos los datos de l formulario*/
if (
    $_POST['nombre'] == '' ||
    $_POST['apellido'] == '' ||
    $_POST['cedula'] == '' ||
    $_POST['correo'] == '' ||
    $_POST['celular'] == '' ||
    $_POST['pais'] == '' ||
    $_POST['ciudad'] == '' ||
    $_POST['descripcion'] == ''
) {
    echo '<script>
    Swal.fire({
        title: "Algo salió mal",
        text: "Revisa la dirección de correo electrónico",
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
exit();
} else {
    $id_usuario_ingresado = $_POST["id_usuario_ingresado"];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];
    $descripcion = $_POST['descripcion'];
}

/* if(filter_var( $correo, FILTER_VALIDATE_EMAIL)){
   mail("keyquotes@gmail.com", $id_usuario_ingresado, $nombre,  $apellido,  $cedula, $correo);
    header("window.location.href =../perfil.php");
} */
/* VALIDACION PARA EL CORREO ELECTRONICO */

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {

        /*     ejecutar la consulta de update*/
        $query_update = "UPDATE usuarios SET
        nombre_us = '$nombre',
        apellido = '$apellido',
        identificacion_us = '$cedula',
        correo = '$correo',
        celular = '$celular',
        pais = '$pais',
        ciudad = '$ciudad',
        descripcion = '$descripcion' WHERE usuario_id = '$id_usuario_ingresado';";
        $execute_update = mysqli_query($conn, $query_update) or die(mysqli_error($conn));


        if ($execute_update) {
            echo '<script>
        Swal.fire({
            title: "OK",
            text: "cambios realizados correctamente ",
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
            text: "Revisa la dirección de correo electrónico",
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
            text: "Revisa la dirección de correo electrónico",
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