<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_email'])) {
    header("Location: login.html");
    exit();
}

// Aquí obtienes el nombre del usuario desde la sesión o la base de datos
$nombre_usuario = $_SESSION['user_email']; // Asumiendo que guardaste el nombre del usuario en la sesión
?>
<!doctype html>
<html>

<head>
    <title>Inicio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="output.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="../img/logo.png" type="image/x-icon">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <nav class="bg-gray-800 py-6 relative">
        <div class="container mx-auto flex px-8 xl:px-0">
            <div class="flex flex-grow">
            <img src="../img/logo.png" alt="Logo" class="w-10">
            </div>
            <div class="flex lg:hidden">
                <img src="../img/barra-de-menus.png" alt="Menu" onclick="openMenu();">
            </div>
            <div id="menu"
                class="lg:flex hidden flex-grow justify-between absolute lg:relative lg:top-0 top-20 bg-gray-800 w-full left-0 py-14 lg:w-auto items-center lg:py-0 px-8 sm:px-24 lg:px-0">
                <div class="flex flex-col lg:flex-row mb-8 lg:mb-0">
                    <a href="index.php" class="text-white lg:mr-7 mb-8 lg:mb-0">Inicio</a>
                    <a href="http://localhost:3000" class="text-white lg:mr-7 mb-8 lg:mb-0">Estacionar</a>
                    <a href="team.php" class="text-white lg:mr-7 mb-8 lg:mb-0">Nosotros</a>
                    <a href="AcercaDe.php" class="text-white">Acerca de</a>
                </div>
                <div class="mb-4 lg:mb-0">
                    <div x-data="{ isOpen: false}" class="relative">
                        <!-- Botón del dropdown -->
                        <button @click="isOpen = !isOpen"
                            class="relative z-10 flex items-center p-2 text-sm text-gray-600 bg-white border border-transparent rounded-md focus:border-blue-500 focus:ring-opacity-40 dark:focus:ring-opacity-40 focus:ring-blue-300 dark:focus:ring-blue-400 focus:ring dark:text-white dark:bg-gray-800 focus:outline-none">
                            <span class="mx-1"><?php echo htmlspecialchars($nombre_usuario); ?></span>
                            <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12 15.713L18.01 9.70299L16.597 8.28799L12 12.888L7.40399 8.28799L5.98999 9.70199L12 15.713Z"
                                    fill="currentColor"></path>
                            </svg>
                        </button>

                        <!-- Menú desplegable -->
                        <div x-show="isOpen" @click.away="isOpen = false"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                            class="absolute right-0 z-20 w-56 py-2 mt-2 overflow-hidden origin-top-right bg-white rounded-md shadow-xl dark:bg-gray-800">
                            <a href="#"
                                class="flex items-center p-3 -mt-2 text-sm text-gray-600 transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                <img class="flex-shrink-0 object-cover mx-1 rounded-full w-9 h-9"
                                    src="https://images.unsplash.com/photo-1523779917675-b6ed3a42a561?ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8d29tYW4lMjBibHVlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=face&w=500&q=200"
                                    alt="Jane Doe avatar">
                                <div class="mx-1">
                                    <h1 class="text-sm font-semibold text-gray-700 dark:text-gray-200">
                                        <?php echo htmlspecialchars($nombre_usuario); ?>
                                    </h1>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Usuario</p>
                                </div>
                            </a>

                            <hr class="border-gray-200 dark:border-gray-700">

                            <a href="perfil.php"
                                class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8C17 10.7614 14.7614 13 12 13C9.23827 13 7 10.7614 7 8ZM12 11C13.6569 11 15 9.65685 15 8C15 6.34315 13.6569 5 12 5C10.3431 5 9 6.34315 9 8C9 9.65685 10.3431 11 12 11Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M6.34315 16.3431C4.84285 17.8434 4 19.8783 4 22H6C6 20.4087 6.63214 18.8826 7.75736 17.7574C8.88258 16.6321 10.4087 16 12 16C13.5913 16 15.1174 16.6321 16.2426 17.7574C17.3679 18.8826 18 20.4087 18 22H20C20 19.8783 19.1571 17.8434 17.6569 16.3431C16.1566 14.8429 14.1217 14 12 14C9.87827 14 7.84344 14.8429 6.34315 16.3431Z"
                                        fill="currentColor"></path>
                                </svg>
                                <span class="mx-1">Ver perfil</span>
                            </a>

                            <a href="#"
                                class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.8199 22H10.1799C9.71003 22 9.30347 21.673 9.20292 21.214L8.79592 19.33C8.25297 19.0921 7.73814 18.7946 7.26092 18.443L5.42392 19.028C4.97592 19.1709 4.48891 18.9823 4.25392 18.575L2.42992 15.424C2.19751 15.0165 2.27758 14.5025 2.62292 14.185L4.04792 12.885C3.98312 12.2961 3.98312 11.7019 4.04792 11.113L2.62292 9.816C2.27707 9.49837 2.19697 8.98372 2.42992 8.576L4.24992 5.423C4.48491 5.0157 4.97192 4.82714 5.41992 4.97L7.25692 5.555C7.50098 5.37416 7.75505 5.20722 8.01792 5.055C8.27026 4.91269 8.52995 4.78385 8.79592 4.669L9.20392 2.787C9.30399 2.32797 9.71011 2.00049 10.1799 2H13.8199C14.2897 2.00049 14.6958 2.32797 14.7959 2.787L15.2079 4.67C15.4887 4.79352 15.7622 4.93308 16.0379 5.088C16.2529 5.202 16.5009 5.374 16.7449 5.555L18.5819 4.97C19.0299 4.82714 19.5169 5.0157 19.7519 5.423L21.5719 8.576C21.8044 8.98348 21.7249 9.49825 21.3799 9.815L19.9549 11.115C20.0202 11.7036 20.0202 12.2971 19.9549 12.885L21.3799 14.185C21.7258 14.5027 21.8059 15.0173 21.5719 15.424L19.7519 18.575C19.5169 18.9823 19.0299 19.1709 18.5819 19.028L16.7449 18.443C16.2623 18.7991 15.7516 19.0958 15.2079 19.33L14.7959 21.214C14.6958 21.673 14.2897 22.0005 13.8199 22ZM12.0009 15.5C14.4813 15.5 16.5009 13.4804 16.5009 11C16.5009 8.51961 14.4813 6.5 12.0009 6.5C9.52055 6.5 7.50092 8.51961 7.50092 11C7.50092 13.4804 9.52055 15.5 12.0009 15.5Z"
                                        fill="currentColor"></path>
                                </svg>
                                <span class="mx-1">Ajustes</span>
                            </a>

                            <a href="PHP/logout.php"
                                class="flex items-center p-3 text-sm text-gray-600 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                                <svg class="w-5 h-5 mx-1" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.5 13.5C19.5 13.2348 19.3946 12.9804 19.2071 12.7929C19.0196 12.6054 18.7652 12.5 18.5 12.5H12.5V11.5H14.5C14.7652 11.5 15.0196 11.3946 15.2071 11.2071C15.3946 11.0196 15.5 10.7652 15.5 10.5V6.5C15.5 6.23478 15.3946 5.98043 15.2071 5.79289C15.0196 5.60536 14.7652 5.5 14.5 5.5H9.5C9.23478 5.5 8.98043 5.60536 8.79289 5.79289C8.60536 5.98043 8.5 6.23478 8.5 6.5V10.5C8.5 10.7652 8.60536 11.0196 8.79289 11.2071C8.98043 11.3946 9.23478 11.5 9.5 11.5H11.5V12.5H5.5C5.23478 12.5 4.98043 12.6054 4.79289 12.7929C4.60536 12.9804 4.5 13.2348 4.5 13.5V18.5C4.5 18.7652 4.60536 19.0196 4.79289 19.2071C4.98043 19.3946 5.23478 19.5 5.5 19.5H18.5C18.7652 19.5 19.0196 19.3946 19.2071 19.2071C19.3946 19.0196 19.5 18.7652 19.5 18.5V13.5ZM7 13.5H17V17.5H7V13.5ZM10 9.5V7.5H14V9.5H10ZM12 2C11.7348 2 11.4804 2.10536 11.2929 2.29289C11.1054 2.48043 11 2.73478 11 3V4H13V3C13 2.73478 12.8946 2.48043 12.7071 2.29289C12.5196 2.10536 12.2652 2 12 2ZM4 9.5C4 9.76522 4.10536 10.0196 4.29289 10.2071C4.48043 10.3946 4.73478 10.5 5 10.5C5.26522 10.5 5.51957 10.3946 5.70711 10.2071C5.89464 10.0196 6 9.76522 6 9.5V8.5H4V9.5ZM18 10.5C18.2652 10.5 18.5196 10.3946 18.7071 10.2071C18.8946 10.0196 19 9.76522 19 9.5V8.5H17V9.5C17 9.76522 17.1054 10.0196 17.2929 10.2071C17.4804 10.3946 17.7348 10.5 18 10.5Z"
                                        fill="currentColor"></path>
                                </svg>
                                <span class="mx-1">Cerrar sesion</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <script>
        function openMenu() {
            var menu = document.getElementById("menu");
            if (menu.classList.contains("hidden")) {
                menu.classList.remove("hidden");
            } else {
                menu.classList.add("hidden");
            }
        }
    </script>

    <div class="overflow-hidden bg-gray-200 px-6 py-24 sm:py-32 lg:overflow-visible lg:px-0">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <svg class="absolute left-[max(50%,25rem)] top-0 h-[64rem] w-[128rem] -translate-x-1/2 stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)]"
                aria-hidden="true">
                <defs>
                    <pattern id="e813992c-7d03-4cc4-a2bd-151760b470a0" width="200" height="200" x="50%" y="-1"
                        patternUnits="userSpaceOnUse">
                        <path d="M100 200V.5M.5 .5H200" fill="none" />
                    </pattern>
                </defs>
                <svg x="50%" y="-1" class="overflow-visible fill-gray-50">
                    <path
                        d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z"
                        stroke-width="0" />
                </svg>
                <rect width="100%" height="100%" stroke-width="0" fill="url(#e813992c-7d03-4cc4-a2bd-151760b470a0)" />
            </svg>
        </div>
        <div
            class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start lg:gap-y-10">
            <div
                class="lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <div class="lg:max-w-lg">
                        <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">ParkNow</h1>
                        <p class="mt-6 text-xl leading-8 text-gray-700"> Busca tu estacionamiento con nosotros, somos
                            una
                            alternativa fácil y rápida. Encuentra estacionamientos cercanos a tu ubicación, reserva con
                            anticipación,
                            y disfruta de una experiencia de estacionamiento sin estrés. Con nuestro sistema de reservas
                            en línea,
                            puedes encontrar el lugar perfecto para estacionar tu vehículo, ya sea para un evento, una
                            cita, o
                            simplemente para hacer tus compras diarias. ¡Deja atrás la preocupación por encontrar un
                            lugar para
                            estacionar y comienza a disfrutar de la comodidad que ofrecemos!</p>
                    </div>
                </div>
            </div>
            <div class="-ml-12 -mt-12 p-12 lg:top-4 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:overflow-hidden">
                <img class="w-[48rem] max-w-none rounded-xl bg-gray-900 shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem]"
                    src="../img/inicioparking.jpg" alt="">
            </div>
            <div
                class="lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <div class="max-w-xl text-base leading-7 text-gray-700 lg:max-w-lg">
                        <p>Nuestro sistema te permite explorar una amplia gama de opciones de estacionamiento, desde
                            estacionamientos públicos hasta estacionamientos privados en edificios y complejos
                            residenciales. Además,
                            puedes filtrar tus resultados según tus preferencias, como la distancia desde tu ubicación,
                            el precio, y
                            las comodidades ofrecidas, para encontrar el estacionamiento perfecto que se adapte a tus
                            necesidades.</p>
                        <ul role="list" class="mt-8 space-y-8 text-gray-600">
                            <li class="flex gap-x-3">
                                <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.5 17a4.5 4.5 0 01-1.44-8.765 4.5 4.5 0 018.302-3.046 3.5 3.5 0 014.504 4.272A4 4 0 0115 17H5.5zm3.75-2.75a.75.75 0 001.5 0V9.66l1.95 2.1a.75.75 0 101.1-1.02l-3.25-3.5a.75.75 0 00-1.1 0l-3.25 3.5a.75.75 0 101.1 1.02l1.95-2.1v4.59z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span><strong class="font-semibold text-gray-900">Push to deploy.</strong> Con nuestro
                                    servicio de "Push
                                    to deploy", puedes implementar tus cambios de código de manera rápida y sencilla.
                                    Olvídate de los
                                    largos procesos de despliegue y actualiza tu aplicación con solo pulsar un botón,
                                    ahorrando tiempo y
                                    esfuerzo en cada iteración de desarrollo.</span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span><strong class="font-semibold text-gray-900">SSL certificates.</strong> Nuestra
                                    plataforma ofrece
                                    SSL certificates para garantizar la seguridad y privacidad de tus datos y la de tus
                                    usuarios. Con
                                    certificados SSL instalados en tu sitio web, puedes proteger las transmisiones de
                                    datos entre tu
                                    servidor y los navegadores de tus usuarios, fortaleciendo la confianza y la
                                    seguridad en tu
                                    aplicación.</span>
                            </li>
                            <li class="flex gap-x-3">
                                <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M4.632 3.533A2 2 0 016.577 2h6.846a2 2 0 011.945 1.533l1.976 8.234A3.489 3.489 0 0016 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234z" />
                                    <path fill-rule="evenodd"
                                        d="M4 13a2 2 0 100 4h12a2 2 0 100-4H4zm11.24 2a.75.75 0 01.75-.75H16a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75h-.01a.75.75 0 01-.75-.75V15zm-2.25-.75a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 00.75-.75V15a.75.75 0 00-.75-.75h-.01z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span><strong class="font-semibold text-gray-900">Database backups.</strong> Mantén tus
                                    datos seguros y
                                    protegidos con nuestro servicio de Database backups. Realizamos copias de seguridad
                                    regulares de tu
                                    base de datos para asegurar que tus datos estén a salvo ante cualquier eventualidad.
                                    Con nuestras
                                    soluciones de respaldo, puedes tener la tranquilidad de que tus datos están
                                    protegidos y disponibles
                                    cuando los necesites.</span>
                            </li>
                        </ul>
                        <p class="mt-8">Con nuestra aplicación, puedes decir adiós a las largas búsquedas de
                            estacionamiento y las
                            vueltas sin rumbo. Ya sea que estés planeando una salida corta o un viaje largo, estamos
                            aquí para
                            simplificar tu experiencia de estacionamiento. Únete a nuestra comunidad de usuarios
                            satisfechos y
                            descubre por qué somos la opción preferida para aquellos que valoran la conveniencia y la
                            eficiencia al
                            estacionar.</p>
                        <h2 class="mt-16 text-2xl font-bold tracking-tight text-gray-900">¿Sin estacionamiento
                            disponible? ¡No hay
                            problema!</h2>
                        <p class="mt-6">Encuentra estacionamiento fácilmente con nuestra aplicación. Ya no tienes que
                            preocuparte
                            por dar vueltas buscando un lugar para aparcar. Nuestra plataforma te ofrece una solución
                            rápida y
                            conveniente para tus necesidades de estacionamiento. ¡Obtén acceso a una amplia selección de
                            estacionamientos cercanos y reserva tu lugar con anticipación para una experiencia sin
                            estrés!</p>
                        <a href="reportar.php"
                            class="inline-flex items-center px-4 py-2 text-white bg-black  rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Reportar Problema
                        </a>

                    </div>
                </div>
            </div>
            <!-- Botón Reportar Problema -->


        </div>
    </div>
    <footer class="bg-gray-900">
        <div class="container p-6 mx-auto">
            <div class="lg:flex">
                <div class="w-full -mx-6 lg:w-2/5">
                    <div class="px-6">
                        <a href="#">
                            <img class="w-auto h-7" src="../img/logo.png" alt="ParkNow Logo">
                        </a>
                        <p class="max-w-sm mt-2 text-gray-600">Join our community and stay updated with new tips,
                            tutorials, and more.</p>
                        <div class="flex mt-6 -mx-2">
                            <a href="#" class="mx-2 text-gray-600 hover:text-blue-500" aria-label="Reddit">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C21.9939 17.5203 17.5203 21.9939 12 22ZM6.807 10.543C6.20862 10.5433 5.67102 10.9088 5.45054 11.465C5.23006 12.0213 5.37133 12.6558 5.807 13.066C5.92217 13.1751 6.05463 13.2643 6.199 13.33C6.18644 13.4761 6.18644 13.6229 6.199 13.769C6.199 16.009 8.814 17.831 12.028 17.831C15.242 17.831 17.858 16.009 17.858 13.769C17.8696 13.6229 17.8696 13.4761 17.858 13.33C18.4649 13.0351 18.786 12.3585 18.6305 11.7019C18.475 11.0453 17.8847 10.5844 17.21 10.593H17.157C16.7988 10.6062 16.458 10.7512 16.2 11C15.0625 10.2265 13.7252 9.79927 12.35 9.77L13 6.65L15.138 7.1C15.1931 7.60706 15.621 7.99141 16.131 7.992C16.1674 7.99196 16.2038 7.98995 16.24 7.986C16.7702 7.93278 17.1655 7.47314 17.1389 6.94094C17.1122 6.40873 16.6729 5.991 16.14 5.991C16.1022 5.99191 16.0645 5.99491 16.027 6C15.71 6.03367 15.4281 6.21641 15.268 6.492L12.82 6C12.7983 5.99535 12.7762 5.993 12.754 5.993C12.6094 5.99472 12.4851 6.09583 12.454 6.237L11.706 9.71C10.3138 9.7297 8.95795 10.157 7.806 10.939C7.53601 10.6839 7.17843 10.5422 6.807 10.543ZM12.18 16.524C12.124 16.524 12.067 16.524 12.011 16.524C11.955 16.524 11.898 16.524 11.842 16.524C11.0121 16.5208 10.2054 16.2497 9.542 15.751C9.49626 15.6958 9.47445 15.6246 9.4814 15.5533C9.48834 15.482 9.52348 15.4163 9.579 15.371C9.62737 15.3318 9.68771 15.3102 9.75 15.31C9.81233 15.31 9.87275 15.3315 9.921 15.371C10.4816 15.7818 11.159 16.0022 11.854 16C11.9027 16 11.9513 16 12 16C12.059 16 12.119 16 12.178 16C12.864 16.0011 13.5329 15.7863 14.09 15.386C14.1427 15.3322 14.2147 15.302 14.29 15.302C14.3653 15.302 14.4373 15.3322 14.49 15.386C14.5985 15.4981 14.5962 15.6767 14.485 15.786V15.746C13.8213 16.2481 13.0123 16.5208 12.18 16.523V16.524ZM14.307 14.08H14.291L14.299 14.041C13.8591 14.011 13.4994 13.6789 13.4343 13.2429C13.3691 12.8068 13.6162 12.3842 14.028 12.2269C14.4399 12.0697 14.9058 12.2202 15.1478 12.5887C15.3899 12.9572 15.3429 13.4445 15.035 13.76C14.856 13.9554 14.6059 14.0707 14.341 14.08H14.306H14.307ZM9.67 14C9.11772 14 8.67 13.5523 8.67 13C8.67 12.4477 9.11772 12 9.67 12C10.2223 12 10.67 12.4477 10.67 13C10.67 13.5523 10.2223 14 9.67 14Z">
                                    </path>
                                </svg>
                            </a>
                            <a href="#" class="mx-2 text-gray-600 hover:text-blue-500" aria-label="Facebook">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2.00195 12.002C2.00312 16.9214 5.58036 21.1101 10.439 21.881V14.892H7.90195V12.002H10.442V9.80204C10.3284 8.75958 10.6845 7.72064 11.4136 6.96698C12.1427 6.21332 13.1693 5.82306 14.215 5.90204C14.9655 5.91417 15.7141 5.98101 16.455 6.10205V8.56104H15.191C14.7558 8.50405 14.3183 8.64777 14.0017 8.95171C13.6851 9.25566 13.5237 9.68693 13.563 10.124V12.002H16.334L15.891 14.893H13.563V21.881C18.8174 21.0506 22.502 16.2518 21.9475 10.9611C21.3929 5.67041 16.7932 1.73997 11.4808 2.01722C6.16831 2.29447 2.0028 6.68235 2.00195 12.002Z">
                                    </path>
                                </svg>
                            </a>
                            <a href="#" class="mx-2 text-gray-600 hover:text-blue-500" aria-label="Github">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.026 2C7.13295 1.99937 2.99987 5.94325 2.87795 10.8253C2.75603 15.7074 6.19195 20.126 11.026 21.25V18.258C9.50191 18.6376 8.82328 17.77 8.59595 17.258C8.42032 16.8618 8.11045 16.5279 7.71695 16.309C7.12395 15.915 7.74195 15.842 8.09595 15.909C8.51795 15.97 8.90195 16.193 9.19095 16.533C9.32416 16.6916 9.49327 16.8114 9.68395 16.881C9.87463 16.9507 10.0805 16.9677 10.2803 16.93C10.4801 16.8923 10.6662 16.8017 10.8202 16.6675C10.9743 16.5333 11.0918 16.3602 11.161 16.164C11.2125 15.978 11.3343 15.8138 11.502 15.711C9.91895 15.513 8.26495 14.892 8.26495 11.692C8.25449 10.7834 8.60994 9.90885 9.26495 9.248C8.94631 8.36735 8.98392 7.38376 9.37095 6.528C10.1082 6.30582 10.8917 6.23686 11.664 6.324C12.434 6.318 13.204 6.39 13.956 6.538C14.3371 7.38735 14.3764 8.37034 14.066 9.248C14.726 9.90725 15.0814 10.782 15.072 11.69C15.072 14.9 13.413 15.509 11.823 15.708C11.9932 15.812 12.1167 15.9735 12.165 16.157C12.233 16.355 12.352 16.528 12.513 16.664C12.6753 16.8007 12.8735 16.8954 13.0867 16.9394C13.2999 16.9833 13.5201 16.9744 13.728 16.913C13.9359 16.8515 14.1257 16.739 14.278 16.584C14.575 16.23 15.004 16.008 15.429 15.908C15.78 15.842 16.393 15.915 15.799 16.308C15.4055 16.5279 15.0957 16.8618 14.92 17.258C14.6923 17.77 14.0137 18.6376 12.489 18.258V21.25C17.3081 20.1244 20.7402 15.7103 20.623 10.8307C20.5057 5.9511 16.384 2.00863 12.026 2Z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mt-6 lg:mt-0 lg:flex-1">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        <div>
                            <h3 class="text-gray-700 uppercase">Nosotros</h3>
                            <a href="team.php" class="block mt-2 text-sm text-gray-600 hover:underline">Nosotros </a>
                        </div>

                        <div>
                            <h3 class="text-gray-700 uppercase">Acerca De</h3>
                            <a href="AcercaDe.php" class="block mt-2 text-sm text-gray-600 hover:underline">Acerca
                                De</a>
                            <a href="FAQ's.php" class="block mt-2 text-sm text-gray-600 hover:underline">Preguntas
                                frecuente</a>
                            <a href="#" class="block mt-2 text-sm text-gray-600 hover:underline">¿Como funciona?</a>
                        </div>
                        <div>
                            <h3 class="text-gray-700 uppercase">Contacto</h3>
                            <span class="block mt-2 text-sm text-gray-600">+1 526 654 8965</span>
                            <span class="block mt-2 text-sm text-gray-600">contact@parknow.com</span>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="h-px my-6 bg-gray-300 border-none">

            <div>
                <p class="text-center text-gray-600">© ParkNow 2024 - All rights reserved</p>
            </div>
        </div>
    </footer>

</body>

</html>