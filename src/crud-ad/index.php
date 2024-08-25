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
    <title>Inicio</title>
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
            <?php
            include('php/ver_usu.php')
            ?>
            </table>
            <div class="flex justify-between items-center mt-4">
                    <button id="prev-btn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Anterior</button>
                    <button id="next-btn" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Siguiente</button>
                </div>
            </div>
        </main>
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
</script>
</body>
</html>
