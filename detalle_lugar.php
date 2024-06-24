<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
    echo '<script>alert("Debes iniciar sesión para ver detalles"); window.location = "index.php";</script>';
    exit;
}

$host = "localhost";
$dbname = "u197522469_feelmelo";
$username = "root";
$password = "";
$conn = new mysqli($host, $username, $password, $dbname);

$id_lugar = $_GET['id_lugar'] ?? ''; // Obtener el ID del lugar de la URL

if (!empty($id_lugar)) {
    $stmt = $conn->prepare("SELECT calificacion, comentario, fot_url FROM calificaciones WHERE lug_id = ?");
    $stmt->bind_param("s", $id_lugar);
    $stmt->execute();
    $result = $stmt->get_result();
    $calificaciones = $result->fetch_all(MYSQLI_ASSOC);
} else {
    // Manejo del caso en el que no se proporciona un ID válido
}

// Ahora puedes mostrar las calificaciones en tu página usando el array $calificaciones
?>

<!-- Tu HTML para mostrar las calificaciones aquí -->

<?php
$stmt->close();
$conn->close();
?>
