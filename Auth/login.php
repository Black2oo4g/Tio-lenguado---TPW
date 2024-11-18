<?php
session_start();
include('../Database/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['correo_usuario']) || empty($_POST['contrasena_usuario'])) {
        echo json_encode(['status' => 'error', 'message' => 'Por favor ingresa tu correo y contraseña.']);
        exit();
    }

    $email = mysqli_real_escape_string($conn, $_POST['correo_usuario']);
    $password = mysqli_real_escape_string($conn, $_POST['contrasena_usuario']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Por favor ingresa un correo válido.']);
        exit();
    }

    $query = "SELECT * FROM usuarios WHERE correo_usuario = '$email' AND tipo_usuario = 'administrador'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if ($password === $user['contrasena_usuario']) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['nombre_usuario'] = $user['nombre_usuario'];
            $_SESSION['correo_usuario'] = $user['correo_usuario'];
            $_SESSION['tipo_usuario'] = $user['tipo_usuario'];
            $_SESSION['fecha_creacion'] = $user['fecha_creacion'];
            $_SESSION['contrasena_usuario'] = $user['contrasena_usuario'];

            echo json_encode(['status' => 'success', 'message' => 'Inicio de sesión exitoso.', 'redirect' => '../Vista/index.php']);
            exit();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'La contraseña ingresada es incorrecta.']);
            exit();
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'El correo ingresado no está registrado o no tienes permisos de administrador.']);
        exit();
    }
}
?>
