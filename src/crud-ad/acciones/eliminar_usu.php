<?php
// Configuración de la conexión a la base de datos
include('db_connection.php');
// Manejar la solicitud de eliminación
if (isset($_POST['delete_id'])) {
    $delete_id = $conn->real_escape_string($_POST['delete_id']);
    $delete_sql = "DELETE FROM `usu` WHERE `id` = '$delete_id'";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}
?>