<!DOCTYPE html>
<html lang="es">
    <body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
include('db_connection.php'); 
session_start();

if (!isset($_POST['email'])) {
    header('location:../login-ad.html');
}

$correo = $_POST['email'];
$contra = $_POST['password'];

$sql_admin = "SELECT * FROM administradores WHERE correo = '$correo' and contra = '$contra'";
$result_admin = mysqli_query($conn, $sql_admin);
$existe1 = mysqli_num_rows($result_admin);


if ($existe1 > 0) {
    while ($row = mysqli_fetch_array($result_admin)) {
        if ($correo == $row['correo'] && $contra == $row['contra']) {
            $_SESSION['email'] = $row['correo'];
            $_SESSION['id'] = $row['id'];
            echo "
            <script language='JavaScript'>
                swal.fire({
                    icon: 'success',
                    title: '¡Bienvenid@ a ParkNow Administrador!',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location = '../crud-ad/index.php';
                });
            </script>";
        }
    }
} else 
 {
    echo "
    <script language='JavaScript'>
        swal.fire({
            icon: 'error',
            title: 'Su usuario o contraseña pueden estar incorrecto',
            text: '¡Vuelva a ingresar sus datos!',
        }).then(function() {
            window.location = '../login-ad.html';
        });
    </script>
    ";
}

?>
</body>
</html>
