<?php
include_once 'conexion.php';

$lugar_id = $_GET['lugar_id'] ?? '';

if (!empty($lugar_id)) {
    $query = "SELECT usuario, calificacion, comentario FROM calificaciones WHERE lug_id = ?";
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
