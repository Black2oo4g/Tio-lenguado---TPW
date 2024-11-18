<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'tiolenguado_bd';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>
