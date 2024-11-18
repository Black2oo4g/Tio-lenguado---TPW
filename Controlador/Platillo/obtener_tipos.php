<?php
include('../../Database/conexion.php');

// Obtener las opciones para id_tipo_platillo
$query_tipo_platillo = "SELECT id, nombre_tipo_platillo FROM tipo_platillo";
$result_tipo_platillo = mysqli_query($conn, $query_tipo_platillo);
$tipos_platillo = [];

while ($row = mysqli_fetch_assoc($result_tipo_platillo)) {
    $tipos_platillo[] = $row;
}

// Obtener las opciones para id_tipo_producto
$query_tipo_producto = "SELECT id, nombre_tipo FROM tipo_producto";
$result_tipo_producto = mysqli_query($conn, $query_tipo_producto);
$tipos_producto = [];

while ($row = mysqli_fetch_assoc($result_tipo_producto)) {
    $tipos_producto[] = $row;
}

// Devolver los datos en formato JSON
echo json_encode([
    'tipos_platillo' => $tipos_platillo,
    'tipos_producto' => $tipos_producto
]);

// Cerrar la conexión
mysqli_close($conn);
?>
