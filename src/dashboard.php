<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_email'])) {
    header("Location: ../login.html");
    exit();
}

echo "Bienvenido, " . htmlspecialchars($_SESSION['user_email']) . "!";
?>

<a href="PHP/logout.php">Cerrar Sesión</a>
