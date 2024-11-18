<?php
include('../../Database/conexion.php');

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$nombre_platillo = $data['nombre_platillo'];
$precio = $data['precio'];
$tipo = $data['tipo'];

// Actualizar la base de datos
$query = "UPDATE platillos SET nombre_platillo = '$nombre_platillo', precio = '$precio', id_tipo_producto = '$tipo' WHERE id = '$id'";
if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}
?>
