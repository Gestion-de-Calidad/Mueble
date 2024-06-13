<?php

session_start();
use Services\MuebleServiceImpl;

define('REDIRECT_URL', '../../../public/index.php');
$muebleService = new MuebleServiceImpl();

// Redireccionar si no se proporciona ID
if (!isset($_GET['id'])) {
    header('Location: ' . REDIRECT_URL);
    exit();
}
// Busca el id del mueble si existe
$mueble = $muebleService->getMuebleById((int)$_GET['id']);

// Redireccionar si no se encuentra el mueble
if (!$mueble) {
    header('Location: ' . REDIRECT_URL);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateMueblePost($mueble);
    try {
        $muebleService->updateMueble($mueble);
        $_SESSION['message'] = "El mueble se actualizó con éxito.";
        $_SESSION['message_type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = "Hubo un error al actualizar el mueble: " . $e->getMessage();
        $_SESSION['message_type'] = "error";
    }
}


// Actualizar objeto Mueble a partir de datos POST
function updateMueblePost($mueble)
{
    $mueble->setNombre($_POST['nombre']);
    $mueble->setDescripcion($_POST['descripcion']);
    $mueble->setPrecio((float)$_POST['precio']);
    $mueble->setStock((int)$_POST['stock']);
    $mueble->setMedida((float)$_POST['medida']);
    $mueble->setLargo((float)$_POST['largo']);
    $mueble->setAncho((float)$_POST['ancho']);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar Mueble</title>
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
                <div class="card-header bg-info text-white">
                    <h3 class="card-title">Editar Mueble</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="edit.php?id=<?php echo $mueble->getMuebleId(); ?>">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                   value="<?php echo $mueble->getNombre(); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"
                                      required><?php echo $mueble->getDescripcion(); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" step="0.01" class="form-control" id="precio" name="precio"
                                   value="<?php echo $mueble->getPrecio(); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" class="form-control" id="stock" name="stock"
                                   value="<?php echo $mueble->getStock(); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="medida">Medida</label>
                            <input type="number" step="0.01" class="form-control" id="medida" name="medida"
                                   value="<?php echo $mueble->getMedida(); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="largo">Largo</label>
                            <input type="number" step="0.01" class="form-control" id="largo" name="largo"
                                   value="<?php echo $mueble->getLargo(); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="ancho">Ancho</label>
                            <input type="number" step="0.01" class="form-control" id="ancho" name="ancho"
                                   value="<?php echo $mueble->getAncho(); ?>" required>
                        </div>
                        <button type="submit" class="btn btn-outline-dark">Guardar</button>
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
    });
    <?php
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
    ?>
    <?php endif; ?>
</script>
</body>
</html>
