<!DOCTYPE html>
<html lang="es">

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php
    session_start();
    include('db_connection.php');
    try {
        // Crear una nueva conexión PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configurar PDO para que lance excepciones en caso de error
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Recibir datos del formulario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $email = $_POST['email'];
            $contra = $_POST['contra'];

            // Preparar y ejecutar la consulta SQL
            $stmt = $conn->prepare("SELECT * FROM registro WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // Verificar si el usuario existe
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verificar la contraseña
                if (password_verify($contra, $user['contra'])) {
                    $_SESSION['user_email'] = $user['email'];
                    echo "
            <script language='JavaScript'>
                swal.fire({
                    icon: 'success',
                    title: '¡Bienvenid@ a ParkNow Administrador!',
                    showConfirmButton: false,
                    timer: 2000
                }).then(function() {
                    window.location = '../index.php';
                });
            </script>";// Cambia por la página a la que quieres redirigir
                    exit();
                } else {
                    echo "
                    <script language='JavaScript'>
                        swal.fire({
                            icon: 'error',
                            title: 'Su usuario o contraseña pueden estar incorrecto',
                            text: '¡Vuelva a ingresar sus datos!',
                        }).then(function() {
                            window.location = '../login.html';
                        });
                    </script>
                    ";
                }
            } else {
                echo "
                <script language='JavaScript'>
                    swal.fire({
                        icon: 'error',
                        title: 'Usuario No Existente',
                        text: 'Registrese por favor',
                    }).then(function() {
                        window.location = '../login.html';
                    });
                </script>
                ";
            }
        }
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
    ?>
</body>

</html>