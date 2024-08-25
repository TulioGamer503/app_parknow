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
    <title>Vigilante</title>
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
            <h1 class="text-2xl font-bold mb-6">Administradores</h1>
            <button id="addAdminBtn" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Agregar
                Admin</button>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-gray-900 border dark:border-gray-700">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                Email
                            </th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                Fecha de Registro
                            </th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 bg-gray-200 dark:bg-gray-800 text-left text-xs leading-4 font-medium text-gray-600 dark:text-gray-200 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <?php
                    include('php/ver_ad.php')
                        ?>
                </table>
                <div class="flex justify-between items-center mt-4">
                    <button id="prev-btn"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Anterior</button>
                    <button id="next-btn"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Siguiente</button>
                </div>
            </div>
        </main>
    </div>
    <div id="addAdminModal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
            <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Agregar Admin</h3>
                <button class="text-gray-400 hover:text-gray-500 focus:outline-none focus:text-gray-500 close">
                    <span class="sr-only">Close</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <form id="addAdminForm" action="php/add_admin.php" method="POST">
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                        <input type="email" id="email" name="email" required
                            class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" required
                            class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña:</label>
                        <input type="password" id="password" name="password" required
                            class="mt-1 p-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');

            let currentPage = <?php echo $current_page; ?>;
            const total_pages = <?php echo $total_pages; ?>;

            prevBtn.addEventListener('click', function () {
                if (currentPage > 1) {
                    currentPage--;
                    window.location.href = `?page=${currentPage}`;
                }
            });

            nextBtn.addEventListener('click', function () {
                if (currentPage < total_pages) {
                    currentPage++;
                    window.location.href = `?page=${currentPage}`;
                }
            });
        });
        // Obtener elementos del DOM
        const modal = document.getElementById("addAdminModal");
        const btn = document.getElementById("addAdminBtn");
        const closeBtn = document.getElementsByClassName("close")[0];

        // Mostrar el modal cuando se haga clic en el botón
        btn.onclick = function () {
            modal.classList.remove("hidden");
        }

        // Cerrar el modal cuando se haga clic en el botón de cerrar (x)
        closeBtn.onclick = function () {
            modal.classList.add("hidden");
        }

        // Cerrar el modal cuando se haga clic fuera del contenido del modal
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.classList.add("hidden");
            }
        }
    </script>
</body>

</html>