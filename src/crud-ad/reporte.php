<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:../login.html');
    exit();
}

// Aquí obtienes el nombre del usuario desde la sesión o la base de datos
$nombre_usuario = $_SESSION['email']; // Asumiendo que guardaste el nombre del usuario en la sesión
include 'db_connection.php'; // Incluye el archivo de conexión

$sql = "SELECT * FROM reportes";
$result = $conn->query($sql);
?>
<!doctype html>
<html class="bg-gray-200">

<head>
    <title>Reporte</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="flex h-screen">
        <?php
        include('templates/aside.php')
            ?>
        <main class="flex-1 p-10">
            <h1 class="text-2xl font-bold mb-6">Reportes</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-gray-900 border dark:border-gray-700">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                Reporte
                            </th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                Fecha
                            </th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                Acción
                            </th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                <td class='px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700'>" . htmlspecialchars($row["reporte"]) . "</td>
                                <td class='px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700'>" . htmlspecialchars($row["fecha"]) . "</td>
                                <td class='px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700'>
                                    <form method='post' style='display:inline;'>
                                        <input type='hidden' name='delete_id' value='" . htmlspecialchars($row["id"]) . "' />
                                        <button type='submit' class='text-red-600 hover:text-red-800'>
                                            Borrar
                                        </button>
                                    </form>
                                </td>
                            </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3' class='px-6 py-4 text-center'>No hay reportes disponibles</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const rowsPerPage = 6;
            const tableBody = document.getElementById("table-body");
            const rows = tableBody.getElementsByTagName("tr");
            const totalRows = rows.length;
            let currentPage = 1;
            const totalPages = Math.ceil(totalRows / rowsPerPage);

            function showPage(page) {
                const start = (page - 1) * rowsPerPage;
                const end = start + rowsPerPage;

                for (let i = 0; i < totalRows; i++) {
                    rows[i].style.display = i >= start && i < end ? "" : "none";
                }
            }

            document.getElementById("prev-btn").addEventListener("click", function () {
                if (currentPage > 1) {
                    currentPage--;
                    showPage(currentPage);
                }
            });

            document.getElementById("next-btn").addEventListener("click", function () {
                if (currentPage < totalPages) {
                    currentPage++;
                    showPage(currentPage);
                }
            });

            showPage(currentPage);
        });
    </script>
</body>

</html>