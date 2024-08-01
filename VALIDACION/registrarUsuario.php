<?php
// Establecer la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "u197522469_feelmelo";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre_us'];
$apellido = $_POST['apellido'];
$identificacion = $_POST['identificacion_us'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$contrasena = $_POST['contraseña_us'];
$pais=$_POST['pais'];
$ciudad=$_POST['ciudad'];
$corta=$_POST['corta'];
$descripcion=$_POST['descripcion'];

// Verificar que el número de celular no sea negativo
if ($celular < 0) {
    echo "<script>
        alert('El número de celular no puede ser negativo');
        window.location = '../index.php';
        </script>";
    exit();
} elseif ($identificacion < 0) {
    echo "<script>
        alert('La identificación no puede ser negativa');
        window.location = '../index.php';
        </script>";
    exit();
}

// Verificar la unicidad de la identificación, el correo y el celular en la tabla usuarios
$consulta_usuario = "SELECT usuario_id FROM usuarios WHERE identificacion_us = '$identificacion' OR correo = '$correo' OR celular = '$celular'";
$resultado_usuario = $conn->query($consulta_usuario);
$rows_usuario = $resultado_usuario->num_rows;

if ($rows_usuario > 0) {
    echo "<script>
        alert('La identificación, el correo o el número de celular ya están en uso. Por favor, elige otros.');
        window.location = '../index.php';
        </script>";
    exit();
}

// Insertar los datos en la tabla de usuarios
$sql = "INSERT INTO usuarios (nombre_us, apellido, identificacion_us, correo, celular, contraseña_us, pais, ciudad, corta, descripcion) 
            VALUES ('$nombre', '$apellido', '$identificacion', '$correo', '$celular', '$contrasena', '$pais', '$ciudad', '$corta', '$descripcion')";



if ($conn->query($sql) === TRUE) {
    // El registro fue exitoso
    echo '<script>alert("Usuario registrado correctamente"); window.location = "../index.php";</script>';
} else {
    // Hubo un error en el registro
    echo '<script>alert("Error al registrar el usuario"); window.location = "../index.php";</script>';
}

mysqli_close($conn);
