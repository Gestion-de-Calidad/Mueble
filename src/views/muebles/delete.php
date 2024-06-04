<?php
session_start(); // Iniciar sesión para usar mensajes flash

$droot = $_SERVER['DOCUMENT_ROOT'];
include_once $droot . '/Mueble/src/core/services/implementations/MuebleServiceImpl.php';

use App\Core\Services\Implementations\MuebleServiceImpl;

define('REDIRECT_URL', '../../../public/index.php');

// Redireccionar si no se proporciona ID
if (!isset($_GET['id'])) {
    header('Location: ' . REDIRECT_URL);
    exit();
}

//Cargo el id del mueble
$muebleId = (int)$_GET['id'];

// Eliminar el mueble
function deleteMueble($muebleService, $muebleId)
{
    try {
        $muebleService->deleteMueble($muebleId);
        $_SESSION['message'] = "El mueble se elimino con éxito.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = "Hubo un error al eliminar el mueble: " . $e->getMessage();
        $_SESSION['message_type'] = "error";
    }
}

// Confirmar si se desea eliminar el registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $muebleService = new MuebleServiceImpl();
    deleteMueble($muebleService, $muebleId);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Eliminar Mueble</title>
    <!-- Archivos de estilo -->
    <link href="../../../lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="../../../lib/fontAwesome/css/all.min.css" rel="stylesheet">
    <link href="../../../lib/site/site.css" rel="stylesheet">
    <!-- Archivos JavaScript -->
    <script src="../../../lib/JQuery/jquery.min.js"></script>
    <script src="../../../lib/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="../../../lib/fontAwesome/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h3 class="card-title">Confirmar Eliminación</h3>
                </div>
                <div class="card-body">
                    <p>¿Estás seguro de que deseas eliminar este mueble?</p>
                    <form method="POST">
                        <button type="submit" class="btn btn-outline-dark">Continuar</button>
                        <a href="<?php echo REDIRECT_URL; ?>" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    <?php if (isset($_SESSION['message'])): ?>
    Swal.fire({
        icon: '<?php echo $_SESSION['message_type']; ?>',
        title: '<?php echo $_SESSION['message_type'] === "success" ? "Éxito" : "Error"; ?>',
        text: '<?php echo $_SESSION['message']; ?>',
        onClose: () => {
            window.location.href = '<?php echo REDIRECT_URL; ?>';
        }, // Redirección al index después de cerrar la alerta
    });
    <?php
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
    ?>
    <?php endif;?>
</script>
</body>
</html>
