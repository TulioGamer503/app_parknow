<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:../login.html');
    exit();
}

// Aquí obtienes el nombre del usuario desde la sesión o la base de datos
$nombre_usuario = $_SESSION['email']; // Asumiendo que guardaste el nombre del usuario en la sesión
?>
<!doctype html>
<html class="bg-gray-200">
<head>
    <title>Soporte</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
</head>
<body>
    <div class="flex h-screen">
    <?php
        include('templates/aside.php')
        ?>
        
        <main class="flex-1 p-10">
            <h1 class="text-2xl font-bold mb-6">Usuarios Registrados</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-gray-900 border dark:border-gray-700">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                Email
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                Fecha de Registro
                            </th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                Juan Pérez
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                juan.perez@example.com
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                2024-06-18
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                <button class="text-gray-600 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m2-4h2m-4 8h4m4 5H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z" />
                                    </svg>
                                </button>
                                <button class="text-gray-600 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-1 14H6L5 7m14 0H5M4 4h16M10 11v6m4-6v6" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                María López
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                maria.lopez@example.com
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                2024-06-19
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                <button class="text-gray-600 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m2-4h2m-4 8h4m4 5H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z" />
                                    </svg>
                                </button>
                                <button class="text-gray-600 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-1 14H6L5 7m14 0H5M4 4h16M10 11v6m4-6v6" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                María López
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                maria.lopez@example.com
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                2024-06-19
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                <button class="text-gray-600 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m2-4h2m-4 8h4m4 5H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z" />
                                    </svg>
                                </button>
                                <button class="text-gray-600 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-1 14H6L5 7m14 0H5M4 4h16M10 11v6m4-6v6" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                María López
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                maria.lopez@example.com
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                2024-06-19
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                <button class="text-gray-600 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m2-4h2m-4 8h4m4 5H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z" />
                                    </svg>
                                </button>
                                <button class="text-gray-600 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-1 14H6L5 7m14 0H5M4 4h16M10 11v6m4-6v6" />
                                    </svg>
                                </button>
                            </td>
                        </tr><tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                María López
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                maria.lopez@example.com
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                2024-06-19
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                <button class="text-gray-600 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m2-4h2m-4 8h4m4 5H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z" />
                                    </svg>
                                </button>
                                <button class="text-gray-600 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-1 14H6L5 7m14 0H5M4 4h16M10 11v6m4-6v6" />
                                    </svg>
                                </button>
                            </td>
                        </tr><tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                María López
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                maria.lopez@example.com
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                2024-06-19
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                <button class="text-gray-600 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m2-4h2m-4 8h4m4 5H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z" />
                                    </svg>
                                </button>
                                <button class="text-gray-600 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-1 14H6L5 7m14 0H5M4 4h16M10 11v6m4-6v6" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                María López
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                maria.lopez@example.com
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                2024-06-19
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                <button class="text-gray-600 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m2-4h2m-4 8h4m4 5H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z" />
                                    </svg>
                                </button>
                                <button class="text-gray-600 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-1 14H6L5 7m14 0H5M4 4h16M10 11v6m4-6v6" />
                                    </svg>
                                </button>
                            </td>
                        </tr><tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                María López
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                maria.lopez@example.com
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                2024-06-19
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                <button class="text-gray-600 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m2-4h2m-4 8h4m4 5H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z" />
                                    </svg>
                                </button>
                                <button class="text-gray-600 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-1 14H6L5 7m14 0H5M4 4h16M10 11v6m4-6v6" />
                                    </svg>
                                </button>
                            </td>
                        </tr><tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                María López
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                maria.lopez@example.com
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                2024-06-19
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 dark:border-gray-700">
                                <button class="text-gray-600 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H9m2-4h2m-4 8h4m4 5H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z" />
                                    </svg>
                                </button>
                                <button class="text-gray-600 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-400 mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-1 14H6L5 7m14 0H5M4 4h16M10 11v6m4-6v6" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        <!-- Agrega más filas según sea necesario -->
                    </tbody>
                </table>
                <div class="flex justify-between items-center mt-4">
                    <button id="prev-btn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Anterior</button>
                    <button id="next-btn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Siguiente</button>
                </div>
            </div>
        </main>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
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

            document.getElementById("prev-btn").addEventListener("click", function() {
                if (currentPage > 1) {
                    currentPage--;
                    showPage(currentPage);
                }
            });

            document.getElementById("next-btn").addEventListener("click", function() {
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
