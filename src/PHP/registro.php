<!DOCTYPE html>
<html lang="es">
    <body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include('db_connection.php'); 

// Recibir y sanitizar datos del formulario
$nombre = $conn->real_escape_string(htmlspecialchars($_POST['nombre']));
$apellido = $conn->real_escape_string(htmlspecialchars($_POST['apellido']));
$email = $conn->real_escape_string(htmlspecialchars($_POST['email']));
$password = htmlspecialchars($_POST['password']);

  // Validar el correo electrónico
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "
    <script language='JavaScript'>
        Swal.fire({
            icon: 'error',
            title: 'Correo electrónico inválido',
            text: 'El correo electrónico no es válido.',
            showConfirmButton: false,
            timer: 3000
        }).then(function() {
            window.location = '../regristro.html';
        });
    </script>
    ";
    exit; 
}

// Encriptar la contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Preparar la consulta de inserción
$sql = "INSERT INTO registro (nombre, apellido, email, contra) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// Verificar si la preparación de la consulta fue exitosa
if ($stmt === false) {
    die("Error preparing the statement: " . $conn->error);
}

// Vincular parámetros y ejecutar la consulta
$stmt->bind_param("ssss", $nombre, $apellido, $email, $hashed_password);

if ($stmt->execute()) {
    echo "
    <script language='JavaScript'>
        Swal.fire({
            icon: 'success',
            title: '¡Registro existoso!',
            showConfirmButton: false,
            timer: 2000
        }).then(function() {
            window.location = '../login.html';
        });
    </script>";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
</body>
</html>


