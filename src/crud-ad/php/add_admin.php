<!DOCTYPE html>
<html lang="es">
    <body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include('db_connection.php');

// Obtener datos del formulario
$email = $_POST['email'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];

// Hashear la contraseña para mayor seguridad
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Insertar datos en la base de datos
$sql = "INSERT INTO administradores (correo, nombre, contra) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $email, $nombre, $hashed_password);

if ($stmt->execute()) {
    echo "<script>
    swal.fire({
        icon: 'success',
        title: '¡Registro exitoso!',
        text: '¡Registro de administrador!',
        showConfirmButton: false,
        timer: 2000
    }).then(function() {
        window.location = '../agreagr_ad.php'; // URL para usuarios comunes
    });
</script>";
exit();;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>

</body>
</html>