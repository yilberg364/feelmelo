<?php
include "../VALIDACION/conexion.php";
session_start();

if (!empty($_POST)) {
    $identificacion = mysqli_real_escape_string($con, $_POST['identificacion']);
    $password = mysqli_real_escape_string($con, $_POST['contrasena']);
    $password_encriptada = $password;

    $sql = "SELECT usuario_id FROM usuarios WHERE identificacion_us = '$identificacion' AND contraseña_us = '$password_encriptada'";
    $resultado = $con->query($sql);
    $rows = $resultado->num_rows;

    if ($rows > 0) {
        $row = $resultado->fetch_assoc();
        $_SESSION['id_usuario'] = $row['usuario_id'];
        echo "<script>
            alert('Ingreso USUARIO exitoso');
            window.location = '../cont.php';
            </script>";
        exit();
    } else {
        $consulta_admin = "SELECT * FROM administradores WHERE identificacion_ad ='$identificacion' AND contraseña_ad ='$password_encriptada'";
        $resultado_admin = $con->query($consulta_admin);
        $rows_admin = $resultado_admin->num_rows;

        if ($rows_admin > 0) {
            $row_admin = $resultado_admin->fetch_assoc();
            $_SESSION['es_admin'] = $row_admin['admin_id'];
            echo "<script>
            alert('Ingreso ADMIN exitoso');
            window.location = '../index.php';
            </script>";
            exit();
        } else {
            echo "<script>
            alert('Usuario o contraseña incorrectos');
            window.location = '../index.php';
            </script>";
        }
    }
}

mysqli_close($conn);

?>
