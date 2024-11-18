<?php
session_start();
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión actual

echo json_encode(['status' => 'success', 'message' => 'Sesión finalizada exitosamente.']);
exit();
?>
