<?php
include('../../Database/conexion.php');

// Obtener los datos enviados por POST
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];

// Verificar que el ID esté presente
if (isset($id)) {
    // Consulta para eliminar el platillo
    $query = "DELETE FROM platillos WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        // Si la eliminación es exitosa
        echo json_encode(['success' => true]);
    } else {
        // Si ocurre un error al eliminar
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}
?>
