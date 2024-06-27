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
    alert("Debes completar todos los campos");
    location.href = ("../perfil.php");        
        </script>';
} else{
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
   
    if (filter_var($correo, FILTER_VALIDATE_EMAIL) && preg_match('/@gmail\.com$/', $correo)) {
        // Código para enviar el correo electrónico (si es necesario)
        $to = "keyquotes@gmail.com";
        $message = "ID de usuario: Correo: $correo";
        $headers = "From: noreply@example.com";

      /*   $to = "keyquotes@gmail.com";
        $subject = "Nuevo usuario registrado";
        $message = "ID de usuario: $id_usuario_ingresado\nNombre: $nombre\nApellido: $apellido\nCédula: $cedula\nCorreo: $correo";
        $headers = "From: noreply@example.com"; */

       
        header("Location: ../perfil.php");
        exit();
    } else {
        // Correo no válido
        echo "<script>
            alert('Por favor, introduce una dirección de Gmail válida.');
            window.location.href = '../perfil.php';
        </script>";
    }
}




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
                                        confirmButtonText: "Volver"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "../perfil.php";
                                        }
                                    });
                                </script>';
                                } else {
                                    echo '<script>
                                        alert("Lo siento algo salió mal");
                                        window.location.href = "../perfil.php";
                                    </script>';
                                }
                            