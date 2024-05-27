<?php
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
$nombre = $_POST['nombre_anf'];
$apellido = $_POST['apellido_anf'];
$identificacion = $_POST['identificacion_anf'];
$correo = $_POST['correo_anf'];
$celular = $_POST['celular_anf'];
$contrasena = $_POST['contraseña_anf'];
$pais=$_POST['pais_anf'];
$ciudad=$_POST['ciudad_anf'];

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

// Verificar la unicidad de la identificación, el correo y el celular en la tabla anfitrion
$consulta_anfitrion = "SELECT anfitrion_id FROM anfitrion WHERE identificacion_anf = '$identificacion' OR correo_anf = '$correo' OR celular_anf = '$celular'";
$resultado_anfitrion = $conn->query($consulta_anfitrion);
$rows_anfitrion = $resultado_anfitrion->num_rows;

if ($rows_anfitrion > 0) {
    echo "<script>
        alert('La identificación, el correo o el número de celular ya están en uso. Por favor, elige otros.');
        window.location = '../index.php';
        </script>";
    exit();
}

// Insertar los datos en la tabla de anfitrion
$sql = "INSERT INTO anfitrion (nombre_anf, apellido_anf, identificacion_anf, correo_anf, celular_anf, contraseña_anf,pais_anf, ciudad_anf) 
            VALUES ('$nombre', '$apellido', '$identificacion', '$correo', '$celular', '$contrasena','$pais','$ciudad')";

if ($conn->query($sql) === TRUE) {
    // El registro fue exitoso
    echo '<script>alert("Anfitrión registrado correctamente"); window.location = "../index.php";</script>';
} else {
    // Hubo un error en el registro
    echo '<script>alert("Error al registrar el anfitrión"); window.location = "../index.php";</script>';
}

mysqli_close($conn);
?>
