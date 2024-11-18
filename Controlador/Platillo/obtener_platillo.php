<?php
include('../../Database/conexion.php');

// Obtener el ID del platillo desde la URL
$id = $_GET['id'];

// Modificar la consulta para obtener todos los campos necesarios
$query = "SELECT p.id, p.nombre_platillo, p.precio, p.id_tipo_producto, p.id_tipo_platillo, p.photo, tp.nombre_tipo 
          FROM platillos p 
          JOIN tipo_producto tp ON p.id_tipo_producto = tp.id 
          WHERE p.id = '$id'";

// Ejecutar la consulta para obtener el platillo
$result = mysqli_query($conn, $query);

// Verificar si se obtuvo un resultado
if ($result && mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);

    // Obtener las opciones para id_tipo_platillo
    $tipos_platillo_query = "SELECT id, nombre_tipo_platillo FROM tipo_platillo";
    $tipos_platillo_result = mysqli_query($conn, $tipos_platillo_query);
    $tipos_platillo = [];
    while ($row = mysqli_fetch_assoc($tipos_platillo_result)) {
        $tipos_platillo[] = $row;
    }

    // Obtener las opciones para id_tipo_producto
    $tipos_producto_query = "SELECT id, nombre_tipo FROM tipo_producto";
    $tipos_producto_result = mysqli_query($conn, $tipos_producto_query);
    $tipos_producto = [];
    while ($row = mysqli_fetch_assoc($tipos_producto_result)) {
        $tipos_producto[] = $row;
    }

    // Devolver todos los datos, incluidas las opciones para los selects
    echo json_encode([
        'platillo' => $data,
        'tipos_platillo' => $tipos_platillo,
        'tipos_producto' => $tipos_producto
    ]);
} else {
    // Si no se encuentran datos, devolver un mensaje de error
    echo json_encode(['error' => 'Platillo no encontrado']);
}
?>
