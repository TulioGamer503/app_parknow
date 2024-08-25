<?php
include('db_connection.php');
// Parámetros de paginación
$results_per_page = 6; // Número de resultados por página

// Determinar la página actual
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $current_page = $_GET['page'];
} else {
    $current_page = 1;
}

// Calcular el inicio del conjunto de resultados
$start_from = ($current_page - 1) * $results_per_page;

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// Manejar la solicitud de eliminación
if (isset($_POST['delete_id'])) {
    $delete_id = $conn->real_escape_string($_POST['delete_id']);
    $delete_sql = "DELETE FROM `registro` WHERE `id` = '$delete_id'";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}
// Consulta SQL para obtener los administradores paginados
$sql = "SELECT * FROM `registro` LIMIT $start_from, $results_per_page";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Imprimir datos de cada fila
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">' . htmlspecialchars($row['email']) . '</td>';
        echo '<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">' . htmlspecialchars($row['nombre']) . '</td>';
        echo '<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">' . htmlspecialchars($row['fecha_registro']) . '</td>';
        echo '<td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">';
        echo '<form method="POST" style="display:inline-block;">';
        echo '<input type="hidden" name="delete_id" value="' . htmlspecialchars($row['id']) . '">';
        echo '<button type="submit" class="text-gray-600 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-400 mx-2">';
        echo '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">';
        echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-1 14H6L5 7m14 0H5M4 4h16M10 11v6m4-6v6" />';
        echo '</svg>';
        echo '</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
    }
} else {
    echo "<tr><td colspan='4'>No hay administradores registrados.</td></tr>";
}

// Calcular el número total de páginas
$sql_count = "SELECT COUNT(*) AS total FROM `administradores`";
$result_count = $conn->query($sql_count);
$row_count = $result_count->fetch_assoc();
$total_pages = ceil($row_count['total'] / $results_per_page);

// Cerrar conexión
$conn->close();
?>
