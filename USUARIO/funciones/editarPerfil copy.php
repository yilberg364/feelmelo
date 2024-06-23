<?php

// incluimos la base de datos 
include("../../config/conexion.php");

//recibimos los datos del formulario

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

    //ejecutar la consulta de update

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
                    alert("Usuario Actualizado Correctamente");
                    location.href = ("../perfil.php");        
             </script>';
    } else {
        echo '<script>
                    alert("Lo siento algo salió mal");
                    location.href = ("../perfil.php");        
             </script>';
    }
}
