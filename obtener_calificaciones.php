<?php
include_once 'config/conexion.php';

$lugar_id = $_GET['lugar_id'] ?? '';

if (!empty($lugar_id)) {
    // Consulta para obtener las calificaciones con nombre de usuario
    $query = "SELECT cal.comentario, usu.nombre_us AS usuario, cal.calificacion, cal.foto_url
              FROM calificaciones cal
              JOIN usuarios usu ON cal.user_id = usu.usuario_id
              WHERE cal.lug_id = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $lugar_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $calificaciones = array();
    while ($row = $result->fetch_assoc()) {
        $calificaciones[] = $row;
    }

    echo json_encode($calificaciones);
} else {
    echo json_encode(array()); // Devolver un array vacío si no se proporciona el lugar_id
}
?>
