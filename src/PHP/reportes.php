<!DOCTYPE html>
<html lang="es">
<body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
// Conectar a la base de datos (reemplaza los valores con los de tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crea";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Recibir datos del formulario
$reporte = $_POST['reporte'];

// Preparar la consulta SQL (escapar datos para prevenir SQL Injection)
$sql = "INSERT INTO `reportes` (`id`, `reporte`) VALUES (NULL, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $reporte);

// Ejecutar la consulta
if ($stmt->execute()) {
    echo "
    <script language='JavaScript'>
        swal.fire({
            icon: 'success',
            title: 'Reporte registrado correctamente',
            showConfirmButton: false,
            timer: 2000
        }).then(function() {
            window.location = '../reportar.php';
        });
    </script>
    ";
} else {
    echo "
    <script language='JavaScript'>
        swal.fire({
            icon: 'error',
            title: 'Error al registrar el reporte',
            showConfirmButton: false,
            timer: 2000
        }).then(function() {
            window.location = '../reportar.php';
        });
    </script>
    ";
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?> 
</body>
</html>
