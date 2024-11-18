<?php
include('../Database/conexion.php');

session_start();

if (!isset($_SESSION['usuario_id'])) {
    echo "<script>
        alert('Por favor, inicie sesión primero.');
        window.location.href = '../Public_html/login.html';
    </script>";
    exit();
}
// Recuperar los datos del usuario desde la sesión
$nombre_usuario = $_SESSION['nombre_usuario'];
$correo_usuario = $_SESSION['correo_usuario'];
$tipo_usuario = $_SESSION['tipo_usuario'];
$fecha_creacion = $_SESSION['fecha_creacion'];
$contrasena_usuario = $_SESSION['contrasena_usuario'];
?>