<?php
include('../../Database/conexion.php');

// Obtener los datos enviados por el cuerpo de la solicitud
$data = json_decode(file_get_contents('php://input'), true);

// Extraer los datos de la solicitud
$nombre_platillo = $data['nombre_platillo'];
$precio = $data['precio'];
$tipo_producto = $data['tipo_producto'];  // ID del tipo de producto
$tipo_platillo = $data['tipo_platillo'];  // ID del tipo de platillo
$photo = $data['photo'];  // URL de la imagen

// Insertar el nuevo platillo en la base de datos
$query = "INSERT INTO platillos (nombre_platillo, precio, id_tipo_platillo, id_tipo_producto, photo) 
          VALUES ('$nombre_platillo', '$precio', '$tipo_platillo', '$tipo_producto', '$photo')";

if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true, 'message' => 'Platillo agregado correctamente.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al agregar el platillo.']);
}
?>