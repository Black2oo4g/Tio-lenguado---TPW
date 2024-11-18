<?php
include('../../Database/conexion.php');

// Obtener los datos enviados por el cuerpo de la solicitud
$data = json_decode(file_get_contents('php://input'), true);

// Extraer los datos de la solicitud
$id = $data['id'];
$nombre_platillo = $data['nombre_platillo'];
$precio = $data['precio'];
$tipo_producto = $data['tipo_producto'];  // Se usa 'tipo_producto' para el ID del tipo de producto
$tipo_platillo = $data['tipo_platillo'];  // Se usa 'tipo_platillo' para el ID del tipo de platillo
$photo = $data['photo']; // Se obtiene el campo 'photo'

// Si se proporciona una nueva foto, actualiza el campo de la base de datos
if ($photo) {
    // Actualizar la base de datos
    $query = "UPDATE platillos SET nombre_platillo = '$nombre_platillo', precio = '$precio', 
              id_tipo_producto = '$tipo_producto', id_tipo_platillo = '$tipo_platillo', photo = '$photo' 
              WHERE id = '$id'";
} else {
    // Si no se proporciona una nueva foto, actualiza sin modificar el campo 'photo'
    $query = "UPDATE platillos SET nombre_platillo = '$nombre_platillo', precio = '$precio', 
              id_tipo_producto = '$tipo_producto', id_tipo_platillo = '$tipo_platillo' 
              WHERE id = '$id'";
}

if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
}
?>