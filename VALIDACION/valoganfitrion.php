<?php
include_once '../config/conexion.php';
session_start();

if (!empty($_POST)) {
    $identificacion = mysqli_real_escape_string($con, $_POST['identificacion_anf']);
    $password = mysqli_real_escape_string($con, $_POST['contraseña_anf']);
    $password_encriptada = $password;

    // Verificar en la tabla de anfitrion
    $sql = "SELECT anfitrion_id FROM anfitrion WHERE identificacion_anf = '$identificacion' AND contraseña_anf = '$password_encriptada'";
    $resultado = $con->query($sql);
    $rows = $resultado->num_rows;

    if ($rows > 0) {
        $row = $resultado->fetch_assoc();
        $_SESSION['id_anfitrion'] = $row['anfitrion_id'];
        echo "<script>
            alert('Ingreso ANFITRION exitoso');
            window.location = '../indexA.php';
            </script>";
        exit();
    } else {
        // Si no es anfitrion, verificar si es admin
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
