<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'crea-j 2024';

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
if (!$conn) {
    die("Error de la conexion a la base de datos: " . mysqli_connect_error());
}
$descripcion = $_POST['descripcion'];
$categoria_id = $_POST['categoria'];
session_start();
$usuario_id = $_SESSION['ID_Usuario']; 
$insert_query = "INSERT INTO datos (id, descripcion, categoria_id, usuario_id) VALUES (NULL, '$descripcion', '$categoria_id', $usuario_id)";

if (mysqli_query($conn, $insert_query)) {
    header('Location: ../html/index.php');

    echo "Reporte guardado con éxito.";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
