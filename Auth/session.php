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
?>