<?php
include('../includes/conexion.php'); // Asegúrate de que la ruta sea correcta

$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';
$tipo_platillo = isset($_GET['tipo']) ? $_GET['tipo'] : '';

// Establecer el where_clause
$where_clause = "";
if ($tipo_platillo != '') {
    $where_clause = " WHERE p.id_tipo_producto = '$tipo_platillo'";
}
if (!empty($buscar)) {
    $where_clause .= " AND p.nombre_platillo LIKE '%$buscar%'";
}

$registros_por_pagina = 8;
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$offset = ($pagina_actual - 1) * $registros_por_pagina;

$query = "SELECT p.id, p.nombre_platillo, p.precio, tp.nombre_tipo, p.photo 
          FROM platillos p 
          JOIN tipo_producto tp ON p.id_tipo_producto = tp.id
          $where_clause 
          ORDER BY p.id DESC 
          LIMIT $offset, $registros_por_pagina";

$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $img_url = !empty($row['photo']) ? "ruta/a/imagenes/" . $row['photo'] : "ruta/a/imagen_default.jpg";
        echo "<tr>";
        echo "<td><img src='$img_url' alt='Imagen del platillo' class='img-thumbnail' style='width: 50px; height: 50px;'></td>";
        echo "<td>" . htmlspecialchars($row['nombre_platillo']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nombre_tipo']) . "</td>";
        echo "<td>s/" . htmlspecialchars($row['precio']) . "</td>";
        echo "<td><button class='btn btn-warning btn-sm me-2' onclick='editarPlatillo(" . $row['id'] . ")'><i class='bi bi-pencil-square'></i> Editar</button>";
        echo "<button class='btn btn-danger btn-sm me-2' onclick='eliminarPlatillo(" . $row['id'] . ")'><i class='bi bi-trash'></i> Borrar</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5' class='text-center'>No hay datos disponibles</td></tr>";
}
?>