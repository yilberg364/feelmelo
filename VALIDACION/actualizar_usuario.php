<?php
session_start();

// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feel_melo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$identificacion = $_POST['identificacion'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];

// Actualizar los datos en la base de datos
$sql = "UPDATE usuarios SET nombre_us = '$nombre', apellido = '$apellido', correo = '$correo', celular = '$celular' WHERE identificacion_us = '$identificacion'";

if ($conn->query($sql) === TRUE) {
    // La actualización fue exitosa
    echo '<script>alert("Datos actualizados correctamente"); window.location = "formulario_actualizar.html";</script>';
} else {
    // Hubo un error en la actualización
    echo '<script>alert("Error al actualizar los datos"); window.location = "formulario_actualizar.html";</script>';
}

$conn->close();
?>
