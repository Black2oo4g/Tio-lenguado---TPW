<?php
include('../../Database/conexion.php');

// Obtener los datos enviados por el cuerpo de la solicitud
$data = json_decode(file_get_contents('php://input'), true);

// Extraer los datos de la solicitud
$nombre_platillo = $data['nombre_platillo'];
$precio = $data['precio'];
$tipo_producto = $data['tipo_producto'];  // Se usa 'tipo_producto' para el ID del tipo de producto
$tipo_platillo = $data['tipo_platillo'];  // Se usa 'tipo_platillo' para el ID del tipo de platillo
$photo = $data['photo'];  // Imagen (URL)

// Actualizar el platillo en la base de datos
$query = "UPDATE platillos 
          SET nombre_platillo = '$nombre_platillo', precio = '$precio', 
              id_tipo_platillo = '$tipo_platillo', id_tipo_producto = '$tipo_producto', photo = '$photo' 
          WHERE id = '$data[id]'";

if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true, 'message' => 'Platillo actualizado correctamente.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al actualizar el platillo.']);
}
?>
